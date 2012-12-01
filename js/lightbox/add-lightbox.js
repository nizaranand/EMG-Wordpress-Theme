

(function($){
  
     window.add_lightbox = function(){
		 if(wordpress_template_used == "single.php"){
             $("#content img").wrap(function(){
                 if(!$(this).parent().hasClass("ps-image")){
                     var src = $(this).attr("src").replace(/-\d+x\d+/ig, ""); // remove the added dimensions
                     return "<a href='" + src + "' rel='lightbox[post-images]' >";
                 }
		     });
		 }else if(wordpress_template_used == "app-page.php"){
			 if($("#story-content") != null){
				 $("#story-content img").wrap(function(){
				     var src = $(this).attr("src").replace(/-\d+x\d+/ig, ""); // remove the added dimensions
                     return "<a href='" + src + "' rel='lightbox[post-images]' >";
				 });
             }
		 }else{}
	 }

     $(document).ready(function(){
	     add_lightbox();
     });

}(jQuery));