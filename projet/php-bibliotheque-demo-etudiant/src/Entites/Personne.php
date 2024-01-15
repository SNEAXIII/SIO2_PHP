<?php

namespace App\Entites;

class Personne
{
    private ?string $prenom=null;
    private $nom;

    public function affichePrenom()
    {
        echo "Prenom : " . $this->prenom;
    }
}


$personne = new Personne();
$personne->affichePrenom();