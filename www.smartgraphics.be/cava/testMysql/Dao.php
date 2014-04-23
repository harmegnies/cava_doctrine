<?php
require_once("connexionDB.php");

// classe abstraite DAO pour définir les différentes méthodes à implémenter dans les dao objets
abstract class Dao {
protected $connexion = null;
public function __construct(ConnexionDB $connexion){
$this->connexion = $connexion;
}

// méthodes 
// ne doit contenir que les méthodes relatives à la gestion de la persistance de l'objet entité
public abstract function insert($objet); // retour booléen
public abstract function update($objet); // retour booléen
public abstract function delete($objet); // retour booléen
public abstract function findId($id); // retour objet
public abstract function findAll(); // retour tableau objets

}
?>