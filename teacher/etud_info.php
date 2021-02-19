
<?php  
    include('db/config.php');
    session_start();

    if(!isset($_SESSION["t_id"])){
        header('location:login_admin.php');
    }
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="Chart.min.js"></script>
	<script src="utils.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.slim.min.js"></script>

<!-- ********************************************** -->
<style type="text/css">
	.note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.2rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
/*Reset CSS*/
*{
    margin: 0px;
    padding: 0px;
    font-family: Avenir, sans-serif;
}

nav{
    width: 70%;
    margin: 0 auto;
    background-color: white;
    position: sticky;
    top: 0px;
}

nav ul{
    list-style-type: none;
}

nav ul li{
    float: left;
    width: 25%;
    text-align: center;
    position: relative;
}

nav ul::after{
    content: "";
    display: table;
    clear: both;
}

nav a{
    display: block;
    text-decoration: none;
    color: black;
    border-bottom: 2px solid transparent;
    padding: 10px 0px;
}

nav a:hover{
    color: orange;
    border-bottom: 2px solid gold;
}

.sous{
    display: none;
    box-shadow: 0px 1px 2px #CCC;
    background-color: white;
    position: absolute;
    width: 100%;
    z-index: 1000;
}
nav > ul li:hover .sous{
    display: block;
}
.sous li{
    float: none;
    width: 100%;
    text-align: left;
}
.sous a{
    padding: 10px;
    border-bottom: none;
}
.sous a:hover{
    border-bottom: none;
    background-color: RGBa(200,200,200,0.1);
}
.deroulant > a::after{
    content:" ▼";
    font-size: 12px;
}

.conteneur{
  margin: 50px 20px;
  height: 1500px;
}
/**********************/
canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
</style>
<nav>
  <ul>
    <li><a href="graph_et.php" style="text-decoration: none;">Accueil &ensp;</a></li>
    <li class="deroulant"><a href="#" style="text-decoration: none;">Profil &ensp;</a>
      <ul class="sous">
        <li><a href="anc_mdp.php" style="text-decoration: none;">Sécurité</a></li>
      </ul>
    </li>
    <li class="deroulant"><a href="#" style="text-decoration: none;">A propos &ensp;</a>
      <ul class="sous">
        <li><a href="list_inscri.php" style="text-decoration: none;">Liste des etudiants</a></li>
        <li><a href="list_sign.php" style="text-decoration: none;">Liste de presence</a></li>
        <li><a href="list_abs.php" style="text-decoration: none;">Liste d'abscence</a></li>
      </ul>
    </li>
    <li><a href="logout.php" style="text-decoration: none;">Deconnexion</a></li>
  </ul>
</nav>
<!-- ************************************************************* -->
<!-- ********************************************************** -->

<?php include('tr_graphan.php'); ?>

<!-- ********************************************************** -->

<div class="container center" style="margin-top: 104px;">
            <div class="form">
                <div class="note">
                    <h1><strong>Informations sur l'élève</strong></h1>
                	<!--<img class="rounded-circle" src="../<?= $_SESSION['name_picture']; ?>" style="width: 80px;height: 80px;margin-left: -1862px;">
                	 <button type="button" class="btn btn-primary" style="margin-right: -973px;">Editer son profil</button> -->
                    <!-- <input type="submit" name="etudlogin" id="etudlogin" class="btn btn-info" value="Editer son profil" style="margin-right: -973px;"/> -->
                    

                </div>
    <?php
     // recuperaration du "id_msg" (contenant l'iduser du student) envoyé par l'url depuis e fichier ('')
    $id_msg=$_GET['id_new'];
     
     $displ=$conn->query("SELECT * FROM etud WHERE id_user='{$id_msg}'");
     while ($disp=$displ->fetch()) {
        
        $disp_name_profil = $disp['name_picture'];
        $disp_nom= $disp['nom'];
        $disp_email = $disp['email'];
        $disp_tel = $disp['tel'];
        $disp_date_inscript = $disp['date_etud'];
        $disp_total_sign= $disp['total_signe'];
    }

     ?>  
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-5">
                             <img class="rounded-circle" src="../<?= $disp_name_profil; ?>" style="width: 100px;height: 100px;"> 
                            <div class="form-group">
                                <h5><strong>Nom & Prenoms:</strong> <?= $disp_nom; ?></h5>
                            </div>
                            <div class="form-group">
                                <h5><strong>Email:</strong> <?= $disp_email; ?></h5>
                            </div>
                            <div class="form-group">
                                <h5><strong>Tel:</strong> <?= $disp_tel; ?></h5>
                            </div>
                            <div class="form-group">
                                <h5><strong>Date d'inscription:</strong> <?= $disp_date_inscript; ?></h5>
                            </div>
                            <div class="form-group">
                                <h5><strong>nombre de presence:</strong> <?= $disp_total_sign; ?></h5>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <center><h1>Les raisons</h1></center>
				<table class="table table-bordered table-hover"> <!-- c'etait hovered -->
					<thead>
						<tr>
							<td><strong>Dates</strong></td>
							<td><strong>Pourquoi?</strong></td>
						</tr>
					</thead>
					<tbody>

						
							 <?php

							include("db/config.php");

                            $id_msg=$_GET['id_new'];
                            $date_notnul="0000-00-00";
							// On recupere tout le contenu de la table Client
							$sql="SELECT * FROM presence WHERE id_user='{$id_msg}' AND date_abs !='{$date_notnul}'";
							$reponse = $conn->query($sql);
  
							// On affiche le resultat
							while ($donnees = $reponse->fetch())
							{
							    //On affiche l'id et le nom, l'email, tel du client en cours dans un tableau
							    echo '
							    <tr>
							    	<td>'.$donnees['date_abs'].'</td>
							    	<td> '.$donnees['causes'].'<a href="action_causes.php?id_new='.$donnees['id'].'" style="text-decoration:none"> Editer</a></td>
							    	
							    ';
							     
							}
							$reponse->closeCursor(); // Termine le traitement de la requête
						?>
					</tbody>
				</table>
                        </div>
                    </div>
