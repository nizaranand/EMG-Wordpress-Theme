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
				if($(window).scrollTop() > $("#app-view").offset().top - 20){ // only move the window up, not down
				    $("html, body").animate({ scrollTop : $("#app-view").offset().top }, duration);
				}
			},
			
			resizeApp : function() {
                if ($("#story-content").height() > $(window).height()) {
                    $("#app-view").height($("#story-content").height());
                    $("#story-widgets").height($("#story-content").height());
                } else {
                    $("#app-view").height($(window).height());
                    $("#story-widgets").height($(window).height());
				}
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
