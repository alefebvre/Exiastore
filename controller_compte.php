<?php    session_start();
$login = $_SESSION['text_login'];

require_once('bdd.php');

require_once('model_user.php');

$login = $_POST['login'];
$mdp = $_POST['mdp'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];
$cp = $_POST['cp'];

$user = new User;
$modifiercompte = $user->modifiercompte($login, $mdp, $nom, $prenom, $telephone, $adresse, $cp, $ville, $pays);


?>