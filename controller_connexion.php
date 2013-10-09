<?php 

require_once('bdd.php');

require_once('model_user.php');

// on affecte aux varaibles $login et $mdp les valeurs entrées par l'utilisateur
$login = $_POST['text_login'];
$mdp = $_POST['text_mdp'];

// si l'un des deux champs dans le formulaire de connexion est vide, on demande à l'utlisateur de remplir tout les champs
// et on le redirige vers la page d'accueil
if (empty($login) || empty($mdp))
{
	echo '<script> alert(\' Veuillez completer tout les champs !\'); document.location.href="../index.php"; </script>';
}

// on instancie un nouvel objet de la classe utilisateur pour appeler la fonction d'authentification
$user = new User;
$connexion = $user->authentification($login, $mdp);

// si la requete ne retourne rien, on indique à l'utilisateur qu'il doit s'inscrire et on le redirige vers la page d'accueil
if ($connexion == NULL)
{
	echo '<script> alert(\' Connexion impossible, vous n\etes pas inscrit !\'); document.location.href="index.php"; </script>';
} else {
	// sinon on démarre une session contenant l'identifiant de l'utilisateur en mémoire
	// et on redirige vers une page indiquant à l'utilisateur qu'il est bien connecté et qu'il peut alors commencer ses achats
	session_start();
	$_SESSION['text_login'] = $login;
	header("Location: connecter.php");
	exit;
}