<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 */
?>
	<!-- TOP OF FOOTER.PHP -->
	</div><!-- .row wrapper, opened in header.php -->

	<div class="row">
		<footer class="span14">
			<div class="well">Emerald Media Group.</div>
		</footer><!-- #colophon -->
	</div>
	
</div><!-- .container, opened in header.php -->

<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/bootstrap.js"></script> <?php //TODO: add as wp_footer action  ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/0.9.3/jquery.timeago.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/dailyemerald.js"></script> <?php //TODO: add as wp_footer action  ?>
</body>
</html>