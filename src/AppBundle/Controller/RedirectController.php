<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Location;
use AppBundle\Entity\Annonce;
class RedirectController extends Controller
{

    /*
    @Route("/create", name="creation")
    */
    public function createAction(Request $request)
    {
        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("create"));
        $breadcrumbs->addItem("Créer une annonce");

        return $this->render('/create.html.twig');
    }

    /*
    @Route("/update", name="update")
    */
    public function updateAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $annonce = $em->getReference('AppBundle:Annonce', $_POST['modifier']);
      $location = $em->getReference('AppBundle:Location', $annonce->getIdLogement());

      $breadcrumbs = $this->get("white_october_breadcrumbs");
      $breadcrumbs->addItem("Home", $this->get("router")->generate("modifier"));
      $breadcrumbs->addItem("Annonces");
      $breadcrumbs->addItem("Modifier l'annonce ".$annonce->getTitre());

        return $this->render('/update.html.twig', array('titre' => $annonce->getTitre(),
        'places' => $annonce->getPlaces(), 'description' => $annonce->getDescription(),
        'adresse' => $location->getAdresse(), 'ville' => $location->getVille(),
        'type' => $location->getType(), 'nbrpieces' => $location->getNbrpieces(),
        'surface' => $location->getSurface(), 'loyerhc' => $location->getLoyerhc(),
        'charges' => $location->getCharges(), 'id'=> $_POST['modifier']));
    }

    /*
    @Route("/dupliquer", name="dupliquer")
    */
    public function dupliquerAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $annonce = $em->getReference('AppBundle:Annonce', $_POST['dupliquer']);
      $location = $em->getReference('AppBundle:Location', $annonce->getIdLogement());

      $breadcrumbs = $this->get("white_october_breadcrumbs");
      $breadcrumbs->addItem("Home", $this->get("router")->generate("dupliquer"));
      $breadcrumbs->addItem("Annonces");
      $breadcrumbs->addItem("Modifier l'annonce ".$annonce->getTitre());

        return $this->render('/create.html.twig', array('titre' => $annonce->getTitre(),
        'places' => $annonce->getPlaces(), 'description' => $annonce->getDescription(),
        'adresse' => $location->getAdresse(), 'ville' => $location->getVille(),
        'type' => $location->getType(), 'nbrpieces' => $location->getNbrpieces(),
        'surface' => $location->getSurface(), 'loyerhc' => $location->getLoyerhc(),
        'charges' => $location->getCharges(), 'id'=> $_POST['dupliquer']));
    }
}
?>
