var app = app || {}; ( function($, _, Backbone) {

		app.StoryWidgetsView = Backbone.View.extend({
			$list : $("<ul id='widgets-list' ></ul>"),
			timer : false,
			template_options : {},

			initialize : function() {
				app.showStory = this.showStory;
				app.setScrollbars = this.setScrollbars;
				app.slideArrow = this.slideArrow;
				app.changeArrowDestination = this.changeArrowDestination;
				app.startArrow = this.startArrow;
				app.stopArrow = this.stopArrow;
				app.sliding = false;
				app.arrowDestination = 0;
				app.animateTimer = false;
				this.collection.on('add', this.addOne, this);
				this.collection.on('reset', this.addAll, this);
				this.timer = setInterval(this.refresh, 120 * 1000);
				this.initial_load = true;
			},


			addAll : function() {
				$("#story-widgets").html("");
				console.log(this.$list);
				$("#story-widgets").append(this.$list);
				app.widgets.each(this.addOne, this);
				/*$("li.story-widget").click(function() {
					app.showStory($(this).attr("id"));
				});*/
				$("li.story-widget").mouseenter(function() {
					//app.slideArrow($(this).attr("id"));
					$(this).addClass("widget-selected");								
				});
				$("li.story-widget").mouseleave(function() {
					//app.slideArrow($("#storycontent-title").data("story"));
					$(this).removeClass("widget-selected");
				});
				var most_recent = $("li.story-widget").first().attr("id");
				if (this.initial_load) {
					app.showStory(most_recent);
					//app.slideArrow(most_recent);
					this.initial_load = false;
				}
				$("#widgets-list").alternateScroll();
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

			slideArrow : function(id) {
				var $curr = $("#" + id);
				var offset = $curr.offset().top + (0.5 * $curr.height()) - $("#story-widgets").offset().top;
				// 7.5 is half the height of the arrow
				if (app.sliding) {
					app.changeArrowDestination(offset);
				} else {
					app.sliding = true;
					app.changeArrowDestination(offset);
					app.startArrow();
				}
			},

			startArrow : function() {
				app.animateTimer = setInterval(function() {
					var animateProportion = 0.125;
					var $arrow = $("#arrow");
					var arrowOffsetY = parseInt($arrow.css("top").replace("px", ""));
					// offset() wont work here b/c of the absolute positioning
					if (Math.abs(arrowOffsetY - app.arrowDestination) < 1) {// give it a 1 pixel buffer
						app.stopArrow();
					} else {
						var dy = Math.abs(app.arrowDestination - arrowOffsetY);
						var weightedDist = animateProportion * dy;
						// linear looks fine, maybe redo with quadratic later
						if (app.arrowDestination > arrowOffsetY) {
							// move down
							arrowOffsetY += weightedDist + 2;
							// for some reason moving down doesn't quite move it far enough
							$arrow.css("top", arrowOffsetY + "px");
						} else {
							// move up
							arrowOffsetY -= weightedDist;
							$arrow.css("top", arrowOffsetY + "px");
						}
					}
				}, 20);
			},

			changeArrowDestination : function(offset) {
				app.arrowDestination = offset;
			},

			stopArrow : function() {
				clearInterval(app.animateTimer);
				app.sliding = false;
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
				var $content = $("<div id='storycontent-scroll' ></div>");
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
					$story_content.find("#storycontent-scroll").alternateScroll();
					$story_content.fadeIn(150);
				});
			}

		});
	}(jQuery, _, Backbone));
