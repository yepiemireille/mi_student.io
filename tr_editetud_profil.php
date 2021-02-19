
 <?php
 session_start();
 include("db/config.php");
// on se connecte à MySQL et on sélectionne la base


$answer= "";
$statut= false;
if (isset($_POST) and isset($_FILES['picture']) and $_FILES['picture']['error'] == 0)
{
  $message= "";
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $picture = $_FILES['picture'];

   // renommer de l'image, le nom de l'ancienne image afin de permettre a la nouvelle image d'ecraser l'ancienne
  $editPictureName= $_SESSION['name_picture'];

  // traitements de l'image
     if ( $picture['size']>=5000) {

   $autorised_extention=array('jpg','jpeg','png');

    $prepare_ext=explode('.', $picture['name']);
     //La fonction explode () divise une chaîne en un tableau.
    $extention=array_pop($prepare_ext);
    //La fonction array_pop () selectionne la derniere valeur du tableau.
   $min_extention=strtolower($extention);
   if (in_array($min_extention, $autorised_extention)) {
     // 
    // 
     $statut=true; //ligne 8
     

   }else $answer='Le fichier importé n\'est pas une image';

  }
     else {

    $answer= 'l\'image selectionnée depasse la norme (5Mo Max)';
  }







   /* on test si les champ sont bien remplis */
    if(!empty($_POST['nom']) and !empty($_POST['email']) and !empty($_POST['tel']))
    {
       

                if ($statut===true) {// si le statut vaut true on peux envoyer l'image (voir ligne 36)


                //On créé la requête
                  $sql = "UPDATE etud SET nom = '{$nom}',email = '{$email}',tel='{$tel}',name_picture='{$editPictureName}' WHERE id_user = '{$_SESSION['id_user']}'";

                $result= $conn->query($sql);
                /*$result= mysqli_query($conn,$sql);*/ //version mysqli


                  // deplacement de notre image vers du dossier temporaire vers notre dossier avatar
                 move_uploaded_file($picture['tmp_name'], $editPictureName);
 
                               

              if (!$result) {

                $answer= "Query Failed";

              }else {
                $answer='ok';
              }


              }

    }
    else $answer= "Veuillez saisir tous les champs !"; 

}else $answer="impossible de traiter le formulaire, verifiez que tout les champs ont bien été remplis";

$output=array('msg'=>$answer); 

echo json_encode($output);


?>

