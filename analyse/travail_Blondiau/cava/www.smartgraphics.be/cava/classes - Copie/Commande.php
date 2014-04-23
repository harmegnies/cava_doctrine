<?php
require_once 'Panier.php';
require_once 'Adresse.php';

class Commande {
  private $client = null; //objet Client
  private $monPanier = null;  //objet Panier
  private $adresseLivraison = null; // objet Adresse
  
  
  private $idCommande = 0;
  private $reference = null;
  private $dateCommande = null;
  private $modePaiement = null;
  
   private static $cpt = 0; // integer  
    public static function compterObj(){
	return Commande::$cpt;
  }   
  public function __construct(){
  }
  
  public function __toString(){
  return $this->idCommande . " " . $this->reference . " " . $this->dateCommande;
  }

   // getter et setter
  public function setIdCommande($idCommande){
	$this->idCommande = $idCommande;
  }
  public function getIdCommande(){
	return $this->idCommande;
  }
  public function setReference($reference){
	$this->reference = $reference;
  }
  public function getReference(){
	return $this->reference;
  }
  public function setDateCommande($dateCommande){
	$this->dateCommande = $dateCommande;
  }
  public function getDateCommande(){
	return $this->dateCommande;
  }
  public function setModePaiement($modePaiement){
	$this->modePaiement = $modePaiement;
  }
  public function getModePaiement(){
	return $this->ModePaiement;
  }
  
 
 public function setClient(Client $client){
	$this->client = $client;
  }
  public function getClient(){
	return $this->client;
  }
  public function setMonPanier(Panier $panier){
	$this->monPanier = $panier;
  }
  public function getMonPanier(){
	return $this->monPanier;
  }
   public function setAdresseLivraison(Adresse $adresse){
	$this->adresseLivraison = $adresse;
  }
  public function getAdresseLivraison(){
	return $this->adresseLivraison;
  }
 
 
}
?>
