
<?php  
	
	
include('db/config.php');
// Traitement du formulaire de mise a jour de la date (voir:dashboard.php)
  
if (isset($_POST)) {
	$statut_cours = isset($_POST['statut_cours'])?$_POST['statut_cours']:null;
	if (!empty($statut_cours)) {
		$heur= date("H:i:s");
		$dat= date("Y-m-d");
		$debut="Debut";
		$nd="nom defini";
		$none='';

		if (($_POST['statut_cours']) ==$debut){
			$select="SELECT * FROM cours WHERE statut_cours ='{$statut_cours}' AND date_cours='{$dat}'";
			$result=$conn->query($select);
			if ($result->rowCount()<1) {
				$insert="INSERT INTO cours SET statut_cours ='{$statut_cours}',heure_cours = '{$heur}', date_cours = '{$dat}'";
				$result_insert=$conn->query($insert);
				$conn->query("UPDATE etud SET date_cours = '{$dat}',statut = 1");
				
   include("mouth.php"); 
   // ---------------
   include("totalsign_deb.php");
// ----------------------------
			}
		}
	}
}






   




























//	include('db/config.php');



/* ******************************************************************


	$mouth=$conn->query("SELECT id_user FROM etud");
$mout=$mouth->fetchAll();
foreach ($mout as $key) {
$k_iduser=$key['id_user'];
// ---------------------------------------
$t = [];
$mou=$conn->query("SELECT date_pre FROM presence WHERE id_user = $k_iduser");
$mo=$mou->fetchAll();
foreach ($mo as $key) {
  $new_date=$key['date_pre'];

  $affiche=$conn->query("SELECT MONTH('$new_date') as mois");

$aa=$affiche->fetch();
$found=$aa["mois"];

if(!array_key_exists($found, $t)){
    $t[$found] = 1;
    
}else $t[$found]++;
 

 //---------------------------------

if (isset($t['1'])){
  	$jmoth=($t['1']);
	$conn->query("UPDATE mois SET janvier= $jmoth WHERE id_user=$k_iduser");
}
if (isset($t['2'])){
  	$fmoth=($t['2']);
	$conn->query("UPDATE mois SET fevrier= $fmoth WHERE id_user=$k_iduser");
}
if (isset($t['3'])){
  	$mmoth=($t['3']);
	$conn->query("UPDATE mois SET mars= $mmoth WHERE id_user=$k_iduser");
}
if (isset($t['4'])){
  	$amoth=($t['4']);
	$conn->query("UPDATE mois SET avril= $amoth WHERE id_user=$k_iduser");
}
if (isset($t['5'])){
  	$mamoth=($t['5']);
	$conn->query("UPDATE mois SET mai= $mamoth WHERE id_user=$k_iduser");
}
if (isset($t['6'])){
  	$jumoth=($t['6']);
	$conn->query("UPDATE mois SET juin= $jumoth WHERE id_user=$k_iduser");
}
if (isset($t['7'])){
  	$etmoth=($t['7']);
	$conn->query("UPDATE mois SET juillet= $etmoth WHERE id_user=$k_iduser");
}
if (isset($t['8'])){
  	$aomoth=($t['8']);
	$conn->query("UPDATE mois SET aout= $aomoth WHERE id_user=$k_iduser");
}
if (isset($t['9'])){
  	$setmoth=($t['9']);
	$conn->query("UPDATE mois SET septembre= $setmoth WHERE id_user=$k_iduser");
}
if (isset($t['10'])){
  	$ocmoth=($t['10']);
	$conn->query("UPDATE mois SET octobre= $ocmoth WHERE id_user=$k_iduser");
}
if (isset($t['11'])){
  	$nomoth=($t['11']);
	$conn->query("UPDATE mois SET novembre= $nomoth WHERE id_user=$k_iduser");
}
if (isset($t['12'])){
  	$demoth=($t['12']);
	$conn->query("UPDATE mois SET decembre= $demoth WHERE id_user=$k_iduser");
}

}
}
*/


