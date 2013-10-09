<?php session_start(); ?> <!--Page affichant les résultats de la recherche effectuée par l'utilisateur-->

<?php require_once 'bdd.php'; ?>

<?php require_once 'controller_recherche.php'; ?>

<?php include("header.php"); ?>

                <!--on inclut la navigation, à gauche-->
				<div id="left">
                    <?php include("nav.php"); ?>
                </div>

                <!--au centre, on fait afficher les résultats de la recherche-->
				<div id="right">
                    <img src="images/welcome.jpg" width="596" height="196" alt=""/>
                    <div class="news">Recherche</div>
                    <div class="fond_contenu">
                        <center>
                            <?php 
								// si la variable contenant tout les résultats renvoyés par la requete ($rows) n'est pas vide
								// ie si la recherche est concluante, on fait afficher l'en-tete d'un tableau
                                if(!empty($rows)) {
                            ?>
                                <table style="border:2px solid black; border-collapse:collapse;">
                                    <tr style="border:2px solid black; border-collapse:collapse;">
                                        <td style="border:2px solid black; border-collapse:collapse; width:200px;"> Titre </td>
                                        <td style="border:2px solid black; border-collapse:collapse; width:200px;"> Prix </td>
                                    </tr>
                                </table>
                            <?php
                                    // et pour chaque enregistrement renvoyé par la requete, on fait afficher une nouvelle ligne dans le tableau
									foreach ($rows as $row) {
                                        include 'one_article.php';
                                    }
                                }
                            ?>
                        </center>
                    </div>
                </div>
            </div>
        </div>

<?php include("footer.php"); ?>