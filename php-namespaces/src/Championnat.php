<?php
namespace App;
use League\Csv\Reader;
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

    public function ajouterEquipe(Equipe $equipe): void
    {
        $this->equipes[] = $equipe;
    }

    public function compterNombreEquipes(): int
    {
        return count($this->equipes);
    }


    /**
     * @return array
     */
    public function getEquipes(): array
    {
        return $this->equipes;
    }

    public function loadEquipes(string $path): void
    {
        $csv = Reader::createFromPath($path)->setHeaderOffset(0);
        foreach ($csv->getRecords() as $record) {
            $this->equipes[] = new Equipe($record["nom"],$record["entraineur"],$record["annee"]);
        }

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
    public function show() : void
    {
        foreach ($this->equipes as $equipe)
        {
            echo $equipe->getNom()," | ",$equipe->getEntraineur()," | ",$equipe->getAnneeCreation(),"\n";
        }
    }

}