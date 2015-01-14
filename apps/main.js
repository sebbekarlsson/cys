$(document).ready(function(){
	$(".under").hide();
	$(".sidebtn").click(function(){
		$(".sidebtn").each(function(){
			$(this).find(".under").slideUp();
		});
		$(this).find(".under").fadeIn();
		if($(this).find(".under > .subcat").length < 3){
			$(this).find(".under").append("<a class='subcat'>Underkategori</a>");
			$(this).find(".under").append("<a class='subcat'>Underkategori</a>");
			$(this).find(".under").append("<a class='subcat'>Underkategori</a>");
		}
	});
});