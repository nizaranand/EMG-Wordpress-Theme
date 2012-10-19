
var StoryWidgetView = Backbone.View.extend({
	$el: false,
	$template: $("#storywidget-template"),
	$content_template: $("#storycontent-template"),
	$story_content: $("#story-content"),
	
    states: {
		hovered: {
			enter: function(){
				
			}, 
			
			exit: function(){
				
			},
			
			transitions: {
						
			}
		},
		
		selected: {
			enter: function(){
				// have the new story appear in the content
				var view = _.template(this.$content_template, this.content_view_params);
				this.$story_content.html(view);
			}, 
			
			exit: function(){
				this.triggerState("normal");
			},
			
			transitions: {
					
			}
		},
		
		normal: {
			enter: function(){
				
			}, 
			
			exit: function(){
				
			},
			
			transitions: {
					
			}
		},
	},
	initialize: function(){
		Backbone.StateManager.addStateManager(this);
		var timeago = $.timeago(this.model.date);
		this.widget_view_params = {
			widget_title: this.model.title,
			widget_timestamp: timeago,
			widget_id: this.model.id
		};
		this.content_view_params = {
			story_title: this.model.title,
			story_content: this.model.content,
			story_author: this.model.author
		};
	},
	
	render: function(){
		// pass in title, time, id
		this.$el = _.template(this.$template , this.widget_view_params);
	},
	
	events: {
		'hover': function(){ this.triggerState("hovered"); }, // for sliding arrow
		'click': function(){ this.triggerState("selected"); }, 
	}
	
});
