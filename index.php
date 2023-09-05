<?php
require "vendor\autoload.php";
$ligue1 = new App\Championnat("Ligue 1 Uber Eats");
$ekip1 = new App\Equipe("PSG","Louis JSP", "2015");
$ekip2 = new App\Equipe("OM","Marcelino", "2015");
echo $ligue1 -> getNom();
$ligue1->ajouterEquipe($ekip1);
$ligue1->ajouterEquipe($ekip2);
var_dump($ligue1->getEquipes());