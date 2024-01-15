<?php

namespace App\Entites;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Commentaire
{

    #[ORM\Column(type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $contenu;

    // Mapper l'association avec Post
    // Commentaire est le coté propriétaire et post est le coté inverse
    #[ORM\ManyToOne(targetEntity: Post::class,inversedBy: "commentaires")]
    private Post $post;

    public function getId(): int
    {
        return $this->id;
    }


    public function getContenu(): string
    {
        return $this->contenu;
    }


    public function getPost(): Post
    {
        return $this->post;
    }

    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    public function setPost(Post $post): void
    {
        if ($this->post !== $post) {
            $post->addCommmentaire($this);
            $this->post = $post;
        }
    }


}