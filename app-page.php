<?php
/*
 * Template Name: App View
 */
?>

<?php get_header(); ?>

<?php
	// add ui and dependencies
	wp_enqueue_script("jquery-ui", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/jquery-ui-1.8.2.custom.min.js", true);
	wp_enqueue_script("mousewheel", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/jquery.mousewheel.min.js", true);
	wp_enqueue_script("mCustomScrollbar", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/jquery.mCustomScrollbar.min.js", true);
	wp_enqueue_script("timeago", get_template_directory_uri() . "/js/app-view/libs/timeago/jquery-timeago.js", true);
	wp_enqueue_script("underscore", get_template_directory_uri() . "/js/app-view/libs/underscore/underscore.min.js", true);
	wp_enqueue_script("backbone", get_template_directory_uri() . "/js/app-view/libs/backbone/backbone.min.js", true);
	wp_enqueue_script("backbone-state", get_template_directory_uri() . "/js/app-view/libs/state-manager/backbone-statemanager.js", true);
	// add backbone objects
	wp_enqueue_script("storywidgets-collection", get_template_directory_uri() . "/js/app-view/collections/StoryWidgets.js", true);
	wp_enqueue_script("app-model", get_template_directory_uri() . "/js/app-view/models/App.js", true);
	wp_enqueue_script("storycontent-model", get_template_directory_uri() . "/js/app-view/models/StoryContent.js", true);
	wp_enqueue_script("storywidget-model", get_template_directory_uri() . "/js/app-view/models/StoryWidget.js", true);
	wp_enqueue_script("app-view", get_template_directory_uri() . "/js/app-view/views/AppView.js", true);
	wp_enqueue_script("storycontent-view", get_template_directory_uri() . "/js/app-view/views/StoryContentView.js", true);
	wp_enqueue_script("storywidgets-view", get_template_directory_uri() . "/js/app-view/views/StoryWidgetsView.js", true);
	wp_enqueue_script("storywidget-view", get_template_directory_uri() . "/js/app-view/views/StoryWidgetView.js", true);
	wp_enqueue_script("stories-router", get_template_directory_uri() . "/js/app-view/StoriesRouter.js", true);
	wp_enqueue_script("app-helpers", get_template_directory_uri() . "/js/app-view/app-helpers.js", true);
	wp_enqueue_script("app-init", get_template_directory_uri() . "/js/app-view/app-init.js", true);
	
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>

