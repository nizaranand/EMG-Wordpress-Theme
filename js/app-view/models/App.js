

(function($, _, Backbone){
var App = Backbone.Model.extend({	
		
	initialize: function(properties){
		this.view = new AppView({ model: this });		
		this.view.render();
		//this.view.startSpinner();
		this.storyWidgets = new StoryWidgets([], { app: this });
		//this.router = new StoriesRouter({ app: this });
		//this.view.stopSpinner(); // redo this w/ events
	}

});
window.App = App;
}(jQuery, _, Backbone));
