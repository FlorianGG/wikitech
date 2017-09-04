<?php

namespace WKT\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
// Ajoutez ce use pour le contexte
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity(repositoryClass="WKT\PlatformBundle\Repository\VideoRepository")
 */
class Video
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;


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
     * Set url
     *
     * @param string $url
     *
     * @return Video
     */
    public function setUrl($url)
    {
        if (strpos( $url,"v=") !== false)
        {
            $key =  substr($url, strpos($url, "v=") + 2, 11);
            $this->url = $key;
        }
        elseif(strpos( $url,"embed/") !== false)
        {
            $key = substr($url, strpos($url, "embed/") + 6, 11);
            $this->url = $key;
        }

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
     * Set author
     *
     * @param string $author
     *
     * @return Video
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @Assert\Callback
     */
    public function isUrlValid(ExecutionContextInterface $context)
    {   
        // On vérifie que l'url contient bien un des éléments suivants
        if (strpos( $this->getUrl(),"v=") !== false){
            // La règle est violée, on définit l'erreur
            $context
              ->buildViolation('L\'url enregistrée, n\'est pas une url Youtube valide 😱' ) // message
              ->atPath('url')  // attribut de l'objet qui est violé
              ->addViolation(); // ceci déclenche l'erreur
        }elseif (strpos( $this->getUrl(),"embed/") !== false) {
            // La règle est violée, on définit l'erreur
                        $context
                          ->buildViolation('L\'url enregistrée, n\'est pas une url Youtube valide 😱' ) // message
                          ->atPath('url')  // attribut de l'objet qui est violé
                          ->addViolation(); // ceci déclenche l'erreur
        }

        if (is_null($this->getUrl()) && !is_null($this->getAuthor())) {
           $context
             ->buildViolation('L\'ajout d\'une vidéo nécessite une url Youtube valide et un auteur') // message
             ->atPath('url')  // attribut de l'objet qui est violé
             ->addViolation(); // ceci déclenche l'erreur
        }

        if (!is_null($this->getUrl()) && is_null($this->getAuthor())) {
           $context
             ->buildViolation('L\'ajout d\'une vidéo nécessite une url youtube valide et un auteur') // message
             ->atPath('author')  // attribut de l'objet qui est violé
             ->addViolation(); // ceci déclenche l'erreur
        }
    }
}
