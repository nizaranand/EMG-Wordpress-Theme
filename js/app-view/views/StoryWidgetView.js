
var StoryWidgetView = Backbone.View.extend({
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
				
			}, 
			
			exit: function(){
				
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
		initialize: function(){
			return Backbone.StateManager.addStateManager(this);
		}
		
	}

});