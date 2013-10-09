<?php session_start(); ?>

<?php require_once 'bdd.php' ?>

<!--on inclut le header-->
<?php include("header.php"); ?>

                <!--on inclut la navigation-->
				<div id="left">
                    <?php include("nav.php"); ?>
                </div>

<?php 
	// ouverture connexion
	$CAD = new CAD();
	$bdd = $CAD->openCNX();
    // requete permettant de récupérer les infos utilisateur dans la base de données
	$query = " SELECT * 
			FROM `utilisateur`";
             //WHERE `utilisateur`.`Login_Utilisateur`='" .$_SESSION['Login_Utilisateur']."'";
	$response = $bdd->query($query);		
	// on stocke le résultat dans $row
    $row = $response->fetch(PDO::FETCH_ASSOC);
?>
	   
				<!--au centre, le formulaire permettant au client de modifier les informations de son compte-->
				<div id="right">
					<img src="images/welcome.jpg" width="596" height="196" alt=""/>
					<div class="news">Informations g&eacute;n&eacute;rales</div>
					<div class="fond_contenu">
						<form method="post" action="controller_compte.php" name="form">
							<div class="fond_contenu">
								<table class="form">
									<tr>
										<td style="width:270px;"><label for="login">Adresse mail (login) : </label></td>
										<td><input type="text" id="login" name="login" maxlength="255"  style="width:200px;" value=<?php echo $row['Login_Utilisateur']; ?> /></td>
									</tr>
									<tr>
										<td><label for="mdp">Mot de passe : <?php echo $row['Login_Utilisateur']; ?></label></td>
										<td><input type="password" id="mdp" name="mdp"  style="width:200px;" value=<?php echo $row['Mdp_Utilisateur']; ?> /></td>
									</tr>
									<tr>
										<td><label for="mot_de_passe2">Veuillez retaper votre mot de passe :</label></td>
										<td><input type="password" id="mot_de_passe2" name="mot_de_passe2" style="width:200px;" /></td>
									</tr>
									<tr>
										<td><label for="nom">Nom :</label></td>
										<td><input type="text" id="nom" name="nom"  style="width:200px;" value=<?php echo $row['Nom_Utilisateur']; ?>/></td>
									</tr>
									<tr>
										<td><label for="prenom">Pr&eacute;nom :</label></td>
										<td><input type="text" id="prenom" name="prenom" style="width:200px;" value=<?php echo $row['Prenom_Utilisateur']; ?>/></td>
									</tr>
									<tr>
										<td><label for="telephone">T&eacute;l&eacute;phone :</label></td>
										<td><input type="text" id="telephone" name="telephone" style="width:200px;" value=<?php echo $row['Tel_Utilisateur']; ?>/></td>
									</tr>
									<tr>
										<td><label for="adresse">Adresse :</label></td>
										<td><input type="text" id="adresse" name="adresse"  style="width:200px;" value=<?php echo $row['Adresse_Utilisateur']; ?>/></td>
									</tr>
									<tr>
										<td><label for="cp">Code postal :</label></td>
										<td><input type="text" id="cp" name="cp"  maxlength="5" style="width:200px;" value=<?php echo $row['Cp_Utilisateur']; ?>/></td>
									</tr>
									<tr>
										<td><label for="ville">Ville :</label></td>
										<td><input type="text" id="ville" name="ville"  style="width:200px;" value=<?php echo $row['Ville_Utilisateur']; ?>/></td>
									</tr>
									<tr>
										<td><label for="pays">Pays :</label></td>
										<td><input type="text" id="pays" name="pays"  style="width:200px;" value=<?php echo $row['Pays_Utilisateur']; ?>/></td>
									</tr>
								</table>
								<!--bouton de validation des modifications-->
								<p style="text-align:center;"><br /><input type="submit" name="inscription" value="Modifier" /></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

<!--on inclut le pied de page-->
<?php include("footer.php"); ?>