<?php  
    include('db/config.php');
    session_start();

    if(!isset($_SESSION["id_user"])){
        header('location:connexion.php');
    }


?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
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
    border-radius:1.5rem;
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
</style>
<nav>
  <ul>
    <li class="deroulant"><a href="dashboard_student.php" style="text-decoration: none;">Accueil &ensp;</a>
      <ul class="sous">
      </ul>
    </li>
    <li class="deroulant"><a href="etud_profil.php" style="text-decoration: none;">Profil &ensp;</a>
      <ul class="sous">
        <li><a href="etud_profil.php" style="text-decoration: none;">Information personnelle</a></li>
        <li><a href="etud_mdp.php" style="text-decoration: none;">Sécurité</a></li>
      </ul>
    </li>
    <li><a href="#propos.php" style="text-decoration: none;">A propos</a></li>
    <li><a href="logout.php" style="text-decoration: none;">Deconnexion</a></li>
  </ul>
</nav>

<!-- ***************************************** -->
<?php include('tr_graphan.php'); ?>
<!-- ***************************************** -->
<div class="container center" style="margin-top: 104px;">
            <div class="form">
                <div class="note">
                	<button type="button" class="btn btn-primary" style="margin-right: -973px;"><a href="editetud_profil.php" style="color: white;text-decoration: none;">Editer</a></button>
                    <h2>Profil</h2>

                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-5">
                            <img class="rounded-circle" src="<?= $_SESSION['name_picture']; ?>" style="width: 250px;height: 250px;">
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <h2><strong>Nom & Prenoms:</strong> <?= $_SESSION['nom']; ?></h2>
                            </div>
                            <div class="form-group">
                                <h2><strong>Email:</strong> <?= $_SESSION['email']; ?></h2>
                            </div>
                            <div class="form-group">
                                <h2><strong>Tel:</strong> <?= $_SESSION['tel']; ?></h2>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>