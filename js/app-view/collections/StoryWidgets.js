
var app = app || {};

(function($, _, Backbone){

var StoryWidgets = Backbone.Collection.extend({
	model: app.StoryWidget,
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
		this.view = new app.StoryWidgetsView({ collection: this });
		//this.view.render();
		this.fetchWithCallbacks();
	},
	
	fetchWithCallbacks: function(){
		this.fetch(this.fetchCallbacks);
	}
	
});
app.widgets = new StoryWidgets();
}(jQuery, _, Backbone));
