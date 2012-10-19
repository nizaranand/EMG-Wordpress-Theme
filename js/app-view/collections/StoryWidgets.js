

var StoryWidgets = Backbone.Collection.extend({
	model: StoryWidget,
	fetchOptions: {
		success: function(collection, response){
			// do nothing for now
		},
		
		error: function(collection, response){
			alert("error fetching stories");
		}
	},
	
	initialize: function(models, options){
		this.view = new StoryWidgetsView({ collection: this });
		this.view.render();
		this.fetch(this.fetchOptions);
	}

});

