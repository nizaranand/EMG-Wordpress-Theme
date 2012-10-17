


var App = Backbone.Model.extend({
	el: $("#app-view"), 
	
	
	initialize: function(properties){
				
		// maybe don't do this here
		this.storyWidgets = new StoryWidgets({ url: "http://dailyemerald.com/section/sports/football/json" });
		this.storyWidgets.parent = this;
		this.storyWidgets.fetch();
		
	},
	
	

});
