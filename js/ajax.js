/*La méthode preventDefault () annule l'événement s'il est annulable, ce qui signifie que l'action par défaut qui appartient à l'événement ne se produira pas.
Par exemple, cela peut être utile lorsque:
En cliquant sur un bouton «Soumettre», l'empêchez de soumettre un formulaire*/

// envoi des donnée dans la base de donnée à l'aide de ajax
$(document).ready(function(){
	 $("#regi").on("submit", function(e){ // si le bouton du formulaire dont l'id=register a ete soumit, on declare les ## variables du champs
		e.preventDefault(); // c'est pour annuler tous les actions qui devraient se produit par defaut
		var form = $("#regi"); 
		/*var nom = $("#fullname").val();
		var email = $("#fullname").val();
		var password = $("#fullname").val();*/

		var pic= new FormData(form[0]);
		pic.append("file", $('#picture'));
 
 // reception de la reponse attendu
		$.ajax({
			method: "POST",
			url: "http://localhost/mireille_site_project/mistudent//tr_register.php",
			processData: false,
			contentType: false,
			cache: false,
			dataType: "JSON",
			// envoie des donné hmtl sous forme JSON 
			// La méthode serialize () crée une chaîne de texte encodée URL en sérialisant les valeurs de formulaire.
			// Vous pouvez sélectionner un ou plusieurs éléments de formulaire (comme l'entrée et / ou la zone de texte), ou l'élément de formulaire lui-même.
			data: pic,
			success: function(reponse) // quand il n'ya pas d'ereur ou l'erreur ne se trouve pas dans la baes de donnée
			{
				if (reponse.msg=="ok") {
					$("#info").removeClass("alert-danger").addClass("alert alert-success").html('l\'enregistrement a été effectué avec succes');
					$("#regi").trigger('reset');
             // si le message retourné par php est egale a "ok" (voir le fichier de traitement trait_register.php) ( qui est inscrit depuis le fichier trait_register)
             // alors le message qui est inscrit dans les parentheses de html va s'executer)

				}else{
					$("#info").addClass("alert alert-danger").html(reponse.msg);
					// (reponse.msg) ici le mot "reponse" vient du parametre de la fonction "function(),
					// et "msg" c'est le numero de la ligne , genre la clé du tableau (voir le fichier de traitement php)
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


// $(document).ready(function(){
// 	 $("#loginForm").on("submit", function(e){ 
// 		e.preventDefault(); 
// 		var form = $("#loginForm"); 
// 		$.ajax({
// 			method: "POST",
// 			url: "http://localhost/mistudent/tr_register.php",
// 			dataType: "JSON",
// 			data: form.serialize(),
// 			success: function(reponse) 
// 			{
// 				if (reponse.msg=="redirige") {
// 					 window.location='student.php';
// 					$("#loginForm").trigger('reset');
            
// 				}else{
// 					$("#info").addClass("alert alert-danger").html(reponse.msg);
// 					}
// 			},
// 			error: function () { 
// 				alert("Erreur d'envoi de donnée");
// 			}
// 		})
// 	});

//      })

/* *************************************************************************************
                            email
**************************************************************************************** */


$(document).ready(function(){
	 $("#email").on("keyup", function(e){ 
		e.preventDefault(); 
		var mail = $("#email").val();
		$.ajax({
			method: "POST",
			url: "http://localhost/mireille_site_project/mistudent//email.php",
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
			url: "http://localhost/mireille_site_project/mistudent/stel.php",
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



// /* *************************************************************************************
//                                              Signature
//   ******************************************************************** */ 
// $(document).ready(function(){
// 	 $("#signature_form").on("submit", function(e){ 
// 		e.preventDefault();
// 		var form = $("#signature_form"); 
 
//  // reception de la reponse attendu
// 		$.ajax({
// 			method: "POST",
// 			url: "http://localhost/mistudent/tr_signature.php",
// 			dataType: "JSON",
// 			data: form.serialize(),
// 			success: function(reponse) 
// 			{
// 				if (reponse.msg=="ok") {
// 					window.location='student.php';
             
// 				}else{
// 					$("#con").addClass("alert alert-danger").html(reponse.msg);
// 				}
// 			},
// 			error: function () { // quand il y'a une erreur dans la base de donnée
// 				alert("Erreur d'envoi de donnée");
// 			}
// 		})
// 	});

//      })

