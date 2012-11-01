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
wp_enqueue_script("jquery-ui", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/jquery-ui-1.8.23.custom.min.js", false);
wp_enqueue_script("mousewheel", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/jquery.mousewheel.min.js", false);
wp_enqueue_script("mCustomScrollbar", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/jquery.mCustomScrollbar.min.js", false);
wp_enqueue_script("timeago", get_template_directory_uri() . "/js/app-view/libs/timeago/jquery-timeago.js", true);
wp_enqueue_script("spin", get_template_directory_uri() . "/js/app-view/libs/spin/spin.min.js", true);
wp_enqueue_script("underscore", get_template_directory_uri() . "/js/app-view/libs/underscore/underscore.min.js", true);
wp_enqueue_script("backbone", get_template_directory_uri() . "/js/app-view/libs/backbone/backbone.min.js", true);
// add backbone objects
wp_enqueue_script("storywidget-model", get_template_directory_uri() . "/js/app-view/models/StoryWidget.js", true);
wp_enqueue_script("storywidget-view", get_template_directory_uri() . "/js/app-view/views/StoryWidgetView.js", true);
wp_enqueue_script("storywidgets-view", get_template_directory_uri() . "/js/app-view/views/StoryWidgetsView.js", true);
wp_enqueue_script("storywidgets-collection", get_template_directory_uri() . "/js/app-view/collections/StoryWidgets.js", true);
//wp_enqueue_script("app-model", get_template_directory_uri() . "/js/app-view/models/App.js", true);
wp_enqueue_script("app-view", get_template_directory_uri() . "/js/app-view/views/AppView.js", true);
//wp_enqueue_script("stories-router", get_template_directory_uri() . "/js/app-view/StoriesRouter.js", true);
wp_enqueue_script("app-helpers", get_template_directory_uri() . "/js/app-view/app-helpers.js", true);
wp_enqueue_script("app-init", get_template_directory_uri() . "/js/app-view/app-init.js", true);

$arrow_src = get_template_directory_uri() . '/img/arrow.png';
$mcsb_src = get_template_directory_uri() . '/img/mCSB_buttons.png'; 
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
	height: inherit !important;
}

.story-widget {
	position: relative;
    cursor: pointer;
	border-bottom: dashed silver 1.5px;
	overflow: hidden;
    padding: 10px 15px 10px 10px;
	height: 125px;
}

#widgets-list {
	height: inherit !important;
	list-style: none;
}

#story-content {
    position: relative;
	height: inherit !important;
}

#storycontent-author-info{

}

#storycontent-author{

}

#storycontent-time{

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
	margin-right: 20px !important;
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
	/* basic scrollbar styling */
/* vertical scrollbar */
.mCSB_container{
        width:auto;
        margin-right:30px;
        overflow:hidden;
}
.mCSB_container.mCS_no_scrollbar{
        margin-right:0;
}
.mCustomScrollBox .mCSB_scrollTools{
        width:16px;
        height:100%;
        top:0;
        right:0;
}
.mCSB_scrollTools .mCSB_draggerContainer{
        height:100%;
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        box-sizing:border-box;
}
.mCSB_scrollTools .mCSB_buttonUp+.mCSB_draggerContainer{
        padding-bottom:40px;
}
.mCSB_scrollTools .mCSB_draggerRail{
        width:2px;
        height:100%;
        margin:0 auto;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
}
.mCSB_scrollTools .mCSB_dragger{
        cursor:pointer;
        width:100%;
        height:30px;
}
.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar{
        width:4px;
        height:100%;
        margin:0 auto;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        text-align:center;
}
.mCSB_scrollTools .mCSB_buttonUp,
.mCSB_scrollTools .mCSB_buttonDown{
        height:20px;
        overflow:hidden;
        margin:0 auto;
        cursor:pointer;
}
.mCSB_scrollTools .mCSB_buttonDown{
        bottom:0;
        margin-top:-40px;
}
/* horizontal scrollbar */
.mCSB_horizontal .mCSB_container{
        height:auto;
        margin-right:0;
        margin-bottom:30px;
        overflow:hidden;
}
.mCSB_horizontal .mCSB_container.mCS_no_scrollbar{
        margin-bottom:0;
}
.mCSB_horizontal.mCustomScrollBox .mCSB_scrollTools{
        width:100%;
        height:16px;
        top:auto;
        right:auto;
        bottom:0;
        left:0;
        overflow:hidden;
}
.mCSB_horizontal .mCSB_scrollTools .mCSB_draggerContainer{
        height:100%;
        width:auto;
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        box-sizing:border-box;
        overflow:hidden;
}
.mCSB_horizontal .mCSB_scrollTools .mCSB_buttonLeft+.mCSB_draggerContainer{
        padding-bottom:0;
        padding-right:20px;
}
.mCSB_horizontal .mCSB_scrollTools .mCSB_draggerRail{
        width:100%;
        height:2px;
        margin:7px 0;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
}
.mCSB_horizontal .mCSB_scrollTools .mCSB_dragger{
        width:30px;
        height:100%;
}
.mCSB_horizontal .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar{
        width:100%;
        height:4px;
        margin:6px auto;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
}
.mCSB_horizontal .mCSB_scrollTools .mCSB_buttonLeft,
.mCSB_horizontal .mCSB_scrollTools .mCSB_buttonRight{
        width:20px;
        height:100%;
        overflow:hidden;
        margin:0 auto;
        cursor:pointer;
        float:left;
}
.mCSB_horizontal .mCSB_scrollTools .mCSB_buttonRight{
        right:0;
        bottom:auto;
        margin-left:-40px;
        margin-top:-16px;
        float:right;
}

