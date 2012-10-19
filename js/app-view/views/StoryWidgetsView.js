
(function($, _, Backbone){
var StoryWidgetsView = Backbone.View.extend({
	// $arrow: $("<div id='arrow' ><img src='blah' ></div>"),
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
		this.timer = setInterval(this.refresh, 60 * 1000);
		window.showStory = this.showStory;
		// stories are fetched by collection initially
	},
	
	render: function(){
		var view = _.template(this.$template.html(), this.template_options);
		console.log("el and widgets view:");
		console.log(this.el);
		console.log(view);
		$("#story-widgets").html(view);
		$("#widgets-list").mCustomScrollbar(this.scrollbar_opts);
	},
	
	addAll: function(){
		$("#widgets-list").html("");
		this.collection.each(this.addOne, this);
		//console.log(this.collection);
		$("li.story-widget").click(function(){
		    showStory($(this).attr("id"));				
        });
	},
	
	addOne: function(story_widget){
		story_widget.set({ parent:  this });
		var widget = new StoryWidgetView({ model: story_widget });
		story_widget.set({ view: widget });
		story_widget.get("view").render();
		console.log("widget html: ");
		console.log("ID: "+ story_widget.id);
		console.log(story_widget.get("view").$el);
		// this is just gross
		$("#widgets-list").append(story_widget.get("view").$el);
	},
	
	scrolled: function(){
		
	},
	
	hit_bottom: function(){
		//this.collection.fetch();
	},
	
	refresh: function(){
		this.collection.fetch();
	},
	
	showStory: function(id){
		console.log(id);
		var model = app.storyWidgets.get(id);
		var $content_template = $("#storycontent-template");
		var content_opts = {
			story_title: model.get("title"),
            story_content: model.get("content"),
            story_author: model.get("author")
		};
		var content = _.template($content_template.html(), content_opts);
		$("#story-content").html(content);
	}
	

});
window.StoryWidgetsView = StoryWidgetsView;
}(jQuery, _, Backbone));
