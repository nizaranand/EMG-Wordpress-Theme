<?php
/**
 * Template Name: Homepage 1
 *
 */
get_header();
?>
<!-- template-home.php -->
<section id="home-left-column" class="span4">
	
	<?php get_the_feed(); ?>
		
</section>

<section id="home-center-column" class="span6">
	
	<?php get_the_editors_picks(); ?>

</section>

<!--
<section class="span10">
	<div id="myCarousel" class="carousel slide">
	  <div class="carousel-inner">
	    <div class="active item">one</div>
	    <div class="item">two</div>
	    <div class="item">three</div>
	  </div>
	  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
	  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>
</section>
-->

<?php
get_sidebar();
get_footer();
?>