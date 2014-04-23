<?php
require_once("params.php");
require_once("../classes/TypeProduit.php");
require_once("TypeProduitDao.php");
/*
tester les différentes méthodes ...
*/

$connexion = new ConnexionDB(SERVEUR,ADMIN,PASSWORD,DATABASE);
$tpDao = new TypeProduitDao($connexion);


$typeProduit = new TypeProduit();
$typeProduit->setTypeProduit("vin rouge");
// ******************************
// tester insert
/*
if ( $tpDao->insert($typeProduit) ){
echo 'insertion réussie <br/>';
echo 'id du typeProduit : ' .$typeProduit->getIdTypeProduit() . '<br/>'; // dans mon cas on récupère 2 pour l'id
}
else {
echo 'erreur insert <br/>';
}
*/

$typeProduit->setIdTypeProduit(2);
$typeProduit->setTypeProduit("vin rosé");
// ******************************
// tester update
if ( $tpDao->update($typeProduit) ){
echo 'update réussi <br/>';
echo 'valeur du typeProduit : ' .$typeProduit->getTypeProduit() . '<br/>'; // dans mon cas on récupère vin rosé
}
else {
echo 'erreur update <br/>';
}

// ******************************
// tester findId
$obj = $tpDao->findId(2);
if ( $obj == null ) 
echo "pas d'enregistrement pour cet id = 2 <br/>";
else
echo "Objet récupéré : " . $obj . "<br/>"; // la classe TypeProduit contient une méthode __toString


// ******************************
// tester find
$tableau = $tpDao->findAll();
if ( count($tableau) == 0 )
echo "pas d'enregistrements dans la table typeproduit de la database <br/>";
else{
echo "les enregistrements sont : <br/>";
for ($i = 0; $i < count($tableau) ; $i++) {
	echo $tableau[$i] . "<br/>";
}
}


// ******************************
// tester delete
if ( $tpDao->delete($typeProduit) ){
echo 'suppression réussie <br/>';
}
else {
echo 'erreur suppression <br/>';
}

?>