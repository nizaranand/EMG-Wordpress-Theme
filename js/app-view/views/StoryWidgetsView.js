var app = app || {}; 

( function($, _, Backbone) {

		app.StoryWidgetsView = Backbone.View.extend({
			// $arrow: $("<div id='arrow' ><img src='blah' ></div>"),
			el : "#widgets-list",
			timer : false,
			template_options : {},

			initialize : function() {
				app.showStory = this.showStory;
				app.resizeApp = this.resizeApp;
				app.setScrollbars = this.setScrollbars;
				app.slideArrow = this.slideArrow;
				this.collection.on('add', this.addOne, this);
				this.collection.on('reset', this.addAll, this);
				$(window).resize(app.resizeApp);
				this.timer = setInterval(this.refresh, 60 * 1000);
				this.initial_load = true;
			},

			setScrollbars: function() {
                var scrollbar_opts = {
                    set_width : false, /*optional element width: boolean, pixels, percentage*/
                    set_height : false, /*optional element height: boolean, pixels, percentage*/
                    horizontalScroll : false, /*scroll horizontally: boolean*/
                    scrollInertia : 550, /*scrolling inertia: integer (milliseconds)*/
                    scrollEasing : "easeOutCirc", /*scrolling easing: string*/
                    mouseWheel : "auto", /*mousewheel support and velocity: boolean, "auto", integer*/
                    autoDraggerLength : true, /*auto-adjust scrollbar dragger length: boolean*/
                    scrollButtons : {/*scroll buttons*/
                        enable : true, /*scroll buttons support: boolean*/
                        scrollType : "continuous", /*scroll buttons scrolling type: "continuous", "pixels"*/
                        scrollSpeed : 20, /*scroll buttons continuous scrolling speed: integer*/
                        scrollAmount : 40 /*scroll buttons pixels scroll amount: integer (pixels)*/
                        },
                    advanced : {
                        updateOnBrowserResize : true, /*update scrollbars on browser resize (for layouts based on percentages): boolean*/
                        updateOnContentResize : true, /*auto-update scrollbars on content resize (for dynamic c */
                        autoExpandHorizontalScroll : false /*auto expand width for horizontal scrolling: boolean*/
                    }
                };
                console.log(scrollbar_opts);
                $("#widgets-list").mCustomScrollbar();
				$("#story-content").mCustomScrollbar();
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
				if(this.initial_load){
                    app.showStory(most_recent);
                    app.slideArrow(most_recent);
					this.initial_load = false;
                }
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
				app.widgets.fetchWithCallbacks();
			},

		    resizeApp: function(){
			    $("#app-view").height($(window).height());
			},
			
			slideArrow: function(id){
				var $curr = $("#" + id);
				var offset = $curr.offset().top + (0.5 * $curr.height()) - 7.5; // 7.5 is half the height of the arrow
				$("#arrow").animate({scrollTop: offset}, 150);
			},

			showStory : function(id) {
				var model = app.widgets.get(id);
				var $content_template = $("#storycontent-template");
				var content_opts = {
					story_title : model.get("title"),
					story_content : model.get("content"),
					story_author : model.get("author"),
					story_date : model.get("date"),
					story_id : model.id
				};
				var content = _.template($content_template.html(), content_opts);
				var $content = $("<div></div>");
                $content.html(content);
				$content.find("iframe").each(function(index){
					// hack the iframe size to rezise it down to 860px wide
					var $curr = $(this);
				    var width = $curr.attr("width"), height = $curr.attr("height");
                    if(width > 860){
						var aspect = height / width;
                        $curr.width("860");						
						$curr.height(860 * aspect + "");
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
