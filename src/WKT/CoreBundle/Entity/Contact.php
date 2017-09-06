<?php

namespace WKT\CoreBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Contact
{
    /**
     * @Assert\NotBlank()
     */
    protected $name;
    /**
     * @Assert\Email()
     */
    protected $email;
    /**
     * @Assert\Length(min=5, minMessage="Le titre du mail doit faire au moins {{ limit }} caractères.")
     */
    protected $subject;
    /* 
     * @Assert\Length(min=15, minMessage="Le corps du mail doit faire au moins {{ limit }} caractères.")
     */
    protected $body;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
