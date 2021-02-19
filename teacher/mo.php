
<?php include('includes/header.php'); ?>
<br><br><br><br><br>

	<div class="container" style="margin-top: 20px;margin-left: 150px;">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<!-- <center><h1>La liste de presence</h1></center> -->
				<table class="table table-bordered table-hover"> <!-- c'etait hovered -->
					<thead>
						<tr>
							<td>id</td>
							<td>Nom & Prenoms</td>
							<td>Email</td>
							<td>Telephone</td>
							<td>Images</td>
							<td>Date</td>
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>

						
							<?php

							include("db/config.php");
							// On recupere tout le contenu de la table Client
							$sql='SELECT etud.id_user,etud.nom,etud.email,etud.tel,etud.mdp,etud.name_picture,presence.id_user,presence.date_pre,presence.heure FROM etud,presence WHERE etud.id_user=presence.id_user';
							$reponse = $conn->query($sql);
							$nber=1;
  
							// On affiche le resultat
							while ($donnees = $reponse->fetch())
							{
							    //On affiche l'id et le nom, l'email, tel du client en cours dans un tableau
							    echo '
							    <tr>
							    	<td>'.$nber++.'</td>
							    	<td>'.$donnees['nom'].'</td>
							    	<td>'.$donnees['email'].'</td>
							    	<td>'.$donnees['tel'].'</td>
							    	<td><img src='.$donnees['name_picture'].' style="width:25px; height:25px"></td>
							    	<td>'.$donnees['date_pre'].'</td>
							    	<td><a href="edit_inscri.php?id_new='.$donnees['id_user'].' class="btn btn-info">Editer</a>
							    	<a href="delete_inscri.php?id_new='.$donnees['id_user'].' class="btn btn-info">Supprimer</a></td>
							    </tr>
							    ';
							 
							     
							}
							$reponse->closeCursor(); // Termine le traitement de la requête
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


<script
  src="http://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous">
</script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".table").DataTable({
			"ordering":false, //desactiver : ordonnée de a-z ou z-a
			"searching":true, //desactiver(false) : supprimer la partie recherche des mots
			"paging": true, //desactiver(false) : afficher par 10, 20 ....
			"columnDefs":[
				{
					"targets":0,
					"searchable": false,
					"visible": true
				}
			],
			"order":[[2, "desc"]]

		});
	});
</script>

</body>
</html>

						<!-- 	echo "<tr>";
							    echo "<td> $donnees[id_user] </td>";
							    echo "<td> $donnees[nom] </td>";
							    echo "<td> $donnees[email] </td>";
							    echo "<td> $donnees[tel] </td>";
							    echo "</tr>";

						 -->
<!-- En utilisant la classe .table-hover, un arrière-plan gris clair sera ajouté aux lignes pendant que le curseur les survolera.-->

