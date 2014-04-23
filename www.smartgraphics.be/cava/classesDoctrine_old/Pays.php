<?php
namespace cava;
use Doctrine\ORM\Mapping as ORM;
/**
* Pays
* @ORM\Table(name="pays")
* @ORM\Entity
*/
class Pays {
/**
* @var integer
* @ORM\Id
* @ORM\GeneratedValue(strategy="IDENTITY")
* @ORM\Column(name="idPays",type="integer",nullable=false)
*/
  private $idPays = 0; // integer
/**
* @var string
* @ORM\Column(name="nomPays",type="string",length=100,nullable=false)
*/ 
  private $nomPays = null; // string
  
/**
*@ORM\OneToMany(
* targetEntity= "cava\Adresse",
* mappedBy="pays", 
* cascade={"persist"})
*/ 
private $adresses = null;
  
  public function hydrate($array){
	  foreach ( $array as $key=>$value ){
	  $this->$key = $value;
	  }
  }  
     /**
     * Get idPays
     *
     * @return integer 
     */
  public function getIdPays() {
  return $this->idPays;
  }

    /**
     * Set nomPays
     *
     * @param string $nomPays
     * @return Pays
     */
  public function getNomPays() {
  return $this->nomPays;
  }  
   public function setNomPays($nomPays){
	$this->nomPays = $nomPays;
  }  
   
  	 /**  
     * Get adresses  
     *  
     * @return \Doctrine\Common\Collections\ArrayCollection  
     */  
    public function getAdresses()  
    {  
        return $this->adresses;  
    }  
   /**
     * Set adresses
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $adresses
     * @return Pays
     */
    public function setAdresses(\Doctrine\Common\Collections\ArrayCollection $adresses)
    {
        $this->adresses = $adresses;
        return $this;
    }
	

  public function __toString(){
  return $this->idPays . " " . $this->nomPays;
  }  
}
?>
