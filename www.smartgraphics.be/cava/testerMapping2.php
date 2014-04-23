<?php
require_once 'bootstrap.php';

// créer un pays
// persist
$pays = new cava\Pays();
$pays->setNomPays("Belgique");
$entityManager->persist($pays);
$entityManager->flush();
echo $pays . "<br/>";

// créer une adresse de facturation pour le client
// attacher le pays
// persist
$adresse = new cava\Adresse();
$adresse->setNr("10");
$adresse->setRue("place du jeu de balle");
$adresse->setCodePostal("7370");
$adresse->setLocalite("Dour");
$adresse->setPays($pays);
$entityManager->persist($adresse);
$entityManager->flush();
echo $adresse . "<br/>";

// créer un client
// attacher l'adresse
// persist
$client = new cava\Client();
$client->setNomClient("Dupont");
$client->setPrenomClient("pierre");
$client->setEmailClient("pierre.dupont@skynet.be");
$client->setSexeClient("M");
$client->setDateNaissanceClient(new DateTime());
$client->setSocieteClient("Duchemin SA");
$client->setNTVA("BE1235632563");
$client->setDateInscription(new DateTime()); // voir au niveau namespace
$client->setAdresse($adresse);
$entityManager->persist($client);
$entityManager->flush();
echo $client . "<br/>";

// créer une adresse de livraison
// persist
$adresseLivraison = new cava\Adresse();
$adresseLivraison->setNr("12");
$adresseLivraison->setRue("place des martyrs");
$adresseLivraison->setCodePostal("7000");
$adresseLivraison->setLocalite("Mons");
$adresseLivraison->setPays($pays);
$entityManager->persist($adresseLivraison);
$entityManager->flush();
echo $adresseLivraison . "<br/>";

// créer une commande
// attacher le client
// attacher l'adresse de livraison
// persist
$commande = new cava\Commande();
$commande->setReference("C425896");
$commande->setDateCommande(new DateTime());
$commande->setModePaiement("cash");
$commande->setClient($client);
$commande->setAdresseLivraison($adresseLivraison);
$entityManager->persist($commande);
$entityManager->flush();
echo $commande . "<br/>";

// créer un typeProduit
// persist
$typeProduit = new cava\TypeProduit();
$typeProduit->setTypeProduit("vin rouge");
$entityManager->persist($typeProduit);
$entityManager->flush();
echo $typeProduit . "<br/>";

// créer un produit
// attacher le type
// persist
$produit = new cava\Produit();
$produit->setNomProduit("Chateauneuf du pape");
$produit->setRefProduit("B458966");
$produit->setPrixHTVA(25.0);
$produit->setTauxTVA(0.21);
$produit->setDescription("bourgogne millésimé");
$produit->setMillesime(2005);
$produit->setContenant("bouteille 75cl");
$produit->setTypeProduit($typeProduit);
$entityManager->persist($produit);
$entityManager->flush();
echo $produit . "<br/>";

// créer un Lot
// persist
$lot = new cava\Lot();
$lot->setQuantite(10);
$lot->setProduit($produit);
$entityManager->persist($lot);
$entityManager->flush();


// ajouter ce lot à la commande via ArrayCollection
$commande->addLot($lot);

// calculer le montant HTVA de la commande
$montant = $commande->calculerMontantTvac();
echo $montant;
$entityManager->flush(); // pour sauvegarder au niveau de la table intermédiaire

?>