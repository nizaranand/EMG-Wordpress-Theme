<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

if(have_posts()){
    // get the first post, gather author metadata, rewind the posts loop
    the_post();
    $author_name = get_the_author();
    $author_id = get_the_author_meta("ID");
    $author_bio = get_the_author_meta("description");    
    rewind_posts();
}

?>

<?php get_header(); ?>

	<section id="primary" class="site-content span10">
		<div id="content" class="span10" role="main">

			<header class="archive-header row">
				<h1 class="archive-title"><?php printf( __( 'Author Archives: %s', 'twentytwelve' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
			</header>

<?php print jscript_log(get_staff_image_url($author_id)); ?>

			<?php if($author_bio) : ?>
                            <div id="author-info" class="row">
                                    <div id="author-image" class="span2" >
                                        <img src="<?php print get_staff_image_url($author_id) ?>" title="<?php print $author_name ?>" >                                        
                                    </div>
                                    <div id="author-description" class="span8" >
                                            <p><?php print $author_bio; ?></p>
                                    </div>
                            </div><hr>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
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
                                                <div class="no-featured-image" style="opacity: 0.2" class="hidden-phone" >
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
			
			<?php endwhile; ?>

		</div><!-- #content -->
	</section><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

        
        
        