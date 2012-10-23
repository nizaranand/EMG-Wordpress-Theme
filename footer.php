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
			<div class="well">
				Emerald Media Group. &copy; 2012.<br>
				<a href="https://github.com/dailyemerald">Check us out</a> on GitHub.
				<div class="pull-right" style="margin-top:-16px">
					<a href="https://mixpanel.com/f/partner"><img src="https://mixpanel.com/site_media/images/partner/badge_light.png" alt="Mobile Analytics" /></a>
				</div>
			</div>
		</footer><!-- #colophon -->
	</div>
	
</div><!-- .container, opened in header.php -->

<?php wp_footer(); ?>

<script type="text/javascript">
  var _gauges = _gauges || [];
  (function() {
    var t   = document.createElement('script');
    t.type  = 'text/javascript';
    t.async = true;
    t.id    = 'gauges-tracker';
    t.setAttribute('data-site-id', '506f45a5f5a1f5704e00002a');
    t.src = '//secure.gaug.es/track.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(t, s);
  })();
</script>

<script type="text/javascript">
  var GoSquared = {};
  GoSquared.acct = "GSN-135048-E";
  (function(w){
    function gs(){
      w._gstc_lt = +new Date;
      var d = document, g = d.createElement("script");
      g.type = "text/javascript";
      g.src = "//d1l6p2sc9645hc.cloudfront.net/tracker.js";
      var s = d.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(g, s);
    }
    w.addEventListener ?
      w.addEventListener("load", gs, false) :
      w.attachEvent("onload", gs);
  })(window);
</script>

<script src="http://www.goducks.com/mediaPortal/scripts/inline.js"></script>

</body>
</html>
