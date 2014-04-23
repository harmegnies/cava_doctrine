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
  
  
  public function __construct()
    {
        $this->detailCommandes = new \Doctrine\Common\Collections\ArrayCollection();
    }
 //************************************ 
/**
*@ORM\OneToMany(
* targetEntity= "cava\DetailCommande",
* mappedBy="commande", 
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


public function ajouterDetailCommande($detailCommande){
	$this->detailCommandes[] = $detailCommande;
}
public function supprimerDetailCommande($detailCommande){
	$this->detailCommandes->removeElement($detailCommande);
}
public function clearDetailCommande(){
	$this->detailCommandes->clear();
}
  
  public function __toString(){
  return $this->idCommande . " " . $this->reference . " " . $this->dateCommande;
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
