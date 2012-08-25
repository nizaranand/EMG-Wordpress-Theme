<?php
/**
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>


		<section id="content" class="span4">
			<div class="well">The Feed</div>
		</section>

		<section class="span6">
			<div class="well">The big stories</div>
		</section>

<?php get_sidebar(); //should be 'home?'?>
<?php get_footer(); ?>