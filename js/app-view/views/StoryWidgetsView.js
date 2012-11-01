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
				app.changeArrowDestination = this.changeArrowDestination;
				app.startArrow = this.startArrow;
				app.stopArrow = this.stopArrow;
				app.sliding = false;
				app.arrowDestination = 0;
				app.animateTimer = false;
				this.collection.on('add', this.addOne, this);
				this.collection.on('reset', this.addAll, this);
				$(window).resize(app.resizeApp);
				this.timer = setInterval(this.refresh, 60 * 1000);
				this.initial_load = true;
				app.setScrollbars();
			},

			setScrollbars: function() {
                var scrollbar_opts = {
                    set_width : "100%",
                    set_height : "100%", 
                    horizontalScroll : false, 
                    scrollInertia : 550, 
                    scrollEasing : "easeOutCirc", 
                    mouseWheel : "auto", 
                    autoDraggerLength : true, 
                    scrollButtons : {
                        enable : false, 
                        scrollType : "continuous", 
                        scrollSpeed : 20, 
                        scrollAmount : 40 
                        },
                    advanced : {
                        updateOnBrowserResize : true, 
                        updateOnContentResize : false, 
                        autoExpandHorizontalScroll : false 
                    }
                };
                console.log("setting scrollbars");
                $("#widgets-list").mCustomScrollbar(scrollbar_opts);
				$("#story-content").mCustomScrollbar(scrollbar_opts);
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
                $("#widgets-list").mCustomScrollbar("update");
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
				var offset = $curr.offset().top + (0.5 * $curr.height()) - $("#story-widgets").offset().top; // 7.5 is half the height of the arrow
				if(app.sliding){
					app.changeArrowDestination(offset);
				}else{
					app.sliding = true;
					app.changeArrowDestination(offset);
					app.startArrow();
				}
			},
													
			startArrow: function(){
				app.animateTimer = setInterval(function(){
					var animateProportion = 0.125; // in honor of TCP's constant for calculating network congestion
					var $arrow = $("#arrow");
					var arrowOffsetY = parseInt($arrow.css("top").replace("px", "")); // b/c of the absolute positioning offset() wont work here
					if(Math.abs(arrowOffsetY - app.arrowDestination) < 1){ // give it a 1 pixel buffer
						console.log("stopping arrow");
						app.stopArrow();
				    }else{
						var dy = Math.abs(app.arrowDestination - arrowOffsetY);
						var weightedDist = animateProportion * dy; // linear looks fine, maybe redo with quadratic later
						if(app.arrowDestination > arrowOffsetY){
							// move down
							arrowOffsetY += weightedDist + 2; // for some reason moving down doesn't quite move it far enough
							$arrow.css("top", arrowOffsetY + "px");
						}else{
							// move up
							arrowOffsetY -= weightedDist;
							$arrow.css("top", arrowOffsetY + "px");
						}
					}
				}, 20);
			},
														
			changeArrowDestination: function(offset){
				app.arrowDestination = offset;
			},
														
			stopArrow: function(){
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
