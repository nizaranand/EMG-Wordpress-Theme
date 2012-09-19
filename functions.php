<?php

require( get_template_directory() . '/inc/get_adtag.php' );
require( get_template_directory() . '/inc/get_vendor_javascript_setups.php' );

add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote' ) );
add_theme_support( 'post-thumbnails' ); 

register_nav_menu( 'primary', __( 'Primary Menu', 'EMG' ) );

function the_post_thumbnail_caption() { //TODO: move this to a template tag file
  global $post;
  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
  if ( $thumbnail_image && isset( $thumbnail_image[0] ) ) {
 		echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}

function get_social_buttons() {
	//TODO: implement this with Facebook, Twitter, (what else?)
	echo "<!-- get_social_buttons(); -->";
}

function get_the_feed_insert() {
?>
<tr><td>
	<blockquote>
	  <p>Up to the minute news.</p>
	</blockquote>
</td></tr>
<?php
}

function get_the_feed() {

	$currentPostNumber = 1;	
	$the_query = new WP_Query("category=news&orderby=modified");
	?>
	<table class="table table-striped">
	<thead>
	    <tr>
	      <th>Up to the minute</th>
	    </tr>
    </thead>
	<tbody>
	<?php
	while ( $the_query->have_posts() ) : $the_query->the_post();
		if ($currentPostNumber == 4) {
			//get_the_feed_insert(); //TODO: do we want to do something with this?
		}

		echo '<tr><td>';
		//echo $currentPostNumber.". ";
		echo '<a href="';
		echo the_permalink();
		echo '">';
		the_title();
		echo '</a><br>';
		echo '<small><time class="timeago" datetime="'.get_the_modified_time("c").'">'.get_the_modified_time("l, M. j \a\\t g:i a").'</time></small>';
		echo '</td></tr>';
		$currentPostNumber++;
		
	endwhile;
	?>
	</tbody>
	</table>
	<?php
	// Reset Post Data
	wp_reset_postdata();
}


function get_the_editors_picks() {
	$the_query = new WP_Query("category_name=editors-picks&posts_per_page=6");
	?>
	<table class="table">
	<thead>
	    <tr>
	      <th>Top stories</th>
	    </tr>
    </thead>
	<tbody>
	<?php
	while ( $the_query->have_posts() ) : $the_query->the_post();
		echo '<tr><td>';

		
		echo '<a href="'.get_permalink().'">';
		echo '  <h4 style="margin:0">'.get_the_title().'</h4>';
		echo '</a>';

		echo '<small>Posted <time class="timeago" datetime="'.get_the_modified_time("c").'">'.get_the_modified_time("l, M. j \a\\t g:i a").'</time></small><br>';

		echo '<a href="'.get_permalink().'">';
		the_post_thumbnail(array(540,500));
		echo '</a>';
		//the_excerpt();
		
		$embedHtmlFields = get_post_custom_values("embed_html");
		foreach ( $embedHtmlFields as $value ) {
		    echo '<div class="embeded-html">';
		    echo $value;
		    echo '</div>'; 
		}
		
		echo '</td></tr>';
	endwhile;
	?>
	</tbody>
	</table>
	<?php
	// Reset Post Data
	wp_reset_postdata();
}



function emg_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class="navigation well" role="navigation">
			<div class="nav-previous alignleft pull-left"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
			<div class="nav-next alignright pull-right"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- #<?php echo $nav_id; ?> .navigation -->
	<?php endif;
}
