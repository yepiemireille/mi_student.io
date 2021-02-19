

<?php
	
	include("db/config.php");

	if (isset($_POST)) 
	{	
		$idNou=isset($_GET['id_new'])?$_GET['id_new']:null; // url
	  	$nom=isset($_POST['nom'])?$_POST['nom']:null;
	  	$email=isset($_POST['email'])?$_POST['email']:null;

	  	if (!empty($_POST['nom']) && !empty($_POST['email'])) {

		  	$sql="UPDATE etud SET nom='{$nom}', email='{$email}' WHERE id_user='{$idNou}'";
		  	$result=$conn->query($sql);
		  	if ($result) {
		  		echo "modification éffectué avec succès !!!";
		  		header('location:list_inscri.php');
		  	}else
		  	{
		  		echo "connexion failed";
		  	}
	  	}else
	  	{
	  		echo "f";
	  	}

	}

?>
<!-- *************************************************************** -->

<?php 

     include("db.php");

     if (isset($_GET['id'])) {
     	
     	$id = $_GET['id'];
     	$query = "SELECT * FROM etud WHERE id = $id";
     	$result = mysqli_query($conn, $query);
     	if (mysqli_num_rows($result) == 1) {
     		$row = mysqli_fetch_array($result);
     		$title = $row['title'];
     		$description = $row['description'];
     	}
     }
     if (isset($_POST['update'])) {
     	$id = $_GET['id'];
     	$title = $_POST['title'];
     	$description = $_POST['description'];

     	$query = "UPDATE task set title = '$title', description = '$description' WHERE id = '$id'";
     	mysqli_query($conn, $query);

     	$_SESSION['message'] = 'Task Update Succesfully';
     	$_SESSION['message_type'] = 'warning';

     	header('Location: index.php');
     }


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>

	<form class="form" action="">
        <div class="form-group">
            <label for="name" class="text-white">Nom & Prenoms:</label><br>
            <input type="text" name="nom" id="name" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="email" class="text-white">Email:</label><br>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
        </div>
    </form>

</body>
</html>