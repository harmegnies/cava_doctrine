<?php
// importer les fichiers
// fichier de connexion, fichier classe Pays
require_once("params.php");
require_once("../classes/Pays.php"); // chemin en relatif

$pays = new Pays();
$pays->hydrate(array("nomPays"=>"Belgique"));
echo $pays . "<br/>";

// ouvrir une connexion au serveur
$idConnexion = @mysql_connect(SERVEUR,ADMIN,PASSWORD) or die("problème serveur");

// définir la database
@mysql_select_db(DATABASE,$idConnexion) or die("database inconnue");

// créer la syntaxe sql
$sql = sprintf("INSERT INTO pays VALUES('NULL','%s');",addslashes($pays->getNomPays()));
echo $sql . "<br/>";

//exécuter la requête
@mysql_query($sql,$idConnexion) or die("problème avec la requête");

// récupérer l'id
$id = @mysql_insert_id($idConnexion);
$pays->setIdPays($id);
echo $pays . "<br/>";
// fermer la connexion
@mysql_close($idConnexion);


?>