<!--on enregistre dans la première colonne le titre de l'article renvoyé par la requête 
(avec l'id correspondant à l'article, récupéré et envoyé dans l'url du lien renvoyant vers la fiche détaillée de l'article), 
ainsi que le prix correspondant dans la deuxième colonne-->
<table  style="border:2px solid black; border-collapse:collapse;">
	<tr style="border:2px solid black; border-collapse:collapse;">
    		<td style="border:2px solid black; border-collapse:collapse; width:200px;"><?php echo $row['Nom_Categorie']; ?></td>
		<td style="border:2px solid black; border-collapse:collapse; width:200px;"><a href="fiche.php?id_article=<?php echo $row['ID_Article']; ?> "><?php echo $row['Nom_Article']; ?></a></td>
		<td style="border:2px solid black; border-collapse:collapse; width:200px;"><?php echo $row['Prix_Article']; echo "\n euro"; ?></td>
	</tr>
</table>