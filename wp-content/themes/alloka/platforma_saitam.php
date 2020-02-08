<?php 
/* Template Name: Платформа - сайтам */
 require('./wp-blog-header.php');
 require_once('header.php');
 ?>
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/js/slides.min.jquery.js"></script>

</head>
<body>

<?php include_once('googletag.php'); ?>

<div class="b_wraper">
<?php require('feedcall.php'); ?>	

	<div class="fcontainer"></div>
	<?php require('headerblockplatform.php'); ?>
	
	<div class="b_platf_sites">
		<h1 class="title_center">Сайтам и каталогам<br /><span>использование платформы Аллока позволит:</span></h1>
		<div class="b_platf_sites_itm">
			<img class="b_platf_sites_img_right" src="<?php echo bloginfo('template_url'); ?>/images/platf_katalog_1.png" alt="" />
			<p class="b_platf_sites_itm_title">Предоставлять статистику клиентам</p>
			<p>по количеству звонков от потенциальных потребителей товаров или услуг, благодаря размещению в данном издании/каталоге. Платформу Аллока можно использовать как в базовом облачном интерфейсе сервиса, так и подключить к собственному клиентскому кабинету по API.</p>
		</div>
		
		<div class="b_platf_sites_itm">
			<img class="b_platf_sites_mg_left" src="<?php echo bloginfo('template_url'); ?>/images/platf_katalog_2.png" alt="" />
			<p class="b_platf_sites_itm_title">Ввести тарифы, привязанные к эффективности</p>
			<p>Например “Размещение в каталоге бесплатно, но вы должны оплачивать поступающие звонки от клиентов”, продавать пакеты звонков и пр. Переход на perfomance based тарифы - это международный тренд на рынке classified и геолокационных медиа.</p>
		</div>
		
		<div class="b_platf_sites_itm">
			<img class="b_platf_sites_img_right" src="<?php echo bloginfo('template_url'); ?>/images/platf_katalog_3.png" alt="" />
			<p class="b_platf_sites_itm_title">Использовать статистику для внутренних целей</p>
			<p>Понимание реальной конверсии для оптимизации и продвижения размещений. Работа над интерфейсом и дизайном страниц и отдельных блоков с целью повышения количества обращений. </p>
		</div>
	</div>
	
	
	<div class="b_clear"></div>
	<?php require('brif.php'); ?>
</div> 
<!--wraper end-->
<?php require('footer.php'); ?>
</body>
</html>