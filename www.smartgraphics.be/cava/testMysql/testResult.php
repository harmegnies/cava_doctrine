<?php
// importer les fichiers
// fichier de connexion, fichier classe Pays
require_once("params.php");
// ouvrir une connexion au serveur
$idConnexion = @mysql_connect(SERVEUR,ADMIN,PASSWORD) or die("probl�me serveur");

// d�finir la database
@mysql_select_db(DATABASE,$idConnexion) or die("database inconnue");

// cr�er la syntaxe sql
$sql = "SELECT * FROM pays;";
//ex�cuter la requ�te
$result = @mysql_query($sql,$idConnexion) or die("probl�me avec la requ�te");

$nb = mysql_num_rows($result);
echo "nombre de pays : " . $nb . "</br>";
// tableau num�rique
while ( $row = mysql_fetch_row($result) ){
echo $row[0] . " " . $row[1] . "<br/>";
}
echo "<hr>";
mysql_data_seek($result,0);
// tableau alphanum�rique donc associatif
while ( $row = mysql_fetch_assoc($result) ){
echo $row['idPays'] . " " . $row['nomPays'] . "<br/>";
}
echo "<hr>";
mysql_data_seek($result,0);
// les 2 tableaux
while ( $row = mysql_fetch_array($result) ){
echo $row[0] . " " . $row['nomPays'] . "<br/>";
}
echo "<hr>";
mysql_data_seek($result,0);
// comme objet
while ( $obj = mysql_fetch_object($result) ){
echo $obj->idPays . " " . $obj->nomPays . "<br/>";
}
echo "<hr>";
for ( $i = 0; $i < $nb; $i++) {
mysql_data_seek($result,$i);
$row = mysql_fetch_row($result);
echo $row[0] . " " . $row[1] . "<br/>";
}

mysql_free_result($result);

// fermer la connexion
@mysql_close($idConnexion);


?>