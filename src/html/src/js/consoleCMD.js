$("#consoleButton").click(function(){
	postCMD();
});
$("#cmdInput").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        postCMD();
    }
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

// Resize command output
function resizeCommandOutput(){
	$(".commandOutput").css("height", (window.innerHeight - 100 - Number(($(".commandInput").css( "height" )).slice(0,-2))).toString() + "px");
}

// Exec Resize command output on window resize
window.addEventListener("optimizedResize", function() {
    	resizeCommandOutput();
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