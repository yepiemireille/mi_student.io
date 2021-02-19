
<?php  
    include('db/config.php');
    session_start();

    if(!isset($_SESSION["t_id"])){
        header('location:login_admin.php');
    }
    $edit=$_GET['id_new'];
?>


<?php
 // traitement du formuliare de mis a jour des causes d'absence de l'eleve
  if (isset($_POST['edit'])) {
    // on recupere le "edit" (contenant l'id_absence) envoyé par l'url; voir(tabeau list_absence.php)--- -

   
   $causes= (isset($_POST['causes'])?$_POST['causes']:null);
   $causes = (!is_null($causes)?$causes:false);
   $causes = (!empty($causes)?$causes:false);
    if ($causes) {
//$_SERVER['HTTP_REFERER']
   $up=  $conn->prepare("UPDATE presence SET causes =? WHERE id=?");

if ($up->execute([$causes, $edit])) {
  $success = "la cause mis a jour avec success";
} else $error = "Une erreur s'est produite.";

    }else $error = "Veuillez remplir le champ vide svp";
  }

 ?>

  
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.slim.min.js"></script>

<!-- ********************************************** -->
<style type="text/css">
	.note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.2rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
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
/**********************/
canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
</style>
<!-- <nav>
  <ul>
    <li><a href="graph_et.php" style="text-decoration: none;">Accueil &ensp;</a></li>
    <li class="deroulant"><a href="#" style="text-decoration: none;">Profil &ensp;</a>
      <ul class="sous">
        <li><a href="anc_mdp.php" style="text-decoration: none;">Sécurité</a></li>
      </ul>
    </li>
    <li class="deroulant"><a href="#" style="text-decoration: none;">A propos &ensp;</a>
      <ul class="sous">
        <li><a href="list_inscri.php" style="text-decoration: none;">Liste des etudiants</a></li>
        <li><a href="list_sign.php" style="text-decoration: none;">Liste de presence</a></li>
        <li><a href="list_abs.php" style="text-decoration: none;">Liste d'abscence</a></li>
      </ul>
    </li>
    <li><a href="logout.php" style="text-decoration: none;">Deconnexion</a></li>
  </ul>
</nav> -->

<!-- ************************************************************* -->
<!-- ********************************************************** -->

<?php 
	$found=$conn->query("SELECT id_user FROM presence WHERE id='{$edit}'");
	foreach ($found as $key) {
	  // recherche de l'iduser de l'etudiant
	        $id_msg=$key['id_user'];
	}
 ?>
<div class="container center" style="margin-top: 104px;">
    <div class="form">
        <div class="note">
           <h1><strong>Editer la cause</strong></h1><br>
           
    <div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4" style="margin-top: 20px;">
            <?php if(!empty($error)): ?>
                <div class="alert-danger"><?=$error;?></div>
            <?php endif; ?>
            <?php if(!empty($success)): ?>
                <div class="alert-success"><?=$success;?></div>
            <?php endif; ?>
			<div class="card">
				<div class="card-body">
					<form method="post">
						<div class="form-group">
							<input type="text" value="<?= (isset($_POST['causes']) && !empty($_POST['causes'])?$_POST['causes']:null) ?>" name="causes" class="form-control"/>
						<!-- </div>
						<div class="form-group"> -->
							<input type="submit" name="edit" class="btn btn-info" value="valider">
                            <button class="btn btn-danger"><a href="" style="text-decoration: none;">retour</a></button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			
		</div>
	</div>            

        </div>
    </div>
</div>          



<script type="text/javascript">
	// --------------------------------------((((())))) -->
// traitement ajax de la page action.php 

// $(document).ready(function(){
//   $("#action").on("submit", function(e){
    
//     e.preventDefault();//on desactive le comportement par defaut du formulaire
//     var form = $("#acxion");

//     $.ajax({

//            method: "POST",
//            url:"http://localhost/student/action.php",
//            dataType:"JSON",
//            data: form.serialize(),
//            success: function(reponse)
//            {
//             if (reponse.msg=='ok') {
//              $('#info').removeClass("alert alert danger");
//              $('#info').addClass("alert alert-success").html('la cause mis a jour avec success');
//             $("#acxion").trigger('reset');
             
            
//             } else{

//                  $('#info').addClass("alert alert-danger").html(reponse.msg);
//             }
//            },

//            error: function () {
//         alert("Erreur d'envoi de donnée");
//       }
//     })
//   });
// })

</script>
</body>
</html>