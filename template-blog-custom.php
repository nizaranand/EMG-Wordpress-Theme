<?php
/**
 * Template Name: Custom Blog
 *
 */

$custom_fields = get_post_custom();
$the_query = new WP_Query("category_name=" . $custom_fields['category'][0] . "&posts_per_page=10");

function show_the_header() {
	echo "<h2>" . $custom_fields['title'][0] . "</h2>";
	echo "<img src=\"" . $custom_fields['image'][0] . "\"></img>";
}

function show_the_posts() {


	while ( $the_query->have_posts() ) : $the_query->the_post();
	
		the_title();

	
	endwhile;
	


	wp_reset_postdata();

}


/* end helpers */

get_header();
?>
<!-- template-custom-blog.php -->
<section id="blog-wrapper" class="span10">
	<?php show_the_header(); ?>
	<?php show_the_posts(); ?>
</section>

<?php
get_sidebar();
get_footer();
?>
