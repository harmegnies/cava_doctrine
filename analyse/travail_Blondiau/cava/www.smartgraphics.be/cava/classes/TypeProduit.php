<?php
class TypeProduit {

  private $idTypeProduit = 0;
  private $typeProduit = null;
  
    private static $cpt = 0; // integer  
    public static function compterObj(){
	return TypeProduit::$cpt;
  }   

public function __construct(){
	}
public function hydrate($array){
  foreach ( $array as $key=>$value ){
  $this->$key = $value;
  }
  TypeProduit::$cpt++;  
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
  
  public function __toString(){
  return $this->idTypeProduit . " " . $this->typeProduit;
  }
  
  

}
?>
