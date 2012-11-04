

var app = app || {};

(function($, _, Backbone){
var StoriesRouter = Backbone.Router.extend({
	routes: {
		"/story/:id": "show" // fired when a widget is clicked
	},
	
	show: function(id){
		console.log("router showing story: " + id);
		app.showStory(id);
	}

});
app.router = new StoriesRouter();
Backbone.history.start();
}(jQuery, _, Backbone));