<?php

namespace WKT\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
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
     * @ORM\Column(name="nb_point", type="integer", nullable=false)
     */
    protected $nbPoint;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_strike", type="integer", nullable=false)
     */
    protected $nbStrike;


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

    /**
     * @var string
     *
     * @ORM\Column(name="locality", type="string", length=255, nullable=true, unique=false)
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     minMessage="Le texte est trop court.",
     *     maxMessage="Le texte est trop long.",
     *     groups={"Profile"}
     * )
     */
    protected $locality;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true, unique=false)
     * @Assert\Length(
     *     min=2,
     *     max=255,
     *     minMessage="Le texte est trop court.",
     *     maxMessage="Le texte est trop long.",
     *     groups={"Profile"}
     * )
     */
    protected $country;

    /**
     * @ORM\OneToMany(targetEntity="WKT\UserBundle\Entity\Link", mappedBy="user")
     */
    protected $links;

    /**
     * @ORM\OneToMany(targetEntity="WKT\UserBundle\Entity\UserArticleRead", mappedBy="user")
     */
    private $userArticlesRead;

    /**
     * @ORM\OneToMany(targetEntity="WKT\UserBundle\Entity\UserTraining", mappedBy="user")
     */
    private $userTrainings;

    /**
     * @Assert\Regex(
     *  pattern="/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{6,}/",
     *  message="Le mot de passe doit contenir au moins 6 caractères, une majuscule, une minuscule et un chiffre."
     * )
     */
    protected $plainPassword;

    /**
     * @ORM\OneToOne(targetEntity="WKT\UserBundle\Entity\Image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Valid()
     */
    private $image;

    public function __construct()
    {
        parent::__construct();
        $this->nbPoint = 0;
        $this->nbStrike = 0;
        $this->links = new ArrayCollection;  
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
     * Set nbStrike
     *
     * @param integer $nbStrike
     *
     * @return User
     */
    public function setNbStrike($nbStrike)
    {
        $this->nbStrike = $nbStrike;

        return $this;
    }

    /**
     * Get nbStrike
     *
     * @return integer
     */
    public function getNbStrike()
    {
        return $this->nbStrike;
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
     * Set locality
     *
     * @param string $locality
     *
     * @return User
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality
     *
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add link
     *
     * @param \WKT\UserBundle\Entity\Link $link
     *
     * @return User
     */
    public function addLink(\WKT\UserBundle\Entity\Link $link)
    {
        $this->links[] = $link;
        $link->setUser($this);

        return $this;
    }

    /**
     * Remove link
     *
     * @param \WKT\UserBundle\Entity\Link $link
     */
    public function removeLink(\WKT\UserBundle\Entity\Link $link)
    {
        $this->links->removeElement($link);
    }

    /**
     * Get links
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLinks()
    {
        return $this->links;
    }


    /**
     * Add userArticlesRead
     *
     * @param \WKT\UserBundle\Entity\UserArticleRead $userArticlesRead
     *
     * @return User
     */
    public function addUserArticlesRead(\WKT\UserBundle\Entity\UserArticleRead $userArticlesRead)
    {
        $this->userArticlesRead[] = $userArticlesRead;

        $userArticlesRead->setUser($this);

        return $this;
    }

    /**
     * Remove userArticlesRead
     *
     * @param \WKT\UserBundle\Entity\UserArticleRead $userArticlesRead
     */
    public function removeUserArticlesRead(\WKT\UserBundle\Entity\UserArticleRead $userArticlesRead)
    {
        $this->userArticlesRead->removeElement($userArticlesRead);
    }

    /**
     * Get userArticlesRead
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserArticlesRead()
    {
        return $this->userArticlesRead;
    }

    /**
     * Add userTraining
     *
     * @param \WKT\UserBundle\Entity\UserTraining $userTraining
     *
     * @return User
     */
    public function addUserTraining(\WKT\UserBundle\Entity\UserTraining $userTraining)
    {
        $this->userTrainings[] = $userTraining;

        $userTraining->setUser($this);

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

    /**
     * Set image
     *
     * @param \WKT\UserBundle\Entity\Image $image
     *
     * @return User
     */
    public function setImage(\WKT\UserBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \WKT\UserBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }
}
