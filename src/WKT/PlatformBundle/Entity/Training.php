<?php

namespace WKT\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Training
 *
 * @ORM\Table(name="training")
 * @ORM\Entity(repositoryClass="WKT\PlatformBundle\Repository\TrainingRepository")
 */
class Training
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
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="introduction", type="text")
     */
    private $introduction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="WKT\PlatformBundle\Entity\Part", mappedBy="training")
     */
    private $parts;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var bool
     *
     * @ORM\Column(name="draft", type="boolean", nullable=false)
     */
    private $draft;

    /**
     * @ORM\OneToMany(targetEntity="WKT\UserBundle\Entity\UserTraining", mappedBy="training")
     */
    private $userTrainings;

    public function __construct()
    {
        $this->createdAt = new \DateTime;
        $this->draft = true;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Training
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set introduction
     *
     * @param string $introduction
     *
     * @return Training
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;

        return $this;
    }

    /**
     * Get introduction
     *
     * @return string
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Training
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Training
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add part
     *
     * @param \WKT\PlatformBundle\Entity\Part $part
     *
     * @return Training
     */
    public function addPart(\WKT\PlatformBundle\Entity\Part $part)
    {
        $this->parts[] = $part;

        $part->setTraining($this);

        return $this;
    }

    /**
     * Remove part
     *
     * @param \WKT\PlatformBundle\Entity\Part $part
     */
    public function removePart(\WKT\PlatformBundle\Entity\Part $part)
    {
        $this->parts->removeElement($part);
    }

    /**
     * Get parts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * Set draft
     *
     * @param boolean $draft
     *
     * @return Training
     */
    public function setDraft($draft)
    {
        $this->draft = $draft;

        return $this;
    }

    /**
     * Get draft
     *
     * @return boolean
     */
    public function getDraft()
    {
        return $this->draft;
    }

    /**
     * Add userTraining
     *
     * @param \WKT\UserBundle\Entity\UserTraining $userTraining
     *
     * @return Training
     */
    public function addUserTraining(\WKT\UserBundle\Entity\UserTraining $userTraining)
    {
        $this->userTrainings[] = $userTraining;

        $userTraining->setTraining($this);

        return $this;
    }

    /**
     * Remove userTraining
     *
     * @param \WKT\UserBundle\Entity\UserTraining $userTraining
     */
    public function removeUserTraining(\WKT\UserBundle\Entity\UserTraining $userTraining)
    {
        $this->userTrainings->removeElement($userTraining);
    }

    /**
     * Get userTrainings
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserTrainings()
    {
        return $this->userTrainings;
    }
}
