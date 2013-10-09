<?php session_start(); ?>  <!--Page contenant le récapitulatif du panier du client -->

<?php require_once 'bdd.php' ?>

<?php require_once 'controller_panier.php' ?>

<?php include("header.php"); ?>

                <!--à gauche, la navigation-->
				<div id="left">
                    <?php include("nav.php"); ?>
                </div>
	   
                <!--au centre, le récapitulatif de la commande-->
				<div id="right">
                      
                    <img src="images/welcome.jpg" width="596" height="196" alt=""/>
                    <div class="news">Votre commande</div>
                    <div class="fond_contenu">
                    </br>
						<!--Tableau d'une seule ligne qui va contenir l'en tête du tableau -->
                        <table style="width: 400px">
                        	<tr>
                        		<td>Libell&eacute;</td>
                        		<td>Quantit&eacute;</td>
                                <td>Prix Unitaire</td>
                        		<td>Prix Total</td>
                        	</tr>
                        	<?php
                        	// si le panier est crée
							if(creationPanier())
                        	{
                                // on compte le nombre total d'articles
								$nbArticles=count($_SESSION['panier']['libelleProduit']);
                                // si ce compte est égal à 0, le panier est vide
								if ($nbArticles <= 0) {
                                    echo "<tr><td>Votre panier est vide </ td></tr>";                                        
                                } else { // sinon, pour chaque article différent, on affiche son libellé, sa quantité, le prix unitaire 
								//et le prix en fontion de la quantité dans une nouvelle ligne du tableau
                                    for ($i=0 ;$i < $nbArticles ; $i++)                                    
                                    {
                                        echo "<tr>";
                                        echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
                                        echo "<td>".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."</td>";
                                        echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."\neuros</td>";
                                        echo "<td>".$_SESSION['panier']['prixProduit'][$i] * $_SESSION['panier']['qteProduit'][$i]."\neuros</td>";
                                        echo "</tr>";
                                    }
                                }
								// affichage du montant global
                                echo "<tr height='15'></tr>";
								echo "<tr><td> <p>Frais de Port</p></td><td>1</td><td>Gratuit</td> <td>Gratuit</td></tr>";
                                echo "<tr><td colspan='3'></td><td>Total : ".MontantGlobal()."\neuros</td></tr>";
                        	}
                        	?>
					   </table>
						<!--indique la date de livraison prévisionnelle-->
                        Date de livraison : <?php echo date('d-m-Y', strtotime("+4 day")); ?>
						<!--bouton renvoyant vers une page permettant au client de saisir une adresse de livraison-->
                        <a href="livraison.php" title="Informations de livraison"><button type="button">Suivant</button></a>
                    </div>
                </div>
            </div>
        </div>

<?php include("footer.php"); ?>