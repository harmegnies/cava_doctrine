<?php
namespace cava;
use Doctrine\ORM\Mapping as ORM;
/**
* DetailCommande
* @ORM\Table(name="detailcommande")
* @ORM\Entity
*/
class DetailCommande {
  //************************************************
  /**
	* @ORM\ID
    * @ORM\JoinColumn(name="commande_Id", 
	* referencedColumnName="idCommande",nullable=false)
    * @ORM\ManyToOne(targetEntity="cava\Commande",
	* cascade={"persist"},inversedBy="detailCommandes")
    */
  private $commande;
  /**
  	* @ORM\ID
	* @ORM\JoinColumn(name="produit_Id", 
	* referencedColumnName="idProduit", nullable=false)
    * @ORM\ManyToOne(targetEntity="cava\Produit",
	* cascade={"persist"},inversedBy="detailCommandes")
    */
  private $produit;
  /**
     * @var integer
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
  private $quantite;	

  
  public function getQuantite(){
	return $this->quantite;
  }
  public function setQuantite($quantite){
	$this->quantite = $quantite;
  }

  public function getCommande(){
	return $this->commande;
  }
  public function setCommande($commande){
	$this->commande = $commande;
  }
  
  public function getProduit(){
	return $this->produit;
  }
  public function setProduit($produit){
	$this->produit = $produit;
  }
  
  public function __toString(){
   return $this->commande . "\n avec " . $this->produit . "\n" . $this->quantite . " unités";
  }

}
?>