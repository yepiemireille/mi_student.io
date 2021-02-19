// traitement de la page edit_student_picture.php

$(document).ready(function(){
	$("#form_edit_student").on("submit", function(e){
		e.preventDefault();//on desactive le comportement par defaut du formulaire
		var form = $(this);// (this) fait reference a ["#register-form"]
		
		var formdata = new FormData(form[0]);
		formdata.append("file", $('#picture')); 
		
		$.ajax({
			method: "POST",
			enctype: 'multipart/form-data',// type d'encodage 
			url: "http://localhost/mireille_site_project/mistudent/tr_editetud_profil.php",
			processData: false,
	      	contentType: false,
	      	cache: false,
			dataType: "JSON",
			
			data: formdata,
			success: function(reponse)
			{
				if (reponse.msg=="ok") {
					$("#message").removeClass("alert-danger").addClass("alert alert-success").html('les modification ont été effectuées avec success');
					$("#form_edit_student").trigger('reset');
					// window.location='etud_profil.php'
             
				}else{
					$("#message").addClass("alert alert-danger").html(reponse.msg);
					
				}
			},
			error: function () {
				alert("Erreur d'envoi de donnée");
			}
		})
	});

     })











// ***************************************************************************************************************
// ***************************************************************************************************************


// traitement de la page edit_student_profil.php

// $(document).ready(function(){
// 	$("#form_edit_student").on("submit", function(e){
// 		e.preventDefault();//on desactive le comportement par defaut du formulaire
// 		var form = $(this);// (this) fait reference a ["#register-form"]
		
// 		var formdata = new FormData(form[0]);
// 		formdata.append("file", $('#profil')); 
		
// 		$.ajax({
// 			method: "POST",
// 			enctype: 'multipart/form-data',// type d'encodage 
// 			url: "http://localhost/student/trait_edit_student_profil.php",
// 			processData: false,
// 	      	contentType: false,
// 	      	cache: false,
// 			dataType: "JSON",
			
// 			data: formdata,
// 			success: function(reponse)
// 			{
// 				if (reponse.msg=="ok") {
// 					$("#message").removeClass("alert-danger").addClass("alert alert-success").html('les modification ont été effectuées avec success');
// 					$("#form_edit_student").trigger('reset');
// 					window.location='student_dashboard.php'
             
// 				}else{
// 					$("#message").addClass("alert alert-danger").html(reponse.msg);
					
// 				}
// 			},
// 			error: function () {
// 				alert("Erreur d'envoi de donnée");
// 			}
// 		})
// 	});

//      })

