
<?php  
	session_start();


	include('db/config.php');

	if(isset($_POST['submit'])){
		$n_nom=$_POST['n_nom'])));
		$n_email=mysql_real_escape_string(htmlspecialchars(trim($_POST['n_email'])));
		if (empty($n_nom) && empty($n_email)) {

			echo "Veuillez completer ces champs svp";
		}else{

			mysql_query("
				UPDATE teacher SET t_nom = '$n_nom', t_email = '$n_email' WHERE t_nom = '{$_SESSION['n_nom']}' AND t_email = '{$_SESSION['n_email']}'
				")or die (mysql_errno());
			header("Location:logout.php");
		}
	}
?>

<form method="post">
	<p>Votre nouveau nom</p>
	<input type="text" name="n_nom">

	<p>Votre nouveau email</p>
	<input type="email" name="n_email">

	<br/><br/>
	<input type="submit" name="submit" value="changer">
</form>










































<hr/>


<?php  
session_start();

	include("db/config.php");

	if(isset($_POST['subpass']))
	 {//id,username,password
		$o_password = $_POST['o_password'];
		$n_password = $_POST['n_password'];
		$r_password = $_POST['r_password'];

		$query =$conn->query("SELECT * FROM teacher WHERE t_email='{$_SESSION['t_email']}' AND t_mdp='$o_password'");
		$rows = rowCount($query);

		if(empty($o_password))
		{
			echo "Veuillez saisir votre ancien mot de passe";
		}else if($n_password != $r_password)
		{
			echo "Vos nouveaux mots de passe sont différents";
		}else if($rows == 0){
			echo "L'ancien mot de passe est incorrect!";
		}else{
			$conn->query("UPDATE teacher SET t_mdp='$n_password' WHERE t_email='{$_SESSION['t_email']}' ");
			header("Location:dashboard_admin.php");
		}
	}
?>
<?php include('includes/header.php'); ?>

<form method="post" style="margin-left: 280px;">
	<p>Nouveau mot de passe</p>
	<input type="password" name="n_password">

	<p>Répéter nouveau mot de passe</p>
	<input type="password" name="r_password">


	<br/><br/>
	<input type="submit" name="subpass" value="changer de mot de passe">
</form>