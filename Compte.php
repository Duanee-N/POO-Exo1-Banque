<?php

class Compte{
    private Titulaire $titulaire;
    private $soldeInitial;
    private $soldeActuel;
    private $devise="€";
    private $libelle;
    
    public function __construct($titulaire, $soldeInitial, $libelle)
    {
        $this->titulaire=$titulaire;
        $this->soldeInitial=$soldeInitial;
        $this->soldeActuel=$soldeInitial;
        $this->libelle=$libelle;
        $this->titulaire->ajouterCompte($this);
    }

    public function crediter($sommeCredit, string $infosCredit)
    {
        $this->soldeActuel+=$sommeCredit;
        echo "<b>Compte $this->libelle de $this->titulaire :</b><br>
        Solde initial : $this->soldeInitial $this->devise <br>
        Crédit de : $sommeCredit $this->devise <br>
        Infos : $infosCredit <br>
        Le solde actuel est de $this->soldeActuel $this->devise.<br><br>";
        $this->soldeInitial=$this->soldeActuel;
    }

    public function debiter($sommeDebit, string $infosDebit)
    {
        $this->soldeActuel-=$sommeDebit;
        echo "<b>Compte $this->libelle de $this->titulaire :</b><br>
        Solde initial : $this->soldeInitial $this->devise <br>
        Débit de : $sommeDebit $this->devise <br>
        Infos : $infosDebit <br>
        Le solde actuel est de $this->soldeActuel $this->devise.<br><br>";
        $this->soldeInitial=$this->soldeActuel;
    }

    public function virement($compte, $sommeVirement, $infoVirement)
    {
        $this->debiter($sommeVirement, $infoVirement);
        $compte->crediter($sommeVirement, $infoVirement);
    }

    public function __toString()
    {
        return "<b>$this->libelle : </b><br>
        Solde disponible : $this->soldeActuel $this->devise <br>";
    }
}

?>