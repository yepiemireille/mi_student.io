





<?php include('includes/header.php'); ?>

<br><br><br><br><br><br>
<div class="container">
	
<?php
	include("db/config.php");

	if(isset($_POST['subpass']))
	{
		$new_mdp = $_POST['new_mdp'];
		$rnew_mdp = $_POST['rnew_mdp'];

		if(!empty($new_mdp) && !empty($rnew_mdp))
		{

			if($new_mdp == $rnew_mdp)
			{
				$sql="UPDATE teacher SET t_mdp='{$new_mdp}' WHERE t_id = '{$_SESSION['t_id']}'";
				$result=$conn->query($sql);

				if($result){
					echo "mot de passe modifier avec success";
					header("Location:dashboard_admin.php");

				}else{echo "Connexion échouée";}

			}else{

				echo "<center style='color:red;'>Les deux mots de passes ne sont pas identiques</center>";
			}

		}else{
			echo "<center style='color:red;'>Veuillez renseigner tous les champs svp !!!</center>";
		}
	}
?>

	<div class="row">
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4" style="margin-top: 20px;">
			<div class="card">
				<div class="card-header">Modification du Login</div>
				<div id="message_admin"></div>
				<div class="card-body">
					<form method="post">
						<div class="form-group">
							<label>Nouveau mot de passe</label>
							<input type="password" name="new_mdp" id="anct_mdp" class="form-control"/>
						</div>

						<div class="form-group">
							<label>Retaper le nouveau mot de passe</label>
							<input type="password" name="rnew_mdp" id="anct_mdp" class="form-control"/>
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
