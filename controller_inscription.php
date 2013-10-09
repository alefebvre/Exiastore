<?php 

require_once('bdd.php');

require_once('model_user.php');

// on affecte aux varaibles les valeurs entrées par l'utilisateur
$login = $_POST['login'];
$mdp = $_POST['mdp'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];
$cp = $_POST['cp'];

// si au moins des champs est vide, on demande à l'utilisateur de remplir tout les champs
if (empty($login) || empty($mdp) || empty($nom) || empty($prenom) || empty($telephone) || empty($adresse) || empty($ville ) || empty($pays) || empty($cp))
{
	echo '<script> alert(\' Veuillez completer tout les champs !\');</script> ';
}

// on instancie un nouvel objet de la classe utilisateur pour appeler la fonction d'inscription
$user = new User();
$inscription = $user->inscription($login, $mdp, $nom, $prenom, $telephone, $adresse, $cp, $ville, $pays);

// si la requete ne s'est pas correctement effectuée, le login existe deja, on redirige vers l'accueil
if(!$inscription) {
	echo '<script> alert(\' Le login existe deja !\'); </script> ';
} else {
	header("Location: index.php");
	exit;
}