<?php

class CAD
{
    private $bdd;
	// fonction permettant d'ouvrir le connexion à la base de données
	function openCNX()
	{
	$this->bdd=null;
		// on essaye d'ouvrir la connexion en PDO en instanciant un nouvel objet
		try
		{
			$this->bdd = new PDO('mysql:host=localhost;dbname=exiastore', 'root', '');
		}
		// gestion des erreurs si la connexion a échoué
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		return $this->bdd;
	}
	
	// fonction permettant la fermeture de la connexion
	function closeCNX()
	{
		$this->bdd=null;
	}
}

?>