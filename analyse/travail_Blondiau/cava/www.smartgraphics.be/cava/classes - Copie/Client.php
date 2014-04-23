<?php
require_once 'Adresse.php';
class Client {
  private $adresse = null; //objet Adresse
  private $idClient = 0; //integer
  private $nomClient = null; //string
  private $prenomClient = null; //string
  private $emailClient = null; //string
  private $sexeClient = null; //string  
  private $dateNaissanceClient = null; // DateTime
  private $societeClient = null; //string
  private $nTVA = null; //string
  private $dateInscription = null; //DateTime
  private static $cpt = 0; // integer
  
    public static function compterObj(){
	return Client::$cpt;
  }  

  public function __construct(){
  }  
  public function hydrate($array){
  foreach ( $array as $key=>$value ){
  $this->$key = $value;
  }
  Client::$cpt++;  
  }
  
 public function __toString(){
 return $this->idClient . ", " . $this->nomClient . " " . $this->prenomClient . " " . $this->emailClient;
 }
 
 // getter et setter
  public function setIdClient($idClient){
	$this->idClient = $idClient;
  }
  public function setNomClient($nomClient){
	$this->nomClient = $nomClient;
  }
  public function setPrenomClient($prenomClient){
	$this->prenomClient = $prenomClient;
  }
  public function setEmailClient($emailClient){
	$this->emailClient = $emailClient;
  }
  public function setSexeClient($sexeClient){
	$this->sexeClient = $sexeClient;
  }
  public function setDateNaissanceClient($dateNaissanceClient){
	$this->dateNaissanceClient = $dateNaissanceClient;
  }
  public function setSocieteClient($societeClient){
	$this->societeClient = $societeClient;
  }
  public function setNTVA($nTVA){
	$this->nTVA = $nTVA;
  }
  public function setDateInscription($dateInscription){
	$this->dateInscription = $dateInscription;
  }
  public function setAdresse(Adresse $adresse){
	$this->adresse = $adresse;
  }
  
  public function getIdClient(){
	return $this->idClient;
  }
  public function getNomClient(){
	return $this->nomClient;
  }
  public function getPrenomClient(){
	return $this->prenomClient;
  }
  public function getEmailClient(){
	return $this->emailClient;
  }
  public function getSexeClient(){
	return $this->sexeClient;
  }
  public function getDateNaissanceClient(){
	return $this->dateNaissanceClient;
  }
  public function getSocieteClient(){
	return $this->societeClient;
  }
  public function getNTVA(){
	return $this->nTVA;
  }
  public function getDateInscription(){
	return $this->dateInscription;
  }
  public function getAdresse(){
	return $this->adresse;
  } 
  

}
?>
