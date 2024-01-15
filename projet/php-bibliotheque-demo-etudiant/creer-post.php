<?php
use Doctrine\ORM\EntityManager;
/**@var EntityManager $entityManager*/
require_once "bootstrap.php";

use Doctrine\ORM\Exception\ORMException;
use App\Entites\{Post,Commentaire};


$post = new Post();
$post->setTitre("Post 1");
$post->setDescription("Post 1");


try {
    $entityManager->persist($post);
    $entityManager->flush();
} catch (ORMException $e) {
    echo "ALED {$e->getMessage()}";
}
