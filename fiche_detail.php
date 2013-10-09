<!--tableau dans lequel on stocke le résultat de la requete, chaque $row représentant un enregistrement -->
<table>
    <tr> <a id="fiched" style="color:#0A6BD8">Titre :</a> <?php echo $row['Nom_Article']; ?> </br></br></tr>
    <tr> <a id="fiched" style="color:#0A6BD8">Prix :</a> <?php echo $row['Prix_Article']; ?> euro</br> </tr>
    </br>
     
    <tr> <a id="fiched" style="color:#0A6BD8">Description :</a> </br><?php echo $row['Information']; ?> </br></br></tr>
    <tr> <a id="fiched" style="color:#0A6BD8">Auteur :</a> <?php echo $row['Auteur']; ?> </br></br></tr>
    <tr> <a id="fiched" style="color:#0A6BD8">Date Edition :</a> <?php echo $row['Date_Edition']; ?></br></br> </tr>
    <tr> <a id="fiched" style="color:#0A6BD8">Etat :</a> <?php echo $row['Type_Etat']; ?> </br></br></tr>
</table>
<!--on fait afficher la possibilité pour l'utilisateur de remplir son panier uniquement s'il est connecté et qu'une session 
(contenant son identifiant en mémoire) existe-->
<?php if(isset($_SESSION['text_login']) and !empty($_SESSION['text_login'])) { ?>
<a href="panier.php?action=ajout&amp;l=<?php echo $row['Nom_Article']; ?>&amp;q=1&amp;p=<?php echo $row['Prix_Article']; ?>"><img src="images/shop.png"</a>
<?php } ?>