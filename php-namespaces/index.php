<?php
require "vendor\autoload.php";
use App\Equipe;
use App\Championnat;
use App\dossier1\Personne;
$ligue1 = new Championnat("Ligue 1 Uber Eats");
$ekip1 = new Equipe("PSG","Louis JSP", "2015");
$ekip2 = new Equipe("OM","Marcelino", "2015");
echo $ligue1 -> getNom();
$ligue1->ajouterEquipe($ekip1);
$ligue1->ajouterEquipe($ekip2);
dump($ligue1->getEquipes());

$personne = new Personne("HEHE BOI");
dump($personne);