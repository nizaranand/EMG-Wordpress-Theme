<?php
/**
 * Template Name: Homepage 1
 *
 */
get_header();
?>
<!-- template-home.php -->
<section id="content" class="span4">
	<?php get_the_feed(); ?>
</section>

<section class="span6">
	<?php get_the_center(); ?>
</section>

<!--
<section class="span10">
	<div class="well">Social stuff.</div>
</section>
-->

<?php
get_sidebar();
get_footer();
?>