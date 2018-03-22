<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @ORM\Column(name="css", type="string")
     * @var string
     */
    protected $css = "style.css";

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function getId(){
      return $this->id;
    }

    public function getCss(){
      return $this->id;
    }

    public function setCss($leCss){
      $this->css = $leCss;

      return $this;
    }
}
