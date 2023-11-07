<?php

namespace App\UserStories\CreerAdherent;

use App\Entites\Adherent;
use App\Services\GeneratorNumeroAdherent;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreerAdherent
{
    private EntityManagerInterface $entityManager;
    private GeneratorNumeroAdherent $generateurNumeroAdherent;
    private ValidatorInterface $validator;

    /**
     * @param EntityManagerInterface $entityManager
     * @param GeneratorNumeroAdherent $generateurNumeroAdherent
     * @param ValidatorInterface $validator
     */
    public function __construct(EntityManagerInterface $entityManager, GeneratorNumeroAdherent $generateurNumeroAdherent, ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->generateurNumeroAdherent = $generateurNumeroAdherent;
        $this->validator = $validator;
    }


    public function execute(CreerAdherentRequete $requete) :  bool {
        // Valider les données en entrées (de la requête)

        // Vérifier que l'email n'existe pas déjà

        // Générer un numéro d'adhérent au format AD-999999
        $numeroAdherent = $this->generateurNumeroAdherent->execute();
        // Vérifier que le numéro n'existe pas déjà

        // Créer l'adhérent
        $adherent = new Adherent();
        $adherent->setNom($requete->getNom());
        $adherent->setPrenom($requete->getPrenom());
        $adherent->setEmail($requete->getEmail());
        $adherent->setDateAdhesion(new DateTime());
        $adherent->setNumero($numeroAdherent);
        // Enregistrer l'adhérent en base de données
        $this->entityManager->persist($adherent);
        $this->entityManager->flush($adherent);
        return true;
    }
}