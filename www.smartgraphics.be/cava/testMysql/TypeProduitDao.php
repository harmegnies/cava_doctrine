<?php
require_once("Dao.php");
require_once("../classes/TypeProduit.php");

// cr�ation de la classe dao pour g�rer la persistance d'un objet TypeProduit
class TypeProduitDao extends Dao {

public function __construct ( ConnexionDB $connexion ) {
	parent::__construct($connexion); // on appelle le constructeur de la classe m�re soit Dao
}

//*******************************
// ins�rer un objet TypeProduit
// la m�thode retourne true en cas de r�ussite (bool�en)
public  function insert($objet) {
if ( $objet instanceof TypeProduit && $objet->getIdTypeProduit() == 0 ){ 
// traiter uniquement si objet de type TypeProduit et non encore enregistr� donc avec id � 0
$sql = sprintf("INSERT INTO typeproduit VALUES(NULL,'%s');",
addslashes($objet->getTypeProduit()));
$result = @mysql_query($sql,$this->connexion->getIdHandle()) or die("requ�te insert TypeProduit impossible");
// changer par un try catch
		if ($result) {
		// si insertion r�ussie on r�cup�re l'id g�n�r� par la database (Auto-incr�ment)
		$id = @mysql_insert_id($this->connexion->getIdHandle()); 
		// on modifie l'objet pass� par r�f�rence de fa�on � r�acutualiser la valeur de l'id
		$objet->setIdTypeProduit($id);
		return true;
		}
		else
		return false;
}
else {
return false;
}
}

//*******************************
// on ne peut pas changer l'id avec la m�thode update
public  function update($objet){
if ( $objet instanceof TypeProduit && $objet->getIdTypeProduit() != 0 ){
$sql = sprintf("UPDATE typeproduit SET typeProduit = '%s' WHERE idTypeProduit = %d;",
addslashes ($objet->getTypeProduit()), $objet->getIdTypeProduit());
$result = @mysql_query($sql,$this->connexion->getIdHandle()) or die("requ�te insert TypeProduit impossible");
// changer par un try catch
// if ternaire
	if ($result)
		return true;
	else
		return false;
}
else {
return false;
}
} 
//*******************************
// pour supprimer l'enregistrement au niveau de la table
public  function delete($objet){
if ( $objet instanceof TypeProduit && $objet->getIdTypeProduit() != 0){
$sql = sprintf("DELETE FROM typeproduit  WHERE idTypeProduit = %d;",
$objet->getIdTypeProduit());
$result = @mysql_query($sql,$this->connexion->getIdHandle()) or die("requ�te delete TypeProduit impossible");
// changer par un try catch
		if ($result) {
		$objet = null;  // ou unset($objet) selon l'application
		return true;
		}
		else
		return false;
}
else {
return false;
}
}
//*******************************
// r�cup�rer un objet TypeProduit gr�ce � son id
public  function findId($id){
$sql = sprintf("SELECT typeProduit FROM typeproduit WHERE idTypeProduit = %d;",$id);
$result = @mysql_query($sql,$this->connexion->getIdHandle()) or die("requ�te find avec id pour TypeProduit impossible");
if ( mysql_num_rows($result) == 0 )
	return null; // n'existe pas
else {
		$val = @mysql_fetch_assoc($result); // on r�cup�re un tableau avec une seule cellule 
		$typeProduit = new TypeProduit();
		$typeProduit->hydrate(array("idTypeProduit"=>$id,"typeProduit"=>$val['typeProduit']));
		return $typeProduit;
}
}
//*******************************
// retourne un tableau d'objets TypeProduit 
// si la table est vide retournera un tableau vide
public  function findAll(){
$tabTypeProduit = array();
$sql = "SELECT * FROM typeProduit;";
$result = @mysql_query($sql,$this->connexion->getIdHandle()) or die("requ�te findAll pour TypeProduit impossible");
if ( mysql_num_rows($result) == 0 )
	return $tabTypeProduit; // pas de records dans la table
else {
		while ( $val = @mysql_fetch_assoc($result) ) {
		// on traite un tableau associatif avec 2 cellules car 2 champs dans la table
		$typeProduit = new TypeProduit();
		$typeProduit->hydrate(array("idTypeProduit"=>$val['idTypeProduit'],"typeProduit"=>$val['typeProduit']));
		$tabTypeProduit[] = $typeProduit;
		}
		@mysql_free_result($result); // lib�rer la ressource
		return $tabTypeProduit;
}
}

}


?>