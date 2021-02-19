
<?php  
    include('db/config.php');
    session_start();

    if(!isset($_SESSION["id_user"])){
        header('location:connexion.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Espace étudiant</title>
    
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="Chart.min.js"></script>
    <script src="utils.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css"> -->

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.slim.min.js"></script>
</head>
<style type="text/css">
    
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
  /*height: 1500px;*/
}

</style>
<body>

                    <center><h1>Espace Etudiant</h1></center>
           
            <p style="text-align: right;"> <a href="etud_profil.php">
                <img src="<?= $_SESSION['name_picture']; ?>" style="width: 50px;height: 50px;"></a>
            </p>
                    <p style="text-align: right;">
                        <?= $_SESSION['nom']; ?>
                    </p>
                
        



    <hr/>
<nav>
  <ul>
    <li class="deroulant"><a href="dashboard_student.php" style="text-decoration: none;">Accueil &ensp;</a>
      <ul class="sous">
      </ul>
    </li>
    <li class="deroulant"><a href="#" style="text-decoration: none;">Profil &ensp;</a>
      <ul class="sous">
        <li><a href="etud_profil.php" style="text-decoration: none;">Information personnelle</a></li>
        <li><a href="etud_mdp.php" style="text-decoration: none;">Sécurité</a></li>
      </ul>
    </li>
    <li><a href="#" style="text-decoration: none;">A propos</a></li>
    <li><a href="logout.php" style="text-decoration: none;">Deconnexion</a></li>
  </ul>
</nav>

<div class="conteneur">
  <p style="text-align: center;text-transform: uppercase;">Bienvenu sur votre tableau de bord</p>
</div>

<!-- ********************************************************** -->

<?php include('tr_graphan.php'); ?>

<!-- ********************************************************** -->

<div class="container center">
            <div class="form">
                <div class="note">
                    <!--<img class="rounded-circle" src="../<?= $_SESSION['name_picture']; ?>" style="width: 80px;height: 80px;margin-left: -1862px;">
                     <button type="button" class="btn btn-primary" style="margin-right: -973px;">Editer son profil</button> -->
                    <!-- <input type="submit" name="etudlogin" id="etudlogin" class="btn btn-info" value="Editer son profil" style="margin-right: -973px;"/> -->
                    

                </div>

                <div class="form-content">


                    <div class="row">
                        <div style="width:60%;"> 
                        <h1>Graphe année</h1>   
                            <canvas id="canvas"></canvas>
                        </div>
                    </div>
    <!-- ------------------------------------- -->
                    <div class="row">
                        
                        <div class="col-md-7">
                            <center><h1>Les raisons d'absence</h1></center>
                    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td><strong>Dates</strong></td>
                            <td><strong>Pourquoi?</strong></td>
                        </tr>
                    </thead>
                    <tbody>

                        
                            <?php

                            include("db/config.php");
                            $id_user=$_SESSION['id_user'];
                            $date_notnul="0000-00-00";
                            // On recupere tout le contenu de la table Client
                            $sql="SELECT * FROM presence WHERE id_user='{$id_user}' AND date_abs !='{$date_notnul}'";
                            $reponse = $conn->query($sql);
  
                            // On affiche le resultat
                            while ($donnees = $reponse->fetch())
                            {
                                //On affiche l'id et le nom, l'email, tel du client en cours dans un tableau
                                echo '
                                <tr>
                                    <td>'.$donnees['date_abs'].'</td>
                                    <td>'.$donnees['causes'].'</td>
                                    
                                    
                                ';
                             
                                 
                            }
                            $reponse->closeCursor(); // Termine le traitement de la requête
                        ?>
                    </tbody>
                </table>
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
                        $querydata= mysqli_query($con, "SELECT janvier FROM mois WHERE id_user = '{$_SESSION['id_user']}'  ");
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
                        $querydata= mysqli_query($con, "SELECT fevrier FROM mois WHERE id_user = '{$_SESSION['id_user']}'  ");
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
                        $querydata= mysqli_query($con, "SELECT mars FROM mois WHERE id_user = '{$_SESSION['id_user']}'  ");
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
                        $querydata= mysqli_query($con, "SELECT avril FROM mois WHERE id_user = '{$_SESSION['id_user']}'  ");
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
                        $querydata= mysqli_query($con, "SELECT mai FROM mois WHERE id_user = '{$_SESSION['id_user']}'  ");
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
                        $querydata= mysqli_query($con, "SELECT juin FROM mois WHERE id_user = '{$_SESSION['id_user']}'  ");
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
                        $querydata= mysqli_query($con, "SELECT juillet FROM mois WHERE id_user = '{$_SESSION['id_user']}'  ");
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
                        $querydata= mysqli_query($con, "SELECT aout FROM mois WHERE id_user = '{$_SESSION['id_user']}'  ");
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
                        $querydata= mysqli_query($con, "SELECT septembre FROM mois WHERE id_user = '{$_SESSION['id_user']}'  ");
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
                        $querydata= mysqli_query($con, "SELECT octobre FROM mois WHERE id_user = '{$_SESSION['id_user']}'  ");
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
                        $querydata= mysqli_query($con, "SELECT novembre FROM mois WHERE id_user = '{$_SESSION['id_user']}'  ");
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
                        $querydata= mysqli_query($con, "SELECT decembre FROM mois WHERE id_user = '{$_SESSION['id_user']}' ");
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
<!-- <script src="Chart.min.js"></script>
<script src="utils.js"></script> -->
<!-- <script src="js/bootstrap.bundle.min.js"></script> -->
<script src="jquery.slim.min.js"></script>

</body>
</html>




