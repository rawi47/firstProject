<?php

namespace App\Entity;

class Post
{
    protected $message;
    protected $objet;


    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }


    public function getObjet(): string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): void
    {
        $this->objet = $objet;
    }
}