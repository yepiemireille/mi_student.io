

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
    // ----------Differencier le debut de la fin des cours ---------------
    // ---si le statut entré par le teacher = "debut" alors executer cette instruction

if (($_POST['statut_cours']) ==$debut) {
	
 	 // ------------------Verifier si une fin ou debut a deja été inseré dans la table cours-----------------
 

 	$qr= "SELECT * FROM cours WHERE statut_cours ='{$statut_cours}' AND date_cours = '{$dat}'";
 	$qqr= $conn->query($qr);
 	// si le nombre de ligne retournées est inferieure a 2
 	if ($qqr->rowCount()<1) {
 	
// -----Inserer les cours de cours dans la table cours----------------
		$sql= "INSERT INTO cours SET statut_cours='{$statut_cours}',heure_cours = '{$heur}', date_cours = '{$dat}'";
		$ssql= $conn->query($sql);
		// -------------------------------------------------((((()))))
		// ----etape-1-----mettre a jour le statut de chaque etudiant a (1) dans la table etudiant et la date du jour-----

   $conn->query("UPDATE etud SET date_cours = '{$dat}',statut = 1");

// --------mis a jour de la table mouth---------
   // include("mouth.php"); 
   // // ---------------
   // include("totalsign_deb.php");
// ----------------------------
		if ($ssql) {
			$answer= "ok";
			

		} else $answer= "Query Failled";

		// ----------------------------------
				 } else $answer= " statut deja mis a jour";

	 } 

	 // -------------------------------------------------((((()))))
	 else {  // ----sinon si le champs entré par le teacher est "fin des cour" alors executer cette instruction
	 	
	 	// si le statut fin a ete cliké avant debut
	 	$downn= "SELECT * FROM cours WHERE  statut_cours='{$debut}' AND date_cours='{$dat}'";
	 	$down= $conn->query($downn);
	 	if ($down->rowCount()>0) {
	 		
       // ------------------Verifier si une fin ou debut a deja été inseré dans la table cours-----------------

 	$qr= "SELECT * FROM cours WHERE statut_cours ='{$statut_cours}' AND date_cours = '{$dat}'";
 	$qqr= $conn->query($qr);
 	// si le nombre de ligne retournées est inferieure a 2
 	if ($qqr->rowCount()<1) {
 	
// -----Inserer les cours de cours dans la table cours----------------
		$sql= "INSERT INTO cours SET statut_cours='{$statut_cours}',heure_cours = '{$heur}', date_cours = '{$dat}'";
		$ssql= $conn->query($sql);
 
	// -------------------------------------------------((((()))))
		// ------------- Etape-2 - mis a jour de la table presence (absences) ---
    
      // ----------------abscence-------------
      $req="SELECT * FROM etud WHERE statut=1";
      $rreq=$conn->query($req);
      $reqq= $rreq->fetchAll();
      foreach ($reqq as $key ) {
      	$k_iduser=$key['id_user'];
      	 $k_date_cours=$key['date_cours'];
      	 $k_statut=$key['statut'];
      $conn->query("INSERT INTO presence SET id_user = $k_iduser, date_abs = '{$k_date_cours}', statut = '{$k_statut}', causes = '{$nd}'");
      }
  // --------------------------------------------------------((((()))))
      // --------Etape-3-Determiner le nombre d'absebsence dans la table presence apres que le techear est mentioner la fin des cours----------------

$syht="SELECT id_user FROM etud";
$syn= $conn->query($syht);
$sy=$syn->fetchAll();
foreach ($sy as $val) {

  $v_iduser=$val['id_user'];

  $resu=$conn->query("SELECT statut FROM presence WHERE id_user = '{$v_iduser}' AND statut = 1");

  	$t_abs=$resu->rowCount();
  	// ----mis a jour du nombre d'absences dans la table etudiant 
  	$conn->query("UPDATE etud SET total_abs = '{$t_abs}' WHERE id_user = $v_iduser");

}

// ----------------------presence egalement---------------------

$syht="SELECT id_user FROM etud";
$syn= $conn->query($syht);
$sy=$syn->fetchAll();
foreach ($sy as $val) {

  $v_iduser=$val['id_user'];

  $resu=$conn->query("SELECT statut FROM presence WHERE id_user = '{$v_iduser}' AND statut = 0");

    $t_attd=$resu->rowCount();
    // ----mis a jour du nombre d'absences dans la table etudiant 
    $conn->query("UPDATE etud SET total_sign = '{$t_attd}' WHERE id_user = $v_iduser");
}


 // ---------------------mis a jour a zero---------------((((()))))
 $none='';
   $conn->query("UPDATE etud SET date_cours = '{$none}',statut = '{$none}'");
   // -------------------------------------------------((((()))))
		// ----------------------------------------
		if ($ssql) {

			$answer= "ok2";
			
		} else $answer= "Query Failled";

		// ----------------------------------
				 } else $answer= " statut deja mis a jour";

	 }else $answer= "Vous n'avez pas indiqué la date de debut des cours";
 }
	
// -----------------------------------
	 // -------------------------------------
        	 }else $answer="Inserer le statut du cours svp";

        }

    $output=array('msg' =>$answer);

echo json_encode($output);  
 ?>