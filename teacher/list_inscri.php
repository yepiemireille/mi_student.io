<?php include('includes/header.php'); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/fontawesome.min.css" integrity="sha512-8jdwayz5n8F2cnW26l9vpV6+yGOcRAqz6HTu+DQ3FtVIAts2gTdlFZOGpYhvBMXkWEgxPN3Y22UWyZXuDowNLA==" crossorigin="anonymous" />
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<br><br><br><br><br>

	<div class="container" style="margin-top: 20px">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<center><h1>La liste des étudiants</h1></center>
				<table class="table table-bordered table-hover"> <!-- c'etait hovered -->
					<thead>
						<tr>
							<td><strong>id</strong></td>
							<td><strong>Nom & Prenoms</strong></td>
							<td><strong>Email</strong></td>
							<td><strong>Telephone</strong></td>
							<td><strong>Images</strong></td>
							<td><strong>Date & Heure</strong></td>
						</tr>
					</thead>
					<tbody>

						
							<?php

							include("db/config.php");
							// On recupere tout le contenu de la table Client
							$sql='SELECT * FROM etud';
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
							    	<td>'.$donnees['date_etud'].'</td>
							    	
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

