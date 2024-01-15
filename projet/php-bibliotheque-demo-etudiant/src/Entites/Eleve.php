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
    ManyToMany
};

#[Entity]
class Eleve
{
    #[Id]
    #[GeneratedValue(strategy: 'AUTO')]
    #[Column(type: 'integer')]
    private int $id;
    #[Column(type: 'integer')]
    private int $prenom;
    #[Column(type: 'integer')]
    private int $nom;

    #[ManyToMany(targetEntity: Cours::class, mappedBy: 'idCours')]
    private Collection $cours;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
    }
}