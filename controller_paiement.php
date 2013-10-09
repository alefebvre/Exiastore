<?php  // on fait appel à la fonction de suppression du panier dans le fichier model_panier.php que l'on inclut
// puis on indique au client que sa livraison a bien été prise en compte

session_start();

include("model_panier.php");

supprimePanier();

echo '<script> alert(\' Votre commande a été prise en compte, vous allez recevoir un email de confirmation !\'); document.location.href="index.php"; </script>';