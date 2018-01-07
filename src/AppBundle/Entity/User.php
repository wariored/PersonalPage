<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @ORM\OneToOne(targetEntity="NK\PersoPageBundle\Entity\Professor", mappedBy="user", cascade={"remove"})
     */
    protected $professor;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
   

    /**
     * Set professor
     *
     * @param \NK\PersoPageBundle\Entity\User $professor
     *
     * @return User
     */
    public function setProfessor(\NK\PersoPageBundle\Entity\Professor $professor = null)
    {
        $this->professor = $professor;

        return $this;
    }

    /**
     * Get professor
     *
     * @return \NK\PersoPageBundle\Entity\User
     */
    public function getProfessor()
    {
        return $this->professor;
    }
}
