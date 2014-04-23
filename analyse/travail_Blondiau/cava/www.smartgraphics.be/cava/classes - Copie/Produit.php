<?php
require_once 'TypeProduit.php';

class Produit {

  private $typeProduit = null; // objet TypeProduit
  private $idProduit = 0; // integer
  private $nomProduit = null; // string
  private $refProduit = null; // string
  private $prixHTVA = 0; // float
  private $tauxTVA = 0; // float
  private $description = null; // string
  private $millesime = 0; // integer
  private $contenant = null; // string Volume
  
    private static $cpt = 0; // integer  
    public static function compterObj(){
	return Produit::$cpt;
  } 
  
  public function __construct(){  
  }

  public function hydrate($array){
  foreach ( $array as $key=>$value ){
  $this->$key = $value;
  }
  Produit::$cpt++;
  }
  
  public function __toString(){
	return $this->idProduit . " " . $this->nomProduit . " " . $this->refProduit . " " . 
	$this->prixHTVA . " " . $this->tauxTVA . " " . $this->description . " " . $this->millesime . " " .
	$this->contenant . " ; " . $this->typeProduit;
	}
	
	// getter et setter
  public function setIdProduit($idProduit){
	$this->idProduit = $idProduit;
  }
  public function getIdProduit() {
	return $this->idProduit;
  }
  public function setNomProduit($nomProduit){
	$this->nomProduit = $nomProduit;
  }
  public function getNomProduit() {
	return $this->nomProduit;
  }
  public function setRefProduit($refProduit){
	$this->refProduit = $refProduit;
  }
  public function getRefProduit() {
	return $this->refProduit;
  }
  public function setPrixHTVA($prixHTVA){
	$this->prixHTVA = $prixHTVA;
  }
  public function getPrixHTVA() {
	return $this->prixHTVA;
  }
  public function setTauxTVA($tauxTVA){
	$this->tauxTVA = $tauxTVA;
  }
  public function getTauxTVA() {
	return $this->tauxTVA;
  }
  public function setDescription($description){
	$this->description = $description;
  }
  public function getDescription() {
	return $this->description;
  }
  public function setMillesime($millesime){
	$this->millesime = $millesime;
  }
  public function getMillesime() {
	return $this->millesime;
  }
  public function setContenant($contenant){
	$this->contenant = $contenant;
  }
  public function getContenant() {
	return $this->contenant;
  }
 
  
}
?>
