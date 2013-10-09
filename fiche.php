<?php session_start(); ?>

<!--ouverture connexion-->
<?php require_once 'bdd.php' ?>

<?php require_once 'controller_panier.php' ?>

<!--on inclut le header-->
<?php include("header.php"); ?>

                <!--on inclut la navigation, à gauche-->
				<div id="left">
                    <?php include("nav.php"); ?>
                </div>
	   
                <!--centre, dans lequel sera affiché le résultat de la requete-->
				<div id="right">
                    <img src="images/welcome.jpg" width="596" height="196" alt=""/>
                    <div class="news">Description</div>
                    <div class="fond_contenu">
                    </br>
<?php 
	// ouverture connexion
	$CAD = new CAD();
	$bdd = $CAD->openCNX();
    // requete permettant de faire afficher dans la fiche détaillée d'un article toutes les infos concernant cet article 
	$query = "
              SELECT `article`.*, `description_article`.*, `etat`.*
              FROM `article`
              LEFT JOIN `description_article` ON `article`.`ID_Article` = `description_article`.`ID_Article`
              LEFT JOIN `etat` ON `article`.`ID_Etat` = `etat`.`ID_Etat`
              WHERE `article`.`ID_Article`=".intval($_GET['id_article']);
	$response = $bdd->query($query);		
	// on stocke le résultat de la jointure dans $row
    $row = $response->fetch(PDO::FETCH_ASSOC);
	// on inclut le fichier permettant l'affichage en lui-même du résultat
    include 'fiche_detail.php';
?>
                    </div>
                </div>
            </div>
        </div>

<!--on inclut le fichier contenant le footer-->
		<?php include("footer.php"); ?>