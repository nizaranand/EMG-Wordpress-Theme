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
		
	<fb:recommendations site="http://www.dailyemerald.com" app_id="197312536953017"></fb:recommendations>

	<div class="ad">
		<?php get_adtag_300_1(); ?>
	</div>	
	<div class="ad">
		<?php get_adtag_300_2(); ?>
	</div>

	
<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 18,
  interval: 30000,
  width: 300,
  height: 600,
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
	<div class="ad">
		<?php get_adtag_300_4(); ?>
	</div>
	
</div>