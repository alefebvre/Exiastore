<?php session_start(); ?> <!--Page permettant d'indiquer à l'utilisateur qu'il est bien connecté et peut commencer à remplir son panier-->

<!--on inclut le header contenu dans le fichier header.php-->
<?php include("header.php"); ?>

                <!--on inclut la navigation sur le coté gauche-->
				<div id="left">
                    <?php include("nav.php"); ?>
                </div>
				
				<!--au centre-->
                <div id="right">
                    <img src="images/welcome.jpg" width="596" height="196" alt=""/>
                    <div class="news">Connexion</div>
                    <div class="fond_contenu">
                    <br /><br /><br />
                    <center>
                        <!--on confirme à l'utilisateur qu'il a bien réussi à se connecter (login et mdp corrects)-->
						<p> Vous &ecirc;tes maintenant connect&eacute; ! Vous pouvez commencer vos achats ! </p>
                    </center>
                    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                </div>
            </div>
        </div>
    </div>

<!--on inclut le pied de page-->
	<?php include("footer.php"); ?>