<?php
namespace cava;
use Doctrine\ORM\Mapping as ORM;
/**
* Produit
* @ORM\Table(name="produit")
* @ORM\Entity
*/
class Produit {

/**
* @ORM\Id
* @ORM\GeneratedValue(strategy="IDENTITY")
* @ORM\Column(name="idProduit",
* type="integer",
* nullable=false)
*/
  private $idProduit = 0; // integer
/**
* @ORM\Column(name="nomProduit",
* type="string",
* length=100,
* nullable=false)
*/  
  private $nomProduit = null; // string
/**
* @ORM\Column(name="refProduit",
* type="string",
* length=100,
* nullable=false)
*/   
  private $refProduit = null; // string
 /**
 * @ORM\Column(name="prixHTVA", 
 * type="float", 
 * precision=10, 
 * scale=0, 
 * nullable=false)
 */
  private $prixHTVA = 0; // float
  /**
 * @ORM\Column(name="tauxTVA",
 * type="float", 
 * precision=10, 
 * scale=0, 
 * nullable=false)
 */ 
  private $tauxTVA = 0; // float
/**
* @ORM\Column(name="description",
* type="string",
* length=65535,
* nullable=false)
*/   
  private $description = null; // string
/**
* @ORM\Column(name="millesime",
* type="integer",
* nullable=false)
*/  
  private $millesime = 0; // integer
/**
* @ORM\Column(name="contenant",
* type="string",
* length=100,
* nullable=false)
*/    
  private $contenant = null; // string Volume
  
 
 /**
* @var cava\TypeProduit
*
* @ORM\ManyToOne(targetEntity="cava\TypeProduit", 
* cascade={"persist"}, 
* inversedBy="produits")
* @ORM\JoinColumns({
* @ORM\JoinColumn(name="idTypeProduit", 
* referencedColumnName="idTypeProduit",
* nullable=false)
* })
*/
  private $typeProduit = null; // objet TypeProduit
  
  public function hydrate($array){
  foreach ( $array as $key=>$value ){
  $this->$key = $value;
  }
  }
  
  
   //************************************ 
/**
*@ORM\OneToMany(
* targetEntity= "cava\DetailCommande",
* mappedBy="produit", 
* cascade={"persist"})
*/ 
 private $detailCommandes;  
   public function getDetailCommandes()  
{  
	return $this->detailCommandes;  
} 
 public function setDetailCommandes(\Doctrine\Common\Collections\ArrayCollection $detailCommandes)
{
	$this->detailCommandes = $detailCommandes;
	return $this;
}
  
  public function __toString(){
	return $this->idProduit . " " . $this->nomProduit . " " . $this->refProduit . " " . 
	$this->prixHTVA . " " . $this->tauxTVA . " " . $this->description . " " . $this->millesime . " " .
	$this->contenant . " ; " . $this->typeProduit;
	}
	
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
 
   public function setTypeProduit($typeProduit){
	$this->typeProduit = $typeProduit;
  }
  public function getTypeProduit() {
	return $this->typeProduit;
  }
}
?>
