
/*
 * Aligns the center and left sections on the home page to have the same height.
 * The feed height will always be slightly less than the center height.
 */

(function($){

    $(document).ready(function(){
			  var centerHeight = $("#home-center-column").height();
			  var $posts = $("tr.feed-post-left");
			  var totalHeight = 0;
			  var hidden = false;
			  $posts.each(function(index){
		              var $post = $(this);
			      if(hidden){
				  $post.css("display", "none");
				  return true; //continue
			      }
			      var currHeight = $post.height();
			      totalHeight += currHeight;
					  console.log("totalHeight: "+totalHeight+"\nCurrheight: "+currHeight);
			      if(totalHeight > centerHeight){
				  $post.css("display", "none");
				  hidden = true;
			      }
			  });
        });
    
})(jQuery);