<?php
/*
* The page template for displaying the staff photos in a grid format.
*/
?>

<?php
// pre-processing
$images = scandir('/img/staff-photos/*.jpg');
$index = 0;
$settings = array(
	'dir_prefix' => '/img/staff-photos/',
	'rows' => 7,
	'columns' => 6,
);
/* column number must be an integer divisor of 12 */
?>

<?php get_header(); ?>
	<div id="primary" class="site-content" >
		<div id="content" >
			<div class="container" >
			<?php
				foreach($images as $image){
				if($image === "." || $image === ".." || $image{0} == '.'){ 
					// skip if image is a directory reference or hidden
					continue;
				}
				if($index % $settings['columns'] == 0){
					// new row
					echo "<div class='row' > ";
				}
			 
				echo "<div class='span". $settings['columns'] / 12 ."' >";
				echo "<p><img src='". $settings['dir_prefix'] . $image ."' title='". $image ."' /></p>";
				echo "</div>";
				
				if(($index != 0 && $index % $settings['columns'] == 0) || $index == count($images) - 1){
					//end row
					echo "</div>";
				}
				$index++;
			}
			?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>


