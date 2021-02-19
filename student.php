<?php 
session_start();
include('db/config.php');
$date=date('Y-m-d');
$heure=date('h:i:s');

?>
<!DOCTYPE html>
<html>
<head>
    <title>date de signature</title>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">       
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css">
</head>
<body>
<!-- ***************************************** -->
<?php include('tr_graphan.php'); ?>
<!-- ***************************************** -->
    <br><br><br><br><br><br><br><br><br>
<div class="col-md-3"></div>
<div class="col-md-6 well">
<div class="col-md-1"></div>
<div class="col-md-10">
    <form action="search.php" method="POST">
    <div class="input-group col-md-12"><a href="signature.php">Retour</a>
    	<center><strong>DATE DE SIGNATURE</strong></center><br>
    	<p>
    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Merci d'avoir signer le <strong style="color: red;"><?php echo $date; ?></strong> à <strong style="color: red;"><?php echo $heure; ?></strong>.
		</p>
        
    </div>
    </form>
    
</div>
</div>
</body>
</html>