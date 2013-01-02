<?php
/*
 * Template Name: Data Visualization
 */
?>

<?php get_header(); ?>

<?php

wp_enqueue_script("jquery-ui-punch", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/jquery.ui.touch-punch.min.js", true);
wp_enqueue_script("facescroll", get_template_directory_uri() . "/js/app-view/libs/custom-scroll/facescroll.js", true);
wp_enqueue_script("spin", get_template_directory_uri() . "/js/app-view/libs/spin/spin.min.js", true);
wp_enqueue_script("underscore", get_template_directory_uri() . "/js/app-view/libs/underscore/underscore.min.js", true);

// save these for more ambitious projects
//wp_enqueue_script("ember", get_template_directory_uri() . "/js/ember.min.js", true);
//wp_enqueue_script("handlebars", get_template_directory_uri() . "/js/handlebars.js", true);

wp_enqueue_script("d3", "http://d3js.org/d3.v3.min.js", true);
wp_enqueue_script("nvd3", get_template_directory_uri() . "/js/nv.d3.min.js", true);
wp_enqueue_script("load-js", get_template_directory_uri() . "/data-vis/load-project.js", true);

?>

<style>
    /* general template styling, use external stylesheets for individual projects */
    
    
    
</style>

<div id="primary" class="site-content" >
	<div id="data-vis" class="span14" ></div>
</div>

<?php get_footer(); ?>
