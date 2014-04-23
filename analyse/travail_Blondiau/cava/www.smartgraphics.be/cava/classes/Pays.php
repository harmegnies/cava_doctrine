<?php
class Pays {
  private $idPays = 0; // integer
  private $nomPays = null; // string
  private static $cpt = 0; // integer  
  
  public function __construct(){}  
  
  public function hydrate($array){
  foreach ( $array as $key=>$value ){
  $this->$key = $value;
  }
   Pays::$cpt++; 
  }  
  public static function compterObj(){
	return Pays::$cpt;
  }  
 
  public function setIdPays($idPays){
	$this->idPays = $idPays;
  }
  public function setNomPays($nomPays){
	$this->nomPays = $nomPays;
  }  
  public function getIdPays() {
  return $this->idPays;
  }
  public function getNomPays() {
  return $this->nomPays;
  }  

  public function __toString(){
  return $this->idPays . " " . $this->nomPays;
  }  
}
?>
