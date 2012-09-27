<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="span10">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h3 class="archive-title"><?php
					if ( is_day() ) {
						printf( __( 'Daily Archives: %s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
					} elseif ( is_month() ) {
						printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
					} elseif ( is_year() ) {
						printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
					} elseif ( is_tag() ) {
						printf( __( 'Topic: %s', 'twentytwelve' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					} elseif ( is_category() ) {
						printf( __( '%s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					} else {
						_e( 'Blog Archives', 'twentytwelve' );
					}
				?></h3>

				<?php
					// Show an optional tag description.
					if ( is_tag() ) {
						$tag_description = tag_description();
						if ( $tag_description )
							echo '<div class="archive-meta">' . $tag_description . '</div>';
					}
					// Show an optional category description.
					if ( is_category() ) {
						$category_description = category_description();
						if ( $category_description )
							echo '<div class="archive-meta">' . $category_description . '</div>';
					}
				?>
			</header><!-- /. archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
		
				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				//get_template_part( 'content', get_post_format() );
			?>
				<article id="post-<?php the_ID(); ?>" class="">
					
					<div class="row">
					<div class="span3">
					<?php 
						if (has_post_thumbnail()) {
					?>
						<div class="post-featured-image"><a href="<?php the_permalink(); ?>" rel="bookmark">
							<?php the_post_thumbnail(array(220,200)); ?>
						</a></div>
					<?php
						} else {
					?>
						<div class="no-featured-image" style="opacity: 0.2" >
						    <img width="220px" height="200px" rel="placeholder" src="<?php echo get_template_directory_uri() . '/images/ArchivePlaceholder.jpg'; ?>" />
                                                </div>
					<?php
						} 
					?>
					</div><!-- .span3 -->
					
					<div class="span7">
						<h2 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
								<?php the_title(); ?>
							</a>
						</h2>
						
						<div class="feed-header">
							By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( '%s', 'twentytwelve' ), get_the_author() ); ?>
							</a>
							<?php //echo 'Published <time class="timeago" datetime="'.get_the_modified_time("c").'">'.get_the_modified_time("l, M. j \a\\t g:i a").'</time>.'; ?>
						    <?php echo ' on '.get_the_modified_time("l, M. j \a\\t g:i a").'.'; ?>
						</div>
						<div>
						    <p><?php the_excerpt(); ?></p>
						</div>
						
					</div><!-- .span7 -->
					</div><!-- .row -->
					<hr>
				</article><!-- #post -->
			<?php
			endwhile;

			emg_content_nav( 'nav-below' );
			
			endif;
			?>

		</div><!-- #content -->
	</section><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>