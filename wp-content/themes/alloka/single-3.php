<?php  /* Template Name: Блог */
 require('./wp-blog-header.php');
 require_once('header_v2.php');
 ?>

<body>
<?php include_once('googletag.php'); //todo: проверить гугл тэг ?>

<!-- Page -->
<div class="page selectArticle" id="root">
	<div class="page__layout">
		<a href="/blog/" class="backButton">
			<span class="backButton__caption">Назад в блог</span>
		</a>

		<div class="selectArticle__wrapper">
			<article class="selectArticle__main article page__blockLayout">
				<?php
				while ( have_posts() ){
					the_post();
					$thumbnail = get_the_post_thumbnail_url();
					$post_tags = get_the_tags();
					$date = get_the_date('j F Y');
					$link = get_permalink();
					?>
					<div class="article__header articleHeader">
						<?php
						foreach ($post_tags as $tag){
							?>
							<a href="/tag/<?php echo $tag->slug;?>/" class="articleHeader__tag tag"># <?php echo $tag->name;?></a>
							<?
						}
						?>
						<time class="articleHeader__date"><?php echo $date;?></time>
					</div>

					<div class="article__content">
						<h1>
							<?php echo $title = get_the_title();?>
						</h1>
						<?
						if($thumbnail){
							?><img src="<?php echo $thumbnail;?>" alt="<?php echo $title;?>"><?
						}
						?>
						<div class="content">
							<?php echoget_the_content()?>
						</div>
					</div>
					<?
				}
				?>

				<div class="article__footer">
					<div class="article__footerTitle">
						Полезно?<br />
						Сохрани себе
					</div>
					<div class="article__actionLinks actionLinks">
						<a href="#" onclick="Share.odnoklassniki('<?php echo $link;?>', '<?php echo $title;?>','<?php echo $thumbnail;?>'); return false;" target="_blank" class="actionLinks__item actionLinks__item_odnoklassniki"></a>
						<a href="#" onclick="Share.vkontakte('<?php echo $link;?>','<?php echo $title;?>','<?php echo $thumbnail;?>',''); return false;" target="_blank" class="actionLinks__item actionLinks__item_vk"></a>
						<a href="#" onclick="Share.telegram('<?php echo $link;?>','<?php echo urlencode($title);?>'); return false;" class="actionLinks__item actionLinks__item_telegram"></a>
						<a href="#" onclick="Share.mailru('<?php echo $link;?>','<?php echo $title;?>','<?php echo $thumbnail;?>',''); return false;" class="actionLinks__item actionLinks__item_moy-mir"></a>
					</div>
				</div>
			</article>

			<aside class="selectArticle__aside aside">
				<div class="aside__formBlock">
					<div class="page__blockLayout aside__formLayout">
						<form method="post" class="aside__form subscribe_form">
							<div class="aside__formTitle">Хотите получать новые записи о возможностях Аллоки?</div>

							<div class="aside__field field">
								<input name="email" type="email" class="aside__fieldInput aside__fieldInput_message field__input" placeholder="Ваш е-мэйл" required>
								<span class="field__error hide">Что-то пошло не так</span>
							</div>

							<button class="button">Подписаться</button>
						</form>

						<div class="aside__successMessage hide">
							<p>
								Вы успешно подписались!<br />
								Спасибо!
							</p>
						</div>
					</div>
				</div>

				<div class="aside__divider"></div>

				<div class="aside__taglist">
					<p class="aside__taglistTitle">Также пишем о</p>
					<?php $tags = get_tags(array('orderby' => 'count', 'order'   => 'DESC', 'number' => 10));?>
					<ul class="taglist taglist_column">
						<?php
						foreach ( $tags as $tag ) {
							$tag_link = get_tag_link($tag->term_id);
							echo "<li class=\"taglist__item\"><a href='{$tag_link}' title='{$tag->name} Tag' class='tag'># {$tag->name}</a></li>";
						}
						?>
					</ul>
				</div>
			</aside>
		</div>

		<div class="selectArticle__news">
			<div class="selectArticle__newsHeader">
				<h2 class="selectArticle__newsTitle title">И еще новости</h2>
				<a href="/blog/" class="selectArticle__newsButton button button_secondary">Все новости</a>
			</div>

			<div class="selectArticle__newsBody news">
				<?php
				$exclude = get_the_ID();
				?>
				<div class="news__list">
					<?php include ("includes/posts_list.php")?>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	.hide{
		display: none;
		opacity: 0;
	}
	.to_hide{
		display: none;
	}
	.to_hide.show{display: inline-block}
	.articleHeader.show_tags .to_hide{
		display: block;
	}
	.show_all_tags{display: none}
	.show_all_tags.active{display: inline-block}
	.aside__successMessage{transition: opacity .5s ease}
</style>
<!--/Page -->
<?php require('footerv2.php'); ?>

</body>
</html>