<?php
require_once 'bootstrap.php';

$pays = new cava\Pays();
$pays->setNomPays("belgique");
$entityManager->persist($pays);

$adresse = new cava\Adresse();
$adresse->setRue("rue des champs");
$adresse->setNr("120");
$adresse->setCodePostal("7000");
$adresse->setLocalite("Mons");
$adresse->setPays($pays);
$entityManager->persist($adresse);

$entityManager->flush();
?>