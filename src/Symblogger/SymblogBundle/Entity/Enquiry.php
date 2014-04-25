<?php
// src/Symblogger/SymblogBundle/Entity/Enquiry.php

namespace Symblogger\SymblogBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class Enquiry
{
    protected $name;

    protected $email;

    protected $subject;

    protected $body;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new Assert\Range(array(
            'min' => 1
        )));

        $metadata->addPropertyConstraint('email', new Assert\Range(array(
            'invalidMessage' => 'Invalid Email, Please fill correct Email'
        )));

        $metadata->addPropertyConstraint('subject', new Assert\Range(array(
            'min' => 1
        )));
        $metadata->addPropertyConstraint('subject', new Assert\Range(array(
            'max' => 50
        )));

        $metadata->addPropertyConstraint('body', new Assert\Range(array(
            'max' => 50
        )));
    }

}