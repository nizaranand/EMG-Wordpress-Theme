/*
 * fetching function
 * fetch: http://dailyemerald.com/section/sports/football/json
 * TODO (sometime later):
 * 		store parameter to track timestamp of top (most recent) story
 * 		add logic to parseStories() to only push new stories into the collection instead of resetting them all
 *
 */

var StoryWidgets = Backbone.Collection.extend({
	model: StoryWidget,
	// $arrow: $("<div id='arrow' ><img src='blah' ></div>"),
	
	initialize: function(models, options){
		// add jquery scrollbar to element
		// loop over models and set model.parent = this
		// add mouseenter event listener to widget, have it fire scrollArrowTo(<id to match story-id>) on model.parent
		
		
	},
	
	render: function(){
		
		
	},
	
	fetch: function(){
		
		
	},
	
	parse: function(){
		
		
	},
	
	scrollArrowTo: function(id){
		// do nothing for now
		console.log("Scrolled to: " + id);
	}

	

});

