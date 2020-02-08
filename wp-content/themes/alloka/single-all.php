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
</head>
<body>

<?php include_once('googletag.php'); ?>

<div class="b_wraper">
<?php require('feedcall.php'); ?>	

	<div class="fcontainer"></div>
	<?php require('headerblockcall.php'); ?>
	
	<div class="b_block2">
		<div class="b_band b_band2">
			<h1>Что у нас нового</h1>
			
			<div id="slides">
				<div class="slides_container news">
					
					<div class="slide">
						<div class="nitem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/news1.jpg" /></a>
							<a href="#">Один милион пользователей</a>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. Все 
							работы от сайтов-визиток до интернет-
							магазинов 
						</div>
						<div class="nitem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/news1.jpg" /></a>
							<a href="#">Один милион пользователей</a>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. Все 
							работы от сайтов-визиток до интернет-
							магазинов 
						</div>
						<div class="nitem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/news1.jpg" /></a>
							<a href="#">Один милион пользователей</a>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. Все 
							работы от сайтов-визиток до интернет-
							магазинов 
						</div>
					</div>
					
					<div class="slide">
						<div class="nitem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/news1.jpg" /></a>
							<a href="#">Один милион пользователей</a>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. Все 
							работы от сайтов-визиток до интернет-
							магазинов 
						</div>
						<div class="nitem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/news1.jpg" /></a>
							<a href="#">Один милион пользователей</a>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. Все 
							работы от сайтов-визиток до интернет-
							магазинов 
						</div>
						<div class="nitem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/news1.jpg" /></a>
							<a href="#">Один милион пользователей</a>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. Все 
							работы от сайтов-визиток до интернет-
							магазинов 
						</div>
					</div>
					
					<div class="slide">
						<div class="nitem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/news1.jpg" /></a>
							<a href="#">Один милион пользователей</a>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. Все 
							работы от сайтов-визиток до интернет-
							магазинов 
						</div>
						<div class="nitem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/news1.jpg" /></a>
							<a href="#">Один милион пользователей</a>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. Все 
							работы от сайтов-визиток до интернет-
							магазинов 
						</div>
						<div class="nitem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/news1.jpg" /></a>
							<a href="#">Один милион пользователей</a>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. Все 
							работы от сайтов-визиток до интернет-
							магазинов 
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="social">
		<div class="b_likes_main">
			<div>
				<?php 
				$pageURL = get_permalink ();
				echo '<iframe src="http://www.facebook.com/plugins/like.php?href='.$pageURL.'&send=false&layout=button_count&width=110&show_faces=true&action=like&colorscheme=light&font&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:140px; height:21px;" allowTransparency="true"></iframe>';
				?>
			</div>
			<div><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
													
			<div><!-- Разместите этот тег в том месте, где должна отображаться кнопка +1 -->
			<g:plusone size="medium"></g:plusone></div>
							
			<!-- Put this div tag to the place, where the Like block will be -->
			<div>
				<div id="vk_like"></div>
				<!--script type="text/javascript">
				VK.Widgets.Like("vk_like", {type: "button"});
				</script-->
			</div>
		</div>		
	</div>
	
	<div class="b_block3">
		<div class="b_band b_band3">
			<h1>Посмотрите и узнайте<br /><span>как работает сервис</span></h1>
			<div class="works">
				<div class="witem witem1">
					<div class="linearrow"></div>
					<table>
						<tr>
							<td><p class="presents present1 active_pres">Презентация Alloka. Звонки</p></td>
							<td><a href="/"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/pdf.png" /></a></td>
						</tr>
						<tr>
							<td><p class="presents present2">Презентация Alloka. Аналитика</p></td>
							<td><a href="/"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/pdf.png" /></a></td>
						</tr>
						<tr>
							<td><p class="presents present3">Презентация Alloka. О комапании</p></td>
							<td><a href="/"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/pdf.png" /></a></td>
						</tr>
					</table>
					<p style="margin: 50px 0 0;">Чтобы узнавать все наши новости первыми, <br />подпишитесь на нашу рассылку</p>
					<form class="subscrform" action="">
						<input type='text' name="subscribe" value="Введите свой email" alt="Введите свой email" onblur="if(this.value=='') this.value='Введите свой email';" onfocus="if(this.value=='Введите свой email') this.value='';" class="subscri" />
						<input type="submit" value="Подписаться" class="subscrb" />
					</form>
				</div>
				<div class="witem">
					<div class="ipad">
					<!--	<div class="video video_1">video 1</div>
						<div class="video video_2">video 2</div>
						<div class="video video_3">video 3</div> -->
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="b_block4">
	<div class="top_shad"></div>
		<div class="b_band b_band4">
			<h1>Отзывы клиентов<br /><span>о нашей работе</span></h1>
			<div id="slider2">
				<div class="slides_container replays">
					
					<div class="slide">
						<div class="ritem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/photo2.png" /></a>
							<a href="#">Один милион пользователей</a>
							<span>Менеджер по маркетингу ГК Авторента</span>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. 
						</div>
						<div class="ritem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/photo2.png" /></a>
							<a href="#">Один милион пользователей</a>
							<span>Менеджер по маркетингу ГК Авторента</span>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. 
						</div>
						<div class="ritem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/photo2.png" /></a>
							<a href="#">Один милион пользователей</a>
							<span>Менеджер по маркетингу ГК Авторента</span>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие.
						</div>
					</div>
					
					<div class="slide">
						<div class="ritem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/photo2.png" /></a>
							<a href="#">Один милион пользователей</a>
							<span>Менеджер по маркетингу ГК Авторента</span>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. 
						</div>
						<div class="ritem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/photo2.png" /></a>
							<a href="#">Один милион пользователей</a>
							<span>Менеджер по маркетингу ГК Авторента</span>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. 
						</div>
						<div class="ritem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/photo2.png" /></a>
							<a href="#">Один милион пользователей</a>
							<span>Менеджер по маркетингу ГК Авторента</span>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие.
						</div>

					</div>
					
					<div class="slide">
						<div class="ritem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/photo2.png" /></a>
							<a href="#">Один милион пользователей</a>
							<span>Менеджер по маркетингу ГК Авторента</span>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. 
						</div>
						<div class="ritem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/photo2.png" /></a>
							<a href="#">Один милион пользователей</a>
							<span>Менеджер по маркетингу ГК Авторента</span>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие. 
						</div>
						<div class="ritem">
							<a href="#"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/photo2.png" /></a>
							<a href="#">Один милион пользователей</a>
							<span>Менеджер по маркетингу ГК Авторента</span>
							Для нас дизайн и создание сайтов не просто 
							работа — это призвание и удовольствие.
						</div>

					</div>
					
				</div>
			</div>
			
		</div>
		
		<div class="shaddow"></div>
		<p class="cost openbrif">On-line бриф</p>
	</div>
	
	
	<div class="b_block5">
		<div class="b_band b_band5">
		
			<div class="counter">
				<div class="point p1"></div>
				<div class="point p2"></div>
				<div class="b_timeitem">
					<div id="b_days">
						000
					</div>
				</div>
				<div class="b_timeitem">
					<div id="b_hours">
						020
					</div >
				</div>
				<div class="b_timeitem">
					<div id="b_minutes">
						007
					</div>
				</div>
			</div>
			<script type="text/javascript">
				function trim(string){
					return string.replace(/(^\s+)|(\s+$)/g, "");
				}
				function abTimer(){
					var StartCount = trim(document.getElementById('b_hours').innerHTML) + trim(document.getElementById('b_minutes').innerHTML);
							StartCount++;
						StartCountS = StartCount +'';
						RemainsFullHours=StartCountS.substr(0,2);
						RemainsMinutes=StartCountS.substr(2,3);
						document.getElementById('b_hours').innerHTML = '0' + RemainsFullHours;
						document.getElementById('b_minutes').innerHTML = RemainsMinutes;
					setTimeout("abTimer()",3000);
					
				}
				abTimer();
			</script>
			<div class="counttext">звонков привлечено на сегодняшний день</div>
			

			<div class="call_footer">
				<ul class="select_city_foot">
					<li><p class="cityitm ph1" style="border:none;">Москва</p></li>
					<li><p class="cityitm ph2">Н.Новгород</p></li>
					<li><p class="cityitm ph3">С.-Петербург</p></li>
				</ul>
				<p class="foot_phone">
					<span style="display:block;">(499) 400-1-499</span>
					<span>(831) 230-30-35</span>
					<span>(812) 600-16-22</span>
				</p>
				<p class="fcall_bot">бесплатный звонок с сайта</p>
			</div>
	
		<div class="b_rights">
			<p>2009-2012 &copy; Alloka Media</p>
			<a href="#">контактная информация</a>
		</div>
		<a class="b_designers" href="http://sawtech.ru">Cайт создан в студии <span>&nbsp;</span></a>
		
		
		</div>
	</div>
