<?php

namespace App\Entites;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use function PHPUnit\Framework\isNull;

#[ORM\Entity]
class Post
{

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(length: 100)]
    private string $titre;

    #[ORM\Column(length: 255)]
    private string $description;

    // Mapper l'association avec Commentaire
    // Post est dans le coté inverse de l'association
    #[ORM\OneToMany(mappedBy: "post",targetEntity: Commentaire::class)]
    private Collection $commentaires;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setDescrition(string $descrition): void
    {
        $this->descrition = $descrition;
    }

    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommmentaire(Commentaire $commentaire):void
    {
        $commentaire->setPost($this);
        $this->commentaires->add($commentaire);
    }
}