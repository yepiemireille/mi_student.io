 
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
    <title>Student Attendence</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>





<div class="container">
  <div class="row">
    <div class="col-md-5">
      
    </div>
    <div class="col-md-5" style="margin-top: 20px;">
      <div class="card">
        <div class="card-header">modifier profil </div>
        <div id="message"></div>
        <div class="card-body">
          <form id="form_edit_student" method="post" action="" enctype="multipart/form-data">
            
            <div class="form-group">
              <label>Nom & Prenoms:</label>
              <input type="text" autocomplete="off" name="nom" id="name" value="<?php echo $_SESSION['nom']; ?>" class="form-control"/>
            </div>

            <div class="form-group">
              <label>Email</label>
              <div id="inff"></div>
              <input type="email" autocomplete="off" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" class="form-control"/>
            </div>

            <div class="form-group">
              <label>Telephone</label>
              <div id="inf"></div>
              <input type="tel" autocomplete="off" name="tel" id="tel" value="<?php echo $_SESSION['tel']; ?>" class="form-control"/>
            </div>

            <div class="form-group">
              <div id="imge"></div>
              <input type="file" name="picture" id="picture" />
            </div>

            <div class="form-group">
               <button type="submit" class=" btn btn-primary" id="mysubmit" name="edit" value="send"> Modifier </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="etud_profil.php">Annuler</a>
              <!-- <input type="submit" name="register" id="picture" class="btn btn-info" value="modifier"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="etud_profil.php">Annuler</a> -->
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

        
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="editetud_profil.js"></script>
<script src="js/jquery.js"></script>
<!------ Include the above in your HEAD tag ---------->

</body>
</html>