<?php


function add_theme_caps() {
  $role = get_role( 'author' ); // gets the author role
  $role->add_cap( 'unfiltered_html' ); // would allow the author to edit others' posts for current theme only
}
add_action( 'admin_init', 'add_theme_caps');

add_action( 'wp_head', 'emg_show_template', 999 );
function emg_show_template() {
    global $template;
    echo '
    <script>
      wordpress_template_used = "' . basename($template) .'"
    </script>
    ';
}



require( get_template_directory() . '/inc/get_adtag.php' );
require( get_template_directory() . '/inc/get_vendor_javascript_setups.php' );
require( get_template_directory() . '/inc/description_walker_for_nav_bar.php');


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
	$the_query = new WP_Query("category=news&posts_per_page=40");//"&orderby=modified");
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

		echo '<tr class="feed-post-left" ><td>';
		//echo $currentPostNumber.". ";
		
		echo '<div class="feed-header">';
		$category_outputted = false;
		foreach(get_the_category() as $category) {
			switch ($category->cat_name) {
				case "Ducks Inc.": 
					echo "DUCKS, INC. &bull; ";
				 	break;
				case "News":
					echo "NEWS &bull; ";
					break;
				case "Video":
					if ($category_outputted === false) {
						echo "VIDEO &bull; ";
					}
					break;				
				case "Sports":
					$category_outputted = true;
					echo "SPORTS &bull; ";
					break;
				case "Photo":
					echo "PHOTO &bull; ";
					break;
				case "Wknd":
					echo "WKND &bull; ";
					break;
				case "Back to the Books":
					echo "WKND &bull; ";
					break;
				case "Special Sections":
					echo "WKND &bull; ";
					break;
			}
		}

		echo '<time class="timeago" datetime="'.get_the_time("c").'">'.get_the_time("l, M. j \a\\t g:i a").'</time>';
		echo '</div> <!-- -->';
		echo '<a href="';
		echo the_permalink();
		echo '">';
		the_title();
		echo '</a><br>';
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
		echo '  <h2 style="margin:0">'.get_the_title().'</h2>';
		echo '</a>';

		echo '<div class="feed-header">Posted <time class="timeago" datetime="'.get_the_time("c").'">'.get_the_time("l, M. j \a\\t g:i a").'</time></div>';

		echo '<a href="'.get_permalink().'">';
		the_post_thumbnail(array(540,500));
		echo '</a>';
		//the_excerpt();
		
		$embedHtmlFields = get_post_custom_values("embed_html");
		foreach ( $embedHtmlFields as $value ) {
		    echo '<div class="embedded-html">';
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
	
	$big = 99999999999;

	$paginate_args = array(
			       'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			       'format' => '/page/%#%',
			       'show_all' => false,
			       'total' => $wp_query->max_num_pages,
			       'current' => max(1, get_query_var('paged')),
			       'prev_next' => true,
			       'next_text' => 'Older',
			       'prev_text' => 'Newer',
			       'type' => 'list'
        );

	$links = paginate_links($paginate_args);
	
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>" class="navigation pagination" role="navigation">
		   <?php echo $links; ?>
		</nav><!-- #<?php echo $nav_id; ?> .navigation -->
	<?php endif;
}

/**
 * Include Facebook Open Graph metadata for sharing
 */
function emg_head_fb_open_graph() {

	$properties = array(
		'fb:admins' => '100001785043323',
		'fb:app_id' => '197312536953017',
		'og:title' => get_bloginfo( 'name' ),
		'og:description' => get_bloginfo( 'description' ),		
		'og:url' => get_bloginfo( 'url' ),
		'og:type' => 'website',
		'og:image' => get_bloginfo( 'template_directory' ) . '/images/ArchivePlaceholder.jpg',
	);

	if ( is_single() ) {
		global $post;
		$properties['og:title'] = $post->post_title;
		if ( !empty( $post->post_excerpt ) )
			$properties['og:description'] = strip_tags( $post->post_excerpt );
		else
			$properties['og:description'] = substr( strip_tags( $post->post_content ), 0, 255 ) . '...';
		//$properties['og:permalink'] = get_permalink(); //og:permalink is not a valid meta tag for facebook
		$properties['og:url'] = get_permalink(); //IV, 20120105
		if ( has_post_thumbnail() )	
			$properties['og:image'] = wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) );
	}


	foreach( $properties as $property => $content ) {
		echo '<meta property="' . $property . '" content="' . $content . '" />' . "\n";
	}	
}




function get_goducks_video_player() {
?>

<div class="goducks-video-player">

	<!-- begin player embed code -->
	<table width="300" border="0" cellspacing="0" cellpadding="0">
		<tr><td>
		<object width="300" height="318" id="iptvsyndicated" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
		<param name="movie" value="http://image.cdnl3.xosnetwork.com/mediaPortal/inline.swf" />
		<param name="flashVars" value="playerId=20507&server=http://www.goducks.com/XML/titanv3/&pageurl=http://www.goducks.com/mediaPortal/&sitename=aff.oregon.dailyemerald&locimage=http://image.cdnl3.xosnetwork.com/mediaPortal/&jtv=500&skin=500&gaa=UA-8512810-1&companion=true&htmlid=iptvsyndicated&brandTextColor=0xCCCCCC&brandTextSelectedColor=0xFFFFFF&autostart=true&mute=true" />
		<param name="quality" value="high" />
		<param name="allowFullScreen" value="true" />
		<param name="allowScriptAccess" value="always" />
		<embed name="iptvsyndicated" pluginspage="http://www.adobe.com/go/getflashplayer" src="http://image.cdnl3.xosnetwork.com/mediaPortal/inline.swf" type="application/x-shockwave-flash" width="300" height="318" quality="high" allowFullScreen="true" allowScriptAccess="always" flashVars="playerId=20507&server=http://www.goducks.com/XML/titanv3/&pageurl=http://www.goducks.com/mediaPortal/&sitename=aff.oregon.dailyemerald&locimage=http://image.cdnl3.xosnetwork.com/mediaPortal/&jtv=500&skin=500&gaa=UA-8512810-1&companion=true&htmlid=iptvsyndicated&brandTextColor=0xCCCCCC&brandTextSelectedColor=0xFFFFFF&autostart=true&mute=true"></embed>
		</object>
		</td>
		</tr>
	</table>
	<!-- end player embed code -->

</div><!-- .goducks-video-player -->

<?php
}
