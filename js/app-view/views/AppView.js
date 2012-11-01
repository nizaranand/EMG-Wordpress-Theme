var app = app || {}; ( function($, _, Backbone) {
		app.AppView = Backbone.View.extend({
			el : "#app-view",
			$template : $("#app-template"),

			initialize : function() {
				app.setWindow = this.setWindow;
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
			}
			
		});
	}(jQuery, _, Backbone));