<div class="b_clear"></div>

<!-- on-line drif -->
<div class="b_brif">
	<div class="brif_cls"></div>
	<h2>On-line бриф</h2>
	<p class="brif_info">Заполните поля формы и мы пришлем вам коммерческое предложение</p>
	<form class="b_feedcall_inputs" action="">
		<input type="text" class="brif_input" onfocus="if (this.value == 'Название компании') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Название компании'; this.style.color='#b2b2b2'}" value="Название компании"/>
		<input type="text" class="brif_input" onfocus="if (this.value == 'Адрес сайта') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Адрес сайта'; this.style.color='#b2b2b2'}" value="Адрес сайта"/>
		<input type="text" class="brif_input" onfocus="if (this.value == 'Контактное лицо') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Контактное лицо'; this.style.color='#b2b2b2'}" value="Контактное лицо"/>
		<input type="text" class="brif_input" onfocus="if (this.value == 'Телефон, email для связи') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Телефон, email для связи'; this.style.color='#b2b2b2'}" value="Телефон, email для связи"/>
		<input type="text" class="brif_input" onfocus="if (this.value == 'Придвигаемые продукты/услуги') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Придвигаемые продукты/услуги'; this.style.color='#b2b2b2'}" value="Придвигаемые продукты/услуги"/>
		<input type="text" class="brif_input" onfocus="if (this.value == 'Регионы клиентов') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Регионы клиентов'; this.style.color='#b2b2b2'}" value="Регионы клиентов"/>
		<input type="text" class="brif_input" onfocus="if (this.value == 'Примечания и пожелания') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Примечания и пожелания'; this.style.color='#b2b2b2'}" value="Примечания и пожелания"/>
		<input type="submit" class="brif_btn" value="Купить звонки" />
	</form>
</div>


</div> 
<!--wraper end-->
<?php require('footer.php'); ?>



</body>
</html>




