<?php

namespace WKT\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user_wkt")
 * @ORM\Entity(repositoryClass="WKT\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="firstname", type="string", length=255, unique=false, nullable=false)
     *
     * @Assert\NotBlank(message="Merci d'entrer votre prénom.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     minMessage="Ce prénom est trop court.",
     *     maxMessage="Ce prénom est trop long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $firstname;

    /**
     * @ORM\Column(name="lastname", type="string", length=255, unique=false, nullable=false)
     *
     * @Assert\NotBlank(message="Merci d'entrer votre nom.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     minMessage="Ce nom est trop court.",
     *     maxMessage="Ce nom est trop long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $lastname;

    /**
     * @ORM\Column(name="additional_name", type="string", length=255, unique=false, nullable=true)
     *
     * @Assert\Length(
     *     min=2,
     *     max=50,
     *     minMessage="Le texte est trop court.",
     *     maxMessage="Le texte est trop long.",
     *     groups={"Profile"}
     * )
     */
    protected $additionalName;

    /**
     * @ORM\Column(name="biography", type="text", unique=false, nullable=true)
     *
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     minMessage="Le texte est trop court.",
     *     maxMessage="Le texte est trop long.",
     *     groups={"Profile"}
     * )
     */
    protected $biography;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_point", type="integer", options={"default":0}, nullable=true)
     */
    protected $nbPoint;

    /**
     * @ORM\ManyToMany(targetEntity="WKT\UserBundle\Entity\Social", cascade={"persist"})
     */
    protected $socials;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255, nullable=true, unique=false)
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     minMessage="Le texte est trop court.",
     *     maxMessage="Le texte est trop long.",
     *     groups={"Profile"}
     * )
     */
    protected $company;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set additionalName
     *
     * @param string $additionalName
     *
     * @return User
     */
    public function setAdditionalName($additionalName)
    {
        $this->additionalName = $additionalName;

        return $this;
    }

    /**
     * Get additionalName
     *
     * @return string
     */
    public function getAdditionalName()
    {
        return $this->additionalName;
    }

    /**
     * Set biography
     *
     * @param string $biography
     *
     * @return User
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set nbPoint
     *
     * @param integer $nbPoint
     *
     * @return User
     */
    public function setNbPoint($nbPoint)
    {
        $this->nbPoint = $nbPoint;

        return $this;
    }

    /**
     * Get nbPoint
     *
     * @return integer
     */
    public function getNbPoint()
    {
        return $this->nbPoint;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return User
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Add social
     *
     * @param \WKT\UserBundle\Entity\Social $social
     *
     * @return User
     */
    public function addSocial(\WKT\UserBundle\Entity\Social $social)
    {
        $this->socials[] = $social;

        return $this;
    }

    /**
     * Remove social
     *
     * @param \WKT\UserBundle\Entity\Social $social
     */
    public function removeSocial(\WKT\UserBundle\Entity\Social $social)
    {
        $this->socials->removeElement($social);
    }

    /**
     * Get socials
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSocials()
    {
        return $this->socials;
    }
}
