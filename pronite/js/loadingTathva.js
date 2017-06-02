function initLoading(){
	$("#loadingContainer").fadeIn(400);
	enabled = true;
	var marginTop=(screen.height-300)/2;
	$("#loadingTathva").css({"margin-top":marginTop+"px"});
	marginTop=(screen.height-300)/2;
	$("#loadingSun").css({"margin-top":marginTop+"px"});
	var marginLeft=(screen.width-300)/2;
	$("#loadingTathva").css({"margin-left":marginLeft+"px"});
	$("#loadingSun").css({"margin-left":(marginLeft+190)+"px"});
	intervalVar=setInterval(startLoading,25);
}
var rotationDegree=0;
var enabled;
var intervalVar;
function startLoading(){
	if(enabled){
		$("#loadingSun").css({'transform': 'rotate('+rotationDegree+'deg)','-webkit-transform': 'rotate('+rotationDegree+'deg)','-ms-transform': 'rotate('+rotationDegree+'deg)','-moz-transform': 'rotate('+rotationDegree+'deg)'});
		rotationDegree=rotationDegree+5;
	}
}
function stopLoading(){
	enabled = false;
	clearInterval(intervalVar);
	$("#loadingContainer").fadeOut(400);
}