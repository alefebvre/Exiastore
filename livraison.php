<?php session_start(); ?>

<?php require_once 'bdd.php' ?>

<!--appel du fichier qui va se charger de la gestion des infos de l'utilisateur, rapport à son panier-->
<?php require_once 'controller_panier.php' ?>

<?php include("header.php"); ?>

                <!--navigation, à gauche-->
				<div id="left">
                    <?php include("nav.php"); ?>
                </div>
	   
				<!--centre-->
				<!--formulaire pour que l'utilisateur indique son adresse de livraison -->
				<div id="right">
                    <img src="images/welcome.jpg" width="596" height="196" alt=""/>
                    <div class="news">Vos informations de livraison</div>
                    <div class="fond_contenu">
                        <form method="post" action="controller_livraison.php">
                            <table class="form">
                                <tr>
                                    <td><label for="adresse">Adresse :</label></td>
                                    <td><input type="text" id="adresse" name="adresse" style="width:200px;" /></td>
                                </tr>
                                <tr>
                                    <td><label for="cp">Code postal :</label></td>
                                    <td><input type="text" id="cp" name="cp"  maxlength="5" style="width:200px;" /></td>
                                </tr>
                                <tr>
                                    <td><label for="ville">Ville :</label></td>
                                    <td><input type="text" id="ville" name="ville"  style="width:200px;" /></td>
                                </tr>
                                <tr>
                                    <td><label for="pays">Pays :</label></td>
                                    <td><input type="text" id="pays" name="pays"  style="width:200px;" /></td>
                                </tr>
                            </table>
                        </form>
						<!--le bouton "Régler ma commande" envoie vers la page permettant 
						au client de choisir son mode de paiement et d'entrer ses infos bancaires-->
                        <a href="paiement.php" title="R&eacute;gler ma commande"><button type="button">R&eacute;gler ma commande</button></a>
                    </div>
                </div>
            </div>
        </div>

<?php include("footer.php"); ?>