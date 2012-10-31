
var app = app || {};

(function($, _, Backbone){	
	
app.StoryWidgetsView = Backbone.View.extend({
	// $arrow: $("<div id='arrow' ><img src='blah' ></div>"),
	el: "#widgets-list",
	timer: false,
	template_options: {},
	/*scrollbar_opts: {
		set_height: "100%",
		set_width: "100%",
		scrollInertia: 400,
		scrollEasing: "easeOutCirc",
		autoDraggerLength: true,
		scrollButtons: {
			enable: true
		},
		advanced:{
    		updateOnBrowserResize:true, 
    		updateOnContentResize:true, 
  		},
  	    callbacks:{ 
    		onTotalScroll: this.hit_bottom, 
    		onTotalScrollOffset: 50 
  		}
	},*/
	
	initialize: function(){
		app.showStory = this.showStory;
		this.collection.on('add', this.addOne, this);
		this.collection.on('reset', this.addAll, this);
		this.timer = setInterval(this.refresh, 60 * 1000);
		$("#story-widgets").mCustomScrollbar({
			set_height: "100%",                                                                                                                                                                
            set_width: "100%",                                                                                                                                                                 
            scrollInertia: 400,                                                                                                                                                                
            scrollEasing: "easeOutCirc",
            autoDraggerLength: true,
            scrollButtons:{
                enable: true 
            },
            advanced:{                                                                                                                                                                         
                updateOnBrowserResize:true,
                updateOnContentResize:true,
            }


        });
	},
	
	render: function(){
		//	rendering is done on the individual elements in the collection
	},
	
	addAll: function(){
		$("#widgets-list").html("");
		app.widgets.each(this.addOne, this);
		$("li.story-widget").click(function(){
		    app.showStory($(this).attr("id"));				
        });
	},
	
	addOne: function(widget){
		widget.set({ parent: this });
		var widgetView = new app.StoryWidgetView({ model: widget });
		widget.set({ view: widgetView });
		widget.get("view").render();
		$("#widgets-list").append(widget.get("view").$el);
	},
	
	scrolled: function(){
		
	},
	
	hit_bottom: function(){
		//app.widgets.fetch();
	},
	
	refresh: function(){
		app.widgets.fetchWithCallbacks();
	},
												
    showStory: function(id){	
        var model = app.widgets.get(id);
        var $content_template = $("#storycontent-template");
        var content_opts = {
            story_title: model.get("title"),
            story_content: model.get("content"),
            story_author: model.get("author")
        };
        var content = _.template($content_template.html(), content_opts);
		var $content = $("#story-content");
		$content.fadeOut(150, function(){
			$content.html(content);
			$content.fadeIn(150);
		});
	}


});
}(jQuery, _, Backbone));
