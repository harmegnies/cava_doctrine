<?php
require_once("Produit.php");
require_once("Panier.php");
require_once("TypeProduit.php");

$type1 = new TypeProduit("blanc",1);
$type2 = new TypeProduit("rouge",2);


$produit1 = new Produit();
$tab = array("idProduit"=>1,
"nomProduit"=>"Château Laffite",
"refProduit"=>"R45896",
"prixHTVA"=>120.50,
"tauxTVA"=>0.21,
"description"=>"bordeau rouge",
"millesime"=>2000,
"contenant"=>"bouteille 75 cl",
"typeProduit"=>$type2);
$produit1->hydrate($tab);
echo $produit1 . "<br/>";

$panier = new Panier();
$panier->ajouterProduit($produit1,10);
echo "montant du panier : " . $panier->calculerPanier() . " euros<br/>";
echo nl2br($panier->afficherPanier());

?>