
(function($, _, Backbone){

var StoryWidgets = Backbone.Collection.extend({
	model: StoryWidget,
    url: "http://dailyemerald.com/section/sports/football/json?callback=?",    

	fetchOptions: {
		success: function(collection, response){
			// do nothing for now
		},
		
		error: function(collection, response){
			alert("error fetching stories" + response.toJSON());
		}
	},
	
	initialize: function(models, options){
		// make el's all strings, then reference them w/ jquery wrappers
		this.view = new StoryWidgetsView({ el: "#story-widgets", collection: this });
		this.view.render();
		console.log("Rendered widgets view:");
		console.log(this.view.$el);
		this.fetch(this.fetchOptions);
	}

});
window.StoryWidgets = StoryWidgets;
}(jQuery, _, Backbone));
