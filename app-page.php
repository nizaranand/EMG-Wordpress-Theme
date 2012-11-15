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
wp_enqueue_script("dragscrollable", get_template_directory_uri() . "/js/app-view/libs/dragscrollable/jquery.dragscrollable.js", true);
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
//wp_enqueue_script("stories-router", get_template_directory_uri() . "/js/app-view/routers/StoriesRouter.js", true);
wp_enqueue_script("app-helpers", get_template_directory_uri() . "/js/app-view/app-helpers.js", true);
wp_enqueue_script("app-init", get_template_directory_uri() . "/js/app-view/app-init.js", true);

$scrollbar_src = get_template_directory_uri() . '/img/custom-scroll-bar.png.png';
?>

<style>
 

	#app-view {
		position: relative;
margin-top: -20px;

	}

	#story-widgets {
		position: relative;
		padding-left: 0 !important;
		height: inherit !important;
		margin-bottom: 15px;
		border-top: outset 1px;
		
	}

	.story-widget {
		position: relative;
		border-top: solid #DDD 2.5px;
		overflow: hidden;
		padding: 10px 15px 10px 10px;
		border-left: solid #DDD 4px;
	   
	 }

	#widgets-list {
		list-style: none;
		overflow: scroll;
		padding-right: 5px;
		margin: 0 1px 0 1px;
	}

	#widgets-list a {
		text-decoration: none;
	}

	.widget-selected {
	 background: rgb(235, 235, 235) !important;
	 color: rgb(0, 69, 29) !important;
	}

.story-widget:hover{
	 background: rgb(235, 235, 235) !important;
     color: rgb(0, 69, 29) !important;
 }

	#story-content {
		position: relative;
margin-top: 20px;
	}

	.gradient {
		background: rgb(245,245,245);
		background: -moz-linear-gradient(left, rgba(245,245,245,1) 0%, rgba(245,245,245,1) 98%, rgba(170,170,170,1) 100%);
		background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(245,245,245,1)), color-stop(98%,rgba(245,245,245,1)), color-stop(100%,rgba(170,170,170,1)));
		background: -webkit-linear-gradient(left, rgba(245,245,245,1) 0%,rgba(245,245,245,1) 98%,rgba(170,170,170,1) 100%);
		background: -o-linear-gradient(left, rgba(245,245,245,1) 0%,rgba(245,245,245,1) 98%,rgba(170,170,170,1) 100%);
		background: -ms-linear-gradient(left, rgba(245,245,245,1) 0%,rgba(245,245,245,1) 98%,rgba(170,170,170,1) 100%);
		background: linear-gradient(to right, rgba(245,245,245,1) 0%,rgba(245,245,245,1) 98%,rgba(170,170,170,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f5f5', endColorstr='#aaaaaa',GradientType=1 );
	}

	#storycontent-content {
padding-bottom: 20px;
	}

	#storycontent-content p {

	}

	#storycontent-story-info {
		margin: 10px 0 10px 0;
	}

	#storycontent-author {

	}

	#storycontent-time {

	}

	#story-content img {
		max-width: 780px !important;
	}

	#storycontent-content p {
		margin-left: 13%;
		margin-right: 13%;
	}

	#storycontent-content div {

	}

	.story-media {
		margin: 0 auto !important;
	}

	.widget-first {
		border-top: none;
	}

	.ps-image {
		margin: 0 auto;
		width: 780px !important;
	}

	.ps-image img {
		width: 780px !important;
		margin: 0 auto;
	}

	#story-content iframe {
		width: 780px !important;
	}

	.storywidget-title {
		position: relative;
		margin-top: 10px;
		font-size: 15px;
	   /*font-weight: bold;*/
		margin-bottom: 5px;
		color: #004F27;
	}

	.clock-icon {
		float: left;
	}

	.storywidget-time {
		position: relative;
	  margin-bottom: 5px;
margin-top : 10px;
	}

	.storywidget-timestamp {
		float: left;
		padding-left: 5px;
		color: #777 !important;
		font-style: italic;
		font-size: small;
		font-variant: small-caps;
	}

#footer-well{
margin-top: -17px;
z-index: 9e9;
}

	/*
	 #app-header{
	 position: fixed;
	 display: block;
	 height: 50px;
	 background: #87C33B;

	 }*/

</style>

<style>
.styled-v-bar{ /* sample CSS class for a different vertical scrollbar look */
background:	url(<?php print $scrollbar_src; ?>) center top no-repeat;
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
	<!-- <div id="app-header" ></div> -->
	<div id="app-view" ></div>
</div><!-- #primary -->

<script type="text/template" id="app-template" >
	<!-- wrapper with a span10 -->
	<div id="story-widgets" class="span4 gradient" >
	<ul id="widgets-list" ></ul>
	</div>
	<div id="story-content" class="span10" ></div>
</script>

<script type="text/template" id="storycontent-template" >
	<!-- wrapped with a span11 -->
	<div id="storycontent-title" data-story="<%= story_id %>" ><h2><%= story_title %></h2></div>
	<% if(story_image){ %>
	<div class="story-image ps-image" ><img src="<%= story_image %>" /></div>
	<% }; %>
	<div id="storycontent-story-info" class="well well-small" >
	<span id="storycontent-author" class="pull-left" ><%= story_author %></span>
	<span id="storycontent-time" class="pull-right" ><%= story_date %></span>
	</div>
	<div id="storycontent-content" ><p><%= story_content %></p></div>
</script>

<script type="text/template" id="storywidget-template" >
	<!-- wrapped with span3 -->
	<a href="javascript:void(0)" >
	<li class="story-widget" id="<%= widget_id %>" >
	<div class="storywidget-title" >
	<%= widget_title %>
	</div>
	<div class="storywidget-time" >
	<span class="clock-icon" ><i class="icon-time"></i></span>
	<span class="storywidget-timestamp" > <%= widget_timestamp %></span>
	</div>
	</li>
	</a>
</script>

<?php /*get_sidebar();*/ ?>
<?php get_footer(); ?>

