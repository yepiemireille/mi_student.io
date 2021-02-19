
<?php
$answer=null;
include("bd.php");


if (isset($_POST['email'])) {

  $email = $_POST['email'];

	$verif_mail = "SELECT * FROM etudiant WHERE email ='$email'" ;
                 $ver_mail = $conn->query($verif_mail);
                 $verif_etud_mail = $ver_mail->fetch();
                 if (!$verif_etud_mail) {

                  $answer= 'ok'; 
           
                  } else $answer = 'ce mail a deja ete utilisé'; 



  $output=array('msg'=>$answer); 

echo json_encode($output);

  exit();

}
  
  

  if (isset($_POST['tel'])) {

    $tel = $_POST['tel'];


	$verif_tel = "SELECT * FROM etudiant WHERE tel = '$tel'" ;
                 $ver_tel = $conn->query($verif_tel);
                 $verif_etud_tel = $ver_tel->fetch();
                 if (!$verif_etud_tel) {

                  $answer= 'ok'; 
           
                  } else $answer = 'ce numero a deja ete utilisé'; 
}
   $output=array('msg'=>$answer); 

echo json_encode($output);

  exit();

?>