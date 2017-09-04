<?php

namespace WKT\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserTraining
 *
 * @ORM\Table(name="user_training")
 * @ORM\Entity(repositoryClass="WKT\UserBundle\Repository\UserTrainingRepository")
 */
class UserTraining
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
     * @var bool
     *
     * @ORM\Column(name="updated", type="boolean")
     */
    private $updated;

    /**
     * @var bool
     *
     * @ORM\Column(name="finished", type="boolean")
     */
    private $finished;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\UserBundle\Entity\User", inversedBy="userTrainings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\Training", inversedBy="userTrainings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $training;

    public function __construct()
    {
        $this->updated = false;
        $this->finished = false;
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
     * Set user
     *
     * @param \WKT\UserBundle\Entity\User $user
     *
     * @return UserTraining
     */
    public function setUser(\WKT\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \WKT\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set training
     *
     * @param \WKT\PlatformBundle\Entity\Training $training
     *
     * @return UserTraining
     */
    public function setTraining(\WKT\PlatformBundle\Entity\Training $training)
    {
        $this->training = $training;

        return $this;
    }

    /**
     * Get training
     *
     * @return \WKT\PlatformBundle\Entity\Training
     */
    public function getTraining()
    {
        return $this->training;
    }

    /**
     * Set finished
     *
     * @param boolean $finished
     *
     * @return UserTraining
     */
    public function setFinished($finished)
    {
        $this->finished = $finished;

        return $this;
    }

    /**
     * Get finished
     *
     * @return boolean
     */
    public function getFinished()
    {
        return $this->finished;
    }

    /**
     * Set updated
     *
     * @param boolean $updated
     *
     * @return UserTraining
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return boolean
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}
