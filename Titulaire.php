<?php

class Titulaire{
    private $nom;
    private $prenom;
    private $naissance;
    private $ville;
    private array $comptes;

    public function __construct($nom, $prenom, $naissance, $ville)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->naissance = new DateTime($naissance);
        $this->ville=$ville;
        $this->comptes=[];
    }

    public function Age(){
        $now = new DateTime();
        return $now->diff($this->naissance)->y;
    }

    public function ajouterCompte(Compte $compte) 
    { 
        $this->comptes[] = $compte; 
    }
    
    public function __toString()
    {
        return "$this->nom $this->prenom";
    }

    public function afficherInfos()
    {
        echo "<b>Informations du titulaire : </b> <br>
        Nom :  $this->nom <br>
        Prénom : $this->prenom <br>
        Date de naissance : ".$this->naissance->format('d-m-y')." (Âge : ".$this->Age()." ans)<br>
        Ville : $this->ville <br> <br>
        <b>Informations des comptes du titulaire ($this) : </b> <br> <ul>";
        foreach($this->comptes as $compte){
            echo "<li>$compte</li>";
        }
        echo "</ul><br>";
    }
}

?>