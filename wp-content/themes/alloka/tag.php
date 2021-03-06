<?php  /* Template Name: Блог */
require('./wp-blog-header.php');
require_once('header_v2.php');
?>
<body>
<?php include_once('googletag.php'); //todo: проверить гугл тэг ?>
<!-- Page -->
<div class="page" id="root">
	<div class="page__layout">
		<form role="search" method="get" id="searchform" action="<?php echo $lang_slug;?>" class="page__search search">
			<label class="search__field">
				<input type="text" class="search__input" placeholder="<?php echo pll__('Искать по статьям');?>" name="s" id="s" required>
				<button class="search__button"></button>
			</label>
		</form>

		<h1 class="page__title title"><?php echo pll__('Наши мысли');?></h1>
		<?php $tags = get_tags(array('orderby' => 'count', 'order'   => 'DESC', 'number' => 10));?>
		<ul class="page__taglist taglist">
			<?php
			foreach ( $tags as $tag ) {
				$tag_link = get_tag_link($tag->term_id);
				echo "<li class=\"taglist__item\"><a href='{$tag_link}' title='{$tag->name} Tag' class='tag".(($tag->slug == $wp_query->query['tag'])? ' tag_active' : '')."'># {$tag->name}</a></li>";
				if($tag->slug == $wp_query->query['tag']){
					$current_tag = $tag->name;
				}
			}
			?>
		</ul>
		<div class="articlesByTag__newsTitle"><?php echo pll__('Все новости по тегу');?> “<?php echo $current_tag;?>”</div>
			<div class="news">
				<div class="news__list">
					<?php
					$exclude = false;
					include('includes/posts_list.php');
					?>
				</div>
				<div class="news__footer">
					<?php if($pages_count > 0){?>
					<a href="#" class="news__showMore button button_secondary" data-tag="<?php echo $wp_query->query['tag'];?>"  data-lang="<?php echo get_locale();?>" data-page="0" data-pages="<?php echo $pages_count;?>"><?php echo pll__('Показать еще');?></a>
					<?php }?>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<!--/Page -->
<style>
	.to_hide{
		display: none;
	}
	.to_hide.show{display: inline-block}
	.articleHeader.show_tags .to_hide{
		display: block;
	}
	.show_all_tags{display: none}
	.show_all_tags.active{display: inline-block}
</style>
<!--wraper end-->
<?php  require('footerv2.php'); ?>

</body>
</html>