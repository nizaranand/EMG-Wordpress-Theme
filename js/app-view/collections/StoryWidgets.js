
(function($, _, Backbone){

var StoryWidgets = Backbone.Collection.extend({
	model: StoryWidget,
    url: "http://testingalec.dailyemerald.com/section/sports/football/json/",    

	fetchOptions: {
		success: function(collection, response){
			// do nothing for now
		},
		
		error: function(collection, response){
			alert("error fetching stories" + response);
		}
	},
	
	initialize: function(models, options){
		this.view = new StoryWidgetsView({ collection: this });
		this.view.render();
		this.fetch(this.fetchOptions);
	}

});
window.StoryWidgets = StoryWidgets;
}(jQuery, _, Backbone));
