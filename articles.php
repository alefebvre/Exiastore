<?php session_start(); ?>   <!--Fichier Vue permettant l'affichage final des articles dans la page boutique du site-->

<!--on inclut la connexion à la base de données-->
<?php require_once 'bdd.php' ?>  

<!--on inclut le fichier contenant le header-->
<?php include("header.php"); ?>

				<!--on inclut le fichier contenant la navigation à laquelle on applique un style grâce à l'id left-->
                <div id="left">
                    <?php include("nav.php"); ?>
                </div>
                
                <div id="right">
                    <img src="images/welcome.jpg" width="596" height="196" alt=""/>
                    <div class="news">Boutique </div>
                    <div class="fond_contenu">
                    </br>
                        <center>
						<!--en tête du tableau qui affichera les articles (1 colonne pour les titres, 1 colonne pour les prix)-->
                            <table style="border:2px solid black; border-collapse:collapse;">
                                <tr style="border:2px solid black; border-collapse:collapse;">
                                	<td style="border:2px solid black; border-collapse:collapse; width:200px;">Catégorie</th>
                                	<td style="border:2px solid black; border-collapse:collapse; width:200px;"> Titre </td>
                                	<td style="border:2px solid black; border-collapse:collapse; width:200px;"> Prix </td>
                                </tr>
                            </table>
<?php
    // on ouvre la connexion à la base de données
	$CAD = new CAD();
    $bdd = $CAD->openCNX();
	// on stocke la requete dans la variable $response
    $response = $bdd->query("SELECT c.ID_Categorie,c.Nom_Categorie,a.ID_Categorie,a.ID_Article,a.Nom_Article,a.Prix_Article FROM article a,categorie c WHERE a.ID_Categorie = c.ID_Categorie");
	// $rows va contenir tous les résultats de la requête 
    $rows = $response->fetchAll(PDO::FETCH_ASSOC);
    // pour chaque enregistrement, on inclut une nouvelle ligne dans le tableau grâce au fichier one_article
	foreach ($rows as $row) {
    	include 'one_article.php';
    }
?>
                        </center>
                    </div>
                </div>
            </div>
        </div>

<!--on inclut le fichier contenant le footer-->
		<?php include("footer.php"); ?>