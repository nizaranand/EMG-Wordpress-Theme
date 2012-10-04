
(function($){

    $(document).ready(function(){
			  /*
			   * This is incredibly hackish. Ivar, I wouldn't worry about wrapping your head around this.
			   */
			  $(".hover").popover({
                                        placement: 'bottom',
                                        trigger: 'manual'
                          });


			  $(".hover").mouseenter(function(){
                              $curr = $(this);
			      $curr.css('cursor', 'pointer');
                           
			      $('.hover').popover('destroy');
			      $(".hover").popover({
                                        placement: 'bottom',
                                        trigger: 'manual'
                              });
			      $curr.popover('show');
		           });

			   $(document).click(function(){
                               $('.hover').popover('destroy');
			       $(".hover").popover({
                                        placement: 'bottom',
                                        trigger: 'manual'
                               });
			    });

		        $(".hover").mouseleave(function(){
                              $(this).css('cursor', 'auto'); 
                        });

	    
	});
    
})(jQuery);