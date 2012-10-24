

(function($, _, Backbone){
var App = Backbone.Model.extend({	
		
	initialize: function(properties){
		this.view = new AppView({ model: this });		
		this.showStory = this.view.showStory;
		// alias the showstory function under the main App instance to make it visible to all classes
		this.view.render();
		this.view.startSpinner();
		this.storyWidgets = new StoryWidgets([], { app: this });
		this.router = new StoriesRouter({ app: this });
		this.view.stopSpinner();
	}

});
window.App = App;
}(jQuery, _, Backbone));
