<?php
/**
 * The Sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<div class="sidebar span4">
	
	<?php get_search_form(); ?>		
			
	<div id="socialmedia" class="well well-small">
			<div style="" class="pull-left">
				<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/follow_button.1340179658.html#_=1340391604138&amp;id=twitter-widget-0&amp;lang=en&amp;screen_name=dailyemerald&amp;show_count=false&amp;show_screen_name=true&amp;size=m" class="twitter-follow-button" style="width: 139px; height: 20px; " title="Twitter Follow Button"></iframe>
			</div>
			<div class="pull-right" >
				<div class="fb-like" data-href="http://facebook.com/dailyemerald" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
			</div>
			
	</div><!--social media -->	
	
	<div class="diy-duck-ad" style="margin-top: -10px; margin-bottom:10px;">
		<a href="http://bit.ly/UndhfD">
			<img src="<?php echo get_template_directory_uri(); ?>/images/20121116_diy_duck.jpg" />
		</a>
	</div>

	<div class="gameday-ad" style="margin-bottom:10px;">
		<a href="http://bit.ly/NYQE0J">
			<img src="<?php echo get_template_directory_uri(); ?>/images/gameday-ad.png" />
		</a>
	</div>
					
	<fb:recommendations site="http://www.dailyemerald.com" app_id="197312536953017"></fb:recommendations>
	
	<div class="ad">
		<?php get_adtag_300_1(); ?>
	</div>	

	<!--<div class="email-newsletter">
		<link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;  width:300px;}
			/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
			   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
		</style>
		<div id="mc_embed_signup">
		<form action="http://dailyemerald.us2.list-manage2.com/subscribe/post?u=bc301242e4224997e2e590f38&amp;id=d1d250c9c1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<label for="mce-EMAIL">Subscribe to our email newsletter</label>
			<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
			<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
		</form>
		</div>
	</div>-->

	<div class="ad">
		<?php get_adtag_300_2(); ?>
	</div>

	<?php get_goducks_video_player(); ?>

	
<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 18,
  interval: 30000,
  width: 300,
  height: 300,
  theme: {
    shell: {
      background: '#ffffff',
      color: '#000000'
    },
    tweets: {
      background: '#ffffff',
      color: '#000000',
      links: '#004F27'
    }
  },
  features: {
    scrollbar: true,
    loop: false,
    live: true,
    behavior: 'all'
  }
}).render().setUser('dailyemerald').start();
</script>	

	
	<div class="ad">
		<?php get_adtag_300_3(); ?>
	</div>
	
	<div class="ad well well-small">
		<small>ADVERTISEMENT</small><br>
		Take an <a style="text-decoration:underline" href="http://www.straighterline.com/college-courses/college-algebra.cfm" title="online algebra course">online algebra course</a> at Straighterline.com</small>
	</div>
	
	<div class="ad">
		<?php get_adtag_300_4(); ?>
	</div>
	
</div>
