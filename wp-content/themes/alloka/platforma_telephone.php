<?php 
/* Template Name: Платформа - телефонам */
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
	
	<div class="b_platf_teleph">
		<h1 class="title_center">Провайдерам телефонии</h1>
		<img class="b_platf_teleph_img" src="<?php echo bloginfo('template_url'); ?>/images/platf_phones.png" alt="" />
		<div class="b_platf_teleph_itm1">
			<p class="b_platf_teleph_title">Виртуальные номера</p>
			<p>В платформе трекинга Аллока используется большое количество виртуальных номеров для сбора и предоставления статистики пользователям. Мы сотрудничаем с рядом провайдеров и являемся для них дополнительным каналом реализации. Мы готовы рассмотреть возможность партнерства и с новыми провайдерам.</p>
			<br />
			<p>Условия которые нам необходимы:<br />
			- Городские номера (любые регионы)<br />
			- Переадресация на SIP<br />
			- Тестовый период<br />
			- Кредитная форма оплаты</p>
		</div>
		
		<div class="b_platf_teleph_itm2">
			<p class="b_platf_teleph_title">Исходящий голосовой трафик</p>
			<p>Мы также готовы покупать голосовой трафик у провайдеров VOIP телефонии. Рассмотрим ваши предложения.</p>
		</div>
	</div>
	
	<div class="b_clear"></div>
	<?php require('brif.php'); ?>
</div> 
<!--wraper end-->
<?php require('footer.php'); ?>
</body>
</html>