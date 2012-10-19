<?php
/*
 * Template Name: App View
 */
?>

<?php get_header(); ?>

<?php
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
	wp_enqueue_script("app-model", get_template_directory_uri() . "/js/app-view/models/App.js", true);
	wp_enqueue_script("app-view", get_template_directory_uri() . "/js/app-view/views/AppView.js", true);
	wp_enqueue_script("storywidgets-collection", get_template_directory_uri() . "/js/app-view/collections/StoryWidgets.js", true);
	wp_enqueue_script("storywidgets-view", get_template_directory_uri() . "/js/app-view/views/StoryWidgetsView.js", true);	
	wp_enqueue_script("storywidget-model", get_template_directory_uri() . "/js/app-view/models/StoryWidget.js", true);
	wp_enqueue_script("storywidget-view", get_template_directory_uri() . "/js/app-view/views/StoryWidgetView.js", true);
	wp_enqueue_script("stories-router", get_template_directory_uri() . "/js/app-view/routers/StoriesRouter.js", true);
	//wp_enqueue_script("stories-router", get_template_directory_uri() . "/js/app-view/StoriesRouter.js", true);
	wp_enqueue_script("app-helpers", get_template_directory_uri() . "/js/app-view/app-helpers.js", true);
	wp_enqueue_script("app-init", get_template_directory_uri() . "/js/app-view/app-init.js", true);
	
	wp_enqueue_style('custom-scroll', get_template_directory_uri() . "/css/jquery.mCustomScrollbar.css", "all");
	wp_enqueue_style('app-view', get_template_directory_uri() . "/css/app-view.css", "all");
?>

<div id="primary" class="site-content" >
	<div class="span10" ><!-- leave room for sidebar -->
		<div class="row" >
			<div id="app-view" class="span10" >
				
			</div>
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
	<% print("<li class='story-widget row' id='story-" + widget_id + "' >") %>
	<!-- <li class="story-widget row" id="story-<%= widget_id %>" > figure out the best way to do this -->
		<!-- <% print("<a href='#/story/" + id +"' >") %> -->
			<div id="storywidget-title" class="row" >
				<div class="span3" >
					<%= widget_title %>
				</div>
			</div>
			<div id="storywidget-time" class="row" >
				<div class="span3" >
					<span class="clock-icon" ><i class="icon-time"></i></span>
					<span class="storywidget-timestamp" > <%= widget_timestamp %></span>
				</div>
			</div>
		<!-- <% print("</a>") %> -->
	</li>
</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

