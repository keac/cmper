// JavaScript Document
$(function(){
		$(".menu").click(function(){
			if($("#menu").css("display")=="none"){
				$("#menu").css("display","block")
			}else{
				
				$("#menu").css("display","none")
			}
			
		});	
		var banner_width=$("#index-banner").children("li").length*375;
		$("#index-banner").css("width",banner_width);
		var iBanner_l=0;
		var iBanner_i=0;
		setInterval(function(){
			iBanner_l+=375;
			iBanner_i++;
			$("#banner-nav").children("li").removeClass("show");
			$("#banner-nav").children("li").eq(iBanner_i).addClass("show");
			if (iBanner_l>= banner_width){
				iBanner_l=0;
				iBanner_i=0;
			}
			$("#index-banner").css("left",-iBanner_l+"px");
			},3000)
	})