<?php
namespace cava;
use Doctrine\ORM\Mapping as ORM;
/**
* Client
* @ORM\Table(name="client")
* @ORM\Entity
*/
class Client {

/**
* @ORM\Id
* @ORM\GeneratedValue(strategy="IDENTITY")
* @ORM\Column(name="idClient",
* type="integer",
* nullable=false)
*/
  private $idClient = 0; //integer

/**
* @ORM\Column(name="nomClient",
* type="string",
* length=100,
* nullable=false)
*/  
  private $nomClient = null; //string
/**
* @ORM\Column(name="prenomClient",
* type="string",
* length=100,
* nullable=false)
*/ 
  private $prenomClient = null; //string
/**
* @ORM\Column(name="emailClient",
* type="string",
* length=100,
* nullable=false)
*/
  private $emailClient = null; //string
/**
* @ORM\Column(name="sexeClient",
* type="string",
* length=1,
* nullable=false)
*/
  private $sexeClient = null; //string
/**
* @ORM\Column(name="dateNaissanceClient",
* type="date",
* nullable=false)
*/  
  private $dateNaissanceClient = null; // DateTime
/**
* @ORM\Column(name="societeClient",
* type="string",
* length=100,
* nullable=false)
*/
  private $societeClient = null; //string
/**
* @ORM\Column(name="nTVA",
* type="string",
* length=15,
* nullable=false)
*/
  private $nTVA = null; //string
/**
* @ORM\Column(name="dateInscription",
* type="date",
* nullable=false)
*/
  private $dateInscription = null; //DateTime
  
  
 /**
* @var cava\Adresse
*
* @ORM\ManyToOne(targetEntity="cava\Adresse", 
* cascade={"persist"}, 
* inversedBy="clients")
* @ORM\JoinColumns({
* @ORM\JoinColumn(name="idAdresse", 
* referencedColumnName="idAdresse",
* nullable=false)
* })
*/
  private $adresse = null; //objet Adresse
  
/**
*@ORM\OneToMany(targetEntity= "cava\Commande",
* mappedBy="client", 
* cascade={"persist"})
*/ 
private $commandes = null;

 
  public function hydrate($array){
  foreach ( $array as $key=>$value ){
  $this->$key = $value;
  }
  }
  
 public function __toString(){
 return $this->idClient . ", " . $this->nomClient . " " . $this->prenomClient . " " . $this->emailClient;
 }
 
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
  
//**************************************
  public function getCommandes()  
{  
	return $this->commandes;  
} 
 public function setCommandes(\Doctrine\Common\Collections\ArrayCollection $commandes)
{
	$this->commandes = $commandes;
	return $this;
}
  

}
?>
