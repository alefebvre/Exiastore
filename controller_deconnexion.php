<?php 
	// on détruit la session de l'utilisateur (avec les variables - ici l'identifiant) 
	// et on redirige vers la page d'accueil, l'utilisateur n'est plus connecté
	if(isset($_POST['deconnexion'])) {
		session_start();
		session_destroy();
		header('Location:index.php');
		exit;		
	}
?>