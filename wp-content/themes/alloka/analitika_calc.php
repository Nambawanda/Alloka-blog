<?php  /* Template Name: Аналитика калькулятор */
	require('./wp-blog-header.php');
	require_once('header.php');
?>
</head>
<body>
<?php include_once('googletag.php'); ?>
<div class="b_wraper">

<?php require('feedcall.php'); ?>	

	<div class="fcontainer"></div>
	<?php require('headerblockanalit.php'); ?>
	
	<div class="b_block_analitika_calc2">
		<div class="b_band b_calc_analitika_band2">
			<br/>

			<h1 class="title_center">Тарифы<br /><!-- <span>динамический колтрекинг</span> --></h1>
			
			<script type="text/javascript">
				$(document).on('ready', function(){
          console.log('BT ready');
          console.log($('#payment_plan_types .price > p:first-child').length);
					$('#payment_plan_types .price > p:first-child').on('click', function(e){
            console.log('BT event');
						e.preventDefault();
						$(this).siblings().first().slideToggle();
						$(this).closest('.price').toggleClass('open');
						return false;
					});
					$('#payment_plan_types .price_list li').on('click', function(e){
						e.preventDefault();
						document.location = 'https://analytics.alloka.ru/upgrade';
						return false;
					});
				});
			</script>

			<ul id="payment_plan_types">
				<li id="basic">
					<h1><a href="https://analytics.alloka.ru/objects" style="text-decoration: none;">mini</a></h1>

					<div class="price">
						<p>
              <strong>1990 руб. в месяц</strong>
            </p>
					</div>
					<p>
<a href="https://analytics.alloka.ru/objects" style="width: 225px; background-color: #cb413f; border-color: #822928; box-shadow: 0 1px 0 0 #fb9b93 inset; text-shadow: -1px -1px #663c3e; border-radius: 3px; border-style: solid; border-width: 1px 0; color: #fff; cursor: pointer; display: inline-block; font-size: 18px; line-height: 1.2; margin: 10px 0; padding: 10px 14px; text-align: center; text-decoration: none;">Попробовать 7 дней бесплатно</a>
</p>

					<p>Определение рекламных источников с точностью до ключевого слова.					</p>

					<p>В тарифе выделяется персональный пул динамических номеров.</p>

					<p></p>

					<ul>
						<li>До 3000 посетителей в месяц</li>

						<li>Запись звонков</li>

						<li>Определение UTM-меток</li>

						<li>Выгрузка в Excel</li>

						<li>Интеграция с Google Analytics</li>
 						<li>Интеграция с CRM</li>
