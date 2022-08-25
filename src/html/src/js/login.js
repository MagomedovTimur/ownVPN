var currentFrom = "Login"

function blockAll(){
	document.querySelector('body').className = "blocked";
}

function unblockAll(){
	document.querySelector('body').className = "";
}

 $("#login-button").click(function(event){

	event.preventDefault();
	blockAll();
	$.post( "login.php", { login: $("#login").val(), password: $("#password").val() });
	$('form').fadeOut(500);
	$('.wrapper').addClass('form-success');

	setTimeout(() => {
		$('.container').fadeOut(700);
		$('.bg-bubbles').fadeOut(700);

		setTimeout(() => {
			unblockAll();
			document.location.reload(true);
		},700);

	},
	1000
	);
});

 window.onload = function() {
 		$('.container').fadeIn(700);
	 	$('.bg-bubbles').fadeIn(700);

	 	setTimeout(() => {unblockAll();},700);

	 	
 };
