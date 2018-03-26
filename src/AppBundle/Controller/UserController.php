<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/{_locale}/profile/template", name="template")
     */
    public function UserAction(Request $request)
    {
        $user = $this->getUser();
        $user->setCss($_POST['template']);

        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $breadcrumbs = $this->get("white_october_breadcrumbs");
        $breadcrumbs->addItem("Home", $this->get("router")->generate("fos_user_profile_show"));
        $breadcrumbs->addItem("Mon compte");

        return $this->render('@FOSUser/Profile/show.html.twig', array(
            'user' => $user,
          ));
    }
}
