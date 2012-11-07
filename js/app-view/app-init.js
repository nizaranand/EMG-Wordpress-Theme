
var app = app || {};

(function($, _, Backbone){
	
	$(document).ready(function(){
		new app.AppView();
		
		
		 // until we can get the header ordeal sorted out...
		$("header").css({ display: 'none' });
     });
	 

	
}(jQuery, _, Backbone));
