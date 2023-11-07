<?php

namespace Tests\Integration\UserStories;

use App\Entites\Adherent;
use App\Services\GeneratorNumeroAdherent;
use App\UserStories\CreerAdherent\{CreerAdherent, CreerAdherentRequete};
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\{EntityManager, EntityManagerInterface, ORMSetup, Tools\SchemaTool};
use PHPUnit\Framework\{Attributes\Test, TestCase};
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreerAdherentTest extends TestCase
{
    protected EntityManagerInterface $entityManager;
    protected ValidatorInterface $validator;
    protected GeneratorNumeroAdherent $generator;

    #[test]
    public function creerAdherent_ValeursCorrectes_True()
    {
        // Arrange
        $requete = new CreerAdherentRequete(
            "john",
            "doe",
            "johndoe@gmail.com");
        $creerAdherent = new CreerAdherent(
            $this->entityManager,
            $this->generator,
            $this->validator
        );
        // Act
        $resultat = $creerAdherent->execute($requete);
        // Assert
        $repository = $this->entityManager->getRepository(Adherent::class);
        $criteria = ["email" => "johndoe@gmail.com"];
        $adherent = $repository->findOneBy($criteria);
        $this->assertNotNull($adherent);
        $this->assertEquals("john",$adherent->getPrenom());
    }

    protected function setUp(): void
    {
        echo "setup ---------------------------------------------------------";
        // Configuration de Doctrine pour les tests
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . '/../../../src/'],
            true
        );

        // Configuration de la connexion à la base de données
        // Utilisation d'une base de données SQLite en mémoire
        $connection = DriverManager::getConnection([
            'driver' => 'pdo_sqlite',
            'path' => ':memory:'
        ], $config);

        // Création des dépendences
        $this->entityManager = new EntityManager($connection, $config);
        $this->generator = new GeneratorNumeroAdherent();
        $this->validator = Validation::createValidator();
        // Création du schema de la base de données
        $schemaTool = new SchemaTool($this->entityManager);
        $metadata = $this->entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool->createSchema($metadata);
    }
}