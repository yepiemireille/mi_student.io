


<?php

	include("db/config.php");

	if(isset($_POST))
	{	
		$answer="";
		$anct_mdp = $_POST['anct_mdp'];
		if(!empty($anct_mdp)){

			$sql="SELECT * FROM teacher WHERE t_mdp='{$anct_mdp}'";

			$result=$conn->query($sql);
			
			if($result->rowCount() > 0 ){

				$answer="ok";
				// header("Location:new_mdp.php");
				
			}else{

				$answer="L'ancien mot de passe est invalide!";
			}

		}else{
			$answer="Veuillez saisir votre ancien mot de passe svt !!!";
		}

		$output=array('msg'=>$answer);
		echo json_encode($output);
	}
?>

