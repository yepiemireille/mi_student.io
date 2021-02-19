 	<?php
	include("db/config.php");
	
	if (isset($_POST)) {
		
		$answer="";
		$t_email=$_POST['t_email'];
		$t_mdp=$_POST['t_mdp'];

		if (!empty($t_email) and !empty($t_mdp)) {

			$sql= "SELECT * FROM teacher WHERE t_email='$t_email' AND t_mdp='$t_mdp' " ;
			$query=$conn->query($sql);
		
			if ($query->rowCount() > 0) {
        		session_start();
				while($row =$query->fetch()) 
				{
					$_SESSION['t_id']=$row["t_id"];
				  	$_SESSION['t_nom']=$row["t_nom"];
				  	$_SESSION['t_email']=$row["t_email"];
				  	$_SESSION['t_mdp']=$row["t_mdp"];
							
				
				$answer='ok';
}
			} else $answer='mot de passe ou email invalide';

		}else $answer='Veuillez remplir les champs S.V.P';

		$output=array('msg'=>$answer);
	echo json_encode($output);

	}

	

	?>