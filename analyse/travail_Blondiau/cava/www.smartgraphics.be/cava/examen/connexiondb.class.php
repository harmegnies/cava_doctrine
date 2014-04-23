<?php
class Connexion 
{
    public function __construct()
	{  
    }
    public static function bdd() 
	{
        try 
		{
            $bdd = new PDO('mysql:host=localhost;dbname=cava', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) 
		{
        die('Erreur : '. $e->getMessage());
        }
            return $bdd;
    }
}
 
?>