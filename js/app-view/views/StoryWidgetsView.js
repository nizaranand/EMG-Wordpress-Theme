
(function($, _, Backbone){	
	
var StoryWidgetsView = Backbone.View.extend({
	// $arrow: $("<div id='arrow' ><img src='blah' ></div>"),
	$template: $("#storywidgets-template"),
	el: "#story-widgets",
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
		app.storyWidgets.on('add', this.addOne, this);
		app.storyWidgets.on('reset', this.addAll, this);
		this.timer = setInterval(this.refresh, 60 * 1000);
	},
	
	render: function(){
		var view = _.template(this.$template.html(), this.template_options);
		//$view = $(view);
		//$view.mCustomScrollbar(this.scrollbar_opts);
		$(this.el).html($view);
		//$(this.el).mCustomScrollbar(this.scrollbar_opts);
	},
	
	addAll: function(){
		$(this.el).children("#widgets-list").html("");
		app.storyWidgets.each(this.addOne, this);
		/*$("li.story-widget").click(function(){
		    this.app.showStory($(this).attr("id"));				
        });*/
	},
	
	addOne: function(story_widget){
		story_widget.set({ parent: this });
		var widget = new StoryWidgetView({ model: story_widget });
		story_widget.set({ view: widget });
		story_widget.get("view").render();
		$(this.el).children("#widgets-list").append(story_widget.get("view").$el);
	},
	
	scrolled: function(){
		
	},
	
	hit_bottom: function(){
		//this.collection.fetch();
	},
	
	refresh: function(){
		this.app.storyWidgets.fetch();
	}
	

});
window.StoryWidgetsView = StoryWidgetsView;
}(jQuery, _, Backbone));
