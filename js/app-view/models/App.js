


var App = Backbone.Model.extend({	
	
	initialize: function(properties){
		this.view = new AppView({ model: this });		
		this.view.render();
		this.view.triggerState("loading"); // redo this w/ events
		this.storyWidgets = new StoryWidgets({ url: "/section/sports/football/json" });
		//this.router = new StoriesRouter({ app: this });
		this.view.triggerState("normal"); // redo this w/ events
	}

});
