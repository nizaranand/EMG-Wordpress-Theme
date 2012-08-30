<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<!-- start of content.php -->
	<article id="post-<?php the_ID(); ?>" class="">

		<header class="entry-header">
			
			<?php if ( is_single() ) : ?>
		
				<h2 class="entry-title"><?php the_title(); ?></h2>
				
				<?php 
					if ( get_post_meta($post->ID, 'show_featured_image', true)  && 
						   get_post_meta($post->ID, 'show_featured_image', true ) == "false") {
									      // do not show featured image
					} else {
						if ( has_post_thumbnail() ) { 
				?>
							<div class="post-featured-image">
								<?php the_post_thumbnail(array(820,700)); ?>
							</div>
							<p>
								<small class="post-featured-image-caption">
									<?php the_post_thumbnail_caption(); ?>
								</small>
							</p>
				<?php
						} // close the if that checked we actually have a post thumbnail before we write it out.
					} // close the if that checked if we were going to hide the image based on the custom filed "show_featured_image"
				?>
				
				
				<div class="well well-small">
					Posted by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( '%s', 'twentytwelve' ), get_the_author() ); ?>
					</a>
				    
					<?php //echo 'Published <time class="timeago" datetime="'.get_the_modified_time("c").'">'.get_the_modified_time("l, M. j \a\\t g:i a").'</time>.'; ?>
				    <?php echo ' on '.get_the_modified_time("l, M. j \a\\t g:i a").'.'; ?>
				
					<div class="facebook-like-wrapper pull-right">
						<fb:like href="<?php the_permalink(); ?>" send="true" layout="button_count" width="100" show_faces="false"></fb:like>
					</div>
				</div>

			<?php else : ?>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
			<?php endif; // is_single() ?>
						
		</header><!-- header.entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- div.entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
			</div><!-- div.entry-content -->
		<?php endif; ?>

	</article><!-- #post -->
    <!-- end of content.php -->