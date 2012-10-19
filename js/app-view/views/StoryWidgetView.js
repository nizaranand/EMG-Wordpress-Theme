

(function($, _, Backbone){
var StoryWidgetView = Backbone.View.extend({
	$template: $("#storywidget-template"),
	$content_template: $("#storycontent-template"),
	
	initialize: function(){
		//console.log(this.model.get("date"));
		this.$story_content = $("#story-content");
		
		var timeago = $.timeago(this.model.get("date"));
		this.widget_view_params = {
			widget_title: this.model.get("title"),
			widget_timestamp: timeago,
			widget_id: this.model.id
		};
	},
	
	render: function(){
		// pass in title, time, id
		this.$el = _.template(this.$template.html(), this.widget_view_params);
		//this.$el = $(el).bind("click", showStory(this.model.id));
	}
	
});
window.StoryWidgetView = StoryWidgetView;
}(jQuery, _, Backbone));