
<?php  
    include('../db/config.php');
    session_start();

    if(!isset($_SESSION["t_id"])){
        header('location:login_admin.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Espace Dashboard</title>

    <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/fontawesome.min.css" integrity="sha512-8jdwayz5n8F2cnW26l9vpV6+yGOcRAqz6HTu+DQ3FtVIAts2gTdlFZOGpYhvBMXkWEgxPN3Y22UWyZXuDowNLA==" crossorigin="anonymous" />
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css"> 

    
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>




<style type="text/css">
    
/********************** teacher/graph_et.php ****************   */
/*body {
    width: 550px;
}

#chart-container {
    width: 100%;
    height: auto;
}*/
 /********************** teacher/graph_et.php ****************   */
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

</style>
<body>

           <center>
                <h1 style="margin-top: 45px;">
                    Dashboard 
                    <p style="color: red;">
        <span id="bonjour"></span><?= $_SESSION['t_nom']; ?>
                    </p>
                </h1>
<!-- ********************************************************************************** -->
<!-- tr_header_statut.php -->
<!-- ********************************************************************************** -->
                    <form action="" method="POST" id="form-program">
                        <input type="radio" name="statut_cours" value="Debut">debut
                        <input type="radio" name="statut_cours" value="Fin">fin
                        <button type="submit" class=" btn btn-success" id="submit" name="search" value="search">Valider</button><!-- 
                        <button name="debut" class="btn btn-primary">debut</button>
                        <button name="fin" class="btn btn-danger">fin</button> -->
                    </form>
                
            </center>
    
            
            <p style="text-align: right;"><a href="../index.php">Retour</a> </p> 
        



    <hr style="margin-top: 55px;" />
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
<!-- 
<script type="text/javascript" src="header_statut.js"></script> -->

<script
  src="http://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous">
</script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>


  <div class="container" style="margin-top: 20px;margin-left: 150px;">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <center><h1>Liste D'Absences</h1></center>
        <table class="table table-bordered table-hover"> <!-- c'etait hovered -->
          <thead>
            <tr>
              <td><strong>N°</strong></td>
              <td><strong>Nom de l'etudiant</strong></td>
              <td><strong>Email de l'etudiant</strong></td>
              <td><strong>Date d'Absence</strong></td>
            <!--  <td><strong>Causes</strong></td>
               <td><strong>Action</strong></td> -->
            </tr>
          </thead>
          <tbody>

            
              <?php

              include("db/config.php");
              // On recupere tout le contenu de la table etud
              $vid="";
     $sql="SELECT etud.nom,etud.email,presence.id ,presence.date_abs, presence.causes FROM etud, presence WHERE etud.id_user = presence.id_user AND presence.date_abs !='{$vid}'";
    $query=$conn->query($sql);  
    $result=$query->fetchAll();
    $count = 1;
  
              // On affiche le resultat
              foreach ($result as $row): ?>   
                <!--row-->
                <tr>
                    <th><?=$count++?></th>
                    <td><?= $row['nom']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['date_abs']?></td>
                  <!--  <th><?= $row['causes']?></th>
                <td>
                        
              <button class="btn btn-primary"><a href="action.php?edit=<?php echo $row['id']?> class=btn btn-info" style="text-decoration: none; color: white;" >Edit</a></button>
 envoie de l'id_absence ($row['id_absence'] a la page de traitement (action.php) a travers l'url) 

                      </td> -->                                      
                </tr>
            <?php endforeach ?>
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
<script type="text/javascript" src="header_statut.js"></script>
</body>
</html>