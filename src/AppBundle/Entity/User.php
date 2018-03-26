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
    protected $css = "style";

    /**
    * @ORM\Column(name="tel", type="string")
     * @var string
     */
    protected $tel;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    public function getId(){
      return $this->id;
    }

    public function getCss(){
      return $this->css;
    }

    public function setCss($leCss){
      $this->css = $leCss;

      return $this;
    }

    public function getTel(){
      return $this->tel;
    }

    public function setTel($leTel){
      $this->tel = $leTel;
      return $this;
    }
}
