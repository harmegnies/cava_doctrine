<?php
class ConnexionDB {
// attributs (les différents paramètres pour la connexion)
private $serveur = null;
private $database  = null;
private $admin  = null;
private $password  = null;
private $idHandle  = null; // identifiant de la connexion

// le constructeur
/*
à faire, remplacement de l'affichage directe de l'erreur
avec une gestion d'erreur Try catch (créer une classe pour gérer la récupération des erreurs)
*/
public function __construct($serveur,$admin,$password,$database){
$this->serveur = $serveur;
$this->admin = $admin;
$this->password = $password;
$this->database = $database;
// créer ma connexion
$this->idHandle = @mysql_connect($this->serveur,$this->admin,$this->password) or die("connexion impossible");
@mysql_select_db($this->database,$this->idHandle) or die("database inconnue");
}
// fermeture de la connexion à la destruction de l'objet
public function __destruct(){
if ( $this->idHandle != null )
@mysql_close($this->idHandle);
}

// getter pour récupérer l'identifiant de connexion
public function getIdHandle () {
return $this->idHandle;
}

// getter et setter
public function getServeur () {
return $this->serveur;
}
public function getDatabase () {
return $this->database;
}
public function setDatabase ($database) {
$this->database = $database;
}
public function getAdmin () {
return $this->admin;
}
public function getPassword () {
return $this->password;
}
/*
gérer les charsets et les transactions à faire
*/
}
?>