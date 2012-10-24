<?php
/*
 * Template Name: App View
 */
?>

<?php get_header(); ?>

<?php
//wp_enqueue_style('custom-scroll', get_template_directory_uri() . "/css/jquery.mCustomScrollbar.css", "all");
//wp_enqueue_style('app-view', get_template_directory_uri() . "/css/app-view.css", "all");

// add ui and dependencies
wp_enqueue_script("jquery-ui", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/jquery-ui-1.8.21.custom.min.js", true);
wp_enqueue_script("mousewheel", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/jquery.mousewheel.min.js", true);
wp_enqueue_script("mCustomScrollbar", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/jquery.mCustomScrollbar.min.js", true);
wp_enqueue_script("timeago", get_template_directory_uri() . "/js/app-view/libs/timeago/jquery-timeago.js", true);
wp_enqueue_script("spin", get_template_directory_uri() . "/js/app-view/libs/spin/spin.min.js", true);
wp_enqueue_script("underscore", get_template_directory_uri() . "/js/app-view/libs/underscore/underscore.min.js", true);
wp_enqueue_script("backbone", get_template_directory_uri() . "/js/app-view/libs/backbone/backbone.min.js", true);
wp_enqueue_script("backbone-state", get_template_directory_uri() . "/js/app-view/libs/state-manager/backbone-statemanager.js", true);
// add backbone objects
wp_enqueue_script("storywidget-model", get_template_directory_uri() . "/js/app-view/models/StoryWidget.js", true);
wp_enqueue_script("storywidget-view", get_template_directory_uri() . "/js/app-view/views/StoryWidgetView.js", true);
wp_enqueue_script("storywidgets-collection", get_template_directory_uri() . "/js/app-view/collections/StoryWidgets.js", true);
wp_enqueue_script("storywidgets-view", get_template_directory_uri() . "/js/app-view/views/StoryWidgetsView.js", true);
wp_enqueue_script("app-model", get_template_directory_uri() . "/js/app-view/models/App.js", true);
wp_enqueue_script("app-view", get_template_directory_uri() . "/js/app-view/views/AppView.js", true);
//wp_enqueue_script("stories-router", get_template_directory_uri() . "/js/app-view/StoriesRouter.js", true);
wp_enqueue_script("app-helpers", get_template_directory_uri() . "/js/app-view/app-helpers.js", true);
wp_enqueue_script("app-init", get_template_directory_uri() . "/js/app-view/app-init.js", true);
?>

<style>
	.widgetselected {
		background-color: white;
	}

	#app-content {
		background: #EEE;
	}

	#story-widgets {
		/*
		 * only show 10 widgets
		 */
		height: 1000px;
		background-color: #DDD;
	}

	.story-widget {
		padding: 0.3em;
		border-bottom: solid white;
		margin-right: 0.15em;
		height: 115px;
		overflow: hidden;
	}

	#widgets-list {
		list-style: none;
		height: 100%;
		width: 100%;
	}

	/* wrapper element for stories, does not have a corresponding model. this is what's populated when StoryContent renders */
	#story-content {
		border: silver solid 2px;
		height: 100%;
		width: 100%;
	}

	.storywidget-title {
		font-size: large;
		color: #333;
	}

	.clock-icon {
		float: left;
		margin-right: 0.15em;
	}

	.storywidget-time {
		position: relative;
		bottom: 2px;
	}

	.storywidget-timestamp {
		float: left;
		font-style: italic;
	}

	#arrow {

	}
</style>

