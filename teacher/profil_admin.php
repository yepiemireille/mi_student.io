

<?php  

	session_start();
	include('db/config.php');
	//s'il n'y a pas de session alors on ne va pas sur cette page
	if(!isset($_SESSION['id_user'])){

		header("Location:connexion.php");
		exit;
	}
	//on recupère les informations de l'utilisateur connecté
	$afficher_profil = $conn->query("SELECT * FROM etud 
		WHERE id_user=?",
		array($_SESSION['id_user']));
	$afficher_profil = $afficher_profil->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title>mon profil</title>
</head>
<body>
	<h2>Voici le profil de <?= $afficher_profil['nom'] . "". $afficher_profil['email']; ?></h2>

	<div>Quelques informations sur vous: </div>
	<ul>
		<li>Votre id est: <?= $afficher_profil['id_user'] ?></li>
		<li>Votre id est: <?= $afficher_profil['email'] ?></li>
		<li>Votre id est: <?= $afficher_profil['tel'] ?></li>
	</ul>

	<a href="#">Accueil</a>
	<a href="#">Modifier votre profil</a>

</body>
</html>