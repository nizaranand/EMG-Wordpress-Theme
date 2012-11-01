var app = app || {}; ( function($, _, Backbone) {
		app.AppView = Backbone.View.extend({
			el : "#app-view",
			$template : $("#app-template"),

			initialize : function() {
				app.setWindow = this.setWindow;
				app.startSpinner = this.startSpinner;
				app.stopSpinner = this.stopSpinner;
				this.render();
				// the router creates itself
			},

			render : function() {
				var view = _.template(this.$template.html(), {});
				$(this.el).html(view);
				$(this.el).height($(window).height());
				$("#story-widgets").click(function() {
					app.setWindow(150);
				});
			},

			setWindow : function(duration) {
				$("html, body").animate({
					scrollTop : $("#app-view").offset().top
				}, duration);
			},

			startSpinner : function() {
				var opts = {
					lines : 13, // The number of lines to draw
					length : 7, // The length of each line
					width : 4, // The line thickness
					radius : 10, // The radius of the inner circle
					corners : 1, // Corner roundness (0..1)
					rotate : 0, // The rotation offset
					color : '#333', // #rgb or #rrggbb
					speed : 2, // Rounds per second
					trail : 60, // Afterglow percentage
					shadow : false, // Whether to render a shadow
					hwaccel : false, // Whether to use hardware acceleration
					className : 'spinner', // The CSS class to assign to the spinner
					zIndex : 2e9, // The z-index (defaults to 2000000000)
					top : 'auto', // Top position relative to parent in px
					left : 'auto' // Left position relative to parent in px
				};
				this.spinner = new Spinner(opts);
				$("#app-view").animate({
					opacity : "0.5"
				}, 200);
				this.spinner.spin($("#app-view"));
			},

			stopSpinner : function() {
				$("#app-view").animate({
					opacity : "1.0"
				}, 500);
				this.spinner.stop();
			}
		});
	}(jQuery, _, Backbone));
