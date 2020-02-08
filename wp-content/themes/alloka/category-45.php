<?php  /* Template Name: Отзывы */
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
	
		<div class="b_review_conteiner">
		<div class="b_band b_review_band">
			<h1 class="title_center">Отзывы клиентов<br /><span>мнение об услуге из первых рук</span></h1>
			<br />
			<br />
			<?php $postcount=1; ?>
			<?php set_post_thumbnail_size( 265, 125, true); ?> <!--размер миниатюры -->
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				
				<?php if ($postcount%2!==0): $postcount++; ?>
				<div class="review_itm">
					<div class="review_foto_left"><?php the_post_thumbnail('', array('title' => '')); ?></div>
					<div class="review_main_right">
						
						<div class="review_right_top"></div>
						<div class="review_right_arr"></div>
					
					<div class="review_right_m">
							<p class="review_autor"><b><?php the_title(); ?></b></p>
							<p class="review_autor_work"><?php the_field('dolznost'); ?></p>
							<div class="review_prev">
								<div class="review_content">
									<?php the_content(); ?>			
									<br /><?php edit_post_link('редактировать', '', ''); ?>
								</div>
							</div>
							<p class="l_review_more">полностью</p>
						</div>
						
						<div class="review_right_bot"></div>
					</div>	
				</div>
				<?php else : $postcount++; ?>
				<div class="review_itm">
					<div class="review_foto_right"><?php the_post_thumbnail('', array('title' => '')); ?></div>
					
					<div class="review_main_left">
						<div class="review_left_top"></div>
						<div class="review_left_arr"></div>
						<div class="review_left_m">
							<p class="review_autor"><b><?php the_title(); ?></b></p>
							<p class="review_autor_work"><?php the_field('dolznost'); ?></p>
							<div class="review_prev">
								<div class="review_content">
									<?php the_content(); ?>			
									<br /><?php edit_post_link('редактировать', '', ''); ?>
								</div>
							</div>
							<p class="l_review_more more_45">полностью</p>
						</div>
						<div class="review_left_bot"></div>
					</div>
				</div>
				<?php endif; ?>
			<?php endwhile; ?>
			<?php else : ?>	
			<div>
				К сожалению, по вашему запросу ничего не найдено.
			</div>
			<?php endif; ?>
			
			<br style="clear:both;" />
			
		</div>
		
	</div>
	

<div class="b_clear"></div>

<?php require('brif.php'); ?>
</div> 

<!--wraper end-->
<?php require('footer.php'); ?>



</body>
</html>