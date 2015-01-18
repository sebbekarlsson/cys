$(document).ready(function(){
	$(".under").hide();
	$(".sidebtn").click(function(){
		$(".sidebtn").each(function(){
			$(this).find(".under").slideUp();
		});
		$(this).find(".under").fadeIn();
		
			var idd = $(this).attr("id");

			var under = $(this);
			$.ajax({
			  type: "POST",
			  url: "apps/getSubCat.php",
			  data: { id: idd}
			})
			  .done(function( msg ) {
			  	under.find(".under").html("");
			    under.find(".under").append(msg);
			  });


			
			
		
	});
});