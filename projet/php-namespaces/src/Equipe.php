<?php
namespace App;
class Equipe
{
    private string $nom;
    private int $nbLikes;
    private string $entraineur;
    private string $anneeCreation;

    /**
     * @param string $nom
     * @param string $entraineur
     * @param string $anneeCreation
     */
    public function __construct(string $nom, string $entraineur, string $anneeCreation)
    {
        $this->nom = $nom;
        $this->entraineur = $entraineur;
        $this->anneeCreation = $anneeCreation;
    }

    public function incrementerNbLikes(): void
    {
        $this->nbLikes = +1;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getNbLikes(): int
    {
        return $this->nbLikes;
    }

    /**
     * @param int $nbLikes
     */
    public function setNbLikes(int $nbLikes): void
    {
        $this->nbLikes = $nbLikes;
    }

    /**
     * @return string
     */
    public function getEntraineur(): string
    {
        return $this->entraineur;
    }

    /**
     * @param string $entraineur
     */
    public function setEntraineur(string $entraineur): void
    {
        $this->entraineur = $entraineur;
    }

    /**
     * @return string
     */
    public function getAnneeCreation(): string
    {
        return $this->anneeCreation;
    }

    /**
     * @param string $anneeCreation
     */
    public function setAnneeCreation(string $anneeCreation): void
    {
        $this->anneeCreation = $anneeCreation;
    }
}