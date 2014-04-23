<?php
require_once("connexionDB.php");

// classe abstraite DAO pour d�finir les diff�rentes m�thodes � impl�menter dans les dao objets
abstract class Dao {
protected $connexion = null;
public function __construct(ConnexionDB $connexion){
$this->connexion = $connexion;
}

// m�thodes 
// ne doit contenir que les m�thodes relatives � la gestion de la persistance de l'objet entit�
public abstract function insert($objet); // retour bool�en
public abstract function update($objet); // retour bool�en
public abstract function delete($objet); // retour bool�en
public abstract function findId($id); // retour objet
public abstract function findAll(); // retour tableau objets

}
?>