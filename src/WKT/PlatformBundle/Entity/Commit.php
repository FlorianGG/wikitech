<?php

namespace WKT\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Commit
 *
 * @ORM\Table(name="commit")
 * @ORM\Entity(repositoryClass="WKT\PlatformBundle\Repository\CommitRepository")
 */
class Commit
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
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\TypeOfModification")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeOfModification;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer", options={"default":0}, nullable=true)
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="WKT\PlatformBundle\Entity\ArticleModified")
     * @ORM\JoinColumn(nullable=false)
     */
    private $articleModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Assert\DateTime()
     */
    private $createdAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="isValidate", type="boolean", nullable=true)
     */
    private $isValidate;


    public function __construct()
    {
        $this->createdAt = new \DateTime;
        $this->isValidate = null;
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
     * Set content
     *
     * @param string $content
     *
     * @return Commit
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
     * Set score
     *
     * @param integer $score
     *
     * @return Commit
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set typeOfModification
     *
     * @param \WKT\PlatformBundle\Entity\TypeOfModification $typeOfModification
     *
     * @return Commit
     */
    public function setTypeOfModification(\WKT\PlatformBundle\Entity\TypeOfModification $typeOfModification)
    {
        $this->typeOfModification = $typeOfModification;

        return $this;
    }

    /**
     * Get typeOfModification
     *
     * @return \WKT\PlatformBundle\Entity\TypeOfModification
     */
    public function getTypeOfModification()
    {
        return $this->typeOfModification;
    }

    /**
     * Set user
     *
     * @param \WKT\UserBundle\Entity\User $user
     *
     * @return Commit
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
     * Set articleModified
     *
     * @param \WKT\PlatformBundle\Entity\ArticleModified $articleModified
     *
     * @return Commit
     */
    public function setArticleModified(\WKT\PlatformBundle\Entity\ArticleModified $articleModified)
    {
        $this->articleModified = $articleModified;

        return $this;
    }

    /**
     * Get articleModified
     *
     * @return \WKT\PlatformBundle\Entity\ArticleModified
     */
    public function getArticleModified()
    {
        return $this->articleModified;
    }


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Commit
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
     * Set isValidate
     *
     * @param boolean $isValidate
     *
     * @return Commit
     */
    public function setIsValidate($isValidate)
    {
        $this->isValidate = $isValidate;

        return $this;
    }

    /**
     * Get isValidate
     *
     * @return boolean
     */
    public function getIsValidate()
    {
        return $this->isValidate;
    }
}
