<?php
// importer les fichiers
// fichier de connexion, fichier classe Pays
require_once("params.php");


// ouvrir une connexion au serveur
$idConnexion = @mysql_connect(SERVEUR,ADMIN,PASSWORD) or die("problème serveur");

// définir la database
@mysql_select_db(DATABASE,$idConnexion) or die("database inconnue");

// faire une boucle sur le fichier texte
$fichier = "liste_pays.txt";
$idFichier = fopen($fichier,"r");

while ( !feof($idFichier) ){
$ligne = fgets($idFichier,1024); //AF;Afghanistan	
// splitter la chaîne par rapport au ;
$tab = explode(";",$ligne);

// créer la syntaxe sql
$sql = sprintf("INSERT INTO pays VALUES('NULL','%s');",addslashes($tab[1]));

//exécuter la requête
@mysql_query($sql,$idConnexion) or die("problème avec la requête");

}

// fermer le fichier
fclose($idFichier);
// fermer la connexion
@mysql_close($idConnexion);


?>