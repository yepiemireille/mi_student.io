 



<!DOCTYPE html>
<html>
<head>
    <title>Student Attendence</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/fontawesome.min.css" integrity="sha512-8jdwayz5n8F2cnW26l9vpV6+yGOcRAqz6HTu+DQ3FtVIAts2gTdlFZOGpYhvBMXkWEgxPN3Y22UWyZXuDowNLA==" crossorigin="anonymous" />
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css"> -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<!-- ***************************************** -->
<?php include('tr_graphan.php'); ?>
<!-- ***************************************** -->



<div class="jumbotrom text-center" style="margin-bottom: 0">
  <h1>page Etudiant</h1>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-5">
      
    </div>
    <div class="col-md-5" style="margin-top: 20px;">
      <div class="card">
        <div class="card-header">S'inscrire &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php" style="text-decoration: none;">retour</a></div>
        <div id="info"></div>
        <div class="card-body">
          <form id="regi" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
              <label>Nom & Prenoms:</label>
              <input type="text" autocomplete="off" name="nom" id="name" placeholder="Entrer votre nom et prenom" class="form-control"/>
            </div>

            <div class="form-group">
              <label>Email</label>
              <div id="inff"></div>
              <input type="email" autocomplete="off" name="email" id="email" placeholder="Entrer votre Email" class="form-control"/>
            </div>

            <div class="form-group">
              <label>Telephone</label>
              <div id="inf"></div>
              <input type="tel" autocomplete="off" name="tel" id="tel" placeholder="Entrer numero de telephone" class="form-control"/>
            </div>

            <div class="form-group">
              <label>Mot de passe</label>
              <input type="password" class="form-control" name="mdp" id="password" placeholder="Entrer votre Mot de passe"/>
            </div>

            <div class="form-group">
              <label>Confirmer votre Mot de passe</label>
              <input type="password" class="form-control" name="mdp2" id="confirm" placeholder="Confirmer votre Mot de passe"/>
            </div>

            <div class="form-group">
              <div id="imge"></div>
              <input type="file" name="picture" />
            </div>

            <div class="form-group">
              <input type="submit" name="register" id="picture" class="btn btn-info" value="inscription"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="connexion.php">Se connecter</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-5">
      
    </div>

  </div>
</div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/7cb0e7c261.js" crossorigin="anonymous"></script>

        
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>
<!-- <script src="jquery.js"></script> -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jquery.js"></script>
<!------js/ Include the above in your HEAD tag ---------->

</body>
</html>