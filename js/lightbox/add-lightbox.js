

(function($){

     $(document).ready(function(){
	if(wordpress_template_used == "single.php"){
	    $("#content img").wrap(function(){
		    if(!$(this).parent().hasClass("ps-image")){
		        var src = $(this).attr("src").replace(/-\d+x\d+/ig, "");
	            return "<a href='" + src + "' rel='lightbox[post-images]' >";	    
	        }
		});
	}
     });

}(jQuery));