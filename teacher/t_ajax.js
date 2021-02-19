
/* *************************************************************************************
                                            connexion teacher
  ******************************************************************** */ 

$(document).ready(function(){
	$("#login_form").on("submit", function(e){
		e.preventDefault();//on desactive le comportement par defaut du formulaire
		var form = $("#login_form");

		$.ajax({

           method: "POST",
           url:"http://localhost/mireille_site_project/mistudent/teacher/trai_login_admin.php",
           dataType:"JSON",
           data: form.serialize(),
           success: function(reponse)
           {

           	if (reponse.msg=='ok') {
                // faire une redirection
             window.location='dashboard_admin.php'
             $("#login_form").trigger('reset');
           	} else{

                 $('#message_admin').addClass("alert alert-danger").html(reponse.msg);

                 
           	}
           },

           error: function () {
				alert("Erreur d'envoi de donnée");
			}
		})
	});
})


// *********************************** ancien mdp teacher*****************

$(document).ready(function(){
  $("#teacher_form").on("submit", function(e){
    e.preventDefault();//on desactive le comportement par defaut du formulaire
    var form = $("#teacher_form");

    $.ajax({

           method: "POST",
           url:"http://localhost/mireille_site_project/mistudent/teacher/tr_anc_mdp.php",
           dataType:"JSON",
           data: form.serialize(),
           success: function(reponse)
           {

            if (reponse.msg=='ok') {
                // faire une redirection
             window.location='new_mdp.php'
             $("#teacher_form").trigger('reset');
            } else{

                 $('#teacher_m').addClass("alert alert-danger").html(reponse.msg);

                 
            }
           },

           error: function () {
        alert("Erreur d'envoi de donnée");
      }
    })
  });
})



