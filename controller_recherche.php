<?php

// si la variable contenant ce que l'internaute a entré dans la barre de recherche existe et qu'elle n'est pas  vide
if(isset($_POST['texte_recherche']) and !empty($_POST['texte_recherche'])) {
	// ouverture connexion
	$CAD = new CAD();
	$bdd = $CAD->openCNX();
	// si l'utilisateur a séléctionné un critère (ici CD ou DVD, sauvegardé en mémoire dans type_recherche)
	if(isset($_POST['type_recherche']) and !empty($_POST['type_recherche'])) {
		// on cherche dans la table article de la bdd tout enregistrement qui va être égal à ce que l'utilisateur a entré dans la barre de recherche selon le critère demandé
		// ou qui va commencé par ce que l'utilisateur a entré dans la barre de recherche (grâce au %) selon le critère demandé 
		$reponse = $bdd->query("SELECT * FROM `article` WHERE `Nom_Article` LIKE '" . $_POST['texte_recherche'] . "%' AND `ID_Categorie` = " . intval($_POST['type_recherche']));
	} else { // sinon (si l'utilisateur n'a pas choisi comme critère CD ou DVD), on effectue la recherche pour les deux types d'articles CD et DVD
		$reponse = $bdd->query("SELECT * FROM `article` WHERE `Nom_Article` LIKE '" . $_POST['texte_recherche'] . "%'");	
	}
	// on enregistre dans $rows tous les résultats renvoyés par la requête
	$rows = $reponse->fetchAll(PDO::FETCH_ASSOC);
}