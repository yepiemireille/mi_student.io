
// envoi des donnée dans la base de donnée à l'aide de ajax
$(document).ready(function(){
	 $("#regi").on("submit", function(e){ // si le bouton du formulaire dont l'id=register a ete soumit, on declare les ## variables du champs
		e.preventDefault(); // c'est pour annuler tous les actions qui devraient se produit par defaut
		var form = $("#regi"); 

		var pic= new FormData(form[0]);
		pic.append("file", $('#picture'));
 
 // reception de la reponse attendu
		$.ajax({
			method: "POST",
			url: "http://localhost/mireille_site_project/mistudent/tr_register.php",
			processData: false,
			contentType: false,
			cache: false,
			dataType: "JSON",
			
			data: pic,
			success: function(reponse) // quand il n'ya pas d'ereur ou l'erreur ne se trouve pas dans la baes de donnée
			{
				if (reponse.msg=="ok") {
					$("#info").removeClass("alert-danger").addClass("alert alert-success").html('l\'enregistrement a été effectué avec succes');
					$("#regi").trigger('reset');
				}else{
					$("#info").addClass("alert alert-danger").html(reponse.msg);
				}
			},
			error: function () { // quand il y'a une erreur dans la base de donnée
				alert("Erreur d'envoi de donnée");
			}
		})
	});

     })

/* *************************************************************************************
**************************************************************************************** */


$(document).ready(function(){
	 $("#loginForm").on("submit", function(e){ 
		e.preventDefault(); 
		var form = $("#loginForm"); 
		$.ajax({
			method: "POST",
			url: "http://localhost/mireille_site_project/mistudent/tr_register.php",
			dataType: "JSON",
			data: form.serialize(),
			success: function(reponse) 
			{
				if (reponse.msg=="redirige") {
					 window.location='student.php';
					$("#loginForm").trigger('reset');
            
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

/* *************************************************************************************
                            email
**************************************************************************************** */


$(document).ready(function(){
	 $("#email").on("keyup", function(e){ 
		e.preventDefault(); 
		var mail = $("#email").val();
		$.ajax({
			method: "POST",
			url: "http://localhost/mireille_site_project/mistudent/email.php",
			dataType: "JSON",
			data: { email:mail },
			success: function(reponse) 
			{
				if (reponse.msg=="ok") {
					$("#inff").removeClass("alert alert-danger").addClass("alert alert-success").html("email disponible");
					return true;
            
				}else{
					$("#inff").addClass("alert alert-danger").html(reponse.msg);
					}
			},
			error: function () { 
				alert("Erreur d'envoi de donnée");
			}
		})
	});

     })



/* *************************************************************************************
                           tel
**************************************************************************************** */


$(document).ready(function(){
	 $("#tel").on("keyup", function(e){ 
		e.preventDefault(); 
		var telp = $("#tel").val();
		$.ajax({
			method: "POST",
			url: "http://localhost/mireille_site_project/mistudent/tel.php",
			dataType: "JSON",
			data: { tel:telp },
			success: function(reponse) 
			{
				if (reponse.msg=="ok") {
					$("#inf").removeClass("alert alert-danger").html("").addClass("alert alert-success").html("numero de telephone disponible");
            
				}else{
					$("#inf").removeClass("alert alert-success").addClass("alert alert-danger").html(reponse.msg);
					}
			},
			error: function () { 
				alert("Erreur d'envoi de donnée");
			}
		})
	});

     })



/* *************************************************************************************
                                             Signature
  ******************************************************************** */ 
$(document).ready(function(){
	 $("#signature_form").on("submit", function(e){ 
		e.preventDefault();
		var form = $("#signature_form"); 
 
 // reception de la reponse attendu
		$.ajax({
			method: "POST",
			url: "http://localhost/mireille_site_project/mistudent/tr_signature.php",
			dataType: "JSON",
			data: form.serialize(),
			success: function(reponse) 
			{
				if (reponse.msg=="ok") {
					window.location='student.php';
             
				}else{
					$("#con").addClass("alert alert-danger").html(reponse.msg);
				}
			},
			error: function () { // quand il y'a une erreur dans la base de donnée
				alert("Erreur d'envoi de donnée");
			}
		})
	});

     })


/* *************************************************************************************
                                            connexion student
  ******************************************************************** */ 

$(document).ready(function(){
	$("#login_form_etud").on("submit", function(e){
		e.preventDefault();//on desactive le comportement par defaut du formulaire
		var form = $("#login_form_etud");

		$.ajax({

           method: "POST",
           url:"http://localhost/mireille_site_project/mistudent/tr_connexion.php",
           dataType:"JSON",
           data: form.serialize(),
           success: function(reponse)
           {

           	if (reponse.msg=='okey') {
                // faire une redirection
             window.location='dashboard_student.php';
             $("#login_form_etud").trigger('reset');
           	} else{

                 $('#message_etud').addClass("alert alert-danger").html(reponse.msg);

                 
           	}
           },

           error: function () {
				alert("Erreur d'envoi de donnée");
			}
		})
	});
})


