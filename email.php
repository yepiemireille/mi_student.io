<?php
	$affemail= "";
	include('db/config.php');


	if (isset($_POST['email'])) {

		$email=$_POST['email'];

			$sqlemail="SELECT * FROM etud WHERE email='{$email}'";
			$resultemail=$conn->query($sqlemail);
			$resemail=$resultemail->fetch();

			if (!$resemail) {
				 $affemail= "ok";
			} 
			else 
			{
				$affemail= "email exist déjà";
			}

	} 
$output=array('msg'=>$affemail); // 
echo json_encode($output);

exit();
		


?>


<?php 

$affemail= "";
	include('db/config.php');
	
if (isset($_POST['tel'])) {
    $tel=$_POST['tel'];


	$verif_tel = "SELECT id_user FROM etud WHERE tel = '{$tel}'" ;
                 $ver_tel = $conn->query($verif_tel);
                 $verif_etud_tel = $ver_tel->fetch();
                 if (!$verif_etud_tel) {

                  $affemail= 'ok'; 
           
                  } else $affemail = 'ce numero a deja ete utilisé'; 
}
   $output=array('msg'=>$affemail); 

echo json_encode($output);

  exit();

 ?>