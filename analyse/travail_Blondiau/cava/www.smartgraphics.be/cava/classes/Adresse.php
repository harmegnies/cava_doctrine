<?php
require_once 'Pays.php';
class Adresse {
  private $pays = null; //objet Pays
  private $idAdresse = 0; //integer
  private $rue = null; //string
  private $nr = null; //string
  private $codePostal = null; //string
  private $localite = null; //string  
  private static $cpt = 0; // integer
  
    public static function compterObj(){
	return Adresse::$cpt;
  }  
  public function __construct(){
  }  
  public function hydrate($array){
  foreach ( $array as $key=>$value ){
  $this->$key = $value;
  }
  Adresse::$cpt++;  
  }
  
 public function __toString(){
 return $this->idAdresse . ", " . $this->rue . " " . $this->codePostal . " " . $this->localite . " ; " . $this->pays;
 }

  public function setIdAdresse($idAdresse){
	$this->idAdresse = $idAdresse;
  }
  public function setRue($rue){
	$this->rue = $rue;
  }
  public function setNr($nr){
	$this->nr = $nr;
  }
  public function setCodePostal($codePostal){
	$this->codePostal = $codePostal;
  }
  public function setLocalite($localite){
	$this->localite = $localite;
  }
  public function setPays(Pays $pays){
	$this->pays = $pays;
  }
  
  public function getIdAdresse() {
  return $this->idAdresse;
  }
  public function getRue() {
  return $this->rue;
  }
  public function getNr() {
  return $this->nr;
  }
  public function getCodePostal() {
  return $this->codePostal;
  }
  public function getLocalite() {
  return $this->localite;
  }
  public function getPays() {
  return $this->pays;
  }

}
?>
