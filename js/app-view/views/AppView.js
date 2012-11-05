var app = app || {}; ( function($, _, Backbone) {
		app.AppView = Backbone.View.extend({
			el : "#app-view",
			$template : $("#app-template"),

			initialize : function() {
                 app.setWindow = this.setWindow;
                 app.resizeApp = this.resizeApp;		
                 app.startLoading = this.startLoading;
                 app.stopLoading = this.stopLoading;		
				 $(window).resize(app.resizeApp);
				 this.render();
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
			
			resizeApp : function() {
				$("#widgets-list").height($(window).height());
			},

			startLoading : function(){
				$("#story-widgets").animate({
					opacity : "0.5"
				}, 200);
			},

			stopLoading : function() {
				$("#story-widgets").animate({
					opacity : "1.0"
				}, 500);
			}
			
		});
	}(jQuery, _, Backbone));
