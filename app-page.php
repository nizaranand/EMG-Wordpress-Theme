<?php
/*
 * Template Name: App View
 */
?>

<?php get_header(); ?>

<?php
        // update these paths
        wp_enqueue_script("bootstrap-tooltip", get_template_directory_uri() . "/js/bootstrap-tooltip.js", true);
        wp_enqueue_script("bootstrap-popover", get_template_directory_uri() . "/js/bootstrap-popover.js", true);
        wp_enqueue_script("our-staff", get_template_directory_uri() . "/js/our-staff.js", true);

?>

<div id="primary" class="site-content" >
        <div class="span10" >




			
        </div> <!-- .span10 -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