/* default scrollbar colors and backgrounds */
.mCustomScrollBox .mCSB_scrollTools{
        opacity:0.75;
}
.mCustomScrollBox:hover .mCSB_scrollTools{
        opacity:1;
}
.mCSB_scrollTools .mCSB_draggerRail{
        background:#000; /* rgba fallback */
        background:rgba(0,0,0,0.4);
        filter:"alpha(opacity=40)"; -ms-filter:"alpha(opacity=40)"; /* old ie */
}
.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar{
        background:#fff; /* rgba fallback */
        background:rgba(255,255,255,0.75);
        filter:"alpha(opacity=75)"; -ms-filter:"alpha(opacity=75)"; /* old ie */
}
.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar{
        background:rgba(255,255,255,0.85);
        filter:"alpha(opacity=85)"; -ms-filter:"alpha(opacity=85)"; /* old ie */
}
.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar{
        background:rgba(255,255,255,0.9);
        filter:"alpha(opacity=90)"; -ms-filter:"alpha(opacity=90)"; /* old ie */
}
.mCSB_scrollTools .mCSB_buttonUp,
.mCSB_scrollTools .mCSB_buttonDown,
.mCSB_scrollTools .mCSB_buttonLeft,
.mCSB_scrollTools .mCSB_buttonRight{
  background-image:url(<?php print $mcsb_src; ?>);
        background-repeat:no-repeat;
        opacity:0.4;
        filter:"alpha(opacity=40)"; -ms-filter:"alpha(opacity=40)"; /* old ie */
}
.mCSB_scrollTools .mCSB_buttonUp{
        background-position:0 0;
        /* 
        sprites locations are 0 0/-16px 0/-32px 0/-48px 0 (light) and -80px 0/-96px 0/-112px 0/-128px 0 (dark) 
        */
}
.mCSB_scrollTools .mCSB_buttonDown{
        background-position:0 -20px;
        /* 
        sprites locations are 0 -20px/-16px -20px/-32px -20px/-48px -20px (light) and -80px -20px/-96px -20px/-112px -20px/-128px -20px (dark) 
        */
}
.mCSB_scrollTools .mCSB_buttonLeft{
        background-position:0 -40px;
        /* 
        sprites locations are 0 -40px/-20px -40px/-40px -40px/-60px -40px (light) and -80px -40px/-100px -40px/-120px -40px/-140px -40px (dark) 
        */
}
.mCSB_scrollTools .mCSB_buttonRight{
        background-position:0 -56px;
        /* 
        sprites locations are 0 -56px/-20px -56px/-40px -56px/-60px -56px (light) and -80px -56px/-100px -56px/-120px -56px/-140px -56px (dark) 
        */
}
.mCSB_scrollTools .mCSB_buttonUp:hover,
.mCSB_scrollTools .mCSB_buttonDown:hover,
.mCSB_scrollTools .mCSB_buttonLeft:hover,
.mCSB_scrollTools .mCSB_buttonRight:hover{
        opacity:0.75;
        filter:"alpha(opacity=75)"; -ms-filter:"alpha(opacity=75)"; /* old ie */
}
.mCSB_scrollTools .mCSB_buttonUp:active,
.mCSB_scrollTools .mCSB_buttonDown:active,
.mCSB_scrollTools .mCSB_buttonLeft:active,
.mCSB_scrollTools .mCSB_buttonRight:active{
        opacity:0.9;
        filter:"alpha(opacity=90)"; -ms-filter:"alpha(opacity=90)"; /* old ie */
</style>

<div id="primary" class="site-content" >
	<div>
		<div id="app-view" ></div>
	</div>
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
	<div id="storycontent-author-info" class="well well-small" >
		<span id="storycontent-author" class="pull-left" ><%= story_author %></span>
		<span id="storycontent-time" class="pull-right" ><i class="icon-time"></i> <%= story_date %></span>
	</div>
	<div id="storycontent-content" ><p><%= story_content %></p></div>
</script>

<script type="text/template" id="storywidget-template" >
	<!-- wrapped with span3 -->
	<li class="story-widget" id="<%= widget_id %>" >
		<!-- <a href="#/story/<%= widget_id %>" rel="nofollow" title="<%= widget_title %>" > -->
			<div class="storywidget-title" >
				<%= widget_title %>
			</div>
			<div class="storywidget-time" >
				<span class="clock-icon" ><i class="icon-time"></i></span>
				<span class="storywidget-timestamp" > <%= widget_timestamp %></span>
			</div>
		<!-- </a> -->
	</li>
</script>

<?php /*get_sidebar();*/ ?>
<?php get_footer(); ?>

