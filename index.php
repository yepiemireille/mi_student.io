


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
---- Include the above in your HEAD tag ----------> 
   <!--  <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/fontawesome.min.css" integrity="sha512-8jdwayz5n8F2cnW26l9vpV6+yGOcRAqz6HTu+DQ3FtVIAts2gTdlFZOGpYhvBMXkWEgxPN3Y22UWyZXuDowNLA==" crossorigin="anonymous" />
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>
<body>
<!-- ***************************************** -->
<?php include('tr_graphan.php'); ?>
<!-- ***************************************** -->
  <nav class="navbar navbar-dark bg-dark">
    <a href="#" class="navbar-brand"><i class="fas fa-list"></i>Accueil</a>
  </nav>

  <br><br><br><br>
  <center><h1>Student Attendance</h1></center>

	<div class="container mt-5">
   <div class="row">
     <div class="col-md-3">
       <div class="card text-center">
         <div class="card-header bg-primary text-white">
           <div class="row align-items-center">
             <div class="col">
               <i class="fab fa-audible fa-7x"></i>
             </div>
             <div class="col">
               <h6>Inscription</h6>
             </div>
           </div>
         </div>
         <div class="card-footer">
           <h5>
             <a href="register.php" class="text-primary">Views<i class="fas fa-arrow-right align-4x"></i></a>
           </h5>
         </div>
       </div>
     </div>

     <div class="col-md-3">
       <div class="card text-center">
         <div class="card-header bg-success text-white">
           <div class="row align-items-center">
             <div class="col">
               <i class="fas fa-file-signature fa-7x"></i>
             </div>
             <div class="col">
               <h6>Signature</h6>
             </div>
           </div>
         </div>
         <div class="card-footer">
           <h5>
             <a href="signature.php" class="text-success">Views<i class="fas fa-arrow-right align-4x"></i></a>
           </h5>
         </div>
       </div>
     </div>

     <div class="col-md-3">
       <div class="card text-center">
         <div class="card-header bg-warning text-white">
           <div class="row align-items-center">
             <div class="col">
               <i class="fas fa-user-tie fa-7x"></i>
             </div>
             <div class="col">
               <h6>Teacher</h6>
             </div>
           </div>
         </div>
         <div class="card-footer">
           <h5>
             <a href="teacher/dashboard_admin.php" class="text-warning">Views<i class="fas fa-arrow-right align-4x"></i></a>
           </h5>
         </div>
       </div>
     </div>

     <div class="col-md-3">
       <div class="card text-center">
         <div class="card-header bg-danger text-white">
           <div class="row align-items-center">
             <div class="col">
               <i class="fas fa-users fa-7x"></i>
             </div>
             <div class="col">
               <h6>Student</h6>
             </div>
           </div>
         </div>
         <div class="card-footer">
           <h5>
             <a href="dashboard_student.php" class="text-danger">Views<i class="fas fa-arrow-right align-4x"></i></a>
           </h5>
         </div>
       </div>
     </div>

   </div> 
  </div>


</body>
</html>