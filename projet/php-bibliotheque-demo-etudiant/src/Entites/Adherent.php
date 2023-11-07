<?php

namespace App\Entites;

use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\Table(name: "adherent")]
class Adherent
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(type: "string", length: 9)]
    private string $numero;
    #[ORM\Column(type: "string", length: 100)]
    private string $prenom;
    #[ORM\Column(type: "string", length: 100)]
    private string $nom;
    #[ORM\Column(type: "string", length: 100)]
    private string $email;
    #[ORM\Column(type: "datetime")]
    private \DateTime $dateAdhesion;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getDateAdhesion(): \DateTime
    {
        return $this->dateAdhesion;
    }

    public function setDateAdhesion(\DateTime $dateAdhesion): void
    {
        $this->dateAdhesion = $dateAdhesion;
    }
}