

(function($){

     
var StaffPage = function(hover_class_name){
    var timer = false;
    var that = {
	  
	    refreshHover: function(){
		$('.' + hover_class_name).popover('destroy');
	        $("." + hover_class_name).popover({
                    placement: 'bottom',
                    trigger: 'manual'
                });	

	    }, 

	    startTimer: function(duration){
		timer = setTimeout(function(){
		            that.refreshHover();
		        }, duration);

	    },

	    stopTimer: function(){
		if(timer)
		    clearTimeout(timer);
		
	    }
	
     };
    
    that.refreshHover();


    $(document).click(function(){
        that.refreshHover();
    });

    $('.' + hover_class_name).mouseenter(function(){
	that.stopTimer();
	that.refreshHover();
        $(this).popover('show');					  
   
    });

    $('.' + hover_class_name).mouseleave(function(){
	that.startTimer(5000);

    });


    return that;
};

$(document).ready(function(){
    var page = new StaffPage('hover');

});



}(jQuery));
