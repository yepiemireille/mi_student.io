
<?php
include('db/config.php');

 $aff="";

if (isset($_POST)) {
    $info="";
    $email=$_POST['email'];

    if(!empty($email))
    {

        

            $sql = "SELECT * FROM etud WHERE email='{$email}'";
            $result=$conn->query($sql);
            $res=$result->fetch();


            if(!$res)
            {

                $insert = 'INSERT INTO etud(nom, email, tel, mdp) VALUES ("'.$nom.'", "'.$email.'", "'.$tel.'", "'.$mdp.'")';
                $inset=$conn->query($insert);


                if($inset)
                {
                    $aff= "ok";
                }
                else
                {
                    $aff= "connection failed";
                }
            }
            else
            {
               $aff= "email existe déjà";
            }
        
    }
    else
    {
        $aff="veuillez remplir tous les champs svp";
    }

            
}

$output=array('msg'=>$aff);  

echo json_encode($output);




$(document).ready(function(){
	 $("#email").on("submit", function(e){  
		e.preventDefault(); 
		var form = $("#regi"); 
		$.ajax({
			method: "POST",
			url: "http://localhost/mistudent/tr_register.php",
			dataType: "JSON",
			data: form.serialize(),
			success: function(reponse) 
			{
				if (reponse.msg=="ok") {
					$("#info").removeClass("alert-danger").addClass("alert alert-success").html('l\'enregistrement a été effectué avec succes');
					$("#regi").trigger('reset');
				}else{
					$("#info").addClass("alert alert-danger").html(reponse.msg);
				}
			},
			error: function () { 
				alert("Erreur d'envoi de donnée");
			}
		})
	});

     })