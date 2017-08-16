<?php

namespace WKT\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\Training")
     * @ORM\JoinColumn(nullable=false)
     */
    private $training;

    /**
     * @ORM\OneToMany(targetEntity="WKT\PlatformBundle\Entity\Article", mappedBy="Article")
     */
    private $articles;
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
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
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
}
