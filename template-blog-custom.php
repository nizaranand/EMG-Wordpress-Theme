<?php
/**
 * Template Name: Custom Blog
 *
 */

get_header();
?>
<!-- template-custom-blog.php -->
<section id="blog-wrapper" class="span10">

	<?php 
	$custom_fields = get_post_custom();

	echo "<img class='blog-header-image' src=\"" . $custom_fields['blog_image'][0] . "\"></img>";
	echo "<p class='blog-header-title'>" . $custom_fields['blog_title'][0] . "</p>";
	echo "<hr>";
	
	$the_query = new WP_Query("category_name=".$custom_fields['blog_category'][0]."&posts_per_page=10"); //TODO: SQL injection by here
	while ( $the_query->have_posts() ) : $the_query->the_post();	
		get_template_part('content', 'archive2');
	endwhile;
	
	wp_reset_postdata();
	?>
</section>

<?php
	get_sidebar();
	get_footer();
// leave tag open