  // JavaScript Document

$(function (){
	"use strict";
	$('#menu').click(
		function(){
			if($("#nav_menu").is(":hidden")){
				$("#nav_menu").fadeIn("fast");
			}else{
				$("#nav_menu").fadeOut("fast");
			}
		}
	); 	
	
	var Ibanner_lenth=$('#index_banner').children().length;
	$('#index_banner').css('width',Ibanner_lenth*442) ;
	var Ibanner_l=0;
	var Ibanner_i=0;
	$("#index-nav li").mousemove(function(){
			var index=$("#index-nav li").index(this);
			Ibanner_l=-(index*442);
			Ibanner_i=index;
			console.log(index) ;
			$('#index_banner').css('left',Ibanner_l);
		$('#index-nav li').removeClass('show');
		$("#index-nav li:eq("+Ibanner_i+")").addClass('show');	
		});
	setInterval(function(){
		
		if(Ibanner_l <= -(Ibanner_lenth-1) *442){
			Ibanner_l=0;
			Ibanner_i=0;
		}
		else
		{
			Ibanner_l=Ibanner_l-442;
			Ibanner_i++;
		}	
		$('#index_banner').css('left',Ibanner_l);
		$('#index-nav li').removeClass('show');
		$("#index-nav li:eq("+Ibanner_i+")").addClass('show');	
		
	},3000);
});
