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
			<div class="clear"></div>

	</div><!--social media -->	

	<div class="ad">
		<?php //get_adtag_300_1(); ?>	
		<a href="http://bit.ly/XxRSXJ">
					<img src="<?php bloginfo('template_directory'); ?>/images/1304-pg-sidebar.jpg"></img>
				</a>
	</div>

	

	<div class="what-are-we-missing" style="margin-bottom:20px;">
		<iframe src="http://dailyemerald.github.com/wawm/" frameborder="0" width="300" height="100"></iframe>
	</div>

	<div id="fb-recommendations" style="margin-top:0;">				
		<fb:recommendations site="http://www.dailyemerald.com" app_id="197312536953017" width="300" height="300" header="false"></fb:recommendations>
	</div>
	
	<div class="ad">
		<?php get_adtag_300_2(); ?>
	</div>

	<?php get_goducks_video_player(); ?>

	<div style="width:300px">
		<a class="twitter-timeline" href="https://twitter.com/DailyEmerald" data-widget-id="324587622238396416">Tweets by @DailyEmerald</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>

	<div class="ad">
		<?php get_adtag_300_3(); ?>
	</div>
		
	<div class="ad">
		<?php get_adtag_300_4(); ?>
	</div>
	
</div>
