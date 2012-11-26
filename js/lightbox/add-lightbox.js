

(function($){

     $(document).ready(function(){
	if(wordpress_template_used == "single.php"){
	    alert("added lightbox");
	    $("#content img").wrap(function(){
	       return "<a href='" + $(this).attr("src") + "' rel='lightbox[post-images]' >";	    
	    });
	}
     });

}(jQuery));