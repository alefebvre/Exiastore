</br>

<!--Menu principal, accessible par n'importe quel utilisateur, connecté ou non -->
<div class="titre_menu">Menu</div>

<ul>
   <li><a href="index.php" title="">Accueil</a></li>
   <li><a href="articles.php" title="">Boutique</a></li>           
   <li><a href="sav.php" title="">SAV</a></li>
</ul>
<br />

<!-- Menu de bienvenue, qui n'apparaît que si l'utilisateur est connecté (si session démarrée)
Celui-ci peut alors modifier les infos de son compte et remplir un panier;
il peut également se déconnecter de sa session -->
<?php 
if(isset($_SESSION['text_login'])) { 
    if(!empty($_SESSION['text_login'])) {
?>
<div class="titre_menu">Bienvenue</div>
<ul>
    <li><a href="compte.php" title="">Mon Compte</a></li>
    <li><a href="panier.php" title="">Mon Panier</a></li>
</ul>
<br /><br />
<!--le bouton déconnexion envoie vers le controleur qui va permettre la fermeture de la session-->
<form action="controller_deconnexion.php" method="post">
   <input type="submit" value="Deconnexion" name="deconnexion"/>
</form>

<?php 
    } else { // sinon, ie si l'utilisateur n'est pas connecté, il ne peut ni modifier les infos de son compte,
			// ni effectuer de commande; on lui propose en revanche de se connecter, ou de s'inscrire
?>    
<form action="controller_connexion.php" method="post">
    <!--formulaire d'authentification-->
	<div class="titre_menu">Connexion</div>
    <ul>
        <li><p>Identifiant:</p></li>
        <li><input type="textbox" name="text_login" /></li>
        <li><p>Mot de passe</p></li>
        <li><input type="password" name="text_mdp" /></li>
        <li><input type="submit" name="button_Connexion" value="Connexion"></li>
        <br />
		<!--lien envoyant vers la page d'inscription-->
        <a href="inscription.php"><p>Vous n'&ecirc;tes pas encore inscrit, cliquez ici !</p></a>
    </ul>
<?php 
    } 
?>

<?php 
} else {
?>
<form action="controller_connexion.php" method="post">
    <div class="titre_menu">Connexion</div>
        <ul>
            <li><p>Identifiant:</p></li>
            <li><input type="textbox" name="text_login" /></li>
            <li><p>Mot de passe</p></li>
            <li><input type="password" name="text_mdp" /></li>
            <li><input type="submit" name="button_Connexion" value="Connexion"></li>
            <br />
            <a href="inscription.php"><p> Vous n'&ecirc;tes pas encore inscrit, cliquez ici ! </p></a>
        </ul>
<?php } ?>
</form>
<br />
<!--barre de recherche-->
<form action="recherche.php" method="post">
    <div class="titre_menu">Recherche</div>

    <ul>
        <li><p>Recherche :</p></li>
        <li><input type="textbox" name="texte_recherche" /></li>
        <li><p>Crit&egrave;res :</p></li>
        <li>
            <select name="type_recherche">
            	<option value=""></option>
                <option value="2">CD</option>
            	<option value="1">DVD</option>
        	</select>
        </li>
        <br />
        <li><input type="submit" name="recherche" value="Recherche"></li>
    </ul>
</form>