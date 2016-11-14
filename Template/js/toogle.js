
/* Stats Toogle */
$(document).ready(function(){
  $(".search").click(function(){
    $(".searchbox").slideToggle()
  });
});



/* ALERT AND DIALOG BOXES */
//<![CDATA[    
   // START ready function
   $(document).ready(function(){
 
	// TOGGLE SCRIPT
 
	$(".albox .close").click(function(event){
		$(this).parents(".albox").slideToggle();
 
		// Stop the link click from doing its normal thing
		return false;
	}); // END TOGGLE
 
   }); // END ready function
 //]]>


