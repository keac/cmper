// JavaScript Document
$(document).ready(function() {
	
    $(".menu").click(function(){
		if($("#menu").css("display")==="none"){
			$("#menu").css("display","block");
			
		}else{
			
			$("#menu").css("display","none");
		}
	});
	var b_width=$(document).width();
	$("#banner_show").children("li").css("width",b_width);
	var bammer_w=$("#banner_show").children("li").length*b_width;
	$("#banner_show").css("width",bammer_w);
	var w=0;
	var t=0;
	
	setInterval(function(){
		w+=b_width;
		t++;
		if(w>=bammer_w){
			w=0;
			t=0;
		}
		$("#banner_show").css("left",-w);
		$("#banner_nav li").removeClass("show");
		$("#banner_nav li").eq(t).addClass("show");
		
		},3000);
});