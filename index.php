<meta charset="UTF-8">

<h1>Exercice 1</h1>

<p>Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires et leurs comptes bancaires respectifs.</p>

<h2>Résultat</h2>

<?php

spl_autoload_register(function ($class_name) {
    require_once $class_name.'.php';
});

$LS=new Titulaire("SCHNEIDER", "Laurène", "1995-06-21", "Strasbourg");
$compte001=new Compte($LS, "2000", "Compte Courant");
$compte002=new Compte($LS, "500", "Livret A");
$AK=new Titulaire("KUNTZ", "Axel", "1998-05-18","Strasbourg");
$compte003=new Compte ($AK, "1800", "Compte Courant");
$compte004=new Compte ($AK, "300", "Livret A");

$compte001->virement($compte003, "80", "Coiffeur");
$compte003->virement($compte004, "120", "Epargne");

$compte002->virement($compte001, "150", "Achat PC");
$compte001->debiter(800, "Achat PC");

echo "<br><br>";
$LS->afficherInfos();
$AK->afficherInfos();

?>