<br><br><br>
                    <div class="row">
                        <div style="width:60%;">	
                        	<canvas id="canvas"></canvas>
						</div>
                    </div>
                    
                </div>
            </div>
        </div>
        <script type="text/javascript">

        var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var config = {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'My sell in  ₹',
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [
                        <?php
                        //Get value of January
                        $querydata= mysqli_query($con, "SELECT janvier FROM mois WHERE id_user = '{$id_msg}'  ");
                        $getdata= mysqli_fetch_assoc($querydata); 
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                            $amont = $getdata['janvier'];
                            echo $amont;
                            }else{
                            echo 0;
                            }
                        ?>,
                        <?php
                        //Get value of February
                        $querydata= mysqli_query($con, "SELECT fevrier FROM mois WHERE id_user = '{$id_msg}'  ");
                        $getdata= mysqli_fetch_assoc($querydata); 
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                        $amont = $getdata['fevrier'];
                        echo $amont;
                        }else{
                        echo 0;
                        }
                        ?>,
                        <?php
                        //Get value of March
                        $querydata= mysqli_query($con, "SELECT mars FROM mois WHERE id_user = '{$id_msg}'  ");
                        $getdata= mysqli_fetch_assoc($querydata); 
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                        $amont = $getdata['mars'];
                        echo $amont;
                        }else{
                        echo 0;
                        }
                        ?>,
                        <?php
                        //Get value of April
                        $querydata= mysqli_query($con, "SELECT avril FROM mois WHERE id_user = '{$id_msg}'  ");
                        $getdata= mysqli_fetch_assoc($querydata); 
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                        $amont = $getdata['avril'];
                        echo $amont;
                        }else{
                        echo 0;
                        }
                        ?>,
                        <?php
                        //Get value of May
                        $querydata= mysqli_query($con, "SELECT mai FROM mois WHERE id_user = '{$id_msg}'  ");
                        $getdata= mysqli_fetch_assoc($querydata); 
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                        $amont = $getdata['mai'];
                        echo $amont;
                        }else{
                        echo 0;
                        }
                        ?>,
                        <?php
                        //Get value of June
                        $querydata= mysqli_query($con, "SELECT juin FROM mois WHERE id_user = '{$id_msg}'  ");
                        $getdata= mysqli_fetch_assoc($querydata); 
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                        $amont = $getdata['juin'];
                        echo $amont;
                        }else{
                        echo 0;
                        }
                        ?>,

                        <?php
                        //Get value of July
                        $querydata= mysqli_query($con, "SELECT juillet FROM mois WHERE id_user = '{$id_msg}'  ");
                        $getdata= mysqli_fetch_assoc($querydata);
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                        $amont = $getdata['juillet'];
                        echo $amont;
                        }else{
                        echo 0;
                        }
                        ?>,

                        <?php
                        //Get value of August
                        $querydata= mysqli_query($con, "SELECT aout FROM mois WHERE id_user = '{$id_msg}'  ");
                        $getdata= mysqli_fetch_assoc($querydata);
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                        $amont = $getdata['aout'];
                        echo $amont;
                        }else{
                        echo 0;
                        }
                        ?>,


                        <?php
                        //Get value of September
                        $querydata= mysqli_query($con, "SELECT septembre FROM mois WHERE id_user = '{$id_msg}'  ");
                        $getdata= mysqli_fetch_assoc($querydata); 
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                        $amont = $getdata['septembre'];
                        echo $amont;
                        }else{
                        echo 0;
                        }
                        ?>,
                        <?php
                        //Get value of October
                        $querydata= mysqli_query($con, "SELECT octobre FROM mois WHERE id_user = '{$id_msg}'  ");
                        $getdata= mysqli_fetch_assoc($querydata); 
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                        $amont = $getdata['octobre'];
                        echo $amont;
                        }else{
                        echo 0;
                        }
                        ?>,
                        <?php
                        //Get value of November
                        $querydata= mysqli_query($con, "SELECT novembre FROM mois WHERE id_user = '{$id_msg}'  ");
                        $getdata= mysqli_fetch_assoc($querydata); 
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                        $amont = $getdata['novembre'];
                        echo $amont;
                        }else{
                        echo 0;
                        }
                        ?>,
                        <?php
                        //Get value of December
                        $querydata= mysqli_query($con, "SELECT decembre FROM mois WHERE id_user = '{$id_msg}' ");
                        $getdata= mysqli_fetch_assoc($querydata); 
                        $rows = mysqli_num_rows($querydata);
                        if($rows==1){ 
                        $amont = $getdata['decembre'];
                        echo $amont;
                        }else{
                        echo 0;
                        }
                        ?>
                        
                    ],
                    fill: false,
                }, ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'mois'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Amont in ₹'
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = new Chart(ctx, config);
        };

        
        var colorNames = Object.keys(window.chartColors);
        

        </script>

<!-- *************************************************** -->
<script src="Chart.min.js"></script>
<script src="utils.js"></script>
<!-- <script src="js/bootstrap.bundle.min.js"></script> -->
<script src="jquery.slim.min.js"></script>

</body>
</html>