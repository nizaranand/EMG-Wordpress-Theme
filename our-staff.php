<?php
/*
* The page template for displaying the staff photos in a grid format.
* 	Uses bootstrap css classes.
* 
*/
?>

<!-- main content wrapper -->
<?php
// preprocessing
$images = scandir('/img/staff-photos/*.jpg');
$index = 0;
$settings = array(
	'dir_prefix' => '/img/staff-photos/',
	'rows' => 7,
	'columns' => 6,m
);
/* column number must be an integer divisor of 12 */
?>

<?php get_header(); ?>
	<div class="container" >
	<?php
	// this is how I'd prefer to do this
	foreach($images as $image){
		if($image === "." || $image === ".."){
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
<?php get_footer(); ?>


