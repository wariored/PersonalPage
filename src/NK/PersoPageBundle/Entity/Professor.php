<?php

namespace NK\PersoPageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Professor
 *
 * @ORM\Table(name="professor")
 * @ORM\Entity(repositoryClass="NK\PersoPageBundle\Repository\ProfessorRepository")
 */
class Professor
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", inversedBy="professor")
     * @ORM\JoinColumn(name="user_id", nullable=true)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="NK\PersoPageBundle\Entity\SavedData", mappedBy="professor", cascade={"remove"})
     */
    protected $savedData;
    
    /**
     * @ORM\OneToOne(targetEntity="NK\PersoPageBundle\Entity\PublishedData", mappedBy="professor", cascade={"remove"})
     */
    protected $publishedData;

    /**
     * @ORM\ManyToOne(targetEntity="NK\PersoPageBundle\Entity\Sex", inversedBy="professor")
     * @ORM\JoinColumn(name="sex_id")
     */
    protected $sex;

    /**
     * @ORM\ManyToOne(targetEntity="NK\PersoPageBundle\Entity\Department", inversedBy="professor")
     * @ORM\JoinColumn(name="department_id")
     */
    protected $department;



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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Professor
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Professor
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Professor
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Professor
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set savedData
     *
     * @param \NK\PersoPageBundle\Entity\SavedData $savedData
     *
     * @return Professor
     */
    public function setSavedData(\NK\PersoPageBundle\Entity\SavedData $savedData = null)
    {
        $this->savedData = $savedData;

        return $this;
    }

    /**
     * Get savedData
     *
     * @return \NK\PersoPageBundle\Entity\SavedData
     */
    public function getSavedData()
    {
        return $this->savedData;
    }

    /**
     * Set publishedData
     *
     * @param \NK\PersoPageBundle\Entity\PublishedData $publishedData
     *
     * @return Professor
     */
    public function setPublishedData(\NK\PersoPageBundle\Entity\PublishedData $publishedData = null)
    {
        $this->publishedData = $publishedData;

        return $this;
    }

    /**
     * Get publishedData
     *
     * @return \NK\PersoPageBundle\Entity\PublishedData
     */
    public function getPublishedData()
    {
        return $this->publishedData;
    }

    /**
     * Set sex
     *
     * @param \NK\PersoPageBundle\Entity\Sex $sex
     *
     * @return Professor
     */
    public function setSex(\NK\PersoPageBundle\Entity\Sex $sex = null)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return \NK\PersoPageBundle\Entity\Sex
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set department
     *
     * @param \NK\PersoPageBundle\Entity\Department $department
     *
     * @return Professor
     */
    public function setDepartment(\NK\PersoPageBundle\Entity\Department $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return \NK\PersoPageBundle\Entity\Department
     */
    public function getDepartment()
    {
        return $this->department;
    }
}
