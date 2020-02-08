<?php /* Template Name:Главная */
 require('./wp-blog-header.php');
 require_once('header.php');
 ?>

<script type="text/javascript">
		$(function(){
			$('#slides').slides({
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
					
					<?php  
						$postcount=1; 
						query_posts(array('cat'=>46,'showposts'=>9));
						set_post_thumbnail_size( 265, 125, true);
						if(have_posts()) : while(have_posts()) : the_post(); 
							if ($postcount==1) echo '<div class="slide">'; 
					?>
						<?php /* если есть миниатюра */
							if ( has_post_thumbnail() ) : ?>
								<div class="nitem">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(264,151), array('title' => '')); ?></a>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>
							<?php else : ?>
									<div class="nitem">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									<?php echo content(30); ?>
								</div>

							<?php endif; ?>
					<?php 
						if ($postcount==3) {echo '</div>'; $postcount=0;} $postcount++; 
	
						endwhile; 
						endif; 
						wp_reset_query(); 
						if ( $postcount != 1 ) { echo '</div>'; };
					?>
					
			
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="social">
		<div class="b_likes_main">
			<div class="fb">
				<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FAlloka%2F371926311480&amp;send=false&amp;layout=standard&amp;width=520&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=80&amp;appId=189317581152655" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:520px; height:80px;" allowTransparency="true"></iframe>
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
							<td><p class="presents present1">Презентация Alloka. Аналитика</p></td>
							<td><a href="https://alloka.ru/wp-content/uploads/2015/08/alloka_emotions_russkiy.pdf"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/pdf.png" /></a></td>
						</tr>
						<tr>
							<td><a href="/analitika-kak-eto-rabotaet/" class="presents present2 present3">Как это работает?</a></td>
							<td></td>
						</tr>
						<!--<tr>
							<td><p class="presents present2">Презентация Alloka. О компании</p></td>
							<td><a href="/wp-content/uploads/2012/04/Alloka.pdf"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/pdf.png" /></a></td>
						</tr>-->
					</table>
					<p style="margin: 50px 0 0;">Чтобы узнавать все наши новости первыми, <br />подпишитесь на нашу рассылку. Введите email</p>
					<ul class="mchimp">
						<div><?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('mailchimp') ) :?><?php endif; ?></div>
					</ul>
				</div>
				<div class="witem">
					<div class="ipad">
						<div class="video video_1"><iframe width="352" height="210" src="https://www.youtube.com/embed/mk4Awu-848A" frameborder="0" allowfullscreen></iframe></div>
						<!-- <div class="video video_2"></div> -->
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
					<?php  
						$postcount=1; 
						query_posts(array('cat'=>45,'showposts'=>9));
						set_post_thumbnail_size( 265, 125, true);
						if(have_posts()) : while(have_posts()) : the_post(); 
							if ($postcount==1) echo '<div class="slide">'; 
					?>
					    <div class="ritem">
							<a href="/otzyivyi/"><?php the_post_thumbnail('', array('title' => '')); ?></a>
							<a href="/otzyivyi/"><?php the_title(); ?></a>
							<span><?php the_field('dolznost'); ?></span>
							<?php echo content(9); ?>	
						</div>
					<?php 
						if ($postcount==3) {echo '</div>'; $postcount=1;} $postcount++; 
	
						endwhile;
						else : 
					?>	
					<div>
						К сожалению, по вашему запросу ничего не найдено.
					</div>
					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
		</div>
	
		
		<div class="shaddow"></div>
		<p class="cost openbrif">Попробовать</p>
	</div>
	
	
	<div class="b_block5">
		<div class="b_band b_band5">
		
			<div class="counter">
				<div class="point p1"></div>
				<div class="point p2"></div>

				<div class="b_timeitem">
					<span class="shadows">
						<s>&nbsp;</s>
						<s>&nbsp;</s>
						<s>&nbsp;</s>
					</span>

					<span class="shadows">
						<u>&nbsp;</u>
						<u>&nbsp;</u>
						<u>&nbsp;</u>
					</span>

					<div id="b_calls_millions">000</div>
				</div>

				<div class="b_timeitem">
					<span class="shadows">
						<s>&nbsp;</s>
						<s>&nbsp;</s>
						<s>&nbsp;</s>
					</span>

					<span class="shadows">
						<u>&nbsp;</u>
						<u>&nbsp;</u>
						<u>&nbsp;</u>
					</span>

					<div id="b_calls_thousands">207</div>
				</div>

				<div class="b_timeitem">
					<span class="shadows">
						<s>&nbsp;</s>
						<s>&nbsp;</s>
						<s>&nbsp;</s>
					</span>

					<span class="shadows">
						<u>&nbsp;</u>
						<u>&nbsp;</u>
						<u>&nbsp;</u>
					</span>

					<div id="b_calls_ones">500</div>
				</div>
			</div>

			<script type="text/javascript">
				function trim(string){
					return string.replace(/(^\s+)|(\s+$)/g, "");
				}
				function abTimer(){
					$.getJSON("https://analytics.alloka.ru/api/calls/total_count.json",  function(data){
						if (data && data.total)
						{
							var count = data.total.toString(), zeros = 9 - count.length;

							for (var i = 0; i < zeros; i++)
								count = "0" + count;

							document.getElementById('b_calls_ones').innerHTML = count.slice(-3);
							document.getElementById('b_calls_thousands').innerHTML = count.slice(3, -3);
							document.getElementById('b_calls_millions').innerHTML = count.slice(0, -6);
						}
					});
					setTimeout("abTimer()",10000);
				}
				abTimer();
			</script>
			<div class="counttext">звонков посчитано на сегодняшний день</div>
			

			<div class="call_footer">
				<p class="foot_phone">
					<span style="display:block;">(499) 400-24-91</span>
				</p>
				<a href="//zingaya.com/widget/2e695efe069aac39d2d010ce88f76f99" class="fcall_bot" target="_blank">бесплатный звонок с сайта</a>
			</div>
	
		<div class="b_rights">
			<p>2009-<?php echo date("Y"); ?> &copy; Alloka Media</p>
			<?php/*<a href="http://alloka.ru/kontaktnaya-informatsiya/">контактная информация</a>*/?>
		</div>
		<a class="b_designers" href="http://sawtech.ru">Cайт создан в студии <span>&nbsp;</span></a>
		
		
		</div>
	</div>
<div class="b_clear"></div>



<?php require('brif.php'); ?>
</div> 
<!--wraper end-->
<?php require('footer.php'); ?>

</body>
</html>




