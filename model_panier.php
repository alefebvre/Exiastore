<?php

function creationPanier(){
	// on regarde si le panier existe, sinon on le crée 
    if (!isset($_SESSION['panier'])){
        $_SESSION['panier']=array(); // ce sera en fait un tableau
        $_SESSION['panier']['libelleProduit'] = array();
        $_SESSION['panier']['qteProduit'] = array();
        $_SESSION['panier']['prixProduit'] = array();
    }
    return true;
}

function ajouterArticle($libelleProduit,$qteProduit,$prixProduit){

    //On vérifie que le panier existe via la fonction précédente 
	if (creationPanier())
    {
        $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

        //On regarde si l'article existe déjà : si oui on augmente sa quantité dans le panier ...
		if ($positionProduit !== false)
        {
            $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
        }
        // ... si non on l'ajoute
		else
        {
            array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
            array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
            array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
        }
    } else {
        echo "Un problème est survenu. Veuillez contacter l'administrateur du site.";    
    }
}

function modifierQTeArticle($libelleProduit,$qteProduit){
    // On vérifie que le panier existe via la fonction creationPanier()
	if (creationPanier())
    {
        //Si la quantité demandée pour un produit est supérieure à 0 ...
		if ($qteProduit > 0)
        {
            // ... recherche du produit dans le panier ...
			$positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

            // ... et on modifie la quantitée
			if ($positionProduit !== false)
            {
                $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
            }
        }
        //Sinon, ie si la quantité est négative ou nulle, cela revient à dire que l'on supprime l'article 
		else { 
            supprimerArticle($libelleProduit);        
        }
    } else {
        echo "Un problème est survenu. Veuillez contacter l'administrateur du site.";
    }
}

function supprimerArticle($libelleProduit){
    //On vérifie que le panier existe via la fonction creationPanier()
	if (creationPanier())
    {
        //On crée un panier "tampon" qui va être notre panier sans les éléments à supprimer
		$tmp=array();
        $tmp['libelleProduit'] = array();
        $tmp['qteProduit'] = array();
        $tmp['prixProduit'] = array();

        // On remplit ce panier "tampon"
		for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
        {
            if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
            {
                array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
                array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
                array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
            }
        }
        // On réaffecte notre panier via les valeurs du panier tampon, ie on remplace le panier en session par le panier temporaire à jour  ... 
		$_SESSION['panier'] =  $tmp;
        // on supprime le panier temporaire
		unset($tmp);
    } else {
        echo "Un problème est survenu. Veuillez contacter l'administrateur du site.";        
    }
}

// fonction de calcul du montant total 
function MontantGlobal(){
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
    {
        $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
    }
    return $total;
}

// fonction de suppresion totale (ou rafraîchissement) du panier
function supprimePanier(){
   unset($_SESSION['panier']);
}

// fonction permettant de compter le nombre d'articles différents dans le panier : 
function compterArticles()
{
    if (isset($_SESSION['panier'])) {
        return count($_SESSION['panier']['libelleProduit']);
    } else {
        return 0;        
    }
}