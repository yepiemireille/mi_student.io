


    <?php
  include("db/config.php");
  
  if (isset($_POST)) {
    
    $answer="";
    $email=$_POST['email']; // $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $mdp=md5($_POST['mdp']);

    if (!empty($email) and !empty($mdp)) {

      $sql= "SELECT * FROM etud WHERE email='$email' AND mdp='$mdp'";
      $query=$conn->query($sql);
    
      if ($query->rowCount() > 0) {
            session_start();
        while($row =$query->fetch()) 
        {
          $_SESSION['id_user']=$row["id_user"];
          $_SESSION['nom']=$row["nom"];
          $_SESSION['email']=$row["email"];
          $_SESSION['tel']=$row["tel"];
          $_SESSION['mdp']=$row["mdp"];
          $_SESSION['name_picture']=$row["name_picture"];
          $_SESSION['date_etud']=$row["date_etud"];
          $_SESSION['total_signe']=$row["total_signe"];              
        
        $answer='okey';
}
      } else {$answer='mot de passe ou email invalide';}

    }else {$answer='Veuillez remplir les champs S.V.P';}

    $output=array('msg'=>$answer);
    echo json_encode($output);

  }

  // $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
  //     $requser->execute(array($mailconnect, $mdpconnect));
  //     $userexist = $requser->rowCount();
  //     if($userexist == 1) {
  //        $userinfo = $requser->fetch();
  //        $_SESSION['id'] = $userinfo['id'];
  //        $_SESSION['pseudo'] = $userinfo['pseudo'];
  //        $_SESSION['mail'] = $userinfo['mail'];
  //        header("Location: profil.php?id=".$_SESSION['id']);

  ?>