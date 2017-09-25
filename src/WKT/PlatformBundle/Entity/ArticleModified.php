<?php

namespace WKT\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @Assert\Length(min=5, minMessage="Le titre doit faire au moins {{ limit }} caractères.")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="introduction", type="text")
     * @Assert\NotBlank()
     * @Assert\Length(min=10, minMessage="L'introduction' doit faire au moins {{ limit }} caractères.")
     */
    private $introduction;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank()
     * @Assert\Length(min=20, minMessage="Le contenu de l'article doit faire au moins {{ limit }} caractères.")
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
     * @ORM\Column(name="isRejected", type="boolean", nullable=true)
     */
    private $isRejected;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\Video", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Valid()
     */

    private $video;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\Article")
     * @ORM\JoinColumn(nullable=true)
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @var float
     * @ORM\Column(name="orderPart", type="decimal", precision=20, scale=18, nullable=false)
     */
    private $orderInPart;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\Part")
     * @ORM\JoinColumn(nullable=false)
     */
    private $part;


    public function __construct()
    {
        $this->createdAt = new \DateTime;
        $this->isRejected = null;
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

    /**
     * Set user
     *
     * @param \WKT\UserBundle\Entity\User $user
     *
     * @return ArticleModified
     */
    public function setUser(\WKT\UserBundle\Entity\User $user = null)
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
     * Set orderInPart
     *
     * @param string $orderInPart
     *
     * @return ArticleModified
     */
    public function setOrderInPart($orderInPart)
    {
        $this->orderInPart = $orderInPart;

        return $this;
    }

    /**
     * Get orderInPart
     *
     * @return string
     */
    public function getOrderInPart()
    {
        return $this->orderInPart;
    }

    /**
     * Set part
     *
     * @param \WKT\PlatformBundle\Entity\Part $part
     *
     * @return ArticleModified
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
}
