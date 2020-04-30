$( document ).ready(function() {
    
});

$("#home .oneimage img").click(function(){
	let src = $(this).attr("src");
	$("#bigimg img").attr("src",src);
	let nw = $(this)[0].naturalWidth;
	let nh = $(this)[0].naturalHeight;
	if(nw > nh){
		$("#bigimg img").attr("width","80%");
		$("#bigimg img").attr("height","auto");
	}else{
		$("#bigimg img").attr("height","80%");
		$("#bigimg img").attr("width","auto");
	}
	$("#bigimg").css("display","block");
});

$("#bigimg img").dblclick(function(){
	$("#bigimg").css("display","none");
	$("#bigimg img").attr("src","");
});
