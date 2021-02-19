<?php
include('db/config.php');

 $statut=false;
 $aff="";

if (isset($_POST) && isset($_FILES['picture']) && $_FILES['picture']['error'] ==0) {
    $info="";
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $mdp=md5($_POST['mdp']);
    $mdp2=md5($_POST['mdp2']);
    $picture=$_FILES['picture'];
    $date= date("Y-m-d h:i:s");

    //************************ traitement d'image ************************
    // je veux renommer tous les img qui viennent s'enregistrer avec un nom commençant par YEME_ |||time= genere un new nom à l'image en fonction du temps
    $namePicture=uniqid('YEME_').time();
    // verifier la taille de l'img
    if ($picture['size'] >= 2000) {
        // stocker dans une variable les ## extension que doit prendre nos images
        $ext_oblig= array('jpg', 'jpeg', 'png');
        //
        $namimg_tab=explode('.', $picture['name']);
        //
        $derni_tab=array_pop($ext_oblig);
        //
        $j=strtolower($derni_tab);

        if (in_array($j, $ext_oblig)) {

            $statut=true;

        }else
        {
            $aff="";
        }

    }else
    {
        $aff = "La taille de l'image ne doit être compris";
    }

/*****************************************************************************/ 

    if(!empty($nom) && !empty($email) && !empty($tel) && !empty($mdp) && !empty($mdp2))
    {

        if($_POST['mdp'] == $_POST['mdp2']){
            $mdp2=md5($_POST['mdp2']);

            $sql = "SELECT * FROM etud WHERE email='{$email}' OR tel='{$tel}'";
            $result=$conn->query($sql);
            $res=$result->fetch();


            if(!$res)
            {
                $newNamePicture='imgs/'.$namePicture.'.png';
                if($statut=true)
                {

                    $insert = 'INSERT INTO etud(nom, email, tel, mdp,name_picture,date_etud) VALUES ("'.$nom.'", "'.$email.'", "'.$tel.'", "'.$mdp.'", "'.$newNamePicture.'", "'.$date.'")';
                    $inset=$conn->query($insert);
    // ************************************************

    $agn=$conn->query("SELECT id_user FROM etud WHERE email ='$email' and mdp ='$mdp'");
           $agnn=$agn->fetch();
           $found_id=$agnn['id_user'];
           $conn->query("INSERT INTO mois SET id_user ='{$found_id}'");

    // ************************************************
           // *********************** (mimi)*************************

    // $agns=$conn->query("SELECT id_user FROM etud WHERE email ='$email' and mdp ='$mdp'");
    //        $agnns=$agns->fetch();
    //        $found_ids=$agnns['id_user'];
    //        $conn->query("INSERT INTO presence SET id_user ='{$found_ids}'");

    // ************************************************

                  


                    if($inset)
                    {
                        $aff= "ok";
                        move_uploaded_file($picture['tmp_name'], $newNamePicture);

                    }
                    else
                    {
                        $aff= "connection failed";
                    }
                }
            }
            else
            {
               $aff= "email or tel existe déjà";
            }
        }
        else
        {
            $aff= "les deux mot de passe ne sont pas identiques";
        }
    }
    else
    {
        $aff="Merci de renseigner tous les champs svp";
    }

            
}else $aff="veuillez remplir tous les champs svp";

$output=array('msg'=>$aff);  

echo json_encode($output);