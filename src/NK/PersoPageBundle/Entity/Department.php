<?php

namespace NK\PersoPageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 *
 * @ORM\Table(name="department")
 * @ORM\Entity(repositoryClass="NK\PersoPageBundle\Repository\DepartmentRepository")
 */
class Department
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
     * @ORM\Column(name="name", type="string", length=50, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="initial", type="string", length=5, unique=true)
     */
    private $initial;

    /**
     * @ORM\OneToMany(targetEntity="NK\PersoPageBundle\Entity\Professor", mappedBy="department")
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
     * Set name
     *
     * @param string $name
     *
     * @return Department
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set initial
     *
     * @param string $initial
     *
     * @return Department
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
     * @return Department
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
