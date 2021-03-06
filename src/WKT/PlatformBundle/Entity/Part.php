<?php

namespace WKT\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Part
 *
 * @ORM\Table(name="part")
 * @ORM\Entity(repositoryClass="WKT\PlatformBundle\Repository\PartRepository")
 */
class Part
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
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\Training", inversedBy="parts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $training;

    /**
     * @var float
     * @ORM\Column(name="orderInTraining", type="decimal", precision=20, scale=18, nullable=false)
     */
    private $orderInTraining;

    /**
     * @ORM\OneToMany(targetEntity="WKT\PlatformBundle\Entity\Article", mappedBy="part")
     * @ORM\OrderBy({"orderInPart" = "ASC"})
     */
    private $articles;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Assert\DateTime()
     */
    private $createdAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime;
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
     * @return Part
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
     * Set orderInTraining
     *
     * @param integer $orderInTraining
     *
     * @return Part
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
     * Set training
     *
     * @param \WKT\PlatformBundle\Entity\Training $training
     *
     * @return Part
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
     * Add article
     *
     * @param \WKT\PlatformBundle\Entity\Article $article
     *
     * @return Part
     */
    public function addArticle(\WKT\PlatformBundle\Entity\Article $article)
    {
        $this->articles[] = $article;
        $article->setPart($this);

        return $this;
    }

    /**
     * Remove article
     *
     * @param \WKT\PlatformBundle\Entity\Article $article
     */
    public function removeArticle(\WKT\PlatformBundle\Entity\Article $article)
    {
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return Part
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Part
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
}
