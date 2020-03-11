<?php  /* Template Name: Блог */
 require('./wp-blog-header.php');
 require_once('header_v2.php');
 ?>
<body>
<?php include_once('googletag.php'); //todo: проверить гугл тэг ?>
<!-- Page -->
<div class="page" id="root">
	<div class="page__layout">
		<form action="#" class="page__search search">
			<label class="search__field">
				<input type="text" class="search__input" placeholder="Искать по статьям" required>
				<button class="search__button"></button>
			</label>
		</form>

		<h1 class="page__title title">Наши мысли</h1>
		<?$tags = get_tags(array('orderby' => 'count', 'order'   => 'DESC', 'number' => 10));?>
		<ul class="page__taglist taglist">
			<?
			foreach ( $tags as $tag ) {
				$tag_link = get_tag_link($tag->term_id);
				echo "<li class=\"taglist__item\"><a href='{$tag_link}' title='{$tag->name} Tag' class='tag'># {$tag->name}</a></li>";
			}
			?>
		</ul>
		<?
		$posts = get_posts(array('numberposts' => -1));
		$pages_count = (count($posts) - 1)/6;
		wp_reset_postdata();
		$args = array( 'posts_per_page' => 7 , 'paged' => ((get_query_var('paged')) ? get_query_var('paged') : 1));
		$lastposts = get_posts( $args );
		$first = true;
		$news_column1 = '<div class="news__column">';
		$news_column2 = '<div class="news__column">';
		$news_column3 = '<div class="news__column">';
		$column = 1;
		$max_tags_per_post = 3;
		foreach( $lastposts as $post ){ setup_postdata($post);
			if ($first) {
				$thumbnail = get_the_post_thumbnail_url();
				?>
				<div class="mainCardContainer">
					<div class="mainCard">
						<div class="mainCard__image"
							 style="background-image: url('<?=$thumbnail?>')"></div>

						<div class="mainCard__content">
							<div class="mainCard__contentHeader articleHeader">
								<?
								$post_tags = wp_get_post_tags($post->ID, array('orderby' => 'count', 'order'   => 'DESC'));
								$count = count($post_tags);
								$i = 0;
								foreach ($post_tags as $post_tag){
									$tag_link = get_tag_link($post_tag->term_id);
									?><a href="<?=$tag_link?>" class="articleHeader__tag tag <?=(++$i > $max_tags_per_post)? 'to_hide' : ''?>"># <?=$post_tag->name?></a><?
								}
								?>
								<?
								if($count > $max_tags_per_post){
									$hided = $count - $max_tags_per_post;
									?><a href="#" class="articleHeader__tag tagButton show_all_tags">показать еще <?=$hided?></a><?
								}
								?>
<!--								<a href="#" class="articleHeader__tag tagButton tagButton_active">свернуть</a>-->
								<time class="articleHeader__date"><?the_date('j F Y')?></time>
							</div>

							<a href="<?php get_permalink(); ?>" class="mainCard__title"><?php the_title(); ?></a>
						</div>
					</div>
				</div>
				<div class="news">
					<div class="news__list">
				<?
				$first = false;
			}else{
				$post_tags = wp_get_post_tags($post->ID, array('orderby' => 'count', 'order'   => 'DESC'));
				$count = count($post_tags);
				$i = 0;
				$thumbnail = get_the_post_thumbnail_url();
				$card = "
				<div class=\"news__item card\">
						<div class=\"card__image\" style=\"background-image: url('$thumbnail')\"></div>

						<div class=\"card__content\">
							<div class=\"card__contentHeader articleHeader\">";
				foreach ($post_tags as $post_tag){
					$tag_link = get_tag_link($post_tag->term_id);
					$card .= "<a href=\"$tag_link\" class=\"articleHeader__tag tag ".((++$i > $max_tags_per_post)? 'to_hide' : '')."\"># {$post_tag->name}</a>";
				}
				if($count > $max_tags_per_post){
					$hided = $count - $max_tags_per_post;
					$card .= "<a href=\"#\" class=\"articleHeader__tag tagButton show_all_tags\">показать еще $hided</a>";
				}

				$card .="
								<time class=\"articleHeader__date\">10 февраля</time>
							</div>
							<a href=\"".get_permalink()."\" class=\"card__title\">".get_the_title()."</a>
						</div>
					</div>
				";
				switch ($column++){
					case 1:{
						$news_column1 .= $card;
						break;
					}
					case 2:{
						$news_column2 .= $card;
						break;
					}
					case 3:{
						$news_column3 .= $card;
						$column = 1;
						break;
					}
				}
			}
		}
		wp_reset_postdata();
		echo $news_column1."<div class=\"news__item news__item_preview\"></div></div>\n\r".$news_column2."<div class=\"news__item news__item_preview\"></div></div>\n\r".$news_column3."<div class=\"news__item news__item_preview\"></div></div>\n\r";
		?>
			</div>
			<div class="news__footer">
				<a href="#" class="news__showMore button button_secondary" data-pages="<?=ceil($pages_count)?>">Показать еще</a>
			</div>
		</div>
	</div>
</div>
<!--/Page -->
<style>
	.to_hide{
		display: none;
	}
	.articleHeader.show_tags .to_hide{
		display: block;
	}
</style>
<!--wraper end-->
<?php // require('footer.php'); ?>

</body>
</html>