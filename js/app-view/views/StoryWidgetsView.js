
(function($, _, Backbone){
var StoryWidgetsView = Backbone.View.extend({
	// $arrow: $("<div id='arrow' ><img src='blah' ></div>"),
	$el: $("#story-widgets"),
	$template: $("#storywidgets-template"),
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
		this.$el.mCustomScrollbar(this.scrollbar_opts);
		this.timer = setInterval(this.refresh, 60 * 1000);
		// stories are fetched by collection initially
	},
	
	render: function(){
		var view = _.template(this.$template, this.template_options);
		this.$el.html(view);
	},
	
	addAll: function(){
		this.$el.html("");
		this.collection.each(this.addOne, this);
	},
	
	addOne: function(story_widget){
		story_widget.parent = this;
		story_widget.view = new WidgetView({ model: story_widget });
		story_widget.view.render();
		// this is just gross
		this.$el.children("#widgets-list").append(story_widget.view.$el);
	},
	
	scrolled: function(){
		
	},
	
	hit_bottom: function(){
		//this.collection.fetch();
	},
	
	refresh: function(){
		this.collection.fetch();
	}
	
	

});
return StoryWidgetsView;
}(jQuery, _, Backbone));
