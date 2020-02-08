<?php  /* Template Name: Калькулятор */
	require('./wp-blog-header.php');
	require_once('header.php');
?>
 
<script type="text/javascript" src="<?php echo bloginfo('template_url'); ?>/js/price-page.js"></script>
</head>
<body>
<?php include_once('googletag.php'); ?>
<div class="b_wraper">

<?php require('feedcall.php'); ?>	

	<div class="fcontainer"></div>
	<?php require('headerblockcall.php'); ?>
	
	<div class="b_block_calc2">
		<div class="b_band b_calc_band2">
			<h1>Узнайте стоимость<br /><span>целевого звонка для вашей компании</span></h1>
			<div class="calc_btn_itm">
				<img class="calc_el1" src="<?php echo bloginfo('template_url'); ?>/images/calc_el_1.jpg" alt="" />
				<input type="submit" class="calc_btn calc_btn_1" value="Быстрый старт" />
				<p>30 звонков<br />по фиксированной цене</p>
			</div>
			
			<div class="calc_btn_itm">
				<img class="calc_el2" src="<?php echo bloginfo('template_url'); ?>/images/calc_el_2.jpg" alt="" />
				<input type="submit" class="calc_btn calc_btn_2" value="Тестовый период" />
				<p>Попробуйте услугу<br />в течение 1 месяца</p>
			</div>
			
			<div class="calc_btn_itm">
				<img class="calc_el3" src="<?php echo bloginfo('template_url'); ?>/images/calc_el_3.jpg" alt="" />
				<input type="submit" class="calc_btn calc_btn_3" value="Индивидуальный" />
				<p>Выбор разных видов<br />обращений от ваших клиентов</p>
			</div>
		

		</div>
	</div>
	
	<div class="b_change_calcs">
		
		<div class="b_calc_1">
			<div class="b_band  b_calc_1_band">
				<h1>Пакет &laquo;Быстрый старт&raquo;<br /><!--<span>начни за 3 простых шага</span>--></h1>
				
				<!-- forma -->
				<form method="post" action="<?= bloginfo('template_url'); ?>/send_request.php" class="request_form f_calculate">
					<input name="request_type" type="hidden" value="calls" style="display:none;" />
				<!--		<img class="f_calculate_img" src="<?php echo bloginfo('template_url'); ?>/images/calc_timer.png" alt="" />
					<p class="c_calc_title"><b>Выберите свою отрасль и узнайте стоимость звонка</b></p>
					<p class="form_gray_txt">Данная стоимость звонка не является окончательной и может измениться в зависимости от сезона или конкуренции отрасли.</p>
					
					<fieldset class="calculator-fields call">
					
						<div class="select_main">
							<p class="selecttitle">Выберите регион</p>
							<select id="calc-region_1" name="calc_region">
								<option value="">Выберите регион</option>
								<option value='1'>Москва</option>
								<option value='2'>Любой регион России (кроме Москвы)</option>
								<option value='3'>Вся Россия</option>
								<option value='4'>Вся Россия (за исключением Москвы)</option>
								<option value='5'>Вся Украина</option>
								<option value='6'>Вся Украина и вся Россия</option>
							</select>
						</div>
						
						<div class="select_main">
							<p class="selecttitle">Выберите отрасль</p>
							<select id="calc-category_1" name="calc_category">
								<option value=''>Выберите отрасль</option>
								<option value='1'>Аварийные/экстренные службы</option>
								<option value='2'>Автоматизация/Информационные технологии/Интернет</option>
								<option value='3'>Автотранспорт</option>
								<option value='4'>Бытовые товары/услуги</option>
								<option value='5'>Доставка товаров</option>
								<option value='6'>Здоровье/Медицина/Красота</option>
								<option value='8'>Зоотовары</option>
								<option value='9'>Мебель</option>
								<option value='10'>Металлы/Топливо/Химия</option>
								<option value='11'>Недвижимость</option>
								<option value='12'>Оборудование/инструмент</option>
								<option value='13'>Образование/Работа/Карьера</option>
								<option value='15'>Организация мероприятий/услуги</option>
								<option value='16'>Офисная техника</option>
								<option value='17'>Охрана/Безопасность</option>
								<option value='18'>Предметы интерьера</option>
								<option value='19'>Реклама/Маркетинг/Полиграфия</option>
								<option value='20'>Ритуальные услуги</option>
								<option value='21'>Спорт/Отдых/Туризм</option>
								<option value='22'>Страхование</option>
								<option value='23'>Строительство/Ремонт</option>
								<option value='24'>Таможенные услуги</option>
								<option value='25'>Услуги для бизнеса</option>
								<option value='26'>Финансы/Кредит/Лизинг</option>
								<option value='27'>Хозтовары/Канцелярия/Упаковка</option>
								<option value='28'>Экология</option>
								<option value='29'>Электротехническое оборудование</option>
								<option value='30'>Юридические услуги</option>
							</select>
						</div>
						
						<div class="select_main">
							<p class="selecttitle selecttitle_dis">Выберите продукт</p>
							<select  disabled="disabled" id="calc-product_1" name="calc_product">
								<option value=''>Выберите продукт</option>
							</select>
						</div>
						
						<input style="display:none;" id="calc-price_1" name="calc_price" type="text" value='' />
						<input style="display:none;" id="calc-category-name_1" name='calc_category_name' type='text' value='' />
						<input style="display:none;" id="calc-product-name_1" name='calc_product_name' type='text' value='' />
						<input style="display:none;" id="calc-region-name_1" name='calc_region_name' type='text' value='' />
						<input style="display:none;" name='packet_name' type='text' value='Быстрый старт' />
						
						<div style="height:75px; display:none;"">
							<p class="form_txt undtext1">Важно: после первых 10 звонков цена может снизиться или увеличиться в пределах 20-30%</p>
							<p class="form_gray_txt undtext1">Если вы не нашли свою отрасль в списке, переходите к следующему шагу, и мы предложим вам индивидуальные условия сотрудничества.</p>
							<p class="price1 pricetext"></p>
						</div>
						
					</fieldset>
					-->
					<fieldset class="calc_brif">
						<p class="c_calc_title">Заполните бриф</p>
						<input name="company" class="calc_input" type="text" value="Название компании или адрес сайта" onfocus="if (this.value == 'Название компании или адрес сайта') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Название компании или адрес сайта'; this.style.color='#7f7f7f'}" />
						<input name="direction" class="calc_input" type="text" value="Продвигаемые продукты" onfocus="if (this.value == 'Продвигаемые продукты') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Продвигаемые продукты'; this.style.color='#7f7f7f'}" />
						<input name="person" class="calc_input" type="text" value="Контактное лицо (ФИО, должность)*" onfocus="if (this.value == 'Контактное лицо (ФИО, должность)*') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Контактное лицо (ФИО, должность)*'; this.style.color='#7f7f7f'}" />
						<input name="region" class="calc_input" type="text" value="Регионы клиентов" onfocus="if (this.value == 'Регионы клиентов') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Регионы клиентов'; this.style.color='#7f7f7f'}" />
						<input name="phone" class="calc_input" type="text" value="Телефон*" onfocus="if (this.value == 'Телефон*') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Телефон*'; this.style.color='#7f7f7f'}" />
						<input name="info" class="calc_input" type="text" value="Примечания" onfocus="if (this.value == 'Примечания') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Примечания'; this.style.color='#7f7f7f'}" />
						<input name="email" class="calc_input" type="text" value="Email*" onfocus="if (this.value == 'Email*') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Email*'; this.style.color='#7f7f7f'}" />
						<input name="subscribe" class="calc_check" type="checkbox" checked="checked" value="yes" />
						<span class="calc_check_text">Хочу получать новости Аллоки</span>
					</fieldset>
					<div style="height:100px;"></div>
					<input class="f_calc_btn" type="submit" value="Узнайте стоимость" />
					<br /><br /><br />
				</form>
			</div>
		</div>
		
		<div class="b_calc_2">
			<div class="b_band  b_calc_2_band">
				<h1>Пакет &laquo;Тестовый период&raquo;<br /><span>Стандартная аналитическая рекламная кампания</span></h1>
				
				<!-- forma -->
				<form method="post" action="<?= bloginfo('template_url'); ?>/send_request.php" class="request_form f_calculate">
					<input name="request_type" type="hidden" value="calls" style="display:none;" />
				<!--		<img class="f_calculate_img" src="<?php echo bloginfo('template_url'); ?>/images/calc_iphone.png" alt="" />
					<p class="c_calc_title"><b>Выберите свою отрасль и узнайте стоимость тестового периода</b></p>
					<p class="form_yell_txt">Стоимость звонка от потенциального покупателя определяется для каждого клиента индивидуально.</p>
					<fieldset class="calculator-fields test">
					
						<div class="select_main">
							<p class="selecttitle">Выберите регион</p>
							<select id='calc-region_2' name='calc_region'>
								<option value=''>Выберите регион</option>
								<option value='1'>Москва</option>
								<option value='2'>Любой регион России (кроме Москвы)</option>
								<option value='3'>Вся Россия</option>
								<option value='4'>Вся Россия (за исключением Москвы)</option>
								<option value='5'>Вся Украина</option>
								<option value='6'>Вся Украина и вся Россия</option>
							</select>
						</div>
						
						<div class="select_main">
							<p class="selecttitle">Выберите отрасль</p>
							<select id='calc-category_2' name='calc_category'>
								<option value=''>Выберите отрасль</option>
								<option value='1'>Аварийные/экстренные службы</option>
								<option value='2'>Автоматизация/Информационные технологии/Интернет</option>
								<option value='3'>Автотранспорт</option>
								<option value='4'>Бытовые товары/услуги</option>
								<option value='5'>Доставка товаров</option>
								<option value='6'>Здоровье/Медицина/Красота</option>
								<option value='8'>Зоотовары</option>
								<option value='9'>Мебель</option>
								<option value='10'>Металлы/Топливо/Химия</option>
								<option value='11'>Недвижимость</option>
								<option value='12'>Оборудование/инструмент</option>
								<option value='13'>Образование/Работа/Карьера</option>
								<option value='15'>Организация мероприятий/услуги</option>
								<option value='16'>Офисная техника</option>
								<option value='17'>Охрана/Безопасность</option>
								<option value='18'>Предметы интерьера</option>
								<option value='19'>Реклама/Маркетинг/Полиграфия</option>
								<option value='20'>Ритуальные услуги</option>
								<option value='21'>Спорт/Отдых/Туризм</option>
								<option value='22'>Страхование</option>
								<option value='23'>Строительство/Ремонт</option>
								<option value='24'>Таможенные услуги</option>
								<option value='25'>Услуги для бизнеса</option>
								<option value='26'>Финансы/Кредит/Лизинг</option>
								<option value='27'>Хозтовары/Канцелярия/Упаковка</option>
								<option value='28'>Экология</option>
								<option value='29'>Электротехническое оборудование</option>
								<option value='30'>Юридические услуги</option>
							</select>
						</div>
						
						<div class="select_main">
							<p class="selecttitle selecttitle_dis">Выберите продукт</p>
							<select disabled='disabled' id='calc-product_2' name='calc_product'>
								<option value=''>Выберите продукт</option>
							</select>
						</div>
						
						<input style="display:none;" id="calc-price_2" name="calc_price" type="text" value='' />
						<input style="display:none;" id="calc-category-name_2" name='calc_category_name' type='text' value='' />
						<input style="display:none;" id="calc-product-name_2" name='calc_product_name' type='text' value='' />
						<input style="display:none;" id="calc-region-name_2" name='calc_region_name' type='text' value='' />
						<input style="display:none;" name='packet_name' type='text' value='Тестовый период' />
						
						<div style="height:75px; display:none;"">
							<p class="form_txt undtext2">Важно: по окончании тестового периода будет определена фиксированная стоимость звонка</p>
							<p class="form_yell_txt undtext2">Если вы не нашли свою отрасль в списке, переходите к следующему шагу, и мы предложим вам индивидуальные условия сотрудничества.</p>
							<p class="price2 pricetext"></p>
						</div>
						
					</fieldset>
					-->
					<fieldset class="calc_brif">
						<p class="c_calc_title">Заполните бриф</p>
						<input name="company" class="calc_input" type="text" value="Название компании или адрес сайта" onfocus="if (this.value == 'Название компании или адрес сайта') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Название компании или адрес сайта'; this.style.color='#7f7f7f'}" />
						<input name="direction" class="calc_input" type="text" value="Продвигаемые продукты" onfocus="if (this.value == 'Продвигаемые продукты') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Продвигаемые продукты'; this.style.color='#7f7f7f'}" />
						<input name="person" class="calc_input" type="text" value="Контактное лицо (ФИО, должность)*" onfocus="if (this.value == 'Контактное лицо (ФИО, должность)*') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Контактное лицо (ФИО, должность)*'; this.style.color='#7f7f7f'}" />
						<input name="region" class="calc_input" type="text" value="Регионы клиентов" onfocus="if (this.value == 'Регионы клиентов') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Регионы клиентов'; this.style.color='#7f7f7f'}" />
						<input name="phone" class="calc_input" type="text" value="Телефон*" onfocus="if (this.value == 'Телефон*') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Телефон*'; this.style.color='#7f7f7f'}" />
						<input name="info" class="calc_input" type="text" value="Примечания" onfocus="if (this.value == 'Примечания') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Примечания'; this.style.color='#7f7f7f'}" />
						<input name="email" class="calc_input" type="text" value="Email*" onfocus="if (this.value == 'Email*') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Email*'; this.style.color='#7f7f7f'}" />
						<input name="subscribe" class="calc_check" type="checkbox" checked="checked" value="yes" />
						<span class="calc_check_text">Хочу получать новости Аллоки</span>
					</fieldset>
					<div style="height:100px;"></div>
					<input class="f_calc_btn" type="submit" value="Узнайте стоимость" />
					<br /><br /><br />
					
					
				</form>
			</div>		
		
		</div>
		
		<div class="b_calc_3">
			<div class="b_band  b_calc_3_band">
				<h1>Пакет &laquo;Индивидуальный&raquo;<br /><span>Аналитическая рекламная кампания<br />в он-лайн и оф-лайн источниках</span></h1> 
				
				<!-- forma -->
				<form method="post" action="<?= bloginfo('template_url'); ?>/send_request.php" class="request_form f_calculate">
					<input name="request_type" type="hidden" value="calls" style="display:none;" />
					<input name="packet" type="hidden" value="individual" style="display:none;" />
				<!--	<img class="f_calculate_img" src="<?php echo bloginfo('template_url'); ?>/images/calc_plan.png" alt="" />
					<p class="c_calc_title"><b>Выберите свою отрасль и узнайте стоимость звонка</b></p>
					<p class="form_gray_txt">Пакет индивидуальный – возможность выбора разных видов обращений от ваших клиентов. Не только звонки, но и заявки, анкеты, онлайн-консультант и т.д. Рассчитайте стоимость тестового периода для исследования эффективности различных видов обращений в вашу компанию, и мы предложим вам лучшие условия по привлечению новых клиентов!</p>
					
					<fieldset class="calculator-fields call">
						<p class="calc_check_text"><input name="internet_kanal" type="checkbox"  value="yes" /> Интернет</p>
						<p class="calc_check_text"><input name="mobile_kanal" type="checkbox"  value="yes" /> Мобильная реклама</p>
						<p class="calc_check_text"><input name="radio_kanal" type="checkbox" value="yes" /> Радио</p>
						<p class="calc_check_text"><input name="transport_kanal" type="checkbox"  value="yes" /> Транспорт</p>
						<input style="display:none;" name='packet_name' type='text' value='Индивидуальный' />
						<input name="your_kanal" class="calc_input" type="text" value="Предложите нестандартые каналы" onfocus="if (this.value == 'Предложите нестандартые каналы') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Предложите нестандартые каналы'; this.style.color='#7f7f7f'}" />
						<div style="height:75px; display:none;">
							<p class="form_txt undtext1"></p>
							<p class="price1 pricetext"></p>
						</div>
						
					</fieldset>
					-->
					<fieldset class="calc_brif">
						<p class="c_calc_title">Заполните бриф</p>
						<input name="company" class="calc_input" type="text" value="Название компании или адрес сайта" onfocus="if (this.value == 'Название компании или адрес сайта') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Название компании или адрес сайта'; this.style.color='#7f7f7f'}" />
						<input name="direction" class="calc_input" type="text" value="Продвигаемые продукты" onfocus="if (this.value == 'Продвигаемые продукты') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Продвигаемые продукты'; this.style.color='#7f7f7f'}" />
						<input name="person" class="calc_input" type="text" value="Контактное лицо (ФИО, должность)*" onfocus="if (this.value == 'Контактное лицо (ФИО, должность)*') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Контактное лицо (ФИО, должность)*'; this.style.color='#7f7f7f'}" />
						<input name="region" class="calc_input" type="text" value="Регионы клиентов" onfocus="if (this.value == 'Регионы клиентов') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Регионы клиентов'; this.style.color='#7f7f7f'}" />
						<input name="phone" class="calc_input" type="text" value="Телефон*" onfocus="if (this.value == 'Телефон*') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Телефон*'; this.style.color='#7f7f7f'}" />
						<input name="info" class="calc_input" type="text" value="Примечания" onfocus="if (this.value == 'Примечания') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Примечания'; this.style.color='#7f7f7f'}" />
						<input name="email" class="calc_input" type="text" value="Email*" onfocus="if (this.value == 'Email*') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Email*'; this.style.color='#7f7f7f'}" />
						<input name="subscribe" class="calc_check" type="checkbox" checked="checked" value="yes" />
						<span class="calc_check_text">Хочу получать новости Аллоки</span>
					</fieldset>
					
					<div style="height:100px;"></div>
					<input class="f_calc_btn" type="submit" value="Узнайте стоимость" />
					<br /><br /><br />
				</form>
			</div>
		</div>
	
	</div>
	
	<?php require('brif-inline.php'); ?>
	
<div class="b_clear"></div>

<?php require('brif.php'); ?>
</div> 

<!--wraper end-->
<?php require('footer.php'); ?>



</body>
</html>