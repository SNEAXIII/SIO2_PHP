<?php
namespace App;
class Championnat
{
    private array $equipes;
    private string $nom;

    /**
     * @param string $nom
     */
    public function __construct(string $nom)
    {
        $this->equipes = [];
        $this->nom = $nom;
    }

    public function ajouterEquipe(Equipe $equipe) : void {
        $this->equipes[] = $equipe    ;
    }

    public function compterNombreEquipes():int {
        return count($this->equipes);
    }


    /**
     * @return array
     */
    public function getEquipes(): array
    {
        return $this->equipes;
    }

    /**
     * @param array $equipes
     */
    public function setEquipes(array $equipes): void
    {
        $this->equipes = $equipes;
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


}