// *******************************************************************
	// $t=[];
	// $sql=$conn->query("SELECT date_pre FROM presence WHERE id_user=6");
	// $af_re=$sql->fetchAll();
	// foreach ($af_re as $key) {

	//   $new_date=$key['date_pre'];

	//   $resul=$conn->query("SELECT MONTH('$new_date') as mois");
	//   $aa=$resul->fetch();
	//   $found=$aa["mois"];

	//   if(!array_key_exists($found, $t)){
	//     $t[$found] = 1;

	    
	//   }else $t[$found]++;
	 
	//    // var_dump($found);
	//   //echo $t['11'];

	  
	// }
	// if(isset($t['1'])){
	//   	$jmoth=($t['1']);
	//   	$conn->query("UPDATE mois SET janvier= $jmoth WHERE id_user=6");
	// }

	// if(isset($t['2'])){
	//   	$fmoth=($t['2']);
	//   	$conn->query("UPDATE mois SET fevrier= $fmoth WHERE id_user=6");
	// }

	// if(isset($t['3'])){
	//   	$mmoth=($t['3']);
	//   	$conn->query("UPDATE mois SET mars= $mmoth WHERE id_user=6");
	// }

	// if(isset($t['4'])){
	//   	$amoth=($t['4']);
	//   	$conn->query("UPDATE mois SET avril= $amoth WHERE id_user=6");
	// }

	// if(isset($t['5'])){
	//   	$mamoth=($t['5']);
	//   	$conn->query("UPDATE mois SET mai= $mamoth WHERE id_user=6");
	// }

	// if(isset($t['6'])){
	//   	$jumoth=($t['6']);
	//   	$conn->query("UPDATE mois SET juin= $jumoth WHERE id_user=6");
	// }

	// if(isset($t['7'])){
	//   	$etmoth=($t['7']);
	//   	$conn->query("UPDATE mois SET juillet= $etmoth WHERE id_user=6");
	// }

	// if(isset($t['8'])){
	//   	$aomoth=($t['8']);
	//   	$conn->query("UPDATE mois SET aout= $aomoth WHERE id_user=6");
	// }

	// if(isset($t['9'])){
	//   	$ocmoth=($t['9']);
	//   	$conn->query("UPDATE mois SET octobre= $ocmoth WHERE id_user=6");
	// }

	// if(isset($t['10'])){
	//   	$ocmoth=($t['10']);
	//   	$conn->query("UPDATE mois SET octobre= $ocmoth WHERE id_user=6");
	// }

	// if(isset($t['11'])){
	//   	$nomoth=($t['11']);
	//   	$conn->query("UPDATE mois SET novembre= $nomoth WHERE id_user=6");
	// }

	// if(isset($t['12'])){
	//   	$demoth=($t['12']);
	//   	$conn->query("UPDATE mois SET decembre= $demoth WHERE id_user=6");
	// }



// **************************************************************
	// $result_m=$conn->query("SELECT id_user FROM etud");
	// $af_m=$result_m->fetchAll();

	//pour chaque resultat trouvé insere dans la tle mois
	// pour envoyer les id de l'etud dans la tle mois
	 
	// foreach ($af_m as $key) {
	// 	$k_id_user=$key['id_user'];
	// 	$conn->query("INSERT INTO mois SET id_user ='{$k_id_user}'");			
	// ***************************************************************
	//}


		
	// $nb=$v->rowCount();
	// $iduser = $afv["date_pre"];








	// *****************************************************************
	// $t=[];
	// $v=$conn->query('SELECT id_user FROM presence WHERE id_user=7');
	// $afv=$v->fetchAll();
	// // $key=$afv['id_user'];
	// foreach ($afv as $key) {
	// 	$k_id_user=$key['id_user'];
		

	// 	if(!array_key_exists($k_id_user, $t)){
	// 		$t["$k_id_user"]=1;	
	// 	}else
	// 	{
	// 		$t["$k_id_user"]++;
	// 	}
	// }
	// $t_sign=$t["$k_id_user"];

	// $conn->query("UPDATE etud SET total_signe='{$t_sign}' WHERE id_user = 7");
		
	// $nb=$v->rowCount();
	// $iduser = $afv["date_pre"];
	














// *****************************************************************
// session_start();

// 	include("db/config.php");

// 	if(isset($_POST['subpass']))
// 	 {//id,username,password
// 		$o_password = $_POST['o_password'];
// 		$n_password = $_POST['n_password'];
// 		$r_password = $_POST['r_password'];

// 		$query =$conn->query("SELECT * FROM teacher WHERE t_email='{$_SESSION['t_email']}' AND t_mdp='$o_password'");
// 		$rows = mysql_num_rows($query);

// 		if(empty($o_password))
// 		{
// 			echo "Veuillez saisir votre ancien mot de passe";
// 		}else if($n_password != $r_password)
// 		{
// 			echo "Vos nouveaux mots de passe sont différents";
// 		}else if($rows == 0){
// 			echo "L'ancien mot de passe est incorrect!";
// 		}else{
// 			$n_password = md5($n_password);
// 			$conn->query("UPDATE users SET password='$n_password' WHERE username='{$_SESSION['pseudo']}' ");
// 			header("Location:membre.php");
// 		}
// 	}
?>