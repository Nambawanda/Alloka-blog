<?php  /* Template Name: 15 Вопросов */
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
	
	<div class="b_block_question">
		<div class="b_band b_quest_band">
			<h1>15 важных вопросов<br /><span>об услуге Alloka.Звонки</span></h1>
			<?php $firstQuestion = true; ?>
			<div class="b_question">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<div class="question_itm">
					<div class="question_title <?php if ($firstQuestion) echo 'title_activ';?>">
						<div class="q_tl"></div>
						<div class="q_tr"></div>
						<div class="q_bl"></div>
						<div class="q_br"></div>
						<div class="q_arr"></div>
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
			<br style="clear:both;" />
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