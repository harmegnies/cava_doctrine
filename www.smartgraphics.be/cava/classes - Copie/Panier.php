<?php
require_once 'Produit.php';
class Panier {
  private $listeProduits = array(); // tableau 2 dim 
  
  // return float
  public function calculerPanier(){ 
	$montant = 0; //float
	foreach($this->listeProduits as $value){
	$p = $value[0]; // objet produit
	$q = $value[1]; // quantité
	$montant += $p->getPrixHTVA() * $q *
		(1 + $p->getTauxTVA());
	}	
	return $montant;
  }  
  
  // return string
  // utiliser la fonction nl2br pour remplacer \n par la balise <br/>
  public function afficherPanier(){  
  $txt = "";
  foreach($this->listeProduits as $value){
	$p = $value[0]; // objet produit
	$q = $value[1]; // quantité
	$txt .= $q . " unités x " . $p->getNomProduit() . " à " .
	$p->getPrixHTVA() . " euros\n";
	}	
	return $txt;
  }  
  
  // return boolean
  public function ajouterProduit(Produit $produit,$quantite){
  // vérifier si le produit est absent du panier
	$this->listeProduits[] = array($produit,$quantite);
	return true;
  } 
  
  
  // return la position dans le tableau 2 dimensions
  // retourne -1 si pas trouvé
  private function trouverProduit(Produit $produit) {
	$pos = -1;
	for ( $i=0; $i < count($this->listeProduits);$i++ ) {
		if ( $this->listeProduits[$i][0] === $produit ){
		// === compare la valeur et le type
		$pos = $i;	
		break;
		}
	}
	return $pos;
	}
	
	private function trouverProduitSelonId($idProduit) {
	$pos = -1;
	for ( $i=0; $i < count($this->listeProduits);$i++ ) {
		if ( $this->listeProduits[$i][0]->getIdProduit() === $idProduit ){
		// === compare la valeur et le type
		$pos = $i;	
		break;
		}
	}
	return $pos;
	}

  
  // return boolean
  public function supprimerProduit(Produit $produit){  
  if(($pos = $this->trouverProduit($produit)) != -1) {
			unset($this->listeProduits[$pos]); // supprime la ligne
			array_splice($this->listeProduits,$pos,0); // réaffecter l'index
			return true;
	}
	return false;
  }
  
  // return boolean
  public function supprimerProduitSelonId($idProduit){  
  if(($pos = $this->trouverProduitSelonId($idProduit)) != -1) {
			unset($this->listeProduits[$pos]); // supprime la ligne
			array_splice($this->listeProduits,$pos,0); // réaffecter l'index
			return true;
	}
	return false;
  }
  
   // return string
  public function viderPanier(){ 
	$this->listeProduits = array();
  }
  
  
//*********************************
   // selon le libellé, selon le nr référence ou autre possibilité
	public function trierPanierQuantite(){
		usort($this->listeProduits,array("Panier","comparerQte"));
	}

	public function trierPanierIdProduit(){
		usort($this->listeProduits,array("Panier","comparerId"));
	}
	
	public function trierPanierLibelleProduit(){
		usort($this->listeProduits,array("Panier","comparerLibelle"));
	}
	
	
	// créer les fonctions de comparaison
	// fonction static qui doit retourner -1,0 ou 1
	static function comparerQte($a,$b){
		if ( $a[1] == $b[1] ) {
		return 0;
		}
		else {
		return ($a[1]<$b[1])?-1:1;
		}	
	}
	static function comparerId($a,$b){
		if ( $a[0]->getIdProduit() == $b[0]->getIdProduit() ) {
		return 0;
		}
		else {
		return ($a[0]->getIdProduit()<$b[0]->getIdProduit())?-1:1;
		}	
	}
	static function comparerLibelle($a,$b){
		if ( $a[0]->getNomProduit() == $b[0]->getNomProduit() ) {
		return 0;
		}
		else {
		return ($a[0]->getNomProduit()<$b[0]->getNomProduit())?-1:1;
		}	
	}	
	
		// pour decrementer la quantité de 1
	public function decrementerProduit(Produit $produit){
	if(($pos = $this->trouverProduit($produit)) != -1) {
		if ( ($this->listeProduits[$pos][1] - 1) > 0 )
		$this->listeProduits[$pos][1] = $this->listeProduits[$pos][1] - 1;
	
		if ( ($this->listeProduits[$pos][1] - 1) == 0 )
		$this->supprimerProduit($produit);
	
	}
	}
	// pour incrémenter la quantité de 1
	public function incrementerProduit(Produit $produit){
	if(($pos = $this->trouverProduit($produit)) != -1) {
		$this->listeProduits[$pos][1] = $this->listeProduits[$pos][1] + 1;	
	}	
	}
	

}
?>
