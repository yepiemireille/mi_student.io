
// Traitement ajax du formulaire de mise a jour de la date (voir:dashboard.php)

$(document).ready(function(){
  $("#form-program").on("submit", function(e){
    
    e.preventDefault();//on desactive le comportement par defaut du formulaire
    var form = $("#form-program");

    $.ajax({

           method: "POST",
           url:"http://localhost/mireille_site_project/mistudent/tr_header_statut.php",
           dataType:"JSON",
           data: form.serialize(),
           success: function(reponse)
           {
            if (reponse.msg=='ok') {
             $('#mes_info').removeClass("alert alert danger");
             $('#mes_info').addClass("alert alert-success").html('statut du cour mis a jour avec success,Bon debut de cours');
            $("#form-program").trigger('reset');
             
             }else if (reponse.msg=='ok2') {

              $('#mes_info').removeClass("alert alert danger");
             $('#mes_info').addClass("alert alert-success").html('Merci d\'avoir signé la fin des cours');
            $("#form-program").trigger('reset');

            } else{

                 $('#mes_info').addClass("alert alert-danger").html(reponse.msg);
            }
           },

           error: function () {
        alert("Erreur d'envoi de donnée");
      }
    })
  });
})