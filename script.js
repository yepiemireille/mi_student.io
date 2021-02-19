
$(function() {
	$("#login_btn").click(function() {
		$("#login_btn").hide();
		$("#login_message").html("<img src='images/loader.gif'>");

		var nom = $("#nom").val();
		var mdp = $("#mdp").val();

		$.post("login.php", { nom: nom, mdp: mdp})
		.done(function( data ){
			if (data == "success") {
				window.location = "home.php";
			}else 
			{
				$("#login_message").text("Invalid nom or mot de passe! Try again.");
				$("#login_btn").show();
			}
		});
	});
});