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
    //Si rien d'est rempli
    if((isset($_POST['ajout']))){

        if( (isset($_POST['titre']))
        && (isset($_POST['places']))
        && (isset($_POST['adresse']))
        && (isset($_POST['ville']))
        && (isset($_POST['type']))
        && (isset($_POST['nbrpieces']))
        && (isset($_POST['surface']))
        && (isset($_POST['loyerhc']))
        && (isset($_POST['charges']))
        && (isset($_POST['descr']))

        && !(empty($_POST['titre']))
        && !(empty($_POST['places']))
        && !(empty($_POST['adresse']))
        && !(empty($_POST['ville']))
        && !(empty($_POST['type']))
        && !(empty($_POST['nbrpieces']))
        && !(empty($_POST['surface']))
        && !(empty($_POST['loyerhc']))
        && !(empty($_POST['charges']))
        && !(empty($_POST['descr']))){

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
          $date = date("d-m-Y");
          $annonce->setDateCreation($date);
          $annonce->setIdUser($id = $user = $this->getUser()->getId());
          $em->persist($annonce);
          $em->flush();

          $response = $this->forward('AppBundle\Controller\AnnonceController::readAction');
          return $response;
      }
      else{
        return $this->render('/create.html.twig', array('message' => 'Veuillez remplir correctement le formulaire.'));
      }
    }
    else{
      return $this->render('/create.html.twig', array('message' => 'Veuillez remplir correctement le formulaire.'));
    }

  }


  /*
  @Route("/lire", name="lire")
  */
  public function readAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $annonces = $this->getDoctrine()->getManager()->getRepository('AppBundle:Annonce');
    $locations = $this->getDoctrine()->getManager()->getRepository('AppBundle:Location');
    $id = $user = $this->getUser()->getId();
    $ann = $annonces->findAll();
    $loc = $locations->findAll();

    $breadcrumbs = $this->get("white_october_breadcrumbs");
    $breadcrumbs->addItem("Home", $this->get("router")->generate("lire"));
    $breadcrumbs->addItem("Annonces");

    return $this->render('/read.html.twig', array('annonces' => $ann, 'locations' => $loc, 'id' => $id));
  }
  /*
  @Route("/annonces", name="annonces")
  */
  public function annoncesAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $annonces = $this->getDoctrine()->getManager()->getRepository('AppBundle:Annonce');
    $locations = $this->getDoctrine()->getManager()->getRepository('AppBundle:Location');
    $id = $user = $this->getUser()->getId();
    $ann = $annonces->findAll();
    $loc = $locations->findAll();

    $breadcrumbs = $this->get("white_october_breadcrumbs");
    $breadcrumbs->addItem("Home", $this->get("router")->generate("annonces"));
    $breadcrumbs->addItem("Mon compte");
    $breadcrumbs->addItem("Mes annonces");

    return $this->render('/gestion.html.twig', array('annonces' => $ann, 'locations' => $loc, 'id' => $id));
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

    $id = $user = $this->getUser()->getId();
    $locations = $this->getDoctrine()->getManager()->getRepository('AppBundle:Location');
    $loc = $locations->findAll();

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
    return $this->render('/read.html.twig', array('annonces' => $result, 'locations' => $loc, 'id' => $id));
  }
  /*
  @Route("/details/", name="details")
  */
  public function detailsAction(Request $request)
  {
    $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Annonce');
    $em = $this->getDoctrine()->getManager();
    $id = $user = $this->getUser()->getId();
    $annonce = $em->getReference('AppBundle:Annonce', $_POST['details']);
    $location = $em->getReference('AppBundle:Location', $annonce->getIdLogement());
    $user = $this->getUser();
    $result = $repository->findAll();

    $breadcrumbs = $this->get("white_october_breadcrumbs");
    $breadcrumbs->addItem("Home", $this->get("router")->generate("annonces"));
    $breadcrumbs->addItem("Annonces");
    $breadcrumbs->addItem("Mes annonces");
    $breadcrumbs->addItem($annonce->getTitre());

    return $this->render('/details.html.twig', array('annonce' => $annonce, 'location' => $location, 'user' => $user, 'id' => $id));
  }
  /*
  @Route("/search", name="search")
  */
  public function searchAction(Request $request)
  {


        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("lire"));
        $breadcrumbs->addItem("Annonces");

    $annonces = $this->getDoctrine()->getManager()->getRepository('AppBundle:Annonce');
    $locations = $this->getDoctrine()->getManager()->getRepository('AppBundle:Location');
    $id = $user = $this->getUser()->getId();
    $ann = $annonces->findAll();
    $loc = $locations->findAll();
    if( isset($_POST["search"])){
      $em = $this->getDoctrine()->getManager();
      $mot = addcslashes($_POST['recherche'], '\'%_"/');
      if($mot == ''){
        return $this->redirectToRoute("lire");
      }
      $ann = $em->getRepository('AppBundle:Annonce')
      ->research($mot);
      if (!$annonces) {
        return $this->render('/read.html.twig', array('annonces' => $ann, 'locations' => $loc, 'id' => $id));
      }
      return $this->render('/read.html.twig', array('annonces' => $ann, 'locations' => $loc, 'id' => $id));
    }
    return $this->redirectToRoute('lire');
  }
  /*
  @Route("/fluxrss", defaults={"_format"="xml"}, name="annonces_colocation_rss")
  */
  public function rssAction()
  {


    $annonces = $this->getDoctrine()->getManager()->getRepository('AppBundle:Annonce');
    $listAnnonces = $annonces->findAll();
    return $this->render("fluxrss.html.twig", array(
      'listAnnonces' => $listAnnonces
    ));
  }
}
?>
