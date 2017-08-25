<?php
// src/WKT/UserBundle/Entity/Link.php

namespace WKT\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="link")
 * @ORM\Entity(repositoryClass="WKT\UserBundle\Repository\LinkRepository")
 */
class Link
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(name="title", type="string", length=255)
   */
  private $title;

  /**
   * @ORM\Column(name="url", type="string", length=255)
   */
  private $url;

  /**
   * @ORM\ManyToOne(targetEntity="WKT\UserBundle\Entity\User", inversedBy="links")
   * @ORM\JoinColumn(nullable=false)
   */
  private $user;

  /**
   * @ORM\ManyToOne(targetEntity="WKT\UserBundle\Entity\Social")
   * @ORM\JoinColumn(nullable=false)
   */
  private $social;

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
     * @return Link
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
     * Set url
     *
     * @param string $url
     *
     * @return Link
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set user
     *
     * @param \WKT\UserBundle\Entity\User $user
     *
     * @return Link
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
     * Set social
     *
     * @param \WKT\UserBundle\Entity\Social $social
     *
     * @return Link
     */
    public function setSocial(\WKT\UserBundle\Entity\Social $social)
    {
        $this->social = $social;

        return $this;
    }

    /**
     * Get social
     *
     * @return \WKT\UserBundle\Entity\Social
     */
    public function getSocial()
    {
        return $this->social;
    }
}
