<?php
/*
 * Template Name: App View
 */
?>

<?php get_header(); ?>

<?php
//wp_enqueue_style('app-view', get_template_directory_uri() . "/css/app-view.css", "all");

// add ui and dependencies
wp_enqueue_script("jquery-ui", get_template_directory_uri() . "/js/app-view/libs/jquery-ui/jquery-ui-1.9.1.custom.min.js", true);
wp_enqueue_script("jquery-ui-punch", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/jquery.ui.touch-punch.min.js", true);
wp_enqueue_script("facescroll", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/facescroll.js", true);
wp_enqueue_script("timeago", get_template_directory_uri() . "/js/app-view/libs/timeago/jquery-timeago.js", true);
wp_enqueue_script("spin", get_template_directory_uri() . "/js/app-view/libs/spin/spin.min.js", true);
wp_enqueue_script("underscore", get_template_directory_uri() . "/js/app-view/libs/underscore/underscore.min.js", true);
wp_enqueue_script("backbone", get_template_directory_uri() . "/js/app-view/libs/backbone/backbone.min.js", true);
// add backbone objects
wp_enqueue_script("storywidget-model", get_template_directory_uri() . "/js/app-view/models/StoryWidget.js", true);
wp_enqueue_script("storywidget-view", get_template_directory_uri() . "/js/app-view/views/StoryWidgetView.js", true);
wp_enqueue_script("storywidgets-view", get_template_directory_uri() . "/js/app-view/views/StoryWidgetsView.js", true);
wp_enqueue_script("storywidgets-collection", get_template_directory_uri() . "/js/app-view/collections/StoryWidgets.js", true);
wp_enqueue_script("app-view", get_template_directory_uri() . "/js/app-view/views/AppView.js", true);
//wp_enqueue_script("stories-router", get_template_directory_uri() . "/js/app-view/StoriesRouter.js", true);
wp_enqueue_script("app-helpers", get_template_directory_uri() . "/js/app-view/app-helpers.js", true);
wp_enqueue_script("app-init", get_template_directory_uri() . "/js/app-view/app-init.js", true);

$arrow_src = get_template_directory_uri() . '/img/arrow.png';
$scrollbar_src = get_template_directory_uri() . '/img/custom-scroll-bar.png.png'; 
?>

<style>

#app-view{
	position: relative;
	margin-bottom: 15px;
}

#story-widgets {
	position: relative;
	background-color: #DEDEDE;
    overflow: hidden;
	height: 100% !important;
}

.story-widget {
	position: relative;
    cursor: pointer;
    color: #333;
	border-bottom: dashed silver 1.5px;
	overflow: hidden;
    padding: 10px 15px 10px 10px;
	height: 125px;
}

#widgets-list {
	height: inherit !important;
	list-style: none;
    height: 100% !important;
<<<<<<< HEAD
overflow:scroll;
=======
	overflow: scroll;
>>>>>>> a34e71c7c8463c09021bebe9855d00cb69b8e4b2
}

#story-content {
    position: relative;
	height: 100% !important;
<<<<<<< HEAD
overflow: hidden;
=======
	overflow: scroll;
>>>>>>> a34e71c7c8463c09021bebe9855d00cb69b8e4b2
}

#storycontent-content{
	
}

#storycontent-story-info{

}

#storycontent-author{

}

#storycontent-time{

}

#storycontent-content{
overflow: scroll;
}

.story-image{
  
}

#story-content img{
	max-width: 860px !important;
}

.ps-image{
	max-width: 860px !important;
}

#story-content iframe{
	max-width: 860px !important;
}

#widgets-list{
	margin-right: 5px !important; /* 5 w/o arrow, 25 w/ arrow*/
	margin-left: 5px !important;
}

.storywidget-title {
	position: relative;
	top: 0.5em;
	color: #333;
	margin-bottom: 5px;
}

.clock-icon {
	float: left;
}

.storywidget-time {
	position: absolute;
	bottom: 5px;
	margin-top: 5px;
}

.storywidget-timestamp {
	float: left;
	padding-left: 5px;
	font-style: italic;
}

#arrow {
	display: none; /* try it without the arrow */ 
	position: absolute;
	right: 0;
    top: 0;
	background: url(<?php print $arrow_src; ?>) no-repeat;
	background-position: center center;
	background-size: contain;
	height: 15px;
	width: 15px;
}
</style>

<style>
.styled-v-bar{ /* sample CSS class for a different vertical scrollbar look */
	background:	url(custom-scroll-bar.png) center top no-repeat;
	width: 10px;
	margin-right: 0;
	margin-bottom: 4px;
}

.styled-v-bar ins{ /* Style for the "ins" inner element, or bottom of the scrollbar */ 
	display: block;
	background:	url(<?php print $scrollbar_src; ?>) center bottom no-repeat;
	width: 10px;
	height: 4px;
	position: absolute;
	top: 100%;
}




</style>

<div id="primary" class="site-content" >
		<div id="app-view" ></div>
</div><!-- #primary -->

<script type="text/template" id="app-template" >
	<!-- wrapper with a span10 -->
	<div id="story-widgets" class="span3" >
		<div id="arrow" ></div>
		<ul id="widgets-list" ></ul>
	</div>
	<div id="story-content" class="span11" ></div>
</script>

<script type="text/template" id="storycontent-template" >
	<!-- wrapped with a span11 -->
	<div id="storycontent-title" data-story="<%= story_id %>" ><h2><%= story_title %></h2></div>
	<% if(story_image){ %>
        <div class="story-image ps-image" ><img src="<%= story_image %>" /></div>
	<% }; %>
	<div id="storycontent-story-info" class="well well-small" >
		<span id="storycontent-author" class="pull-left" ><%= story_author %></span>
		<span id="storycontent-time" class="pull-right" ><i class="icon-time"></i> <%= story_date %></span>
	</div>
	<div id="storycontent-content" ><p><%= story_content %></p></div>
</script>

<script type="text/template" id="storywidget-template" >
	<!-- wrapped with span3 -->
	<li class="story-widget" id="<%= widget_id %>" >
		<a href="#/story/<%= widget_id %>" title="<%= widget_title %>" >
			<div class="storywidget-title" >
				<%= widget_title %>
			</div>
			<div class="storywidget-time" >
				<span class="clock-icon" ><i class="icon-time"></i></span>
				<span class="storywidget-timestamp" > <%= widget_timestamp %></span>
			</div>
		</a>
	</li>
</script>

<?php /*get_sidebar();*/ ?>
<?php get_footer(); ?>

