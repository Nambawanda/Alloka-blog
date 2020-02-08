<?php  /* Template Name: Звонки howitwork */
 require('./wp-blog-header.php');
 require_once('header.php');
 ?>

</head>
<body>
<?php include_once('googletag.php'); ?>
<div class="b_wraper">

<?php require('feedcall.php'); ?>	

	<div class="fcontainer"></div>
	<?php require('headerblockcall.php'); ?>
	
<div class="b_block_call2">
		<div class="b_band b_call_band2">
			<h1 class="title_center">Кому будет полезна<br /><span>услуга Аллока.Звонки?</span></h1>
			<div class="b_line">
				<div class="b_whom">
					<h2 class="callh2">Аlloka подходит компаниям со сформированным спросом на продукты или услуги</h2>
					<p>(продажа автомобилей и сервис, покупка/продажа недвижимости,	медицинские центры<br />
					и фитнес-клубы и т.д.). Аллока не создает спрос и не работает на имидж.<br />
					Это исключительно «продающий» канал.</p>
				</div>
				<img class="fright" src="<?php echo bloginfo('template_url'); ?>/images/boxes.jpg" alt="" />
			</div>
			<div class="b_line">
				<div class="b_whom">
					<h2 class="callh2">Компаниям, в которые сначала звонят, прежде чем<br />купить/получить услугу </h2>
					<p>(любая аренда – недвижимости, музыкального оборудования или<br />
					автомобилей, оптовые закупки, металлопрокат и т.д.)</p>
				</div>
				<img class="fright" src="<?php echo bloginfo('template_url'); ?>/images/phone.jpg" alt="" />
			</div>
		</div>
	</div>
	
	<div class="b_block_call3">
		<div class="b_band b_call_band3">
			<h1 class="title_center">Что получают клиенты<br /><span>услуги Аллока.Звонки?</span></h1>
			<div class="call_check">
				<p class="calls_check_itm">целевые звонки от потенциальных клиентов</p>
				<p class="calls_check_itm">прозрачную статистику</p>
				<p class="calls_check_itm">возможность планировать рекламный бюджет с точностью до рубля</p>
			</div>
			<div class="call_check" style="float:right;">
				<p class="calls_check_itm">возможность корректировки бюджета по ходу работы</p>
				<p class="calls_check_itm">детализированную отчетность</p>
				<p class="calls_check_itm">своевременный документооборот</p>
			</div>
			</div>

	</div>
	
	<div class="b_block_call6">
		<div class="call6_grafik_bg"></div>
		<div class="b_band b_call_band6">
			
			<p class="call6_title">Клиенты звонят вам! А вы?</p>
			
			<div class="call6_grafik">
				<p class="call6_check">принимаете звонки</p>
				<p class="call6_check">считаете звонки</p>
				<p class="call6_check">слушаете запись разговоров</p>
				<p class="call6_check">проверяете разговоры<br />ваших продавцов</p>
				<p class="call6_check">оцениваете результат</p>
			</div>
		</div>
	</div>
	
	<div class="b_block_call7">
		<div class="call7_line"></div>
		<div class="b_band b_call_band7">
			<h1 class="title_center">Технология<br /><span>услуги Аллока.Звонки</span></h1>
			<div class="call7_tech">
				<p class="call7_tech_1">Клиент</p>
				<p class="call7_tech_3">Звонки</p>
				<p class="call7_tech_4">Вы</p>
			</div>
			
		</div>
		<div class="shaddow"></div>
	</div>
	
	<div class="b_block_call8">
		<div class="b_band b_call_band8">
			<h1 class="title_center">Преимущества<br /><span>услуги Аллока.Звонки</span></h1>
			
			<p class="call8_best">финансовые гарантии</p>
			<p class="call8_best">отсутствие рисков</p>
			<p class="call8_best">четкое планирование рекламного бюджета</p>
			<p class="call8_best">контроль за исполнением в режиме он-лайн</p>
			<p class="call8_best">прозрачная статистика для оценки эффективности</p>
			
			
			<p class="call8_bot">Мы не бьем из пушки по воробьям.<br /><b>Наша задача – не максимальный охват, а качественный клиент,</b><br />заинтересованный в покупке ваших услуг.</p>
			<p style="text-align:center;"><a href="/otzyivyi/" style="margin:40px 0 20px 0; display:block; font-size:22px;"><b>Узнать что о нас говорят наши клиенты</b></a></p>
			
			<p style="text-align:center; margin:40px 0 0 0;">Узнайте стоимость целевого звонка для вашей компании</p>
			<a href="/kalkulyator/" class="zakaz_analitiki greenbtn">Узнать</a>	
		</div>
	</div>
	
	
	
	
<div class="b_clear"></div>

<?php require('brif.php'); ?>
</div> 

<!--wraper end-->
<?php require('footer.php'); ?>



</body>
</html>