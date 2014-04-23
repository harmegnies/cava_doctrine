<?php
require_once("Produit.php");
require_once("Panier.php");
require_once("TypeProduit.php");

$type1 = new TypeProduit();
$type1->hydrate(array("idTypeProduit" => 1, "typeProduit"=>"blanc"));
$type2 = new TypeProduit();
$type2->hydrate(array("idTypeProduit" => 2, "typeProduit"=>"rouge"));

// créer un produit1 vin rouge
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

// créer un produit2 vin rouge
$produit2 = new Produit();
$tab = array("idProduit"=>2,
"nomProduit"=>"Château Margot",
"refProduit"=>"R45845",
"prixHTVA"=>100.50,
"tauxTVA"=>0.21,
"description"=>"bordeau rouge",
"millesime"=>1950,
"contenant"=>"bouteille 75 cl",
"typeProduit"=>$type2);
$produit2->hydrate($tab);
echo $produit2 . "<br/>";

// créer un produit1 vin blanc
$produit3 = new Produit();
$tab = array("idProduit"=>3,
"nomProduit"=>"Chablis",
"refProduit"=>"R45896",
"prixHTVA"=>110.0,
"tauxTVA"=>0.21,
"description"=>"bourgogne blanc",
"millesime"=>2008,
"contenant"=>"bouteille 75 cl",
"typeProduit"=>$type1);
$produit3->hydrate($tab);
echo $produit3 . "<br/>";
echo "____________________________<br/>";
//***********************************
$panier = new Panier();
$panier->ajouterProduit($produit1,10);
$panier->ajouterProduit($produit2,5);
$panier->ajouterProduit($produit3,5);


echo "montant du panier : " . $panier->calculerPanier() . " euros<br/>";
echo "____________________________<br/>";
echo nl2br($panier->afficherPanier());
echo "____________________________<br/>";
echo "nombre de produits : " . $panier->nbProduits();
echo "<br/>";
echo "nombre d'articles : " . $panier->nbArticles();
echo "<br/>";
echo "____________________________<br/>";

// trier selon le produit
echo "trier selon libellé <br/>";
$panier->trierPanierLibelleProduit();
echo nl2br($panier->afficherPanier());
echo "____________________________<br/>";
echo "trier selon id du produit <br/>";
$panier->trierPanierIdProduit();
echo nl2br($panier->afficherPanier());
echo "____________________________<br/>";
echo "trier selon quantité <br/>";
$panier->trierPanierQuantite();
echo nl2br($panier->afficherPanier());
echo "____________________________<br/>";

// incrémenter produit
echo "incrémenter chablis <br/>";
$panier->incrementerProduit($produit3);
echo nl2br($panier->afficherPanier());
echo "____________________________<br/>";
echo "décrémenter chablis <br/>";
$panier->decrementerProduit($produit3);
echo nl2br($panier->afficherPanier());
echo "____________________________<br/>";

// modifier produit
$panier->modifierProduit($produit3,50);
echo nl2br($panier->afficherPanier());
echo "____________________________<br/>";

?>