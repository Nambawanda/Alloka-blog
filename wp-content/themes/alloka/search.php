<?php  /* Template Name: Блог */
 require('./wp-blog-header.php');
 require_once('header.php');
 ?>

</head>
<body>
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
					<span style="display:block;">(499) 400-1-499</span>
					<span>(831) 230-30-35</span>
					<span>(812) 600-16-22</span>
				</p>
				<p class="fcall fcall_blogs">Заказать обратный звонок</p>
			
			
				<ul class="b_menu b_menu_blog">
					<li><a href="/o-kompanii/">О компании</a></li>
					<li><a href="/otzyivyi/">Отзывы клиентов</a></li>
					<li><a href="/blog/">Блог</a></li>
				</ul>	
			</div>
			
			
			
			<div class="content1 content1_in">
				<a href="/zvonki-kak-eto-rabotaet/" class="icons icalls_blog"><span>Alloka звонки</span></a>
				<a href="/analitika-kak-eto-rabotaet/" class="icons ianalitics_blog "><span>Alloka аналитика</span></a>
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
						<div class="blog_cats_main">
							<p class="blog_cats_title"><b>Мы пишем на темы:</b></p>
							<?php wp_tag_cloud('smallest=8&largest=20&number=35'); ?>
							
						</div>
						<div class="blog_cats_bot"></div>
					</div>
					
					<!-- search form -->
					<?php require ('search_form.php'); ?>
					
				</div>
				
			
				<div class="b_blog_top_left singleart">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><br />
					<?php the_excerpt(); ?>
					<div class="sa_tags"><b>Теги:</b> <?php the_tags(''); ?></div>
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