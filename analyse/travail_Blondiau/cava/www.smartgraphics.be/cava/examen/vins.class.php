<?php
class Vins {
    
    public function __construct()
	{  
    }
	// Pour afficher les différents vins du site.
	public function readVins() 
	{
	    require_once("connexiondb.class.php");
	    //Connexion à la base de données
        $db = new Connexion();
		$bdd=$db->bdd(); 
		
		$nb_par_page=9; //Nombre de vins qui seront affichés par page
		//On calculer le nombre de vins totaux
		if(isset($_GET["cat"])) //Si on recherche une catégorie particulière
		    $count = $bdd->query('select count(*) from vins INNER JOIN vins_'.$_GET["cat"] .' 
			ON vins.idvins = vins_'.$_GET["cat"] .'.vins_idvins
			WHERE '.$_GET["cat"].'_id'.$_GET["cat"].' = '.$_GET["id"])->fetchColumn();
		else // Si on recherche tous les vins
			$count = $bdd->query('select count(*) from vins')->fetchColumn();
		// On calcule le nombre de pages
        $nb_pages = ceil($count / $nb_par_page);
        if (isset($_GET['page']))
        {
            $page = $_GET['page']; // On récupère le numéro de la page
			if($page > $nb_pages) $page=1; // Si la page n'existe pas, on affiche la première page.
        }
        else // La variable n'existe pas
        {
            $page = 1; // On se met sur la page 1 (par défaut)
        }
		//On calcule le numero du premier vin
		$premier_message = ($page - 1) * $nb_par_page;
		$i=0; //Initialisation de l'itérant
		$vins_retour="";//Itération de la variable qui contiendra le texte à renvoyer
		//On sélectionne les résultats
		if(isset($_GET["cat"]))
		{
		    //La requête permettant de rechercher les vins appartenant à une catégorie
			$req = $bdd->prepare('SELECT * FROM vins 
			INNER JOIN vins_'.$_GET["cat"] .' 
			ON vins.idvins = vins_'.$_GET["cat"] .'.vins_idvins
			WHERE '.$_GET["cat"].'_id'.$_GET["cat"].' = '.$_GET["id"].' LIMIT ' . $premier_message . ', ' . $nb_par_page);
		}
		else
		{
		    //La requête permettant de rechercher tous les vins
		    $req = $bdd->prepare('SELECT idvins, nom_vins, content_vins, prix_vins, url_vins FROM vins LIMIT ' . $premier_message . ', ' . $nb_par_page);
		}
	    $req->execute();
		//On récupère les résultats
		while( $donnees=$req->fetch())
		{
		    //Pour garder le même design, je dois définir $i en fonction de la colonne à laquelle se trouve le vin. 
			// Si $i vaut 3,alors on le réinitialise à 1 sinon on l'incrémente
		    ( $i==3) ? $i=1 : $i++ ;
			//On ajoute la description du vin à la variable de retour
		    $vins_retour.='<div  class="cell_vins'.$i.'"><h6>'.$donnees["nom_vins"].'</h6><img src="'.$donnees["url_vins"].'" alt="Goutez le!" class=""/>
			    <div class="plus">
			        <div class="bref_desc">'.$donnees["content_vins"].'</div>
				    <div class="prix">'.$donnees["prix_vins"].'...<a href="descriptif_vin.html"> Fiche du vin <img src="images/deco/details.png" alt="details" /></a></div>
			    </div>
		        <div class="acheter"><input class="btn_acheter" type="submit" name="submit"value="Acheter"></div>
		    </div><!--si possible remplacer la petite flèche par un pictogramme-->';
		}
		$req->closeCursor(); //Fermeture de la requête
		//On ajoute les pages pour la pagination
		$pages="<p> Pages : ";
		for ($i = 1 ; $i <= $nb_pages ; $i++)
        {
		    if(isset($_GET["cat"])) // Si l'utilisateur explore une catégorie
			$pages.= '<a href="nosvins.php?cat='.$_GET["cat"].'&id='.$_GET['id'].'&page=' . $i . '">' . $i . '</a> ';
			else // Sinon il affiche tous les vins
            $pages.= '<a href="nosvins.php?page=' . $i . '">' . $i . '</a> ';
        }
		$pages.="</p>";
		return $pages . $vins_retour . $pages;
	}
	
	public function categoriesVins($type, $label)
	{
	    require_once("connexiondb.class.php");
	    //Connexion à la base de données
        $db = new Connexion();
		$bdd=$db->bdd(); 
		
	    //On select les différents types
	    $req = $bdd->prepare('SELECT * FROM ' . $type);
	    $req->execute();

		$retour = '<h6> Vins par '.$label.'</h6><ul>';
		//On récupère les résultats
		while( $donnees=$req->fetch())
		{
		    $retour .= '<li><a href="nosvins.php?cat='.$type.'&id='.$donnees["id".$type].'">'.$donnees["label_".$type].'</a></li>';
		}
		$req->closeCursor(); //Fermeture de la requête
		$retour .= '</ul>';
		return $retour;
	}
}
?>