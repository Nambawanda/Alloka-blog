<?php /* Template Name: Аналитика Акция */
 require('./wp-blog-header.php');
 require_once('header.php');
 ?>
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/js/slides.min.jquery.js"></script>
 
 
<!-- Разместите этот тег в теге head или непосредственно перед закрывающим тегом body -->
<!--script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script-->

<!-- Put this script tag to the <head> of your page -->
<!--script type="text/javascript" src="http://userapi.com/js/api/openapi.js?34"></script>

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
</head>
<body>
<?php include_once('googletag.php'); ?>
<div class="b_wraper">
<?php require('feedcall.php'); ?>	

	<div class="fcontainer"></div>
	<?php require('headerblockanalit.php'); ?>
	
		
	
	<div class="b_block_analitik_action3">
		<h1 class="title_center">API для веб-разработчиков</span></h1>
		<div class="b_band b_analitik_action_band3">
			<p>Пользоваться системой Аллока.Аналитика можно через личный кабинет, получать данные по API или передавать через <a href="https://alloka.ru/news/vebhuki/">Вебхуки.</a></p>
	<a href="http://apidocs.alloka.ru/" class="zakaz_analitiki">Документация REST API</a>

			<p>Для кого может быть полезен API функционал Аллока.Аналитики, читайте в разделе Аллока.Платформа:</p><br />

			<p><a href="http://alloka.ru/platforma-saytam-i-katalogam/">Сайтам и каталогам</a></p>
			<p><a href="http://alloka.ru/platforma-reklamnyim-setyam/">Рекламным сетям и партнерским программам</a></p>
			<p><a href="http://alloka.ru/platforma-reklamnyim-agentstvam/">Рекламным агентствам</a></p><br /><br />
	
		</div>
	</div>
	<div class="b_clear"></div>
	<?php require('brif.php'); ?>
</div> 
<!--wraper end-->
<?php require('footer.php'); ?>
</body>
</html>




