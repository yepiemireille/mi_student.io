

<?php include('includes/header.php'); ?>
<!-- <br><br><br><br><br> -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
<style type="text/css">
	/*body {
    width: 850px;
}*/

#chart-container {
    width: 40%;
    height: auto;
   /* width: 100%;
    height: auto;*/
}
</style>

</head>
<body>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><h1>La liste des étudiants</h1></center>
    <div id="chart-container" style="margin-left: 200px;">
        <canvas id="graphCanvas"></canvas>
    </div>

    

        <hr>

        <div class="container" style="margin-top: 20px">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<table class="table table-bordered table-hover" style="margin-left: 400px;"> <!-- c'etait hovered -->
					<thead>
						<tr>
							<td><strong>Elèves</strong></td>
							<td><strong>Nombre de présence</strong></td>
						</tr>
					</thead>
					<tbody>

						
							<?php

							include("db/config.php");
							// On recupere tout le contenu de la table Client
							$sql='SELECT * FROM etud';
							$reponse = $conn->query($sql);
  
							// On affiche le resultat
							while ($donnees = $reponse->fetch())
							{
								//On affiche l'id et le nom, l'email, tel du client en cours dans un tableau
								?>							    
							    <tr>
							    	<td><?=$donnees['nom']?></td>
							    	<td><a href="etud_info.php?id_new=<?=$donnees['id_user']?>" class="btn btn-info">+ <?=$donnees['total_signe']?></a></td>
							    	
							    	
							    <?php
							 
							     
							}
							$reponse->closeCursor(); // Termine le traitement de la requête
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var nom = [];
                    var total_signe = [];

                    for (var i in data) {
                        nom.push(data[i].nom);
                        total_signe.push(data[i].total_signe);
                    }

                    var chartdata = {
                        labels: nom,
                        datasets: [
                            {
                                label: 'Graphe des élèves',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: total_signe
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }

        //************************************************


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
<script
  src="http://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous">
</script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>


</body>
</html>