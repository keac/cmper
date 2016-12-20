// JavaScript Document
$(function(){
	"use strict";
	$(".menu").click(function(){
		var menu_show=($("#menu").is(':hidden'))?"block":"none";
		$("#menu").css("display",menu_show);
	});
	var b_w=$(document).width();
	var banner_width=$("#banner_show").children("li").length*b_w;	
	var a={l:0,i:0};
	setInterval(function(){
			a.l+=b_w;
			a.i++;
			if(a.l>=banner_width)
			{
				a.i=a.l=0;
			}
			$("#banner_show").css(
			{
				"left":-a.l,
				"width":banner_width
				}
			).children("li").css("width",b_w);
			$("#banner_nav").children("li").removeClass("show").eq(a.i).addClass("show");
		},3000);
});