<?php

namespace App\Entites;


use Doctrine\Common\Collections\
{
    ArrayCollection,
    Collection
};
use Doctrine\ORM\Mapping\
{
    Column,
    Entity,
    GeneratedValue,
    Id,
    JoinTable,
    ManyToMany
};

#[Entity]
class Cours
{
    #[Id]
    #[GeneratedValue(strategy: 'AUTO')]
    #[Column(type: 'integer')]
    private int $id;
    #[Column(type: 'string')]
    private string $titre;
    #[ManyToMany(targetEntity: Eleve::class, inversedBy: 'idEleve')]
    #[JoinTable(name: 'inscrit')]
    private Collection $eleves;
    public function __construct()
    {
        $this->eleves = new ArrayCollection();
    }
}