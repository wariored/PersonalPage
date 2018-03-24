<?php

namespace NK\PersoPageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SavedData
 *
 * @ORM\Table(name="saved_data")
 * @ORM\Entity(repositoryClass="NK\PersoPageBundle\Repository\SavedDataRepository")
 */
class SavedData
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="enseignement", type="text", nullable=true)
     */
    private $enseignement;

    /**
     * @var string
     *
     * @ORM\Column(name="recherche", type="text", nullable=true)
     */
    private $recherche;

    /**
     * @var string
     *
     * @ORM\Column(name="publication", type="text", nullable=true)
     */
    private $publication;

    /**
     * @var string
     *
     * @ORM\Column(name="activAdmin", type="text", nullable=true)
     */
    private $activAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="text", nullable=true)
     */
    private $lien;

    /**
     * @var string
     *
     * @ORM\Column(name="hobbie", type="text", nullable=true)
     */
    private $hobbie;

    /**
     * @var string
     *
     * @ORM\Column(name="bref", type="text", nullable=true)
     */
    private $bref;

    /**
     * @var string
     *
     * @ORM\Column(name="biographie", type="text", nullable=true)
     */
    private $biographie;


    /**
     * @var \DateTime
     * @ORM\Column(name="added_date", type="datetime")
     */
    private $date;
    
    /**
     * @ORM\OneToOne(targetEntity="NK\PersoPageBundle\Entity\Professor", inversedBy="savedData")
     * @ORM\JoinColumn(name="professor_id", onDelete="CASCADE")
     */
    protected $professor;

    public function __construct()
    {
        $this->date = new \DateTime("now");
    }


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
     * Set enseignement
     *
     * @param string $enseignement
     *
     * @return SavedData
     */
    public function setEnseignement($enseignement)
    {
        $this->enseignement = $enseignement;

        return $this;
    }

    /**
     * Get enseignement
     *
     * @return string
     */
    public function getEnseignement()
    {
        return $this->enseignement;
    }

    /**
     * Set recherche
     *
     * @param string $recherche
     *
     * @return SavedData
     */
    public function setRecherche($recherche)
    {
        $this->recherche = $recherche;

        return $this;
    }

    /**
     * Get recherche
     *
     * @return string
     */
    public function getRecherche()
    {
        return $this->recherche;
    }

    /**
     * Set publication
     *
     * @param string $publication
     *
     * @return SavedData
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return string
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set activAdmin
     *
     * @param string $activAdmin
     *
     * @return SavedData
     */
    public function setActivAdmin($activAdmin)
    {
        $this->activAdmin = $activAdmin;

        return $this;
    }

    /**
     * Get activAdmin
     *
     * @return string
     */
    public function getActivAdmin()
    {
        return $this->activAdmin;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return SavedData
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set hobbie
     *
     * @param string $hobbie
     *
     * @return SavedData
     */
    public function setHobbie($hobbie)
    {
        $this->hobbie = $hobbie;

        return $this;
    }

    /**
     * Get hobbie
     *
     * @return string
     */
    public function getHobbie()
    {
        return $this->hobbie;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return SavedData
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set professor
     *
     * @param \NK\PersoPageBundle\Entity\Professor $professor
     *
     * @return SavedData
     */
    public function setProfessor(\NK\PersoPageBundle\Entity\Professor $professor = null)
    {
        $this->professor = $professor;

        return $this;
    }

    /**
     * Get professor
     *
     * @return \NK\PersoPageBundle\Entity\Professor
     */
    public function getProfessor()
    {
        return $this->professor;
    }

    /**
     * Set bref
     *
     * @param string $bref
     *
     * @return SavedData
     */
    public function setBref($bref)
    {
        $this->bref = $bref;

        return $this;
    }

    /**
     * Get bref
     *
     * @return string
     */
    public function getBref()
    {
        return $this->bref;
    }

    /**
     * Set biographie
     *
     * @param string $biographie
     *
     * @return SavedData
     */
    public function setBiographie($biographie)
    {
        $this->biographie = $biographie;

        return $this;
    }

    /**
     * Get biographie
     *
     * @return string
     */
    public function getBiographie()
    {
        return $this->biographie;
    }
}
