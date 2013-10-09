<?php session_start(); ?>

<?php require_once 'bdd.php' ?>

<!--on inclut le fichier contenant le header-->
<?php include("header.php"); ?>

                <!--on inclut le fichier contenant la navigation, à gauche-->
				<div id="left">
                    <?php include("nav.php"); ?>
                </div>
	   
                <!--au centre-->
				<div id="right">
                    <img  src="images/welcome.jpg" width="596" height="196" alt=""/>
                    <div class="news">Nouveaut&eacute;s :</div>
                    
                   
                    <!--tableau pour en-tête du tableau qui contiendra toutes les nouveautés-->
					<div class="fond_contenu">
                    <center>
                    </br>
                            <table style="border:2px solid black; border-collapse:collapse;">
                                <tr style="border:2px solid black; border-collapse:collapse;">
                                    <td style="border:2px solid black; border-collapse:collapse; width:200px;">Catégorie</td>
                                	<td style="border:2px solid black; border-collapse:collapse; width:200px;"> Titre </td>
                                	<td style="border:2px solid black; border-collapse:collapse; width:200px;"> Prix </td>
                                </tr>
                            </table>
                       <?php
	// ouverture connexion 				   
    $CAD = new CAD();
    $bdd = $CAD->openCNX();
	// requete pour afficher uniquement les articles classés en tant que nouveautés (ID_Etat=4)
    $response = $bdd->query("SELECT categorie.ID_Categorie,categorie.Nom_Categorie,article.ID_Categorie,article.ID_Article,article.Nom_Article,article.Prix_Article 
							FROM article
							LEFT JOIN etat ON article.ID_Etat = etat.ID_Etat
 							LEFT JOIN categorie ON article.ID_Categorie = categorie.ID_Categorie
                            WHERE etat.ID_Etat=4;");
	// récupération de l'ensemble des résultats dans un tableau 
    $rows = $response->fetchAll(PDO::FETCH_ASSOC);
    // pour chaque enregistrement trouvé, on fait afficher une nouvelle ligne dans le tableau qui se trouve dans le fichier one_article
	foreach ($rows as $row) 
	{
        include 'one_article.php';
    }
?>

                    </div>
                </div>
            </div>
        </div>
<!--on inclut le pied de page-->
<?php include("footer.php"); ?>