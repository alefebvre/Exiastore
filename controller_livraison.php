<?php

// pour l'adresse, le code postal, la ville et le pays :
// si les variables stockant ces valeurs sont vides, on affecte à ces variables les valeurs que le client a entré
if(!empty($_POST['adresse'])) {
	$_SESSION['livraison']['adresse'] = $_POST['adresse'];
}
if(!empty($_POST['cp'])) {
	$_SESSION['livraison']['cp'] = $_POST['cp'];
}
if(!empty($_POST['ville'])) {
	$_SESSION['livraison']['ville'] = $_POST['ville'];
}
if(!empty($_POST['pays'])) {
	$_SESSION['livraison']['pays'] = $_POST['pays'];
}

// on redirige ensuite vers la page qui va indiquer à l'utilisateur que sa commande a bien été prise en compte et qu'il recevra un mail de confirmation
header("Location: paiement.php"); exit;