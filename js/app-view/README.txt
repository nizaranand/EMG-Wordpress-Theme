


set el = #stories populated with the content field of the parent (storywidget)

structure:

	App
	 |
	 |
StoryWidgets
	 |
	 |
StoryWidget

storycontent just has a view. whenever a click event is fired on a widget element initialize a new instance of
story content, pass it in the params hash, and have it just render itself and replace #stories
	

widget:
have each model create it's view upon initializing
do not render the view though
store references between model/view pairs

have render set the parent (widgets) wi




