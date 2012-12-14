<?php
/*
 * Template Name: Our Staff
 */
?>

<?php
/*
 * Loops over the directories under the img/staff-photos/ directory in the theme folder to gather image filenames. 
 * Then constructs a grid of images for each folder in the order declared below.
 */
$settings = array(
    'dir_prefix' => get_theme_root() . '/EMG-Wordpress-Theme/img/staff-photos/',
    'url_prefix' => get_template_directory_uri() . '/img/staff-photos/',
    'columns' => 5 //column number must be a divisor of 10
);
// to change the order rearrange the set of key/value pairs below in $subdir
$subdir = array(
    'newsroom_editors',
    'newsroom_staff',
    'professional-staff',
    'ad-staff',
    'marketing',
    'board'
);

?>

<?php get_header(); ?>

<?php
        wp_enqueue_script("bootstrap-tooltip", get_template_directory_uri() . "/js/bootstrap-tooltip.js", true);
        wp_enqueue_script("bootstrap-popover", get_template_directory_uri() . "/js/bootstrap-popover.js", true);
        wp_enqueue_script("our-staff", get_template_directory_uri() . "/js/our-staff.js", true);

?>

<div id="primary" class="site-content" >
        <div class="span10" >

			<?php while ( have_posts() ) : the_post(); ?>
			<h3 class='archive-title' ><span><?php the_title(); ?></span></h3>
			<?php endwhile; ?>

            <?php
            
            $dir_index = 0;
            $img_index = 0;
            foreach ($subdir as $dir) {
                $img_index = 0;
                $images = scandir($settings['dir_prefix'] . $dir);
                if (count($images) > 2) {
                    echo "<hr>";
		    /* 
		     *  Write out the header for the section
		     */
		    echo "<div class='row' >";
		    $dir_split = explode("-", $dir );
		    if(strcmp($dir_split[0], $dir) == 0){
		      $dir_split = explode("_", $dir);
		      if(strcmp($dir_split[0], $dir) == 0){
			$group = $dir;
		      }else{
			$group = $dir_split[0] . " | " . $dir_split[1];
		      }
      		      $group = ucwords($group); 
		    }else{
		      $group = ucwords($dir_split[0] . " " . $dir_split[1]);
		    }

      		    echo "<div class='span10' ><h4>" . $group  . "</h4></div>";
		    echo "</div>";
                }

                echo "<div id='" . $dir . "' class='row' >";
		echo "<div class='span10' >";

                foreach ($images as $image) {
                    if ($image === "." || $image === ".." || $image{0} == '.') {
                        continue;   // skip if $image is a directory reference or hidden
                    }

                    if ($img_index % $settings['columns'] == 0) {
                        echo "<div class='row' >";  // new row
                        $columns = 0;
                    }
                    
                    $matches = array();
                    if (preg_match('/\d+/', $image, $matches)) {
                        $user_id = $matches[0];
                        $user = get_user_by('id', $user_id);
                    } else {
                        $user = false;
                    }

                    echo "<div class='span" . 10 / $settings['columns'] . "' >"; // 10 is the max number of columns
                    if ($user) {
		      echo "<p><img class='hover' title='" . $user->first_name . " " . $user->last_name . "' data-content='" . htmlspecialchars($user->description) . "' src='" . $settings['url_prefix'] . $dir . "/" . $image . "' /></p>";
                    }else{
		      echo "<p><img class='hover' src='" . $settings['url_prefix'] . $dir . "/" . $image . "' title='" . str_replace('.jpg', '', $image) . "'/ ></p>";
                    }
                    echo "</div>";

                    $columns++;
                    $img_index++;

                    if ($columns == $settings['columns'] || count($images) - 2 == $img_index) {
                        echo "</div>"; // end row
                    }
                }
		echo "</div>";    // end span10 wrapper
                echo "</div>";    // end row wrapper
                $dir_index++;
            }
            ?>
        </div> <!-- .span10 -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


