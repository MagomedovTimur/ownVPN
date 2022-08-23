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
	try {

		$("#dateInput").val(new Date(currentTime).toJSON().slice(0,19));
	  
	  } catch (err) {
		console.log("date");
	  }
	
}

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


// Click on client Card
// Activates client dialog box
$(".clientCard").click(function(){
	$('.mcw').fadeOut(150);
	$('#msb').css("pointer-events", "none");
	$('.navbar-fixed-top').css("pointer-events", "none");
	$('#clientDialog').fadeIn(150);
});