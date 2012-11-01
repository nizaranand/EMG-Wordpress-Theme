var app = app || {}; ( function($, _, Backbone) {

		app.StoryWidgetsView = Backbone.View.extend({
			el : "#widgets-list",
			timer : false,
			template_options : {},

			initialize : function() {
				this.collection.on('add', this.addOne, this);
				this.collection.on('reset', this.addAll, this);
				this.timer = setInterval(this.refresh, 120 * 1000);
				this.initial_load = true;
			},


			addAll : function() {
				$("#widgets-list").html("");
				app.widgets.each(this.addOne, this);
				$("li.story-widget").click(function() {
					app.showStory($(this).attr("id"));
				});
				$("li.story-widget").mouseenter(function() {
					app.slideArrow($(this).attr("id"));
				});
				$("#story-widgets").mouseleave(function() {
					app.slideArrow($("#storycontent-title").data("story"));
				});
				var most_recent = $("li.story-widget").first().attr("id");
				if (this.initial_load) {
					app.showStory(most_recent);
					app.slideArrow(most_recent);
					this.initial_load = false;
				}
				$("#widgets-list").mCustomScrollbar("update");
				app.stopSpinner();
			},

			addOne : function(widget) {
				widget.set({
					parent : this
				});
				var widgetView = new app.StoryWidgetView({
					model : widget
				});
				widget.set({
					view : widgetView
				});
				widget.get("view").render();
				$("#widgets-list").append(widget.get("view").$el);
			},

			hit_bottom : function() {
				//app.widgets.fetch();
			},

			refresh : function() {
				app.startSpinner();
				app.widgets.fetchWithCallbacks();
			}
			
		});
	}(jQuery, _, Backbone));
