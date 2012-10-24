
(function($, _, Backbone){

var StoryWidgets = Backbone.Collection.extend({
	model: StoryWidget,
    url: "http://dailyemerald.com/section/sports/football/json?callback=?",    

	fetchCallbacks: {
		success: function(collection, response){
			// do nothing for now
		},
		
		error: function(collection, response){
			alert("error fetching stories" + response.toJSON());
		}
	},
	
	initialize: function(models, options){
		this.view = new StoryWidgetsView({ collection: this, app: this.app });
		this.view.render();
		this.fetch(this.fetchCallbacks);
	}
	
});
window.StoryWidgets = StoryWidgets;
}(jQuery, _, Backbone));
