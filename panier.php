<?php session_start(); ?>

<?php require_once 'bdd.php' ?>

<?php require_once 'controller_panier.php' ?>

<?php include("header.php"); ?>

                <!--à gauche, la navigation-->
				<div id="left">
                    <?php include("nav.php"); ?>
                </div>
	   
                <!--au centre, affichage du panier-->
				<div id="right">
					<img src="images/welcome.jpg" width="596" height="196" alt=""/>
                    <div class="news">Votre panier</div>
                    <div class="fond_contenu">
                        <form method="post" action="">
                            <table style="width: 400px">
                            	</br>
                            	<tr>
                            		<td>Libell&eacute;</td>
                            		<td>Quantit&eacute;</td>
                            		<td>Prix Unitaire</td>
                            		<td>Action</td>
                            	</tr>
                            	<?php
                            	// si le panier est crée 
								if (creationPanier())
                            	{
                                    // on compte le nombre total d'articles
									$nbArticles=count($_SESSION['panier']['libelleProduit']);
                                    // si ce compte est égal à 0, le panier est vide
									if ($nbArticles <= 0) {
                                        echo "<tr><td>Votre panier est vide </ td></tr>";                                        
                                    } else { // sinon, pour chaque article différent, on affiche son libellé, sa quantité et le prix dans une nouvelle ligne du tableau
                                        for ($i=0 ;$i < $nbArticles ; $i++)                                    
                                        {
                                            echo "<tr>";
                                            echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
                                            echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
                                            echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
											// bouton pour supprimer un article
                                            echo '<td><a href="'.htmlspecialchars('panier.php?action=suppression&l='.rawurlencode($_SESSION['panier']['libelleProduit'][$i])).'"> <img src="images/suppr.png"/> </a></td>';
										
                                            
                                        }
										// on affiche le montant global
                                        echo "<tr><td colspan=\"2\"> </td>";
                                        echo "<td colspan=\"2\">";
                                        echo "Total : ".MontantGlobal();
                                        echo "</td></tr>";

                                        // bouton permettant de supprimer le panier en totalité
										echo "<tr><td colspan=\"4\">";
                                        echo "<input type=\"submit\" value=\"Rafraichir\"/>";
                                        echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

                                        echo "</td></tr>";
                                    }
                            	}
                            	?>
                            <!--bouton de validation de la commande, renvoie vers la page récapitulant la commande-->
							</table>
                            <a href="commande.php" title="Valider ma commande"><button type="button">Valider ma commande</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

		<!--on inclut le pied de page-->
		<?php include("footer.php"); ?>