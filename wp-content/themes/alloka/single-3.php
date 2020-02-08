<?php  /* Template Name: Блог */
 require('./wp-blog-header.php');
 require_once('header.php');
 ?>
<script src="<?php echo bloginfo('template_url'); ?>/js/blog.js"></script>
</head>
<body>

<?php include_once('googletag.php'); ?>

<div class="b_wraper">
<div class="blog_topbg"></div>

<?php require('feedcall.php'); ?>	

	<div class="fcontainer"></div>
	<div class="b_block1_blog">
	
		<div class="b_band b_band1">
			<div class="header1">
				<a href="/" class="logo"><img alt="" src="<?php echo bloginfo('template_url'); ?>/images/logo_blog.png" /></a>
				<ul class="b_toplink_blog">
					<li><a href="/">Вход в личный кабинет</a></li>
				</ul>
				<ul class="select_city_blog">
					<li><p class="regselect_blog ph1" style="border:none;">Москва</p></li>
					<li><p class="regselect_blog ph2">Н.Новгород</p></li>
					<li><p class="regselect_blog ph3">С.-Петербург</p></li>
				</ul>
				<p class="tphone_blog">
					<span style="display:block;">(499) 400-24-91</span>
					<span>(831) 230-30-35</span>
					<span>(812) 600-16-22</span>
				</p>
				<p class="fcall fcall_blogs">Заказать обратный звонок</p>
				<p class="regakk"><a href="http://analytics.alloka.ru/sign_up">Зарегистрировать аккаунт</a></p>
			
			
				<ul class="b_menu b_menu_blog">
					<li><a href="/o-kompanii/">О компании</a></li>
					<li><a href="/otzyivyi/">Отзывы клиентов</a></li>
					<li><a href="/blog/">Блог</a></li>
				</ul>	
			</div>
			
			
			
			<div class="content1 content1_in">
				<a href="/analitika-kak-eto-rabotaet/" class="icons ianalitics_blog "><span>Alloka аналитика</span></a>
				<a href="/o-platforme/" class="icons iplatf_blog"><span>Alloka платформа</span></a>
			</div>
		</div>
	</div>
	
	<div class="b_block_blog2">
		<div class="b_band b_blog_band2">
			<h1 class="title_center">Здесь собраны все мысли<br /><span>компании Alloka</span></h1>
			
			<div class="b_blog_top">
			
			<div class="b_blog_top_right singleright">
					<div class="blog_cats">
						<div class="blog_cats_top"></div>
						<!--<div class="blog_cats_main">
							<p class="blog_cats_title"><b>Мы пишем на темы:</b></p>
							<?php wp_tag_cloud('smallest=8&largest=20&number=35'); ?>
							
						</div>-->
						<div class="blog_cats_bot"></div>
					</div>
					
					<!-- search form -->
					<?php require ('search_form.php'); ?>
					
				</div>
				
			
				<div class="b_blog_top_left singleart">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<h1><?php the_title(); ?></h2><br />
					<?php the_content(); ?>
					<div class="sa_tags top_border"><b>Теги:</b> <?php the_tags(''); ?></div>
					<div class="sa_tags"><b>Похожие статьи:</b><br /><?php digatalart_tag_rel_post(); ?></div>
					
					<div class="b_likes">
					<p class="like_title">Понравилась статья? Поделись ссылочкой с друзьями:</p>
						<div class="b_likes_in">
								
								<div>
								<?php 
								$pageURL = get_permalink ();
								echo '<iframe src="//www.facebook.com/plugins/like.php?href='.$pageURL.'&send=false&layout=button_count&width=110&show_faces=true&action=like&colorscheme=light&font&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:140px; height:21px;" allowTransparency="true"></iframe>';
								?>
								</div>
								<div><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script></div>
															
								<div><!-- Разместите этот тег в том месте, где должна отображаться кнопка +1 -->
								<g:plusone size="medium"></g:plusone></div>
									
								<!-- Put this div tag to the place, where the Like block will be -->
								<div>
									<div id="vk_like"></div>
									<script type="text/javascript">
									VK.Widgets.Like("vk_like", {type: "button"});
									</script>
								</div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php else : ?>	
					<div>
						К сожалению, по вашему запросу ничего не найдено.
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	

<div class="b_clear"></div>

</div> 

<!--wraper end-->
<?php require('footer.php'); ?>

</body>
</html>