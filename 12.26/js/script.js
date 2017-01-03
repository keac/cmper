// JavaScript Document

$(function(){
	"use strict";
	$(".menu").click(function(){
		var is_show=$("#menu").is(":hidden")?"block":"none";	
		$("#menu").css("display",is_show);
	});	
	var B_width=$(document).width();
	var Banner_width=$("#banner_show").children("li").length*B_width;
	var o={
		l:0,
		i:0
		};
	setInterval(function(){
		o.i++;
		o.l+=B_width;
		
		
		if(o.l>=Banner_width){
			o.i=0;
			o.l=0;
			}
			$("#banner_show").css({
			width:Banner_width,
			left:-o.l
			});
			$("#banner_nav").children("li").removeClass("show").eq(o.i).addClass("show");
		},3000);
});