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
</body>
</html>