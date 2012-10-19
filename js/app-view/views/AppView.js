
(function($, _, Backbone){
var AppView = Backbone.View.extend({
	$el: $("#app-view"), 
	$template: $("#app-template"),
	
	states: {
		loading: {
			enter: function(){
				this.$el.animate({ opacity: "0.5" }, 300);
				this.spinner.spin(this.el);
			}, 
			
			exit: function(){
				this.$el.animate({ opacity: "1.0" }, 500);
				this.spinner.stop();
				this.triggerState("normal");
			},
			
			transitions: {
						
			}
		},
		normal: {
			enter: function(){
				
			}, 
			
			exit: function(){
				
			},
			
			transitions: {
					
			}
		}
	},
	
	initialize: function(){
		Backbone.StateManager.addStateManager(this);
		this.createSpinner();
	},
	
	createSpinner: function(){
		var opts = {
  			lines: 13, // The number of lines to draw
  			length: 7, // The length of each line
  			width: 4, // The line thickness
  			radius: 10, // The radius of the inner circle
  			corners: 1, // Corner roundness (0..1)
  			rotate: 0, // The rotation offset
  			color: '#333', // #rgb or #rrggbb
  			speed: 2, // Rounds per second
  			trail: 60, // Afterglow percentage
			shadow: false, // Whether to render a shadow
  			hwaccel: false, // Whether to use hardware acceleration
  			className: 'spinner', // The CSS class to assign to the spinner
  			zIndex: 2e9, // The z-index (defaults to 2000000000)
  			top: 'auto', // Top position relative to parent in px
  			left: 'auto' // Left position relative to parent in px
		};
		this.spinner = new Spinner(opts);
	},
	
	render: function(){
		var view = _.template(this.$template, {});
		this.$el.html(view);
	}
	
	// add timer to refresh too
});
return AppView;
}(jQuery, _, Backbone));
