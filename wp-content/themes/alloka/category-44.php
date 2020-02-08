<?php  /* Template Name: Аналитика вопросы */
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
	
	<div class="b_block_question">
		<div class="b_band b_quest_band">
			<h1>10 популярных вопросов<br /><span>об услуге Alloka.Аналитика</span></h1>
			<?php $firstQuestion = true; ?>
			<div class="b_question">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<div class="question_itm">
					<div class="question_analitik_title <?php if ($firstQuestion) echo 'title_analitik_activ';?>">
						<div class="q_r_tl"></div>
						<div class="q_r_tr"></div>
						<div class="q_r_bl"></div>
						<div class="q_r_br"></div>
						<div class="q_r_arr"></div>
						<span><?php the_title(); ?></span>
					</div>
					<div <?php if ($firstQuestion) {echo 'style="display:block;"'; $firstQuestion = false;} ?> class="question_answer">
						<?php the_content(); ?>			
						<br /><?php edit_post_link('редактировать', '', ''); ?>
						
					</div>
				</div>
			<?php endwhile; ?>
			<?php else : ?>	
			<div>
				К сожалению, по вашему запросу ничего не найдено.
			</div>
			<?php endif; ?>
			
			
				
				
			</div>
			<br style="clear:both;" />
		<a href="/analitika-kalkulyator/" class="zakaz_analitiki">Узнать тарифы</a>	
		</div>
		
	</div>
<div class="b_clear"></div>


</div> 

<!--wraper end-->
<?php require('footer.php'); ?>



</body>
</html>