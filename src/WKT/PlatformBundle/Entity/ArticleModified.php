<?php

namespace WKT\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * ArticleModified
 *
 * @ORM\Table(name="article_modified")
 * @ORM\Entity(repositoryClass="WKT\PlatformBundle\Repository\ArticleModifiedRepository")
 */
class ArticleModified
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
     * @var string
     *
     * @ORM\Column(name="commit", type="text", nullable=true)
     */
    private $commit;

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
     * @ORM\Column(name="isRejected", type="boolean", nullable=true)
     */
    private $isRejected;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\Video", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $video;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\TypeOfModification")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TypeOfModification;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\Article")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;


    public function __construct()
    {
        $this->createdAt = new \DateTime;
        $this->isRejected = false;
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
     * @return ArticleModified
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
     * @return ArticleModified
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
     * @return ArticleModified
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
     * Set commit
     *
     * @param string $commit
     *
     * @return ArticleModified
     */
    public function setCommit($commit)
    {
        $this->commit = $commit;

        return $this;
    }

    /**
     * Get commit
     *
     * @return string
     */
    public function getCommit()
    {
        return $this->commit;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ArticleModified
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
     * @return ArticleModified
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
     * Set isRejected
     *
     * @param boolean $isRejected
     *
     * @return ArticleModified
     */
    public function setIsRejected($isRejected)
    {
        $this->isRejected = $isRejected;

        return $this;
    }

    /**
     * Get isRejected
     *
     * @return boolean
     */
    public function getIsRejected()
    {
        return $this->isRejected;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return ArticleModified
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
     * @return ArticleModified
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
     * Set typeOfModification
     *
     * @param \WKT\PlatformBundle\Entity\TypeOfModification $typeOfModification
     *
     * @return ArticleModified
     */
    public function setTypeOfModification(\WKT\PlatformBundle\Entity\TypeOfModification $typeOfModification)
    {
        $this->TypeOfModification = $typeOfModification;

        return $this;
    }

    /**
     * Get typeOfModification
     *
     * @return \WKT\PlatformBundle\Entity\TypeOfModification
     */
    public function getTypeOfModification()
    {
        return $this->TypeOfModification;
    }

    /**
     * Set article
     *
     * @param \WKT\PlatformBundle\Entity\Article $article
     *
     * @return ArticleModified
     */
    public function setArticle(\WKT\PlatformBundle\Entity\Article $article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \WKT\PlatformBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }
}
