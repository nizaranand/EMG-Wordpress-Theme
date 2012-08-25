<?php 
// DoubleClick for Publishers Small Buisness Ad Tag 
function get_adtag_header() {
?>	
	<!-- get_adtag_header() -->
	<script type='text/javascript'>
	var googletag = googletag || {};
	googletag.cmd = googletag.cmd || [];
	(function() {
	var gads = document.createElement('script');
	gads.async = true;
	gads.type = 'text/javascript';
	var useSSL = 'https:' == document.location.protocol;
	gads.src = (useSSL ? 'https:' : 'http:') + 
	'//www.googletagservices.com/tag/js/gpt.js';
	var node = document.getElementsByTagName('script')[0];
	node.parentNode.insertBefore(gads, node);
	})();
	</script>
	<script type='text/javascript'>
	googletag.cmd.push(function() {
	googletag.defineSlot('/27621775/300_1', [300, 250], 'div-gpt-ad-1345851818177-0').addService(googletag.pubads());
	googletag.defineSlot('/27621775/300_2', [300, 250], 'div-gpt-ad-1345851818177-1').addService(googletag.pubads());
	googletag.defineSlot('/27621775/300_3', [300, 250], 'div-gpt-ad-1345851818177-2').addService(googletag.pubads());
	googletag.defineSlot('/27621775/300_4', [300, 250], 'div-gpt-ad-1345851818177-3').addService(googletag.pubads());
	googletag.defineSlot('/27621775/Leaderboard', [728, 90], 'div-gpt-ad-1345851818177-4').addService(googletag.pubads());
	googletag.defineSlot('/27621775/Leaderboard_footer', [728, 90], 'div-gpt-ad-1345851818177-5').addService(googletag.pubads());
	googletag.pubads().enableSingleRequest();
	googletag.enableServices();
	});
	</script>
	<!-- END get_adtag_header() -->
<?php
}

function get_adtag_300_1() { 
?>
<!-- 300_1 get_adtag_300_1()-->
<div id='div-gpt-ad-1345851818177-0' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1345851818177-0'); });
</script>
</div>
<?php
}

function get_adtag_300_2() {
?> 
<!-- 300_2 get_adtag_300_2()-->
<div id='div-gpt-ad-1345851818177-1' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1345851818177-1'); });
</script>
</div>
 <?php
}

function get_adtag_300_3() {
?>
<!-- 300_3 get_adtag_300_3()-->
<div id='div-gpt-ad-1345851818177-2' style='width:300px; height:250px;'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1345851818177-2'); });
</script>
</div>
 <?php
}

function get_adtag_300_4() {
?>
	<!-- 300_4 get_adtag_300_4()-->
	<div id='div-gpt-ad-1345851818177-3' style='width:300px; height:250px;'>
	<script type='text/javascript'>
	googletag.cmd.push(function() { googletag.display('div-gpt-ad-1345851818177-3'); });
	</script>
	</div>
<?php
}

function get_adtag_leaderboard() {
?>
	<!-- Leaderboard get_adtag_leaderboard()-->
	<div id='div-gpt-ad-1345851818177-4' style='width:728px; height:90px;'>
	<script type='text/javascript'>
	googletag.cmd.push(function() { googletag.display('div-gpt-ad-1345851818177-4'); });
	</script>
	</div>
<?php
}

function get_adtag_leaderboard_footer() {
?>
	<!-- Leaderboard_footer get_adtag_leaderboard_footer()-->
	<div id='div-gpt-ad-1345851818177-5' style='width:728px; height:90px;'>
	<script type='text/javascript'>
	googletag.cmd.push(function() { googletag.display('div-gpt-ad-1345851818177-5'); });
	</script>
	</div>
<?php
}


?>