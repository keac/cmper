// JavaScript Document
$(function(){
	"use strict";
	$(".menu").click(function(){
		var isShow=$("#menu").is(":hidden") ? "block" : "none";
		$("#menu").css("display",isShow);
 	});	
	var a={
		i:0,
		l:0
		};
		var bannerLi_width=$(document).width();	
		var banner_width=$("#banner_show").children("li").css( "width", bannerLi_width).length*bannerLi_width;
	setInterval(function(){
	
		
		a.i++;
		a.l+=bannerLi_width;
		if(a.l>=banner_width){
			a.i=0;
			a.l=0;
		}
		$("#banner_show").css({width:a.l,left:-a.l});
		$("#show_nav").children("li").removeClass("show").eq(a.i).addClass("show");
	},3000);
});