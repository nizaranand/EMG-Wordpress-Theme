<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<!-- start single.php -->
	<section id="primary" class="site-content span10">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<!-- TODO: what should we do with this? 
				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span>', 'twentytwelve' ) . ' %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title ' . __( '<span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></span>
				</nav>
				-->
				<!-- .nav-single -->

				
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</section><!-- #primary .site-content -->
	<!-- end single.php -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>