var app = app || {}; ( function($, _, Backbone) {

		app.StoryWidgetsView = Backbone.View.extend({
			timer : false,
			template_options : {},

			initialize : function() {
				app.showStory = this.showStory;
				app.setScrollbars = this.setScrollbars;
				app.headerShown = this.headerShown;
				app.footerShown = this.footerShown;
				this.collection.on('add', this.addOne, this);
				this.collection.on('reset', this.addAll, this);
				$(window).scroll(this.scrollApp);
				//this.timer = setInterval(this.refresh, 120 * 1000);
				this.initial_load = true;
			},

			scrollApp: function(){
				if(app.headerShown()){
					$("#widgets-list").css({ position: "relative", top: "" });
				}else if(app.footerShown()){
					// using { position: absolute, bottom: 0 } breaks the scrollbar
					$("#widgets-list").css({ position: "absolute", bottom: "0" });
				}else{
					$("#widgets-list").css({ position: "fixed", top: "0px" });
				}
			},
			
			headerShown: function(){
				return $(window).scrollTop() < $("#app-view").offset().top;
			},
			
			footerShown: function(){
				return $(window).scrollTop() + $(window).height() > $("#app-view").offset().top + $("#story-content").height();
			},

			addAll : function() {
				app.widgets.each(this.addOne, this);
				$("li.story-widget").first().addClass("widget-first");
				$("li.story-widget").click(function() {
					app.showStory($(this).attr("id"));
				});
				$("li.story-widget").mouseenter(function() {
					$(this).addClass("widget-selected");								
				});
				$("li.story-widget").mouseleave(function() {
					$(this).removeClass("widget-selected");
				});
				if (this.initial_load) {
					$("#widgets-list").alternateScroll({ 'auto-size': false });
					app.showStory($(".widget-first").attr("id"));
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

			showStory : function(id) {
				var model = app.widgets.get(id);
				var $content_template = $("#storycontent-template");
				var content_opts = {
					story_title : model.get("title"),
					story_content : model.get("content"),
					story_author : model.get("author"),
					story_date : model.get("date"),
					story_image : false,  // TODO handle featured images based on post type
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
					$story_content.fadeIn(150);
					if($content.height() > $(window).height()){
						 $("#app-view").height($content.height());
					}else{
					     $("#app-view").height($(window).height());	
					}
				});
			}

		});
	}(jQuery, _, Backbone));
