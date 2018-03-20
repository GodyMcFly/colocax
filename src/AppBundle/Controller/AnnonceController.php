<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Location;
use AppBundle\Entity\User;
use AppBundle\Entity\Annonce;

class AnnonceController extends Controller {

  /*
  @Route("/ajout", name="ajouter")
  */
  public function ajoutAction(Request $request)
  {
      if(!isset($_POST['titre']) || !isset($_POST['places']) || !isset($_POST['adresse']) ||
      !isset($_POST['ville']) ||!isset($_POST['type']) || !isset($_POST['nbrpieces'])
      || !isset($_POST['surface']) || !isset($_POST['loyerhc'])
      || !isset($_POST['charges'])){

          return $this->render('/create.html.twig', array('message' => 'Veuillez remplir correctement le formulaire.'));
      }
      else {
          $location = new Location();

          $location->setAdresse($_POST['adresse']);
          $location->setVille($_POST['ville']);
          $location->setType($_POST['type']);
          $location->setNbrpieces($_POST['nbrpieces']);
          $location->setSurface($_POST['surface']);
          $location->setLoyerhc($_POST['loyerhc']);
          $location->setCharges($_POST['charges']);
          $em = $this->getDoctrine()->getManager();
          $em->persist($location);
          $em->flush();
          $annonce = new Annonce();
          $annonce->setTitre($_POST['titre']);
          $annonce->setPlaces($_POST['places']);
          $annonce->setIdLogement($location->getIdLogement());
          $annonce->setDescription($_POST['descr']);
          $annonce->setIdUser($id = $user = $this->getUser()->getId());
          $em->persist($annonce);
          $em->flush();


          return $this->render('/create.html.twig', array('message' => 'Annonce correctement ajoutée.'));

      }

  }

  /*
  @Route("/lire", name="lire")
  */
  public function readAction(Request $request)
  {
    $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Annonce');
    $id = $user = $this->getUser()->getId();


$result = $repository->findAll();
      return $this->render('/read.html.twig', array('annonces' => $result, 'id' => $id));
  }

  /*
  @Route("/supprimer", name="supprimer")
  */
  public function supprimerAction(Request $request)
  {
    $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Annonce');
    $em = $this->getDoctrine()->getManager();
    $annonce = $em->getReference('AppBundle:Annonce', $_POST['supprimer']);
    $em->remove($annonce);
    $em->flush();


$result = $repository->findAll();
      return $this->render('/read.html.twig', array('annonces' => $result));
  }

  /*
  @Route("/modifier", name="modifier")
  */
  public function modifierAction(Request $request)
  {
    $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Annonce');
    $em = $this->getDoctrine()->getManager();
    $annonce = $em->getReference('AppBundle:Annonce', $_POST['id']);
    $location = $em->getReference('AppBundle:Location', $annonce->getIdLogement());
    $annonce->setTitre($_POST['titre']);
    $annonce->setPlaces($_POST['places']);
    $annonce->setDescription($_POST['descr']);
    $location->setAdresse($_POST['adresse']);
    $location->setVille($_POST['ville']);
    $location->setType($_POST['type']);
    $location->setNbrpieces($_POST['nbrpieces']);
    $location->setSurface($_POST['surface']);
    $location->setLoyerhc($_POST['loyerhc']);
    $location->setCharges($_POST['charges']);


    $em->flush();


$result = $repository->findAll();
      return $this->render('/read.html.twig', array('annonces' => $result));
  }


  /*
  @Route("/details", name="details")
  */
  public function detailsAction(Request $request)
  {
    $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Annonce');
    $em = $this->getDoctrine()->getManager();
    $annonce = $em->getReference('AppBundle:Annonce', $_POST['details']);
    $location = $em->getReference('AppBundle:Location', $annonce->getIdLogement());


    $result = $repository->findAll();
      return $this->render('/details.html.twig', array('annonce' => $annonce, 'location' => $location));
  }

}

?>
