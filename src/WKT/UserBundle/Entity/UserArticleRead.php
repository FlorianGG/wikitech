<?php

namespace WKT\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserArticleRead
 *
 * @ORM\Table(name="user_article_read")
 * @ORM\Entity(repositoryClass="WKT\UserBundle\Repository\UserArticleReadRepository")
 */
class UserArticleRead
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
     * @ORM\ManyToOne(targetEntity="WKT\UserBundle\Entity\User", inversedBy="userArticlesRead")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\Article")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    public function __construct()
    {
        $this->updated = false;
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
     * Set updated
     *
     * @param boolean $updated
     *
     * @return UserArticleRead
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return bool
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set user
     *
     * @param \WKT\UserBundle\Entity\User $user
     *
     * @return UserArticleRead
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
     * Set article
     *
     * @param \WKT\PlatformBundle\Entity\Article $article
     *
     * @return UserArticleRead
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
