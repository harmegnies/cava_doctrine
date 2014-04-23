<?php
require_once 'autoloader.php';
try {
$cache = "cache";
$dir_search1 = "./classesDoctrine";
$dir_search2 = "./vendor/doctrine"; // pour les classes doctrine
$autoloader = DirectoriesAutoloader::instance ($cache)->addDirectory($dir_search1,true)->addDirectory ($dir_search2,true);
spl_autoload_register (array ($autoloader, 'autoload')); //api spl
}
catch (DirectoriesAutoloaderException $e){
echo $e->getMessage();
}

$paths = array("classesDoctrine");
$isDevMode = true; 
// the connection configuration
$dbParams = array(
    'driver'    => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'cavadbmain',
	'charset' => 'utf8',
    'driverOptions' => array(
     1002=>'SET NAMES utf8'));

// créer des alias ...
// on en peut créer un alias à partir d'un alias
// il est possible de créer directement un alias pour une classe au lieu d'un espace de noms

/* il est possible d’utiliser le mot-clef use sans utiliser as : 
le nom de l’alias sera alors automatiquement construit 
à partir de la dernière composante du nom de l’espace de noms
*/
// pas de use dynamique

use Doctrine\ORM\Tools as T;
use Doctrine\ORM as O;
 
$config = T\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = O\EntityManager::create($dbParams, $config);
// création d'une variable que l'on pourra utiliser dans notre code pour la persistance de nos objets Métier
?>