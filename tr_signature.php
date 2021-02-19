



<?php

function verifie($donnees){
 
   $donnees = (string) $donnees;
         if (isset($donnees) && !empty($donnees)) {
           return $donnees;
         }
         else {
           return false;
         }

 }

$answer=null;

// on crée une variable $answer a cause de JSON

if (isset($_POST)) {

        
    include("db/config.php") ;
  // $db = mysqli_select_db($conn,'mistudent');
  $email = $_POST['email'];
  $mdp = md5($_POST['mdp']);
  $message = '';
  $date_pre = date('Y-m-d');
 if (verifie($email) AND verifie($mdp)   ) {
   // -------------------------------------------------((((()))))
// ------------Verifier si le teacher a indiqué le debut des cours----------
   $ind="SELECT * FROM cours WHERE date_cours='{$date_pre}'";
   $indiq= $conn->query($ind);
   if ($indiq->rowCount()>0 and $indiq->rowCount()<2) {
  
  // -------------------
$sql = " SELECT id_user FROM etud WHERE email ='$email' and mdp ='$mdp'";
   
  //requette vers la BDD
  $query = $conn->query($sql);
  //récuperation de donnée: fetch (vas chercher) retourne une entrée depuis la table
  $user = $query->fetch();
  if ($user) {
// si l'entre a ete trouve avec la requete qu'on a lancé
$id_user = $user["id_user"];

$date_pre = date('Y-m-d');
 $verif = "SELECT id_user  FROM etud WHERE id_user ='{$id_user}' and statut=0" ;
 
//  //requette vers la BDD
$ver = $conn->query($verif);
// //récuperation de donnée: fetch (vas chercher) retourne une entrée depuis la table
 $user_verif = $ver->fetch();
 

  if (!$user_verif) {
// // s'il n'y a pas de resultats 

 $iduser = $user["id_user"];

// s'il n'y a pas de resultats 

// --------mis a jour du statut(0 OU 1) de presence dans la table etudiant/colone statut-------------

  $conn->query("UPDATE etud SET statut = statut-1 WHERE id_user = '{$id_user}'");
// --------------------------------------------------------((((()))))
  //   // mis a jour des données de presence dans la table synthese juste apres signature
$while=$conn->query("SELECT * FROM etud WHERE id_user='{$id_user}'");
$vari=$while->fetchAll();
foreach ($vari as $row) {

  $r_id_user=$row['id_user'];
  $r_date_cours=$row['date_cours'];
  $r_statut=$row['statut'];
// -----inserer les données de presence 
  $conn->query("INSERT INTO presence SET id_user = '{$r_id_user}',date_pre = '{$r_date_cours}',heure = NOW(), statut='{$r_statut}'");
  }

  // ------------------------------------------------

  
          $tab=[];
      $v=$conn->query("SELECT id_user FROM presence WHERE id_user='{$iduser}'");
        $afv=$v->fetchAll();
      
        foreach ($afv as $key) {
          $k_id_user=$key['id_user'];
          

          if(!array_key_exists($k_id_user, $tab)){
            $tab["$k_id_user"]=1; 
          }else
          {
            $tab["$k_id_user"]++;
          }
        }
        $t_sign=$tab["$k_id_user"];

        $conn->query("UPDATE etud SET total_signe='{$t_sign}' WHERE id_user = '{$iduser}'");

  // -------------------------------------------------

// --------------------------------------------------------((((()))))
      // --------Etape-3-Determiner le nombre de presence dans la table synthese apres que le student est signé a nouveau----------------
$resu=$conn->query("SELECT statut FROM presence WHERE id_user = '{$id_user}' AND statut = 0");

    $t_attd=$resu->rowCount();
    // ----mis a jour du nombre de presence dans la table etudiant 
    $a=$conn->query("UPDATE etud SET total_pre = '{$t_attd}' WHERE id_user = '{$id_user}'");

    if ($a) {
      $answer="Query failled" ; 
    }else $answer="ok";
  
// -----------Mis a jour de la table mouth apres signature-----------((((()))))

  // $insert = "INSERT INTO presence SET id_user = $iduser,date_pre = NOW(),heure = NOW()";
  // $conn->query($insert);

  //  $answer="ok" ; 
   // ---------------mis a jour du nombre total de signature dans la table etud---------------

      //     $tab=[];
      // $v=$conn->query("SELECT id_user FROM presence WHERE id_user='{$iduser}'");
      //   $afv=$v->fetchAll();
      
      //   foreach ($afv as $key) {
      //     $k_id_user=$key['id_user'];
          

      //     if(!array_key_exists($k_id_user, $tab)){
      //       $tab["$k_id_user"]=1; 
      //     }else
      //     {
      //       $tab["$k_id_user"]++;
      //     }
      //   }
      //   $t_sign=$tab["$k_id_user"];

      //   $conn->query("UPDATE etud SET total_signe='{$t_sign}' WHERE id_user = '{$iduser}'");

  //  // --------------------------------

   } else $answer="Vous avez deja signé" ;
   
  } else $answer="email ou mot de pass invalide";

  } else $answer="Vous n'etes pas autorisé a signer en ce moment";
 
}else $answer="remplissez tous les champs svp";

 }

$output=array('msg' =>$answer);
// c'est a dire en fontion de la valeur que va prendre "msg"; $answer varira

echo json_encode($output);

?>