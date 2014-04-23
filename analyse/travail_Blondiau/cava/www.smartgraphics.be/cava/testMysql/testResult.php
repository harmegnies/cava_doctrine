<?php
// importer les fichiers
// fichier de connexion, fichier classe Pays
require_once("params.php");
// ouvrir une connexion au serveur
$idConnexion = @mysql_connect(SERVEUR,ADMIN,PASSWORD) or die("problème serveur");

// définir la database
@mysql_select_db(DATABASE,$idConnexion) or die("database inconnue");

// créer la syntaxe sql
$sql = "SELECT * FROM pays;";
//exécuter la requête
$result = @mysql_query($sql,$idConnexion) or die("problème avec la requête");
while ( $row = mysql_fetch_row($result) ){
echo $row[0] . " " . $row[1] . "<br/>";
}
mysql_free_result($result);

// fermer la connexion
@mysql_close($idConnexion);


?>