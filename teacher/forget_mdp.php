 
<?php  

//ATTENTION??::vous devez désactiver la sécurité de votre compte d'ou vous envoyer l'email parce que sinon PHPMailer ne va pas pouvoir accéder à votre compte
	
	require "PHPMailer/PHPMailerAutoload.php";
	
	include("db/config.php");
	if(isset($_POST['valider_email'])){
		$t_email = $_POST['t_email'];
		// selectionne tous ce qui est dans la table teacher ou email = ?
		$requete_sur_email = $conn->prepare('SELECT * FROM teacher WHERE t_email = ?');
		// ce point d'interrogation correspond à la variable $t_email
		$requete_sur_email->execute(array($t_email));
		// si on trouve un email
		if($requete_sur_email->rowCount() > 0){
			// recuperation du mdp du teacher
			// recuperation de tous ce qui correspond à cette adresse email qu'on a recupere
			$info_user = $requete_sur_email->fetch();
			// recupère le mot de passe du teacher à partir des info du teacher qu'on a recuperé à partir de l'adresse email
			$mdp_user = $info_user['t_mdp'];
			// (echo $mdp_user;) pour verifier si ça recupère vraiment le mdp
			// (http://downisynet.rf.gd/code-article.php?code=30&fonction=amis&&i=1)
			// code amicale=(Ordiroutier)

			// *************************************************************


	function smtpmailer($to, $from, $from_name, $subject, $body)

    {

        $mail = new PHPMailer();

        $mail->IsSMTP();

        $mail->SMTPAuth = true; 

 

        $mail->SMTPSecure = 'ssl'; 

        $mail->Host = 'smtp.gmail.com'; // il a mis stmp au lieu de smtp

        $mail->Port = 465;  

        

        $mail->Username = 'essemireilleyepie@gmail.com'; 

        $mail->Password = 'monmdp';  

        

   

        $mail->IsHTML(true);

        

        $mail->From="essemireilleyepie@gmail.com";

        $mail->FromName=$from_name;

        $mail->Sender=$from;

        $mail->AddReplyTo($from, $from_name);

        $mail->Subject = $subject;

        $mail->Body = $body;

        $mail->AddAddress($to);

        if(!$mail->Send())

        {

            $error ="Une erreur s'est produite lors de l'envoie du mail !";

            return $error; 

        }

        else 

        {

            $error = "Email envoyé avec succès !";  

            return $error;

        }

    }

    

    

    $to   = $info_user['t_email'];

    

    $from = 'essemireilleyepie@gmail.com';

    

    $name = 'Admin de Ordiroutier'; //le nom de la perso qui envoie le mail

    

    $subj = 'Récupération de votre compte sur notre site';

    

    $msg = 'Bonjour, voici votre mot de passe sur le site : '.$mdp_user;

    

    $error=smtpmailer($to, $from, $name ,$subj, $msg);

// ************************************************************

		}else{echo "L'email est invalide (n'existe pas dans le site)";}
	}

?>




<!DOCTYPE html>
<html>
<head>
    <title>Mot de passe oublié</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/fontawesome.min.css" integrity="sha512-8jdwayz5n8F2cnW26l9vpV6+yGOcRAqz6HTu+DQ3FtVIAts2gTdlFZOGpYhvBMXkWEgxPN3Y22UWyZXuDowNLA==" crossorigin="anonymous" />
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>





<div class="jumbotrom text-center" style="margin-bottom: 0">
	<h1>page Teacher</h1>
</div>

<div class="container" style="margin-top: 125px;">
	<div class="row">
		<div class="col-md-4">
			c
		</div>
		<div class="col-md-4" style="margin-top: 20px;">
			<div class="card">
				<div class="card-header">Mot de passe oublié</div>
				<div id="message_admin"></div>
				<div class="card-body">
					<form method="post">
						
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="t_email" id="t_email" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="submit" name="valider_email" id="login" class="btn btn-info" value="Envoie de mail" />
						</div>
					</form>
					<?php 
					if(isset($error)){
						echo $error;
					}
					?>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			
		</div>

	</div>
</div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/7cb0e7c261.js" crossorigin="anonymous"></script>

        
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="t_ajax.js"></script>
<script src="js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

</body>
</html>