<?php
/*
* Template Name: Our Staff
*/
?>

<?php
// pre-processing
$settings = array(
        'dir_prefix' => get_theme_root() . '/EMG-Wordpress-Theme/img/staff-photos/',
        'url_prefix' => get_template_directory_uri() . '/img/staff-photos/',
	'ad_prefix' => 'ad-staff/',
	'board_prefix' => 'board/',
	'pro_staff_prefix' => 'pro-staff/',
	'newsroom_prefix' => 'newsroom/',
	'marketing_prefix' => 'marketing/',
	'editors_prefix' => 'editors/', 
	'rows' => 7,
        'columns' => 6,
);
/* column number must be an integer divisor of 12 */

$images = array();
$images['editors'] = scandir($settings['dir_prefix'] . $settings['editors_prefix']);
$images['newsroom'] = scandir($settings['dir_prefix'] . $settings['newsroom_prefix']);
$images['pro-staff'] = scandir($settings['dir_prefix'] . $settings['pro_staff_prefix']);
$images['ad-staff'] = scandir($settings['dir_prefix'] . $settings['ad_prefix']);
$images['marketing'] = scandir($settings['dir_prefix'] . $settings['marketing_prefix']);
$images['board'] = scandir($settings['dir_prefix'] . $settings['board_prefix']);

?>

<?php get_header(); ?>
	<div id="primary" class="site-content" >
		<div id="content" >
			<div class="container" >
			<?php
			// images are printed in the order of their key declaration above within $images
			$index = 0;
			
			if(count($images['editors']) > 2){
			echo "<div id='editors' >";
			foreach($images['editors'] as $image){
				if($image === "." || $image === ".." || $image{0} == '.'){ 
					// skip if image is a directory reference or hidden
					continue;
				}
				if($index % $settings['columns'] == 0){
					// new row
					echo "<div class='row' > ";
					$columns = 0;
				}
				
				echo "<div class='span". 12 / $settings['columns'] ."' >";
				echo "<p><img class='staff-photo' src='". $settings['url_prefix'] . $settings['editors_prefix'] . $image ."' title='". str_replace('.jpg', '', $image) ."' ></p>";
				echo "</div>";
				
				$columns++;

				if($columns == $settings['columns']){
					//end row
					echo "</div>";
				}
				$index++;
      			}
			echo "</div></div>";
			}
			$index = 0;

			if(count($images['newsroom']) > 2){
			echo "<hr />";
			echo "<div id='newsroom' >";
			foreach($images['newsroom'] as $image){
                                if($image === "." || $image === ".." || $image{0} == '.'){
                                        // skip if image is a directory reference or hidden
                                        continue;
                                }
                                if($index % $settings['columns'] == 0){
                                        // new row
                                        echo "<div class='row' > ";
                                        $columns = 0;
                                }

                                echo "<div class='span". 12 / $settings['columns'] ."' >";
                                echo "<p><img class='staff-photo' src='". $settings['url_prefix'] . $settings['newsroom_prefix'] . $image ."' title='". str_replace('.jpg', '', $image) . "' /></p>";
                                echo "</div>";

                                $columns++;

                                if($columns == $settings['columns']){
                                        //end row
                                        echo "</div>";
                                }
                                $index++;
                        }
			echo "</div></div>";
			}		
			$index = 0;

			if(count($images['ad-staff']) > 2){
                        echo "<hr />";
			echo "<div id='ad-staff' >";
                        foreach($images['ad-staff'] as $image){
                                if($image === "." || $image === ".." || $image{0} == '.'){
                                        // skip if image is a directory reference or hidden
                                        continue;
                                }
                                if($index % $settings['columns'] == 0){
                                        // new row
                                        echo "<div class='row' > ";
                                        $columns = 0;
                                }

                                echo "<div class='span". 12 / $settings['columns'] ."' >";
                                echo "<p><img class='staff-photo' src='". $settings['url_prefix'] . $settings['ad_prefix'] . $image ."' title='". str_replace('.jpg', '', $image) ."' /></p>";
                                echo "</div>";

                                $columns++;

                                if($columns == $settings['columns']){
                                        //end row
                                        echo "</div>";
                                }
                                $index++;
                        }
			echo "</div></div>";
			}
			$index = 0;

			if(count($images['marketing']) > 2){
                        echo "<hr />";
			echo "<div id='marketing' >";
                        foreach($images['marketing'] as $image){
                                if($image === "." || $image === ".." || $image{0} == '.'){
                                        // skip if image is a directory reference or hidden
                                        continue;
                                }
                                if($index % $settings['columns'] == 0){
                                        // new row
                                        echo "<div class='row' > ";
                                        $columns = 0;
                                }

                                echo "<div class='span". 12 / $settings['columns'] ."' >";
                                echo "<p><img class='staff-photo' src='". $settings['url_prefix'] . $settings['marketing_prefix'] . $image ."' title='". str_replace('.jpg', '', $image) ."' /></p>";
                                echo "</div>";

                                $columns++;

                                if($columns == $settings['columns']){
                                        //end row
                                        echo "</div>";
                                }
                                $index++;
                        }			
			echo "</div></div>";
			}
			$index = 0;
			if(count($images['board']) > 2){
                        echo "<hr />";
			echo "<div id='board' >";
                        foreach($images['board'] as $image){
                                if($image === "." || $image === ".." || $image{0} == '.'){
                                        // skip if image is a directory reference or hidden
                                        continue;
                                }
                                if($index % $settings['columns'] == 0){
                                        // new row
                                        echo "<div class='row' > ";
                                        $columns = 0;
                                }

                                echo "<div class='span". 12 / $settings['columns'] ."' >";
                                echo "<p><img class='staff-photo' src='". $settings['url_prefix'] . $settings['board_prefix'] . $image ."' title='". str_replace('.jpg', '', $image) ."' /></p>";
                                echo "</div>";

                                $columns++;

                                if($columns == $settings['columns']){
                                        //end row
                                        echo "</div>";
                                }
                                $index++;
                        }
			echo "</div></div>";
			}	


			?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>


