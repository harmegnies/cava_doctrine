<?php
namespace cava;
use Doctrine\ORM\Mapping as ORM;
/**
* Lot
* @ORM\Table(name="lot")
* @ORM\Entity
*/
class Lot {

/**
* @var integer
* @ORM\Id
* @ORM\GeneratedValue(strategy="IDENTITY")
* @ORM\Column(name="idLot",type="integer",nullable=false)
*/
private $idLot;

  /**
     * @var integer
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
private $quantite = 0;

 /**
* @var cava\Produit
*
* @ORM\ManyToOne(targetEntity="cava\Produit", 
* cascade={"persist"}, 
* inversedBy="lots")
* @ORM\JoinColumns({
* @ORM\JoinColumn(name="idProduit", 
* referencedColumnName="idProduit",
* nullable=false)
* })
*/
private $produit = null;


	 /**  
	 * @ORM\ManyToMany(targetEntity="cava\Commande",cascade={"persist"}, mappedBy="lots") 
	 // simplement mentionner le type d'association et non spécifier la table de jointure
	 */  
	private $commandes;
	 /**  
     * Get commandes  
     *  
     * @return \Doctrine\Common\Collections\ArrayCollection  
     */  
    public function getCommandes()  
    {  
        return $this->commandes;  
    }  
   /**
     * Set commandes
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $commandes
     * @return Lot
     */
    public function setCommandes(\Doctrine\Common\Collections\ArrayCollection $commandes)
    {
        $this->commandes = $commandes;
        return $this;
    }


public function __construct(){
}


public function getQuantite() {
  return $this->quantite;
  }  
public function setQuantite($quantite){
	$this->quantite = $quantite;
  }  


  
public function getProduit() {
  return $this->produit;
  }  
public function setProduit($produit){
	$this->produit = $produit;
  }
}


?>