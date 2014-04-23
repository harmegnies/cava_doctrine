<?php
namespace cava;
use Doctrine\ORM\Mapping as ORM;
/**
* Adresse
* @ORM\Table(name="adresse")
* @ORM\Entity
*/
class Adresse {

/**
     * @var integer
* @ORM\Id
* @ORM\GeneratedValue(strategy="IDENTITY")
* @ORM\Column(name="idAdresse",
* type="integer",nullable=false)
*/
  private $idAdresse = 0; //integer

/**
     * @var string
* @ORM\Column(name="rue",type="string",length=100,nullable=false)
*/
  private $rue = null; //string
/**
     * @var string
* @ORM\Column(name="nr",type="string",length=10,nullable=false)
*/ 
  private $nr = null; //string
/**
     * @var string
* @ORM\Column(name="codePostal",type="string",length=10,nullable=false)
*/
  private $codePostal = null; //string
/**
     * @var string
* @ORM\Column(name="localite",type="string",length=50,nullable=false)
*/
  private $localite = null; //string  
  
/**
* @var cava\Pays
*
* @ORM\ManyToOne(
* targetEntity="cava\Pays", 
* cascade={"persist"}, 
* inversedBy="adresses")
* @ORM\JoinColumns({
* @ORM\JoinColumn(name="idPays", 
* referencedColumnName="idPays",
* nullable=false)
* })
*/
  private $pays = null;
  
/**
*@ORM\OneToMany(
* targetEntity= "cava\Client",
* mappedBy="adresse", 
* cascade={"persist"})
*/ 
private $clients = null;

/**
*@ORM\OneToMany(
* targetEntity= "cava\Commande",
* mappedBy="adresseLivraison", 
* cascade={"persist"})
*/ 
// récupérer la liste des commandes ayant cette adresse comme adresseLivraison
private $commandesAddr = null;
  

  public function hydrate($array){
  foreach ( $array as $key=>$value ){
  $this->$key = $value;
  }
  }
  

  public function getIdAdresse() {
  return $this->idAdresse;
  }
  public function setIdAdresse($idAdresse){
	$this->idAdresse = $idAdresse;
  }
  
  public function getRue() {
  return $this->rue;
  }
  public function setRue($rue){
	$this->rue = $rue;
  }
  
  public function getNr() {
  return $this->nr;
  }
  public function setNr($nr){
	$this->nr = $nr;
  }
  
  public function getCodePostal() {
  return $this->codePostal;
  }
  public function setCodePostal($codePostal){
	$this->codePostal = $codePostal;
  }
  
  public function getLocalite() {
  return $this->localite;
  }
  public function setLocalite($localite){
	$this->localite = $localite;
  }

  
  //**************************************
  
  public function getPays() {
  return $this->pays;
  }
  public function setPays(Pays $pays){
	$this->pays = $pays;
  }

   //**************************************
  public function getClients()  
{  
	return $this->clients;  
} 
 public function setClients(\Doctrine\Common\Collections\ArrayCollection $clients)
{
	$this->clients = $clients;
	return $this;
}
  

//**************************************
  public function getCommandesAddr()  
{  
	return $this->commandesAddr;  
} 
 public function setCommandesAddr(\Doctrine\Common\Collections\ArrayCollection $commandes)
{
	$this->commandesAddr = $commandes;
	return $this;
}
  
public function __toString(){
 return $this->idAdresse . ", " . $this->rue . " " . $this->codePostal . " " . $this->localite . " ; " . $this->pays;
 }

}
?>