<li>Обратная связь после звонка</li>
<li>Уведомления на почту</li>
<li>Редактируемые статусы звонков</li>
					</ul>
				</li>

				<li id="pro">
					<h3>Рекомендуем!</h3>

					<h1><a href="https://analytics.alloka.ru/objects" style="text-decoration: none;">Pro</a></h1>
					
					<div class="price">
						<p>От <strong>3 960 руб.</strong> в месяц<i></i></p>

						<ul class="price_list">
							<li>Сколько у вас посещений?</li>

							<li>
								<!-- <div class="bg">Про 15к</div> -->

								<div class="left">
									<h6>до <b>15 000</b> в месяц</h6>
									<p>в среднем 500 в сутки</p>
								</div>

								<div class="right">3 960 руб.</div>
							</li>

							<li>
								<!-- <div class="bg">Про 30к</div> -->

								<div class="left">
									<h6>до <b>30 000</b> в месяц</h6>
									<p>в среднем 1 000 в сутки</p>
								</div>

								<div class="right">6 960 руб.</div>
							</li>

							<li>
								<!-- <div class="bg">Про 60к</div> -->

								<div class="left">
									<h6>до <b>60 000</b> в месяц</h6>
									<p>в среднем 2 000 в сутки</p>
								</div>

								<div class="right">12 960 руб.</div>
							</li>

							<li>
								<!-- <div class="bg">Про 100к</div> -->

								<div class="left">
									<h6>до <b>100 000</b> в месяц</h6>
									<p>в среднем 3500 в сутки</p>
								</div>

								<div class="right">24 960 руб.</div>
							</li>

							<li>
								<!-- <div class="bg">Про 200к</div> -->

								<div class="left">
									<h6>до <b>200 000</b> в месяц</h6>
									<p>в среднем 7 000 в сутки</p>
								</div>

								<div class="right">48 960 руб.</div>
							</li>

							<li>
								<!-- <div class="bg">Про 300к</div> -->

								<div class="left">
									<h6>до <b>300 000</b> в месяц</h6>
									<p>в среднем 10 000 в сутки</p>
								</div>

								<div class="right">72 960 руб.</div>
							</li>

							<li>
								<!-- <div class="bg">Про 400к</div> -->

								<div class="left">
									<h6>до <b>400 000</b> в месяц</h6>
									<p>в среднем 13 500 в сутки</p>
								</div>

								<div class="right">96 960 руб.</div>
							</li>

							<li>
								<!-- <div class="bg">Про 500к</div> -->

								<div class="left">
									<h6>до <b>500 000</b> в месяц</h6>
									<p>в среднем 17 000 в сутки</p>
								</div>

								<div class="right">119 960 руб.</div>
							</li>
						</ul>
					</div>

					<p>Определение рекламных источников с точностью до ключевого слова.</p>

					<p>В тарифе выделяется персональный пул динамических номеров.</p>

					<ul>
						<li>3000 - 15000 посетителей в месяц и более</li>
						<li>Запись звонков</li>

						<li>Определение UTM-меток</li>

						<li>Выгрузка в Excel</li>

						<li>Интеграция с Google Analytics</li>
 						<li>Интеграция с CRM</li>
