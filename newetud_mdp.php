
<?php include('includes/header.php'); ?>
<style type="text/css">
    
/*Reset CSS*/
*{
    margin: 0px;
    padding: 0px;
    font-family: Avenir, sans-serif;
}

nav{
    width: 70%;
    margin: 0 auto;
    background-color: white;
    position: sticky;
    top: 0px;
}

nav ul{
    list-style-type: none;
}

nav ul li{
    float: left;
    width: 25%;
    text-align: center;
    position: relative;
}

nav ul::after{
    content: "";
    display: table;
    clear: both;
}

nav a{
    display: block;
    text-decoration: none;
    color: black;
    border-bottom: 2px solid transparent;
    padding: 10px 0px;
}

nav a:hover{
    color: orange;
    border-bottom: 2px solid gold;
}

.sous{
    display: none;
    box-shadow: 0px 1px 2px #CCC;
    background-color: white;
    position: absolute;
    width: 100%;
    z-index: 1000;
}
nav > ul li:hover .sous{
    display: block;
}
.sous li{
    float: none;
    width: 100%;
    text-align: left;
}
.sous a{
    padding: 10px;
    border-bottom: none;
}
.sous a:hover{
    border-bottom: none;
    background-color: RGBa(200,200,200,0.1);
}
.deroulant > a::after{
    content:" ▼";
    font-size: 12px;
}

.conteneur{
  margin: 50px 20px;
  height: 1500px;
}

</style>



<center><h1>Espace Etudiant</h1></center>
           
            <p style="text-align: right;"> <a href="etud_profil.php">
                <img src="<?= $_SESSION['name_picture']; ?>" style="width: 50px;height: 50px;"></a>
            </p>
                    <p style="text-align: right;">
                        <?= $_SESSION['nom']; ?>
                    </p>
                
        



    <hr/>
<nav>
  <ul>
    <li class="deroulant"><a href="#">Accueil &ensp;</a>
      <ul class="sous">
      </ul>
    </li>
    <li class="deroulant"><a href="#">Profil &ensp;</a>
      <ul class="sous">
        <li><a href="etud_profil.php">Information personnelle</a></li>
        <li><a href="etud_mdp.php">Sécurité</a></li>
      </ul>
    </li>
    <li><a href="#">A propos</a></li>
    <li><a href="logout.php">Deconnexion</a></li>
  </ul>
</nav>
<!-- ***************************************** -->
<?php include('tr_graphan.php'); ?>
<!-- ***************************************** -->
<br><br>


<div class="container">
	
<?php
	include("db/config.php");

	if(isset($_POST['subpassetud']))
	{
		$newetud_mdp = md5($_POST['newetud_mdp']);
		$rnewetud_mdp = md5($_POST['rnewetud_mdp']);

		if(!empty($_POST['newetud_mdp']) && !empty($_POST['rnewetud_mdp']))
		{

			if($_POST['newetud_mdp'] == $_POST['rnewetud_mdp'])
			{
				$sql="UPDATE etud SET mdp='{$newetud_mdp}' WHERE id_user = '{$_SESSION['id_user']}'";
				$result=$conn->query($sql);

				if($result){
					echo "mot de passe modifier avec success";
					header("Location:dashboard_student.php");

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
				<!-- <div id="message_admin"></div> -->
				<div class="card-body">
					<form method="post">
						<div class="form-group">
							<label>Nouveau mot de passe</label>
							<input type="password" name="newetud_mdp" id="newetud_mdp" class="form-control"/>
						</div>

						<div class="form-group">
							<label>Retaper le nouveau mot de passe</label>
							<input type="password" name="rnewetud_mdp" id="rnewetud_mdp" class="form-control"/>
						</div>

						<div class="form-group">
							<input type="submit" name="subpassetud" id="subpassetud" class="btn btn-info" value="changer de mot de passe">
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			
		</div>

	</div>
</div>

<script type="text/javascript" src="ajax.js"></script>
