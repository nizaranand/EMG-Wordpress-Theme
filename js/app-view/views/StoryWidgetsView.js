var app = app || {};
( function($, _, Backbone) {

		app.StoryWidgetsView = Backbone.View.extend({
			timer : false,
			template_options : {},

			initialize : function() {
				app.showStory = this.showStory;
				app.setScrollbars = this.setScrollbars;
				app.headerShown = this.headerShown;
				app.footerShown = this.footerShown;
				app.convertDate = this.convertDate;
				app.scrollApp = this.scrollApp;
				this.collection.on('add', this.addOne, this);
				this.collection.on('reset', this.addAll, this);
				$(window).scroll(app.scrollApp);
				//this.timer = setInterval(this.refresh, 120 * 1000);
				this.initial_load = true;
			},

			scrollApp : function() {
				if($("#story-content").height() > $(window).height() && $("#story-content").height() != $("#app-view").height()){
				    // hack for the delay when rendering twitter images
					app.resizeApp();
				}
				if (app.headerShown()) {
					$("#widgets-list").css({
						position : "relative",
						top : ""
					});
				} else if (app.footerShown()) {
					// using { position: absolute, bottom: 0 } breaks the scrollbar
					var offset = $("#app-view").height() - $(window).height();
					$("#widgets-list").css({
						position : "relative",
						top : offset + "px"
					});
					// add a bit of a margin
				} else {
					$("#widgets-list").css({
						position : "fixed",
						top : "0px"
					});
				}
			},

			headerShown : function() {
				return $(window).scrollTop() < $("#app-view").offset().top;
			},

			footerShown : function() {
				return $(window).scrollTop() + $(window).height() > $("#app-view").offset().top + $("#app-view").height();
			},

			addAll : function() {
				app.widgets.each(this.addOne, this);
				$("li.story-widget").first().addClass("widget-first");
				$("li.story-widget").click(function() {
					app.showStory($(this).attr("id"));
				});
				if (this.initial_load) {
					$("#widgets-list").alternateScroll({ "mouse-wheel-sensitivity": 6 });
					//$("#widgets-list").dragscrollable();
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

			convertDate : function(date) {
				var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
				var parts = date.split(" ");
				var _date_parts = parts[0].split("-");
				var time = parts[1].split(":");
				var year = _date_parts[0];
				var month = parseInt(_date_parts[1]);
				var day = _date_parts[2];
				if (day.charAt(0) == '0')
					day = day.substr(1);
				var suffix = "AM";
				if (parseInt(time[0]) > 12) {
					time[0] -= 12;
					suffix = "PM";
				}
				return "Published: " + months[month] + " " + day + ", " + year + " at " + time[0] + ":" + time[1] + " " + suffix;
			},

			showStory : function(id) {
				$(".widget-selected").removeClass("widget-selected");
				var model = app.widgets.get(id);
				var $content_template = $("#storycontent-template");
				if (model.get("title").indexOf("Video:") != -1) {
					var thumbnail = false;
				} else {
					var thumbnail = model.get("thumbnail") || false;
				}
				var content_opts = {
					story_title : model.get("title"),
					story_content : model.get("content"),
					story_author : model.get("author"),
					story_date : app.convertDate(model.get("date")),
					story_image : thumbnail,
					story_id : model.id
				};
				var content = _.template($content_template.html(), content_opts);
				var $content = $("<div></div>");
				$content.html(content);
				var images = [];
				$content.find("img, iframe").each(function(index) {
					// hack the iframe size to rezise it down to 860px wide
					var $curr = $(this);
					if($curr.is("img")){
					    if(_.contains(images, $curr.attr("src"))){
						    $curr.remove();
						    return true;
                        }else{							
							images.push($curr.attr("src"));
						}
					}
					var max_width = $("#story-content").width();
					if ($curr.is("img") && !$curr.parent().hasClass("ps-image")) {
						$curr.remove();
					}
					if ($curr.is("iframe") || $curr.parent().hasClass("ps-image")) {
						$curr.parent().addClass("story-media");
					}
					var width = $curr.attr("width"), height = $curr.attr("height");
					if (width > max_width) {
						var aspect = height / width;
						$curr.width(max_width);
						$curr.height(max_width * aspect);
						$curr.css("width", max_width + "px !important");
						$curr.css("height", max_width * aspect + "px !important");
					}
				});
				$content.find("#storycontent-content").find("div").each(function(index) {
					// seriously though, why the hell is some of the text in div tags and some in p tags?
					var $curr = $(this);
					if ($curr.hasClass("story-media") || $curr.find("img, iframe").size() > 0) {
						return true;
						// continue
					}
					var text = $curr.text();
					var $newEl = $("<p></p>");
					$newEl.text(text);
					$newEl.insertBefore($curr);
					$curr.remove();
				});
				var $story_content = $("#story-content");
				$("#" + id).addClass("widget-selected");
				$story_content.fadeOut(150, function() {
					$story_content.html("");
					$story_content.append($content);
					$story_content.fadeIn(150, function() {
						app.resizeApp();
					});

				});
			}
		});
	}(jQuery, _, Backbone));
