<?php  /* Template Name: Блог */
 require('./wp-blog-header.php');
 require_once('header.php');
 ?>

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
					<li><a href="/o-platforme/">О платформе</a></li>
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
			
				<div class="b_blog_top_right">
					<div class="blog_cats">
						<div class="blog_cats_top"></div>
						<div class="blog_cats_main">
							<p class="blog_cats_title"><b>Мы пишем на темы:</b></p>
							<?php wp_tag_cloud('smallest=8&largest=20&number=35'); ?>
							
						</div>
						<div class="blog_cats_bot"></div>
					</div>
					
					<!-- search form -->
					<?php require ('search_form.php'); ?>
					
				</div>
				
			
				<div class="b_blog_top_left">
					<?php set_post_thumbnail_size( 265, 125 ); ?> <!--размер миниатюры -->
					<?php $postcount=1; if(have_posts()) : while(have_posts()) : the_post(); ?>
					<?php if ($postcount==1) : $postcount++;?>
					<div class="news_itm_long_cont">
						<div class="news_itm_long">
							<?php /* если есть миниатюра */
							if ( has_post_thumbnail() ) : ?>
								<div class="news_long_img">
									<div class="news_img"><?php the_post_thumbnail(); ?>
									<br />
									<p><a href="<?php the_permalink(); ?>" class="news_title"><?php the_title(); ?></a></p>
									</div>
									
									<p class="news_date"><?php the_time('d.m.Y'); ?></p>
								</div>
								<div class="news_prev">
									<?php echo content(60); ?>
									<br /><?php edit_post_link('редактировать', '', ''); ?>
								</div>
							<?php else : ?>
									<p><a href="<?php the_permalink(); ?>" class="news_title"><?php the_title(); ?></a></p>
									<p class="news_date"><?php the_time('d.m.Y'); ?></p>
									<div class="news_prev">
										<?php echo content(35); ?>
										<br /><?php edit_post_link('редактировать', '', ''); ?>
									</div>

							<?php endif; ?>
						</div>
					</div>
					<?php else: $postcount++;?>
					<div class="news_itm_cont">
						<?php /* если есть миниатюра */
							if ( has_post_thumbnail() ) : ?>
								<div class="top_news_itm">
									<div class="news_img"><?php the_post_thumbnail(); ?></div>
									<p><a href="<?php the_permalink(); ?>" class="news_title"><?php the_title(); ?></a></p>
									<p class="news_date"><?php the_time('d.m.Y'); ?></p>
								</div>
							<?php else : ?>
								<div class="top_news_itm">
									<p><a href="<?php the_permalink(); ?>" class="news_title"><?php the_title(); ?></a></p>
									<p class="news_date"><?php the_time('d.m.Y'); ?></p>
									<div class="news_prev">
										<?php echo content(15); ?>
										<br /><?php edit_post_link('редактировать', '', ''); ?>
									</div>
								</div>
							<?php endif; ?>
							
						
					</div>
					<?php if ($postcount==6) $postcount=1; ?>
					<?php endif; ?>	
					
					
					
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

<?php require('brif.php'); ?>
</div> 

<!--wraper end-->
<?php require('footer.php'); ?>

</body>
</html>