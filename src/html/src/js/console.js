 window.onload = function() {
 		$('.container-fluid').fadeIn(700);
	 	$('.bg-bubbles').fadeIn(700);
	 	$('.mcw').fadeIn(700);
	 	$('.msb').fadeIn(700);
	 	$('.mnb').fadeIn(700);
	 	setDate(new Date);	
 };

// Close any dialog box
function closeDialog(){
	$('.dialog').fadeOut(150);
	$('#msb').css("pointer-events", "auto");
	$('.navbar-fixed-top').css("pointer-events", "auto");
	$('.mcw').fadeIn(150);
}

// Click on client Card
// Activates client dialog box
$(".clientCard").click(function(){
	$('.mcw').fadeOut(150);
	$('#msb').css("pointer-events", "none");
	$('.navbar-fixed-top').css("pointer-events", "none");
	$('#clientDialog').fadeIn(150);
});

// Click on +- buttons on clint dialog date picker
function changeDate(dateItem, dateDiff){
	if(dateItem == "Year"){

		var currentDate = new Date($("#dateInput").val());
		currentDate.setFullYear(currentDate.getFullYear() + dateDiff);
		setDate(currentDate);

		return;
	}else if(dateItem == "Mounth"){

		var currentDate = new Date($("#dateInput").val());
		currentDate.setMonth(currentDate.getMonth() + dateDiff);
		setDate(currentDate);

	}else if (dateItem == "Day"){

		var currentDate = new Date($("#dateInput").val());
		currentDate.setDate(currentDate.getDate() + dateDiff);
		setDate(currentDate);
		
	}else if (dateItem == "Hour"){

		var currentDate = new Date($("#dateInput").val());
		currentDate.setHours(currentDate.getHours() + dateDiff);
		setDate(currentDate);
		
	}else if(dateItem == "Minute"){

		var currentDate = new Date($("#dateInput").val());
		currentDate.setMinutes(currentDate.getMinutes() + dateDiff);
		setDate(currentDate);
		
	}else if(dateItem == "Second"){

		var currentDate = new Date($("#dateInput").val());
		currentDate.setSeconds(currentDate.getSeconds() + dateDiff*5);
		setDate(currentDate);
		
	}
	 
}

// Set date with "new Date()" but with user timezone preferences
function setDate(UTCtime){
	var GMT = new Date().toString().slice(new Date().toString().indexOf("GMT")+3,new Date().toString().indexOf("GMT")+8);
	var currentMissDate = Number(GMT[4])*60000 + Number(GMT[3])*600000 + Number(GMT[2])*3600000 + Number(GMT[1])*36000000;

	if (GMT[0] == "+") {
		var currentTime = Number(UTCtime) + currentMissDate;
	}
	else{
		var currentTime = Number(UTCtime) - currentMissDate;
	}

	$("#dateInput").val(new Date(currentTime).toJSON().slice(0,19));
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


// For windows resize event listener
(function() {
    var throttle = function(type, name, obj) {
        obj = obj || window;
        var running = false;
        var func = function() {
            if (running) { return; }
            running = true;
             requestAnimationFrame(function() {
                obj.dispatchEvent(new CustomEvent(name));
                running = false;
            });
        };
        obj.addEventListener(type, func);
    };

    /* init - you can init any event */
    throttle("resize", "optimizedResize");
})();

// Resize command output
function resizeCommandOutput(){
	$(".commandOutput").css("height", (window.innerHeight - 100 - Number(($(".commandInput").css( "height" )).slice(0,-2))).toString() + "px");
}

// Exec Resize command output on window resize
window.addEventListener("optimizedResize", function() {
    	resizeCommandOutput();
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

// Take input field value, pase it in lunux cmd and return responce
function postCMD(){
	var cmdDir = $("#cmdDirInput").val();

	$(".commandOutput").val($(".commandOutput").val() + ("\n\n"+cmdDir + "> " + $("#cmdInput").val()) + "\n");
	$.post( "../manage/execCmd.php", { cmd: "cd " + cmdDir + "; " + $("#cmdInput").val()})
  		.done(function( data ) {
    		$(".commandOutput").val($(".commandOutput").val() + data);
			(document.getElementsByClassName('commandOutput')[0]).scrollTop =  (document.getElementsByClassName('commandOutput')[0]).scrollHeight;
  		});
	$("#cmdInput").val("");
}
$("#consoleButton").click(function(){
	postCMD();
});
$("#cmdInput").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        postCMD();
    }
});
