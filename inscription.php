<?php session_start(); ?>

<?php require_once 'bdd.php' ?>

<?php include("header.php"); ?>

                <div id="left">
                    <?php include("nav.php"); ?>
                </div>
	   
				<div id="right">
					<img src="images/welcome.jpg" width="596" height="196" alt=""/>
					<div class="news">Inscription</div>
					<div class="fond_contenu">
						<form method="post" action="controller_inscription.php">
							<div class="fond_contenu">
								<table class="form">
									<tr>
										<td style="width:270px;"><label for="login">Adresse mail (login) :</label></td>
										<td><input type="text" id="login" name="login" maxlength="255"  style="width:200px;" /></td>
									</tr>
									<tr>
										<td><label for="mdp">Mot de passe :</label></td>
										<td><input type="password" id="mdp" name="mdp"  style="width:200px;" /></td>
									</tr>
									<tr>
										<td><label for="mot_de_passe2">Veuillez retaper votre mot de passe :</label></td>
										<td><input type="password" id="mot_de_passe2" name="mot_de_passe2" style="width:200px;" /></td>
									</tr>
									<tr>
										<td><label for="nom">Nom :</label></td>
										<td><input type="text" id="nom" name="nom"  style="width:200px;" /></td>
									</tr>
									<tr>
										<td><label for="prenom">Pr&eacute;nom :</label></td>
										<td><input type="text" id="prenom" name="prenom" style="width:200px;" /></td>
									</tr>
									<tr>
										<td><label for="telephone">T&eacute;l&eacute;phone :</label></td>
										<td><input type="text" id="telephone" name="telephone" style="width:200px;" /></td>
									</tr>
									<tr>
										<td><label for="adresse">Adresse :</label></td>
										<td><input type="text" id="adresse" name="adresse"  style="width:200px;" /></td>
									</tr>
									<tr>
										<td><label for="cp">Code postal :</label></td>
										<td><input type="text" id="cp" name="cp"  maxlength="5" style="width:200px;" /></td>
									</tr>
									<tr>
										<td><label for="ville">Ville :</label></td>
										<td><input type="text" id="ville" name="ville"  style="width:200px;" /></td>
									</tr>
									<tr>
										<td><label for="pays">Pays :</label></td>
										<td><input type="text" id="pays" name="pays"  style="width:200px;" /></td>
									</tr>
								</table>
								<p style="text-align:center;"><br /><input type="submit" name="inscription" value="Cr&eacute;er mon compte" /></p>
								<script type="text/javascript" language="javascript" src="script.js"></script>
                            </div>
						</form>
					</div>
				</div>
			</div>
 			
		</div>

<?php include("footer.php"); ?>