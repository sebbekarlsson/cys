$(document).ready(function(){
	var bannerImages = [];
	$.ajax(
    {
        url: 'apps/bannerloader.php',
        success: function(data)
        {
            bannerImages = data.split(",");
            $(".heroholder").css("background-image","url(banner/"+bannerImages[bannerImages.length-1]+")");
        }
    }).done(function(){
    	var i = 0;
    	setInterval(function(){
    		$(".heroholder").hide();
    		if(i < bannerImages.length-1){
    			i++;
    		}else{i = 1;}
            console.log(bannerImages[i] + " <-");
    		$(".heroholder").fadeIn();
    		$(".heroholder").css("background-image","url(banner/"+bannerImages[i]+")");
    	},10000);
    	
    });
    
});