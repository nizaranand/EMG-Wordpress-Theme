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

	<div class="row" id="main-footer" >
		<footer class="span14">
			<div class="well" id="footer-well" >
				Emerald Media Group. &copy; 2012.<br>
				<a href="https://github.com/dailyemerald">Check us out</a> on GitHub.
				<div class="pull-right" style="margin-top:-16px">
					<a href="https://mixpanel.com/f/partner"><img src="https://mixpanel.com/site_media/images/partner/badge_light.png" alt="Mobile Analytics" /></a>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div>
	
</div><!-- .container, opened in header.php -->

<img src="http://emping1.herokuapp.com/pixel.gif?key=<?php the_permalink() ?>"></img>

<?php wp_footer(); ?>

<script src="http://intense-thicket-1581.herokuapp.com/track.js"></script>

<script src="http://www.goducks.com/mediaPortal/scripts/inline.js"></script>

</body>
</html>