<li>Обратная связь после звонка</li>
<li>Уведомления на почту</li>
<li>Редактируемые статусы звонков</li>
					</ul>
				</li>

				<li id="fixed">
					<h1><a href="https://analytics.alloka.ru/objects" style="text-decoration: none;">Fixed</a></h1>

					<div class="price">
						<p>От <strong>1 200 руб.</strong> в месяц<i></i></p>

						<ul class="price_list">
							<li>Какой вы желаете номер?</li>

							<li>
								<!-- <div class="bg">Фиксированный</div> -->

								<div class="left">
									<h6><b>Городской</b></h6>
									<p>Обычный городской номер</p>
								</div>

								<div class="right">1 200 руб.</div>
							</li>

							<li>
								<!-- <div class="bg">Фиксированный 8 800</div> -->

								<div class="left">
									<h6><b>Номер 8 800</b></h6>
									<p>Бесплатные вызовы по всей России</p>
								</div>

								<div class="right">5 960 руб.</div>
							</li>

							<li>
								<!-- <div class="bg">Фиксированный 8 800</div> -->

								<div class="left">
									<h6><b>Номер 8 804</b></h6>
									<p>Бесплатные вызовы по всей России</p>
								</div>

								<div class="right">4 360 руб.</div>
							</li>
						</ul>
					</div>

					<p>Отдельные городские номера и 8800.</p>

					<p>Вы получаете номер для самостоятельной привязки к каналам.</p>

					<ul>
						<li>Возможность отслеживания оффлайн источников клиентов</li>

						<li>Запись звонков</li>

						<li>Выгрузка в Excel</li>

						<li>Неограниченное кол-во сессий</li>
					</ul>
				</li>
			</ul>

			<?php /*
			<table class="t_analitik_calc">
				<tr>
					<td class="td_left" width="300"></td>
					<td class="td_top_all" width="300"><p class="analitik_calc_title" align="center">Basic</p></td>
					<td class="td_top_all" width="300"><p class="analitik_calc_title" align="center">PRO</p></td>
					<td class="td_top_all" width="300"><p class="analitik_calc_title" align="center">Fixed</p></td>
				</tr>

				<tr>
					<td class="td_left">
						<p><b>Посетителей сайта в месяц</b></p>
					</td>

					<td class="td_top_all">
						<p class="lfont">Трекинг неограниченного количества источников</p><br />
						 <p class="lfont">Динамическое выделение номера из общего пула</p>
					</td>

					<td class="td_top_all">
						<p class="lfont">Трекинг неограниченного количества источников</p><br />
						<p class="lfont">Динамическое выделение номера из персонального пула</p>

					</td>

					<td class="td_top_all">
						<p class="lfont">Для отслеживания офлайн источников: печатные издания, радио, каталоги</p><br />
					</td>
				</tr>

				<tr>
					<td class="td_left">
						<p><b>До 15 000</b><br />(от 1 до 500 в день)</p>
					</td>
					<th class="td_all_bot" align="center" rowspan="10">
						<br /><br /><br /><br /><br /><br />
						<p><b>$0</b></p><br/>
						<p class="lfont">Недорого, правда?</p>
					</th>
					<td class="td_top_all" align="center">
						<p><b>$59</b></p><br/>
						<p class="lfont">О преимуществах PRO читайте чуть ниже</p>
					</td>
					<td class="td_all_bot" align="center" rowspan=4>
						<br /><br /><br /><br /><br /><br />
						<b>$30</b> за канал/мес
					</td>
				</tr>

				<tr>
					<td class="td_left">
						<p><b>15K - 30K</b><br />(от 500 до 1000 в день) </p>
					</td>

					<td class="td_top_all" align="center">
						<p><b>$149</b></p>
					</td>
				</tr>

				<tr>
					<td class="td_left">
						<p><b>30K - 60K</b></p>
					</td>

					<td class="td_top_all" align="center">
						<p><b>$299</b></p>
					</td>
				</tr>

				<tr>
					<td class="td_left_bot">
						<p><b>Свыше 60K<b></p>
					</td>

					<td class="td_all_bot">
						<p class="lfont">Тариф увеличивается на $299 за каждые 50K посетителей</p>
					</td>
				</tr>
			</table>
		*/ ?>

		<p class="title3">Выбрать тариф можно после <a href="http://analytics.alloka.ru/sign_up">регистрации аккаунта</a>.</p>
		<p class="title3">Указанная стоимость тарифа за месяц фиксирована и не предусматривает никаких дополнительных платежей.</p>
		</div>
	</div>
	<div class="b_block5 b_block5a">
		<div class="b_band">
			<p class="title">Отвечаем на вопросы, которые у вас, возможно, появились:</p><br />

			<p class="title2">Чем отличаются тарифы MINI, PRO и FIXED:</p>
			<p>Основное отличие тарифа MINI от тарифа PRO - это размер посещаемости вашего сайта. На обоих тарифах вам выделяется персональный пул номеров, разница просто в количестве сессий - сколько раз в месяц номер может показаться посетителю. В MINI показ номера ограничен 3000 раз. В PRO ограничение сессий от 15000 и выше.</p><br />
<p>Тариф FIXED нужно использовать там, где необходим номер именно в виде цифр. Используя FIXED можно, например:</p>
<p>- закрепить один номер за всеми переходами с Яндекса</p>
<p>- номер для всех звонков с отдельного лендинга</p>
<p>- номер для объявления на AVITO и пр.</p>
<br /><br />

			<p class="title2">Оплатить можно:</p>
			<p>1) кредитной картой (VISA, Мастер и пр)</p><br />
			<p>2) Запросить счет для оплаты от юридического лица (запрос на имейл money@alloka.ru)</p>
		</div>
	</div>

	
	<?php require('brif-inline.php'); ?>
	
<div class="b_clear"></div>


</div> 

<!-- footer begin -->
<?php require('footer.php'); ?>



</body>
</html>
