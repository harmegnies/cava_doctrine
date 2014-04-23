<?php
namespace cava;
use Doctrine\ORM\Mapping as ORM;
/**
* TypeProduit
* @ORM\Table(name="typeproduit")
* @ORM\Entity
*/
class TypeProduit {

/**
* @ORM\Id
* @ORM\GeneratedValue(strategy="IDENTITY")
* @ORM\Column(name="idTypeProduit",
* type="integer",
* nullable=false)
*/
private $idTypeProduit = 0;  
 /**
* @ORM\Column(name="typeProduit",
* type="string",
* length=100,
* nullable=false)
*/  
private $typeProduit = null;

/**
*@ORM\OneToMany(targetEntity= "cava\Produit",
* mappedBy="typeProduit",
* cascade={"persist"})
*/ 
private $produits = null; 
  
public function hydrate($array){
  foreach ( $array as $key=>$value ){
  $this->$key = $value;
  }
  }
  
  public function setIdTypeProduit($idTypeProduit){
	$this->idTypeProduit = $idTypeProduit;
  }
  public function setTypeProduit($typeProduit){
	$this->typeProduit = $typeProduit;
  }
  
  public function getIdTypeProduit() {
  return $this->idTypeProduit;
  }
  public function getTypeProduit() {
  return $this->typeProduit;
  }
  
  
//**************************************
  public function getProduits()  
{  
	return $this->produits;  
} 
 public function setProduits(\Doctrine\Common\Collections\ArrayCollection $produits)
{
	$this->produits = $produits;
	return $this;
}
  
  public function __toString(){
  return $this->idTypeProduit . " " . $this->typeProduit;
  }
  
  

}
?>
