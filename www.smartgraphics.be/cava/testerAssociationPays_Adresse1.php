<?php
require_once 'bootstrap.php';

$repository = $entityManager->getRepository('cava\Pays');

$pays = $repository->find(1);
echo $pays->getNomPays() . "<br>";

$adresses = $pays->getAdresses();
// ArrayCollection
$tab = $adresses->toArray();
//print_r ($tab);
echo $tab[0];
?>