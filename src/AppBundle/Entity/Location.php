<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocationRepository")
 */
class Location
{


    /**
     * @var int
     *
     * @ORM\Column(name="id_logement", type="integer", unique=true)
     *@ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idLogement;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=300)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=300)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrpieces", type="integer")
     */
    private $nbrpieces;

    /**
     * @var int
     *
     * @ORM\Column(name="surface", type="integer")
     */
    private $surface;

    /**
     * @var int
     *
     * @ORM\Column(name="loyerhc", type="integer")
     */
    private $loyerhc;

    /**
     * @var int
     *
     * @ORM\Column(name="charges", type="integer")
     */
    private $charges;


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
     * Set idLogement
     *
     * @param integer $idLogement
     *
     * @return Location
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Location
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Location
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Location
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set nbrpieces
     *
     * @param integer $nbrpieces
     *
     * @return Location
     */
    public function setNbrpieces($nbrpieces)
    {
        $this->nbrpieces = $nbrpieces;

        return $this;
    }

    /**
     * Get nbrpieces
     *
     * @return int
     */
    public function getNbrpieces()
    {
        return $this->nbrpieces;
    }

    /**
     * Set surface
     *
     * @param integer $surface
     *
     * @return Location
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface
     *
     * @return int
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Set loyerhc
     *
     * @param integer $loyerhc
     *
     * @return Location
     */
    public function setLoyerhc($loyerhc)
    {
        $this->loyerhc = $loyerhc;

        return $this;
    }

    /**
     * Get loyerhc
     *
     * @return int
     */
    public function getLoyerhc()
    {
        return $this->loyerhc;
    }

    /**
     * Set charges
     *
     * @param integer $charges
     *
     * @return Location
     */
    public function setCharges($charges)
    {
        $this->charges = $charges;

        return $this;
    }

    /**
     * Get charges
     *
     * @return int
     */
    public function getCharges()
    {
        return $this->charges;
    }
}
