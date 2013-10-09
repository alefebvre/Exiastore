<?php session_start(); ?>

<!--on inclut le header, en haut de page-->
<?php include("header.php"); ?>

                <!--à gauche, on inclut la navigation-->
				<div id="left">
                    <?php include("nav.php"); ?>
                </div>
	   
                <!--au centre, on affiche tout ce qui permettrait à l'utilisateur de contacter la société pour une question ou un éventuel problème-->
				<div id="right">
                    <img src="images/welcome.jpg" width="596" height="196" alt=""/>
                    <div class="news">Nous contacter</div>
                    <div class="fond_contenu">
                        <br />
                        <span>Nous joindre :</span>
                        <br /><br /><br />
                        <a id="fiched" style="color:#811212"> T&eacute;l&eacute;phone : </a>03.21.57.96.31
                        <br /></br></br> 
                        <a id="fiched" style="color:#811212">Adresse : </a> 7 rue diderot ARRAS 62000
                        <br /><br /><br />
                        <a id="fiched" style="color:#811212">E-mail :</a> <a href="mailto:contact@exiastore.fr">contact@exiastore.fr </a>
                        <br /><br />
                    </div>
                </div>
            </div>
        </div>

<!--on inclut le pied de page-->
		<?php include("footer.php"); ?>