 window.onload = function() {
 		$('.container-fluid').fadeIn(700);
	 	$('.bg-bubbles').fadeIn(700);
	 	$('.mcw').fadeIn(700);
	 	$('.msb').fadeIn(700);
	 	$('.mnb').fadeIn(700);
 };

 
// Close any dialog box
function closeDialog(){
	$('.dialog').fadeOut(150);
	$('#msb').css("pointer-events", "auto");
	$('.navbar-fixed-top').css("pointer-events", "auto");
	$('.mcw').fadeIn(150);
}


// Side menu buttons click
$(".menulink").click(function(){

	$("#msb" + ($('.menulinkActive').html()).slice(($('.menulinkActive').html()).search('></i>')+6,-4)).fadeOut(150);

	setTimeout(() => {
		$(".menulink").removeClass('menulinkActive');
		$(this).addClass('menulinkActive');

		$("#msb" + ($('.menulinkActive').html()).slice(($('.menulinkActive').html()).search('></i>')+6,-4)).fadeIn(150);

		document.getElementById('msbo').innerHTML = "<i class=\"fa fa-bars\"></i> " + ($('.menulinkActive').html()).slice(($('.menulinkActive').html()).search('></i>')+1,-4);
		resizeCommandOutput();
		setDate();
	},150);

	$('body').toggleClass('msb-x');

});


// Open/close side menu
$("#msbo").click(function(){
	$('body').toggleClass('msb-x');
});
$(".brand-name-wrapper").click(function(){
	$('body').toggleClass('msb-x');
});


// Logout on logout button click
$("#logoutBtn").click(function(){
	$.post( "logout/index.php", {});
	$('.container-fluid').fadeOut(700);
	$('.bg-bubbles').fadeOut(700);
	$('.mcw').fadeOut(700);
	$('.msb').fadeOut(700);
	$('.mnb').fadeOut(700);
	setTimeout(() => {
		document.location.reload(true);
	},700);
});


