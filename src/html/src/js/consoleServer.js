// Save server config
$("#saveConfig").click(function(){
	$.post( "../manage/changeExtIP.php", { IP : $("#extIPInput").val()});
	$.post( "../manage/changeVPNPort.php", { port : $("#vpnPortInput").val()});

    $('.container-fluid').fadeOut(300);
	$('.bg-bubbles').fadeOut(300);
	$('.mcw').fadeOut(300);
	$('.msb').fadeOut(300);
	$('.mnb').fadeOut(300);
	setTimeout(() => {
		document.location.reload(true);
	},300);
});