
<?php  
	
	
	include('db/config.php');



// ******************************************************************


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
 

// ---------------------------------

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

