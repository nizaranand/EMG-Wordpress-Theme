

(function($, _, Backbone){
var StoriesRouter = Backbone.Router.extend({
	routes: {
		"/story/:id": "show" // fired when a widget is clicked
	},
	
	show: function(id){
		this.app.showStory(id);
	},
	
	initialize: function(){
		Backbone.history.start();
	}

});
window.StoriesRouter = StoriesRouter;
}(jQuery, _, Backbone));