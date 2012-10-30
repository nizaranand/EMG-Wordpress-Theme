
var app = app || {};

(function($, _, Backbone){	
	
app.StoryWidgetsView = Backbone.View.extend({
	// $arrow: $("<div id='arrow' ><img src='blah' ></div>"),
	el: "#widgets-list",
	timer: false,
	template_options: {},
	scrollbar_opts: {
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
    		onScroll: this.scrolled, 
    		onTotalScroll: this.hit_bottom, 
    		onTotalScrollOffset: 50 
  		}
	},
	
	initialize: function(){
		this.collection.on('add', this.addOne, this);
		this.collection.on('reset', this.addAll, this);
		this.timer = setInterval(this.refresh, 60 * 1000);
		$(this.el).mCustomScrollbar(this.scrollbar_opts);
	},
	
	render: function(){
		//	rendering is done on the individual elements in the collection
	},
	
	addAll: function(){
		$(this.el).html("");
		console.log(app.widgets.models);
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
		console.log(widget.get("view").$el);
		$(this.el).append(widget.get("view").$el);
	},
	
	scrolled: function(){
		
	},
	
	hit_bottom: function(){
		//app.widgets.fetch();
	},
	
	refresh: function(){
		app.widgets.fetchWithCallbacks();
	}

});
}(jQuery, _, Backbone));
