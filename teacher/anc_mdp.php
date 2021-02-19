

<?php include('includes/header.php'); ?>
<br><br><br><br><br><br>

<div class="container">
	
<?php

	include("db/config.php");

	if(isset($_POST['subpass']))
	{//id,username,password
		$anct_mdp = $_POST['anct_mdp'];
		if(!empty($anct_mdp)){

			$sql="SELECT * FROM teacher WHERE t_mdp='{$anct_mdp}'";

			$result=$conn->query($sql);
			
			if($result->rowCount() > 0 ){

				header("Location:new_mdp.php");
				
			}else{

				echo "<center style='color:red;'>L'ancien mot de passe est invalide!</center>";
			}

		}else{
			echo "<center style='color:red;'>Veuillez saisir votre ancien mot de passe svp !!!</center>";
		}
	}
?>
	<div class="row">
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4" style="margin-top: 20px;">
			<div class="card">
				<div class="card-header">Ancien mot de passe</div>
				<div id="message_admin"></div>
				<div class="card-body">
					<form method="post">
						<div class="form-group">
							<input type="password" name="anct_mdp" id="anct_mdp" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="submit" name="subpass" id="subpass" class="btn btn-info" value="changer de mot de passe">
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			
		</div>

	</div>
</div>

<script type="text/javascript" src="t_ajax.js"></script>


