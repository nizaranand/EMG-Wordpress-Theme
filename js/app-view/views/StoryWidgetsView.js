var app = app || {}; ( function($, _, Backbone) {

		app.StoryWidgetsView = Backbone.View.extend({
			timer : false,
			template_options : {},

			initialize : function() {
				app.showStory = this.showStory;
				app.setScrollbars = this.setScrollbars;
				this.collection.on('add', this.addOne, this);
				this.collection.on('reset', this.addAll, this);
				$(window).scroll(this.scrollApp);
				//this.timer = setInterval(this.refresh, 120 * 1000);
				this.initial_load = true;
			},

			scrollApp: function(){
				// check if header,footer is on screen
				// if not then set position: fixed on widgets else set it to relative
				if(this.headerShown() || this.footerShown()){
					$("#widgets-list").css("position", "relative");
				}else{
					$("#widgets-list").css("position", "fixed");
				}
			},
			
			headerShown: function(){
				return $(window).scrollTop() < $("#app-view").offset().top;
			},
			
			footerShown: function(){
				return $(window).scrollTop() + $(window).height() > $("#app-view").offset().top + $("#app-view").offset().top;
			},

			addAll : function() {
				app.widgets.each(this.addOne, this);
				$("li.story-widget").click(function() {
					app.showStory($(this).attr("id"));
				});
				$("li.story-widget").mouseenter(function() {
					$(this).addClass("widget-selected");								
				});
				$("li.story-widget").mouseleave(function() {
					$(this).removeClass("widget-selected");
				});
				var most_recent = $("li.story-widget").first().attr("id");
				if (this.initial_load) {
					$("#widgets-list").alternateScroll();
					app.showStory(most_recent);
					this.initial_load = false;
				}
				app.stopLoading();
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
				app.startLoading();
				app.widgets.fetchWithCallbacks();
			},

			resizeApp : function() {
				$("#app-view").height($(window).height());
			},

			showStory : function(id) {
				var model = app.widgets.get(id);
				var $content_template = $("#storycontent-template");
				var content_opts = {
					story_title : model.get("title"),
					story_content : model.get("content"),
					story_author : model.get("author"),
					story_date : model.get("date"),
					story_image : false,
					story_id : model.id
				};
				var content = _.template($content_template.html(), content_opts);
				var $content = $("<div></div>");
				$content.html(content);
				$content.find("img, iframe").each(function(index) {
					// hack the iframe size to rezise it down to 860px wide
					var $curr = $(this);
					var max_width = $("#story-content").width();
					var width = $curr.attr("width"), height = $curr.attr("height");
					if (width > max_width) {
						var aspect = height / width;
						$curr.width(max_width);
						$curr.height(max_width * aspect);
						$curr.css("width", max_width + "px !important");
						$curr.css("height", max_width * aspect + "px !important");
					}
				});
				var $story_content = $("#story-content");
				$story_content.fadeOut(150, function() {
					$story_content.html("");
					$story_content.append($content);
					$story_content.height($(window).height());
					$story_content.fadeIn(150);
				});
			}

		});
	}(jQuery, _, Backbone));