<style>
	/* basic scrollbar styling */
	/* vertical scrollbar */
	.mCSB_container {
		width: auto;
		margin-right: 30px;
		overflow: hidden;
	}
	.mCSB_container.mCS_no_scrollbar {
		margin-right: 0;
	}
	.mCustomScrollBox .mCSB_scrollTools {
		width: 16px;
		height: 100%;
		top: 0;
		right: 0;
	}
	.mCSB_scrollTools .mCSB_draggerContainer {
		height: 100%;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	.mCSB_scrollTools .mCSB_buttonUp+ .mCSB_draggerContainer {
		padding-bottom: 40px;
	}
	.mCSB_scrollTools .mCSB_draggerRail {
		width: 2px;
		height: 100%;
		margin: 0 auto;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
	}
	.mCSB_scrollTools .mCSB_dragger {
		cursor: pointer;
		width: 100%;
		height: 30px;
	}
	.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
		width: 4px;
		height: 100%;
		margin: 0 auto;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
		text-align: center;
	}
	.mCSB_scrollTools .mCSB_buttonUp, .mCSB_scrollTools .mCSB_buttonDown {
		height: 20px;
		overflow: hidden;
		margin: 0 auto;
		cursor: pointer;
	}
	.mCSB_scrollTools .mCSB_buttonDown {
		bottom: 0;
		margin-top: -40px;
	}
	/* horizontal scrollbar */
	.mCSB_horizontal .mCSB_container {
		height: auto;
		margin-right: 0;
		margin-bottom: 30px;
		overflow: hidden;
	}
	.mCSB_horizontal .mCSB_container.mCS_no_scrollbar {
		margin-bottom: 0;
	}
	.mCSB_horizontal.mCustomScrollBox .mCSB_scrollTools {
		width: 100%;
		height: 16px;
		top: auto;
		right: auto;
		bottom: 0;
		left: 0;
		overflow: hidden;
	}
	.mCSB_horizontal .mCSB_scrollTools .mCSB_draggerContainer {
		height: 100%;
		width: auto;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		overflow: hidden;
	}
	.mCSB_horizontal .mCSB_scrollTools .mCSB_buttonLeft+ .mCSB_draggerContainer {
		padding-bottom: 0;
		padding-right: 20px;
	}
	.mCSB_horizontal .mCSB_scrollTools .mCSB_draggerRail {
		width: 100%;
		height: 2px;
		margin: 7px 0;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
	}
	.mCSB_horizontal .mCSB_scrollTools .mCSB_dragger {
		width: 30px;
		height: 100%;
	}
	.mCSB_horizontal .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
		width: 100%;
		height: 4px;
		margin: 6px auto;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
	}
	.mCSB_horizontal .mCSB_scrollTools .mCSB_buttonLeft, .mCSB_horizontal .mCSB_scrollTools .mCSB_buttonRight {
		width: 20px;
		height: 100%;
		overflow: hidden;
		margin: 0 auto;
		cursor: pointer;
		float: left;
	}
	.mCSB_horizontal .mCSB_scrollTools .mCSB_buttonRight {
		right: 0;
		bottom: auto;
		margin-left: -40px;
		margin-top: -16px;
		float: right;
	}

	/* default scrollbar colors and backgrounds */
	.mCustomScrollBox .mCSB_scrollTools {
		opacity: 0.75;
	}
	.mCustomScrollBox:hover .mCSB_scrollTools {
		opacity: 1;
	}
	.mCSB_scrollTools .mCSB_draggerRail {
		background: #000; /* rgba fallback */
		background: rgba(0,0,0,0.4);
		filter: "alpha(opacity=40)";
		-ms-filter: "alpha(opacity=40)"; /* old ie */
	}
	.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
		background: #fff; /* rgba fallback */
		background: rgba(255,255,255,0.75);
		filter: "alpha(opacity=75)";
		-ms-filter: "alpha(opacity=75)"; /* old ie */
	}
	.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar {
		background: rgba(255,255,255,0.85);
		filter: "alpha(opacity=85)";
		-ms-filter: "alpha(opacity=85)"; /* old ie */
	}
	.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar, .mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar {
		background: rgba(255,255,255,0.9);
		filter: "alpha(opacity=90)";
	}

</style>

<div id="primary" class="site-content" >
	<div class="span10" >
		<!-- leave room for sidebar -->
		<div class="row" id="app-view" >

		</div>
	</div><!-- .span10 -->
</div><!-- #primary -->

<script type="text/template" id="storywidgets-template" >
	<ul id="widgets-list" ></ul>
</script>

<script type="text/template" id="app-template" >
	<!-- wrapper with a span10 -->
	<div id="story-widgets" class="span3" ></div>
	<div id="story-content" class="span7" ></div>
</script>

<script type="text/template" id="storycontent-template" >
	<!-- -->
	<div id="storycontent-title" class="row" >
	<div class="span7" ><%= story_title %></div>
	</div>
	<div id="storycontent-author" class="row" >
	<div class="span7" ><%= story_author %></div>
	</div>
	<div id="storycontent-content" class="row" >
	<div class="span7" ><%= story_content %></div>
	</div>
</script>

<script type="text/template" id="storywidget-template" >
	<!-- wrapped with span3 -->
	<li class="story-widget row" id="story-<%= widget_id %>" >
	<a href="#/story/<%= widget_id%>" rel="nofollow" title="<%= widget_title %>" >
	<div id="storywidget-title" class="row" >
	<div class="span3" >
	<%= widget_title %>
	</div>
	</div>
	<div class="storywidget-time" class="row" >
	<div class="span3" >
	<span class="clock-icon" ><i class="icon-time"></i></span>
	<span class="storywidget-timestamp" > <%= widget_timestamp %></span>
	</div>
	</div>
	</a>
	</li>
</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

