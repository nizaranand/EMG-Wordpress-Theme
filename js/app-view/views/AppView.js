
(function($, _, Backbone){
var AppView = Backbone.View.extend({ 
	$template: $("#app-template"),
	
	
	initialize: function(){
		this.$el = $("#app-view");
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
		console.log("app el and view:");
		console.log(this.$el);
		var view = _.template(this.$template.html(), {});
		this.$el.html(view);
		console.log("rendered app view:");
		console.log(view);
		console.log(this.$el);
	},

    startSpinner: function(){
		this.$el.animate({ opacity: "0.5" }, 300);
        this.spinner.spin(this.el);
	},

    stopSpinner: function(){
	    this.$el.animate({ opacity: "1.0" }, 500);
        this.spinner.stop();

	}
	
	
	// add timer to refresh too
});
window.AppView = AppView;
}(jQuery, _, Backbone));
