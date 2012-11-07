
var app = app || {};

(function($, _, Backbone){
app.StoryWidgetView = Backbone.View.extend({
	$template: $("#storywidget-template"),
	
	initialize: function(){
		var timeago = $.timeago(this.model.get("date"));
		this.widget_view_params = {
			widget_title: this.model.get("title"),
			widget_timestamp: timeago,
			widget_id: this.model.id,
			widget_image: this.model.get("thumbnail") || false
		};
	},
	
	render: function(){
		// pass in title, time, id
		this.$el = _.template(this.$template.html(), this.widget_view_params);
	}
	
});
}(jQuery, _, Backbone));