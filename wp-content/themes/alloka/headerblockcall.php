<?php if (is_front_page() ) : ?>
<div class="b_block1">
<?php else: ?>
<div class="b_block1_in">
<?php endif; ?>
	<div class="b_block1l">
	<div class="b_block1r">
		<div id="top" class="b_band b_band1">
			<?php if (is_front_page() ) : ?>
				<a href="/"class="shaddow"></a>
				<a href="#top" class="cost_top openbrif_top">Отправить заявку</a>
				<a href="/analitika-kalkulyator/" class="analys">Подобрать тариф</a>
			<?php endif; ?>
			<div class="header1">
				<a href="/" class="logo"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/logo.png" /></a>
				<ul class="b_toplink">
					<li><a href="http://analytics.alloka.ru">Вход в личный кабинет</a></li>
					<li><a href="http://analytics.alloka.ru/sign_up">Зарегистрировать аккаунт</a></li>
				</ul>
				<p class="tphone">
					<span style="display:block;">(499) 400-24-91</span>
				</p>
				<p class="fcall">Заказать обратный звонок</p>
				<a href="http://zingaya.com/widget/2e695efe069aac39d2d010ce88f76f99" class="sitecall" target="_blank">Позвонить с сайта</a>
			
			
			<?php if (is_front_page() ) : ?>
				<ul class="b_menu">
			<?php else: ?>
				<ul class="b_menu b_menu_in">
			<?php endif; ?>
					<li><a href="/o-kompanii/">О компании</a></li>
					<li><a href="/o-platforme/">Колтрекинг</a></li>
					<li><a href="/otzyivyi/">Отзывы клиентов</a></li>
					<li><a href="/blog/">Блог</a></li>
				</ul>	
			</div>
			
			
			
			<?php if (is_front_page() ) : ?>
			<div class="content1">
				
				<div class="h_title_front hanalit">
					<h1>Аллока Аналитика</h1>
					<h3>счетчик звонков для вашего сайта</h3>
				</div>
				
				<div class="h_title_front hplatform">
					<h1>Аллока Платформа</h1>
					<h3>колтрекинг для веб-издателей и партнерских программ</h3>
				</div>
				
				<div class="p_head_info infanalit"><?=$mytheme['headtextan']?></div>
				<div class="p_head_info infplatf"><?=$mytheme['headtextplatf']?></div>
				
				<p class="icons ianalitics"><span>Alloka аналитика</span></p>
				<p class="icons iplatform"><span class="icons_nonact">Alloka платформа</span></p>
				
				<div class="eleohant_line"></div>
				<img alt="" class="slon slon_analitycs" src="<?php echo bloginfo('template_url'); ?>/images/slon_analitycs.png" />
				<img alt="" class="slon slon_calls" src="<?php echo bloginfo('template_url'); ?>/images/slon_calls.png" />
				
					
			<?php else: ?>
			<div class="content1 content1_in">
				<p class="icons ianalitics_in"><span class="icons_nonact">Alloka аналитика</span></p>
				<p class="icons platf_in"><span>Alloka платформа</span></p>
				<div class="eleohant_line_in"></div>
			<?php endif; ?>
				
				<div class="servicelinks">
					<div class="servicelinks_main">
						
						<div class="slitem">
							<a href="/analitika-kak-eto-rabotaet/"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/icon_rd_how.png" /></a>
							<a href="/analitika-kak-eto-rabotaet/">Как это работает</a>
							О технологии учета звонков
						</div>
						<div class="slitem">
							<a href="/analitika-kalkulyator/"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/icon_rd_calc.png" /></a>
							<a href="/analitika-kalkulyator/">Тарифы</a>
							Стоимость счетчика звонков
						</div>
						<div class="slitem">
							<a href="/voprosyi-analitiki/"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/icon_rd_help.png" /></a>
							<a href="/voprosyi-analitiki/">Зачем мне Аналитика?</a>
							10 популярных вопросов об услуге
						</div>
						<div class="slitem">
							<a href="/api/ "><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/icon_rd_action.png" /></a>
							<a href="/api/ ">API</a>
							Для веб-разработчиков
						</div>
						
						<div class="slitem">
							<a href="/platforma-saytam-i-katalogam/"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/platf_top_1.png" /></a>
							<a href="/platforma-saytam-i-katalogam/">Сайтам и каталогам</a>
							Что даст вашему сайту Аллока Платформа?
						</div>
						<div class="slitem">
							<a href="/platforma-reklamnyim-setyam/"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/platf_top_2.png" /></a>
							<a href="/platforma-reklamnyim-setyam/">Рекламным сетям и партнерским программам</a>
						</div>
						<div class="slitem">
							<a href="/platforma-reklamnyim-agentstvam/"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/platf_top_3.png" /></a>
							<a href="/platforma-reklamnyim-agentstvam/">Рекламным агентствам и аналитическим сервисам</a>
						</div>
						<div class="slitem">
							<a href="/platforma-provayderam-telefonii/"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/platf_top_4.png" /></a>
							<a href="/platforma-provayderam-telefonii/">Провайдерам телефонии</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
	<?php if (!is_front_page() ) : ?>
	<script type="text/javascript">ianalit_in()</script>
	<?php else: ?>
	<script type="text/javascript">act_ianalit()</script>
	<?php endif; ?>