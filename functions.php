<?php

require( get_template_directory() . '/inc/get_adtag.php' );

add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote' ) );

register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );

function get_social_buttons() {
	//TODO: implement this with Facebook, Twitter, (what else?)
	echo "stub for get_social_buttons()";
}

function get_the_feed() {
	
	$the_query = new WP_Query("category=news");
?>
	<table class="table table-striped">
	<thead>
	    <tr>
	      <th>The Feed</th>
	    </tr>
    </thead>
	<tbody>
	<?php
	while ( $the_query->have_posts() ) : $the_query->the_post();
		echo '<tr><td><a href="';
		echo the_permalink();
		echo '">';
		the_title();
		echo '</a></td></tr>';
	endwhile;
	?>
	</tbody>
	</table>
	<?php
	// Reset Post Data
	wp_reset_postdata();
}





function get_the_center() {
	
	$the_query = new WP_Query("category=news");
?>
	<table class="table">
	<thead>
	    <tr>
	      <th>Editor's Picks</th>
	    </tr>
    </thead>
	<tbody>
	<?php
	while ( $the_query->have_posts() ) : $the_query->the_post();
		echo '<tr><td><a href="';
		echo the_permalink();
		echo '">';
		the_post_thumbnail(array(460,450));
		the_title();
		echo '</a>';
		the_excerpt();
		echo '</td></tr>';
	endwhile;
	?>
	</tbody>
	</table>
	<?php
	// Reset Post Data
	wp_reset_postdata();
}