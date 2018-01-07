<?php

namespace NK\PersoPageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sex
 *
 * @ORM\Table(name="sex")
 * @ORM\Entity(repositoryClass="NK\PersoPageBundle\Repository\SexRepository")
 */
class Sex
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
     * @ORM\Column(name="type", type="string", length=9, unique=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="initial", type="string", length=1, unique=true)
     */
    private $initial;

    /**
     * @ORM\OneToMany(targetEntity="NK\PersoPageBundle\Entity\Professor", mappedBy="sex")
     */
    protected $professor;

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
     * Set type
     *
     * @param string $type
     *
     * @return Sex
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
     * Set initial
     *
     * @param string $initial
     *
     * @return Sex
     */
    public function setInitial($initial)
    {
        $this->initial = $initial;

        return $this;
    }

    /**
     * Get initial
     *
     * @return string
     */
    public function getInitial()
    {
        return $this->initial;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->professor = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add professor
     *
     * @param \NK\PersoPageBundle\Entity\Professor $professor
     *
     * @return Sex
     */
    public function addProfessor(\NK\PersoPageBundle\Entity\Professor $professor)
    {
        $this->professor[] = $professor;

        return $this;
    }

    /**
     * Remove professor
     *
     * @param \NK\PersoPageBundle\Entity\Professor $professor
     */
    public function removeProfessor(\NK\PersoPageBundle\Entity\Professor $professor)
    {
        $this->professor->removeElement($professor);
    }

    /**
     * Get professor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfessor()
    {
        return $this->professor;
    }
}
