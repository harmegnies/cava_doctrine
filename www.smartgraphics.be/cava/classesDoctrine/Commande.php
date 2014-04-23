<?php
namespace cava;
use Doctrine\ORM\Mapping as ORM;
/**
* Commande
* @ORM\Table(name="commande")
* @ORM\Entity
*/
class Commande {  
 /**
      * @var integer
* @ORM\Id
* @ORM\GeneratedValue(strategy="IDENTITY")
* @ORM\Column(name="idCommande",
* type="integer",
* nullable=false)
*/ 
  private $idCommande = 0; 
/**
     * @var string
* @ORM\Column(name="reference",
* type="string",
* length=15,
* nullable=false)
*/  
  private $reference = null;
/**
* @var \DateTime
* @ORM\Column(name="dateCommande",
* type="date",
* nullable=false)
*/   
  private $dateCommande = null;
/**
     * @var string
* @ORM\Column(name="modePaiement",
* type="string",
* length=20,
* nullable=false)
*/    
  private $modePaiement = null;
  
  
  
 /**
* @var cava\Client
*
* @ORM\ManyToOne(targetEntity="cava\Client",
* cascade={"persist"}, 
* inversedBy="commandes")
* @ORM\JoinColumns({
* @ORM\JoinColumn(name="idClient", 
* referencedColumnName="idClient",
* nullable=false)
* })
*/ 
  private $client = null; //objet Client
  
 /**
* @var cava\Adresse
*
* @ORM\ManyToOne(
* targetEntity="cava\Adresse", 
* cascade={"persist"}, 
* inversedBy="commandesAddr")
* @ORM\JoinColumns({
* @ORM\JoinColumn(name="idAdresse", 
* referencedColumnName="idAdresse")
* })
*/
  private $adresseLivraison = null; // objet Adresse
  
 //************************************ 

	/**
	* @ORM\ManyToMany(targetEntity="cava\Lot",cascade={"persist"},inversedBy="commandes")  
	* @ORM\JoinTable(name="detail", 
     *     joinColumns={ 
     *         @ORM\JoinColumn( 
     *             name="commande_Id", 
     *             referencedColumnName="idCommande" 
     *         ) 
     *     }, 
     *     inverseJoinColumns={ 
     *         @ORM\JoinColumn( 
     *             name="lot_Id", 
     *             referencedColumnName="idLot" 
     *         ) 
     *     } 
     * ) 
	 */ 
	private $lots;
	/**
     * Constructor
     */
	// utilisation d'une ArrayCollection
    public function __construct()
    {
        $this->lots = new \Doctrine\Common\Collections\ArrayCollection();
    }
	//********************************************
	public function addLot(Lot $lot){
		$this->lots[] = $lot;
	}
	public function removeLot(Lot $lot){
		$this->lots->removeElement($lot);
	}
	public function removeAllLots(){
		$this->lots->clear();
	}
	// pas de setter pour l'ArrayCollection, doctrine va utiliser les méthodes add
	
	/**  
    * @return \Doctrine\Common\Collections\ArrayCollection  
     */ 
	public function getLots(){
		return $this->lots;
	}	
	
	//***************************************************
	public function calculerMontantTvac() {
	$somme = 0;
	for ( $i=0; $i < count($this->lots); $i++){
	$somme += $this->lots[$i]->getQuantite() * $this->lots[$i]->getProduit()->getPrixHTVA() * ( 1 +  $this->lots[$i]->getProduit()->getTauxTVA());	
	}
	return $somme;
	}


  
  public function __toString(){
  return $this->idCommande . " " . $this->reference;
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
  
//*********************************************$

 public function setClient(Client $client){
	$this->client = $client;
  }
  public function getClient(){
	return $this->client;
  }

   public function setAdresseLivraison(Adresse $adresse){
	$this->adresseLivraison = $adresse;
  }
  public function getAdresseLivraison(){
	return $this->adresseLivraison;
  }
 
 
}
?>
