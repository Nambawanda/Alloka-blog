<?php 
/* Template Name: Платформа - рекламным сетям */
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
	
	<div class="b_platf_seti">
		<h1 class="title_center">Рекламным сетям<br /><span>и партнерским программам</span></h1>
		<p class="p_atform_head">Для партнерских программ, агрегаторов партнерских программ, особенно для тех, которые работают по модели CPA, платформа Аллока предоставляет ряд возможностей при интеграции</p>
		
		<div class="b_platf_seti_itm">
			<img class="b_platf_seti_img_right" src="<?php echo bloginfo('template_url'); ?>/images/platf_seti_1.png" alt="" />
			<p class="b_platf_seti_itm_title">Выход на новые клиентские рынки</p>
			<p>за счет продажи лидов в виде звонка. Количество традиционных форм бизнеса, где в цепочке продаж есть обязательный телефонный звонок составляет больше 50% от общего количества предприятий в экономике. Это оптовая торговля, торговля автомобилями, услуги B2B, медицина и многие другие. Добавить вариант “Купить звонок” в предложение для клиентов безусловно увеличит спрос на услуги.</p>
		</div>
		
		<div class="b_platf_seti_itm">
			<img class="b_platf_seti_img_left" src="<?php echo bloginfo('template_url'); ?>/images/platf_seti_2.png" alt="" />
			<p class="b_platf_seti_itm_title">Дополнительная монетизация текущих программ</p>
			<p>Для уже текущих клиентов вы сможете добавить опцию “также получать звонки”. И наряду с заявками или другими формами действия сможете увеличить средний чек.</p>
		</div>
		
		<div class="b_platf_seti_itm">
			<img class="b_platf_seti_img_right" src="<?php echo bloginfo('template_url'); ?>/images/platf_seti_3.png" alt="" />
			<p class="b_platf_seti_itm_title">Увеличение дохода партнеров/аффилиатов</p>
			<p>Партнеры смогут поставлять лиды в виде звонка в дополнение к заявкам, чем увеличат себе доход, поскольку конверсия с целевго траффика, при наличии возможности сделать звонок с лендинга гарантированно повысится.</p>
		</div>
	</div>
	
	<div class="b_clear"></div>
	<?php require('brif.php'); ?>
</div> 
<!--wraper end-->
<?php require('footer.php'); ?>
</body>
</html>