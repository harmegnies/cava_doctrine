<?php
//On charge la classe.
require_once("examen/vins.class.php");
?>
<!doctype html>
<html>
<!-- Mirrored from www.smartgraphics.be/cava/nosvins.html by HTTrack Website Copier/3.x [XR&CO'2010], Sun, 24 Feb 2013 08:02:13 GMT -->
<head>
<title>Centrale d'achat de vins authentiques - Formulaire d'inscription des membres</title>
<!-- START META -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta <meta name="Keywords" content="vins, authentiques, vente en ligne, acheter vin, marchand de vin" />
<meta name="Description" content="Vins fins. Vins authentiques de France et d'ailleurs" />
<meta name="robots" content="index, follow" />
<link rel="shortcut icon" href="images/logos/cava.ico"/>
<link rel="stylesheet" media="all" type="text/css" href="css/cavaStyle.css" />
	
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery.simpletooltip-min.js"></script>
<script type="text/javascript">
		$(function(){
			$("a.loginbox").simpletooltip({ margin: 60 });
		});
	</script>
</head>
<body>
<div id="wrapper">
  <div id="container">
    <header>
      <h1>C.A.V.A. - Centrale d'achat de vins authentiques</h1>
       <a href="index-2.html"><p id="logo"></p></a><!-- changer le DIV en paragraphe afin de permettre le r�f�rencement de l'image + mail � Martin -->
      <div id="rechercheConnexion">
        <div class="connexion">
			<a href="#loginbox" class="loginbox">connexion</a><img class="cadena" src="images/deco/cadena.png" alt="cadena" />
				<div id="loginbox">
							<div id="inscription">
								 <p><a href="inscription.html">Cr�er un compte!</a></p>
							</div>
							<div id="co"><p id="accesmembres">Acc�s membres</p>
								<p id="login">Login: <input id="inputlog"type="text"name="login"/></p>
								<p id="password">Password: <input id="inputpass" type="text"name="mdp"/></p>
								<p> <input id="envoyer" type="submit" name="submit"value="Connexion"></p>
							</div>
				</div>
		</div>
        <div class="recherche">
          <form action="#" method="post">
            <span>
            <input class="champ" name="Recherche" size="" type="text" placeholder="" />
            </span> <span>
            <input class="submit"  name="rechercher" type="submit" value="Rechercher" />
            </span>
          </form>
        </div>
      </div>
      <nav>
        <ul>
          <li><a href="index-2.html" >Accueil</a></li>
          <li><a href="nosvins.html"class="current">Nos vins</a></li>
          <li><a href="philosophie.html">Notre philosophie</a></li>
		  <li><a href="domaines.html">Domaines</li>
          <li><a href="contact.html">Nous contacter</a></li>
        </ul>
      </nav>
      
      <!--Fin du menu--> 
      
    </header>
    <div id="slider2">
       <img src="images/deco/cave1_slider.jpg" alt="cave � vin" /> 
    </div>
    <!-- fin du slider-->
    
    <div class="ombre"></div>  	
    <!----CONTENU PRINCIPAL------>
    
<div id="content">
 
<div id="vins">
    
	<h1>Nos vins</h1>
 
    <div id="menu_vins">
	<?php 
		//Si on affiche simplement la page
		$vins = new Vins();
		echo $vins->categoriesVins("type","type"); //On affiche le menu "type"
		echo $vins->categoriesVins("cepage","c�page"); //On affiche le menu "c�page"
		echo $vins->categoriesVins("domaine","domaine"); //On affiche le menu "domaine"
	?>
	</div>

	
<div id="table_vins">
		<?php 
		//Si on affiche simplement la page
		    $vins = new Vins();
		    echo $vins->readVins(); //On affiche les vins
		?>
      
	</div><!--fin du tableau des vins-->
    </div><!--fin du div vins-->

	</div><!--fin du content-->	
    
    <!-- FIN DU CONTENU PRINCIPAL---->
    
    <footer>
        <div class="footer_top"> <!---partie haute du footer---> 
        <!----------- FOOTER HAUT � GAUCHE ------------>
        <div class="livraisons">
          <h6><a href="livraisons_commandes.html">Livraisons et commandes</a></h6>
          <p><a href="livraisons_commandes.html"><img id="img_livraisons"src="images/deco/icone_livraisons.png"alt="livraisons"OnMouseOver="document.getElementById('img_livraisons').src='images/deco/icone_livraisons_blc.png'" OnMouseOut="document.getElementById('img_livraisons').src='images/deco/icone_livraisons.png'"/></a></p>
        </div>
        
        <!----------- FOOTER HAUT au MILIEU ------------>
        <div class="conseils">
          <h6><a href="conseils.html">Besoin de conseils ?</a></h6>
          <p><a href="conseils.html"><img id="img_conseils"src="images/deco/icone_conseils.png"alt="conseils"OnMouseOver="document.getElementById('img_conseils').src='images/deco/icone_conseils_blc.png'" OnMouseOut="document.getElementById('img_conseils').src='images/deco/icone_conseils.png'"/></a></p>
        </div>
        
        <!----------- FOOTER HAUT � DROITE ------------>
        
        <div class="authenticite">
          <h6><a href="vins_authentiques.html">Vins authentiques</a></h6>
          <p><a href="vins_authentiques.html"><img id="img_authentiques"src="images/deco/icone_authenticite.png"alt="vins authentiques" OnMouseOver="document.getElementById('img_authentiques').src='images/deco/icone_authenticite_blc.png'" OnMouseOut="document.getElementById('img_authentiques').src='images/deco/icone_authenticite.png'"/></a></p>
        </div>
      </div>
      <!-- fin de la partie haute du footer ------->
      <div class="ombre"></div>
      <!--partie basse du footer--------->
      <div class="footer_bottom">
        <div class="Network">Rejoignez-nous!</div>
        <div class="socialicones"><a href="#"><img src="images/deco/twitter.png"alt="twitter"/></a><a href="#"><img src="images/deco/facebook.png"alt="facebook"/></a></div>
        <div id="copyright">
          <p><a href="conditions_generales.html">Conditions g�n�rales de ventes</a> - 2012 - C.A.V.A. - All rights reserved.</p>
        </div>
      </div>
      <!---fin de la partie basse du footer --------------> 
    </footer>
    <!---------- FIN DU FOOTER -------------------------------------------------------------------------------------------------------------------------> 
    
  </div>
  <!-- fin du container --> 
  
</div>
<!-- fin du wrapper------------------->
</body>

<!-- Mirrored from www.smartgraphics.be/cava/nosvins.html by HTTrack Website Copier/3.x [XR&CO'2010], Sun, 24 Feb 2013 08:02:19 GMT -->
</html>