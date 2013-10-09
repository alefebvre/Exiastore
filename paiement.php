<?php session_start(); ?>

<?php require_once 'bdd.php' ?>

<?php require_once 'controller_panier.php' ?>

<!--on inclut le header-->
<?php include("header.php"); ?>

                <!--on inclut la navigation, à gauche-->
				<div id="left">
                    <?php include("nav.php"); ?>
                </div>
	   
                <!--au centre, on affiche le formulaire permettant au client de choisir son type de paiement 
				et d'indiquer ses infos bancaires -->
				<div id="right">
                    <img src="images/welcome.jpg" width="596" height="196" alt=""/>
                    <div class="news">Votre commande</div>
                    <div class="fond_contenu">
                          </br>
                        <form method="post" action="controller_paiement.php">
                            <table class="form">
                                <tr>
                                    <td><label for="type">Type de carte :</label></td>
                                    <td>
                                        <select name="type">
                                            <option value="Visa">Visa</option>
                                            <option value="MasterCard">MasterCard</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="cb">Numéro de carte bancaire (10 caractères):</label></td>
                                    <td><input type="text" id="cb" name="cb" style="width:200px;" maxlength="10" /></td>
                                </tr>
                                <tr>
                                    <td><label for="date_cb">Date d'expiration : (MM/AA)</label></td>
                                    <td>
                                        <input type="text" id="date_cb" name="date_cb"  style="width:200px;" />
                                    </td>
                                                                      
                                </tr>
                                <tr>
                                <td><label for="crypt">Clé de Cryptage (3 caractères): </label></td>
                                    <td>
                                        <input type="text" id="crypt" name="crypt"  style="width:200px;"  maxlength="3"/>
                                    </td>
                                   </tr>
                            </table>
                            <input type="submit" name="valider" value="Valider" onClick="validerCB(this.form)";>
							  	<script language="javascript" src="scriptCB.js"></script>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
		
<!--on inclut le pied de page-->
<?php include("footer.php"); ?>