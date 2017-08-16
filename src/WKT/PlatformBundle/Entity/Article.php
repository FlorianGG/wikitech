<?php

namespace WKT\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="WKT\PlatformBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="introduction", type="text")
     */
    private $introduction;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifiedAt", type="datetime", nullable=true)
     */
    private $modifiedAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="isModifying", type="boolean", nullable=true)
     */
    private $isModifying;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrPoints", type="integer")
     */
    private $nbrPoints;

    /**
     * @var int
     *
     * @ORM\Column(name="orderInTraining", type="integer", nullable=true)
     */
    private $orderInTraining;

    /**
     * @ORM\OneToOne(targetEntity="WKT\PlatformBundle\Entity\Video", cascade={"persist", "remove"})
     */
    private $video;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\Part", cascade={"persist"}, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $part;

    /**
     * @var bool
     * @ORM\Column(name="hasNewPart", type="boolean", nullable=true)
     */
    private $hasNewPart;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\Training")
     * @ORM\JoinColumn(nullable=false)
     */
    private $training;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    public function __construct()
    {
        $this->createdAt = new \DateTime;
        $this->isModifying = false;
        $this->nbrPoints = 0;
        $this->hasNewPart = false;
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
     * @return Article
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
     * @return Article
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
     * Set content
     *
     * @param string $content
     *
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Article
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
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     *
     * @return Article
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Set isModifying
     *
     * @param boolean $isModifying
     *
     * @return Article
     */
    public function setIsModifying($isModifying)
    {
        $this->isModifying = $isModifying;

        return $this;
    }

    /**
     * Get isModifying
     *
     * @return boolean
     */
    public function getIsModifying()
    {
        return $this->isModifying;
    }

    /**
     * Set nbrPoints
     *
     * @param integer $nbrPoints
     *
     * @return Article
     */
    public function setNbrPoints($nbrPoints)
    {
        $this->nbrPoints = $nbrPoints;

        return $this;
    }

    /**
     * Get nbrPoints
     *
     * @return integer
     */
    public function getNbrPoints()
    {
        return $this->nbrPoints;
    }

    /**
     * Set orderInTraining
     *
     * @param integer $orderInTraining
     *
     * @return Article
     */
    public function setOrderInTraining($orderInTraining)
    {
        $this->orderInTraining = $orderInTraining;

        return $this;
    }

    /**
     * Get orderInTraining
     *
     * @return integer
     */
    public function getOrderInTraining()
    {
        return $this->orderInTraining;
    }

    /**
     * Set hasNewPart
     *
     * @param boolean $hasNewPart
     *
     * @return Article
     */
    public function setHasNewPart($hasNewPart)
    {
        $this->hasNewPart = $hasNewPart;

        return $this;
    }

    /**
     * Get hasNewPart
     *
     * @return boolean
     */
    public function getHasNewPart()
    {
        return $this->hasNewPart;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Article
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
     * Set video
     *
     * @param \WKT\PlatformBundle\Entity\Video $video
     *
     * @return Article
     */
    public function setVideo(\WKT\PlatformBundle\Entity\Video $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \WKT\PlatformBundle\Entity\Video
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set part
     *
     * @param \WKT\PlatformBundle\Entity\Part $part
     *
     * @return Article
     */
    public function setPart(\WKT\PlatformBundle\Entity\Part $part)
    {
        $this->part = $part;

        return $this;
    }

    /**
     * Get part
     *
     * @return \WKT\PlatformBundle\Entity\Part
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Set training
     *
     * @param \WKT\PlatformBundle\Entity\Training $training
     *
     * @return Article
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
}
