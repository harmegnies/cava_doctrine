<?php
class Pays {
// les attributs de la classe
  private $idPays = 0; // integer
  private $nomPays = null; // string
  
  // variable de classe ou attribut static
  private static $cpt = 0; // integer  
  //constructeur
  //argument non obligatoire = $idPays (en php, pas de surcharge de constructeur, ni de m�thodes
  //moyen pour y rem�dier
  /*
  public function __construct($nomPays,$idPays=0){
	$this->nomPays = $nomPays;
	$this->idPays = $idPays;
	Pays::$cpt++; // on incr�mente la variable de classe
  }
  */
  public function __construct(){}  
  
  // $array sera un tableau associatif avec les cl�s qui repr�sente les attributs
  public function hydrate($array){
  foreach ( $array as $key=>$value ){
  $this->$key = $value;
  }
   Pays::$cpt++; 
  }  
  public static function compterObj(){
	return Pays::$cpt;
  }  
  /*
  // appeler automatiquement quand unset ou delete sur une variable ...
  public function __destruct() {
	echo "objet d�truit";
  }
  */  
  // getter et setter
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
  // m�thode pour afficher les attributs
  public function __toString(){
  return $this->idPays . " " . $this->nomPays;
  }  
  // les diff�rentes m�thodes magiques
  /*
  __sleep
  __wakeup
  __set()
  __get()
  */
}
?>
