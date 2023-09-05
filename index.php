<?php
require "./src/Championnat.php";
require "./src/Equipe.php";
$ligue1 = new Championnat("Ligue 1 Uber Eats");
$ekip1 = new Equipe("PSG","Louis JSP", "2015");
$ekip2 = new Equipe("OM","Marcelino", "2015");
echo $ligue1 -> getNom();
$ligue1->ajouterEquipe($ekip1);
$ligue1->ajouterEquipe($ekip2);
var_dump($ligue1->getEquipes());
echo $ligue1;