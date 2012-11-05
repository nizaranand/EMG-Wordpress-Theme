

var app = app || {};

(function($, _, Backbone){
app.StoriesRouter = Backbone.Router.extend({
	routes: {
		"/story/:id": "show" // fired when a widget is clicked
	},
	
	show: function(id){
		console.log("router showing story: " + id);
		app.showStory(id);
	}

});
}(jQuery, _, Backbone));