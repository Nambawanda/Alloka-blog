<?php
 require('./wp-blog-header.php');
 require_once('header.php');
 ?>
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/js/slides.min.jquery.js"></script>
 
 
<!-- Разместите этот тег в теге head или непосредственно перед закрывающим тегом body ->
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

<!-- Put this script tag to the <head> of your page ->
<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?34"></script>

<script type="text/javascript">
  VK.init({apiId: 2688747, onlyWidgets: true});
</script-->
<script type="text/javascript">
		$(function(){
			$('#slides').slides({
				play: 5000, 
				pause: 1000,
				preload: true,
				hoverPause: true 
				//generateNextPrev: true
			});
		});
		$(function(){
			$('#slider2').slides({
				play: 5000, 
				pause: 1000,
				preload: true,
				hoverPause: true 
				//generateNextPrev: true
			});
		});
</script>

<!-- <script type="text/javascript"><\!-- -->
<!-- document.write(unescape("%3Cscript id='pap_x2s6df8d' src='" + (("https:" == document.location.protocol) ? "https://" : "http://") + -->
<!-- "tornado.postaffiliatepro.com/scripts/trackjs.js' type='text/javascript'%3E%3C/script%3E"));//-\-> -->
<!-- </script> -->
<script type="text/javascript"><!--
PostAffTracker.setAccountId('704d03f8');
try {
PostAffTracker.track();
} catch (err) { }
//-->
</script>

</head>
<body>

<?php include_once('googletag.php'); ?>

<div class="b_wraper">
<?php require('feedcall.php'); ?>	

	<div class="fcontainer"></div>
	<?php require('headerblockcall.php'); ?>
	
	<div class="b_block_tnx">
		<div class="b_band b_tnx_band">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<div><?php the_content(); ?></div>
			<?php endwhile; else : ?>
				<div>К сожалению, по вашему запросу ничего не найдено.</div>
			<?php endif; ?>
		</div>
	</div>
	
	</div>
<div class="b_clear"></div>

</div> 
<!--wraper end-->
<?php require('footer.php'); ?>



</body>
</html>




