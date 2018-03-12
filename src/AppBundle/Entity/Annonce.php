<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnnonceRepository")
 * @ORM\Table(name="annonce")
 */
class Annonce
{


    /**
    * @ORM\Column(name="idAnnonce", type="integer")
    *@ORM\OneToOne(targetEntity="Location")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    private $idAnnonce;

    /**
    *
    * @ORM\Column(name="titre", type="string")
     * @var string
     */
    private $titre;

    /**
    * @ORM\Column(name="idUser", type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $idUser;

    /**
    * @ORM\Column(name="places", type="integer")
     * @var int
     */
    private $places;

    /**
    * @ORM\Column(name="idLogement", type="integer")
     * @var int
     */
    private $idLogement;

    /**
    * @ORM\Column(name="description", type="string")
     * @var string
     */
    private $description;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idAnnonce
     *
     * @param integer $idAnnonce
     *
     * @return Annonce
     */
    public function setIdAnnonce($idAnnonce)
    {
        $this->idAnnonce = $idAnnonce;

        return $this;
    }

    /**
     * Get idAnnonce
     *
     * @return int
     */
    public function getIdAnnonce()
    {
        return $this->idAnnonce;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Annonce
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Annonce
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set places
     *
     * @param integer $places
     *
     * @return Annonce
     */
    public function setPlaces($places)
    {
        $this->places = $places;

        return $this;
    }

    /**
     * Get places
     *
     * @return int
     */
    public function getPlaces()
    {
        return $this->places;
    }

    /**
     * Set idLogement
     *
     * @param integer $idLogement
     *
     * @return Annonce
     */
    public function setIdLogement($idLogement)
    {
        $this->idLogement = $idLogement;

        return $this;
    }

    /**
     * Get idLogement
     *
     * @return int
     */
    public function getIdLogement()
    {
        return $this->idLogement;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Annonce
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
