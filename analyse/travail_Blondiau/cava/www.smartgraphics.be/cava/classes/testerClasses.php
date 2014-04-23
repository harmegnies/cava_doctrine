<?php
require_once("Pays.php");
require_once("Adresse.php");
$pays = new Pays("Belgique",25);

echo $pays;
echo "<br/>";
echo "nombre d'objets Pays : " . Pays::compterObj();
echo "<br/>";

// tableau
$array = array("rue"=>"rue des champs",
"nr"=>"100",
"codePostal"=>"7000",
"localite"=>"Mons",
"pays"=>$pays,
"idAdresse"=>50);
$adresse = new Adresse();
$adresse->hydrate($array);
echo $adresse . "<br/>";
echo "nombre d'objets Adresse : " . Adresse::compterObj();

?>