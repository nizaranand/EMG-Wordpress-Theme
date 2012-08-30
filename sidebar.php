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
	
	<fb:activity site="http://www.dailyemerald.com" app_id="197312536953017"></fb:activity>

	<blockquote>
	  <p></p>
	</blockquote>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside class="widget span4">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #secondary .widget-area -->		
	<?php endif; ?>
	
	<div class="ad">
		<?php get_adtag_300_1(); ?>
	</div>
	
	<blockquote>
	  <p></p>
	</blockquote>
		
	<div class="ad">
		<?php get_adtag_300_2(); ?>
	</div>

	
<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 5,
  interval: 30000,
  width: 250,
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
    scrollbar: false,
    loop: false,
    live: true,
    behavior: 'all'
  }
}).render().setUser('dailyemerald').start();
</script>	

	
	<div class="ad">
		<?php get_adtag_300_3(); ?>
	</div>
	
	<div class="well">
		
	</div>
	
	<div class="ad">
		<?php get_adtag_300_4(); ?>
	</div>
	
</div>