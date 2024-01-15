<?php
use Doctrine\ORM\EntityManager;
/**@var EntityManager $entityManager*/
require_once "bootstrap.php";

use Doctrine\ORM\Exception\ORMException;
use App\Entites\{Commentaire,Post};


try {
    $postRepository = $entityManager->getRepository(Post::class);
} catch (\Doctrine\ORM\Exception\NotSupported $e) {
    echo "ALED {$e->getMessage()}";
}
$post = $postRepository->find(1);

$commentaire = new Commentaire();
$commentaire->setPost($post);
$commentaire->setContenu("Commentaire 1");

$post->addCommmentaire($commentaire);

try {
    $entityManager->persist($commentaire);
    $entityManager->flush();
} catch (ORMException $e) {
    echo "ALED {$e->getMessage()}";
}
