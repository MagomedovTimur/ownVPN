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
	$('form').fadeOut(500);
	$('.wrapper').addClass('form-success');

	setTimeout(() => {
		$('.container').fadeOut(700);
		$('.bg-bubbles').fadeOut(700);

		setTimeout(() => {unblockAll();},700);

	},
	1000
	);
});

 window.onload = function() {
 		$('.container').fadeIn(700);
	 	$('.bg-bubbles').fadeIn(700);

	 	setTimeout(() => {unblockAll();},700);

	 	
 };

 $(".lastButton").click(function()
 	{
	 	blockAll();

	 	if (currentFrom == "Login")
	 	{
	 		$('#loginForm').fadeOut(700);
			currentFrom = "Register"

			setTimeout(() => {
				$('#registerForm').fadeIn(700);

				setTimeout(() => {unblockAll();},700);

			},
			700
			);

	 	}
	 	else
	 	{
			$('#registerForm').fadeOut(700);
	 		currentFrom = "Login"

	 		setTimeout(() => {
		 		$('#loginForm').fadeIn(700);

		 		setTimeout(() => {unblockAll();},700);

			 },
			 700
			 );
	 	}

	}
);