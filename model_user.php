<?php // modele contenant les requêtes pour l'authentification, l'inscription et la modification du compte de l'utilisateur

class User
{
	//déclaration de toutes les variables nécéssaires
	private $CAD;
	private $login;
	private $mdp;
	private $nom;
	private $prenom;
	private $dateNaissance;
	private $telephone;
	private $adresse;
	private $cp;
	private $ville;
	private $pays;
	/*private $article;
	private $dateEdition;
	private $auteur;
	private $information;
	private $etat;*/


	public function authentification($login, $mdp)
	{
		// ouverture connexion
		$this->CAD = new CAD();
		$bdd = $this->CAD->openCNX();
		// requete verifiant que l'utilisateur existe dans la base et que ses login et mdp correspondent bien
		$reponse = $bdd->query("SELECT Login_Utilisateur FROM utilisateur WHERE Login_Utilisateur ='".$login."' AND Mdp_Utilisateur = '".$mdp."'");
		$row = $reponse->fetch(PDO::FETCH_ASSOC);
		$reponse = NULL;
		// sécurisation 
		$reponse = htmlentities($row['Login_Utilisateur']);
		// fermeture connexion
		$this->CAD->closeCNX();
		return $reponse;
	}

	public function inscription($login, $mdp, $nom, $prenom, $telephone, $adresse, $cp, $ville, $pays)
	{	
		// ouverture connexion
		$this->CAD = new CAD();
		$bdd = $this->CAD->openCNX();
		// requete permettant à l'utilisateur d'entrer ses infos dans la base de données
		$reponse = $bdd->exec("INSERT INTO utilisateur(Nom_Utilisateur, Prenom_Utilisateur, Adresse_Utilisateur, Ville_Utilisateur, Cp_Utilisateur, Pays_Utilisateur, Tel_Utilisateur, Login_Utilisateur, Mdp_Utilisateur ) VALUES ('".$nom."', '".$prenom."', '".$adresse."', '".$ville."', '".$cp."', '".$pays."', '".$telephone."', '".$login."','".$mdp."')"); 
		// fermeture connexion
		$this->CAD->closeCNX();
		return $reponse;
	}

	public function compte($login, $mdp, $nom, $prenom, $telephone, $adresse, $cp, $ville, $pays)
	{
		// ouverture connexion
		$this->CAD = new CAD();
		$bdd = $this->CAD->openCNX();
		// requete permettant à l'utilisateur de modifier les info qu'il a saisies qu moment de son inscription
		$reponse = $bdd->exec("UPDATE utilisateur SET Nom_Utilisateur = '".$nom."', Prenom_Utilisateur = '".$prenom."', Adresse_Utilisateur = '".$adresse."', Ville_Utilisateur = '".$ville."', Cp_Utilisateur = '".$cp."', Pays_Utilisateur = '".$pays."', Tel_Utilisateur = '".$telephone."', Login_Utilisateur = '".$login."', Mdp_Utilisateur  = '".$mdp."'"); 
		// fermeture connexion
		$this->CAD->closeCNX();
		return $reponse;
	} 
	
	public function modifierCompte($login, $mdp, $nom, $prenom, $telephone, $adresse, $cp, $ville, $pays)
	{		
		// ouverture connexion
		$this->CAD = new CAD();
		$bdd = $this->CAD->openCNX();
		// requete permettant à l'utilisateur de modifier les info qu'il a saisies au moment de son inscription
		$reponse = $bdd->exec("UPDATE utilisateur SET Nom_Utilisateur = '".$nom."', Prenom_Utilisateur = '".$prenom."', Adresse_Utilisateur = '".$adresse."', Ville_Utilisateur = '".$ville."', Cp_Utilisateur = '".$cp."', Pays_Utilisateur = '".$pays."', Tel_Utilisateur = '".$telephone."', Login_Utilisateur = '".$login."', Mdp_Utilisateur  = '".$mdp."' WHERE Nom_Utilisateur ='".$login."' "); 
		// fermeture connexion
		$this->CAD->closeCNX();
		return $reponse;
	}

}
?>