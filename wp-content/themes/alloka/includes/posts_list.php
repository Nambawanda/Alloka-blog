<?php
$filter = array('numberposts' => -1, 'category' => 3);
if($wp_query->query['tag']){
	$filter['tag'] = $wp_query->query['tag'];
}
$first = ($wp_query->query['tag'])? false : true;
$posts = get_posts($filter);
$pages_count = abs(ceil((count($posts) - 7) / 12));
$filter['numberposts'] = ($wp_query->query['tag'])? 6 : 7;
if($exclude){
	$filter['numberposts'] = 4;
	$filter['exclude'] = $exclude;
	$first = false;
}
$lastposts = get_posts($filter);
$news_column1 = '<div class="news__column">';
$news_column2 = '<div class="news__column">';
$news_column3 = '<div class="news__column">';
$column = 1;
$max_tags_per_post = 3;

foreach ($lastposts as $post) {
	setup_postdata($post);
	if ($first) {
		$thumbnail = get_the_post_thumbnail_url();
		?>
		<div class="mainCardContainer">
			<div class="mainCard">
				<?php if($thumbnail){?>
				<div class="mainCard__image"
					 style="background-image: url('<?= $thumbnail ?>')"></div>
				<?php }?>
				<div class="mainCard__content">
					<div class="mainCard__contentHeader articleHeader">
						<?php
						$post_tags = wp_get_post_tags($post->ID, array('orderby' => 'count', 'order' => 'DESC'));
						$count = count($post_tags);
						$i = 0;
						foreach ($post_tags as $post_tag) {
							$tag_link = get_tag_link($post_tag->term_id);
							?><a href="<?php echo $tag_link ?>"
								 class="articleHeader__tag tag <?php echo (++$i > $max_tags_per_post) ? 'to_hide' : '' ?>">
							# <?php echo $post_tag->name ?></a><?php
						}
						if ($count > $max_tags_per_post) {
							$hided = $count - $max_tags_per_post;
							?><a href="#" class="articleHeader__tag tagButton show_all_tags">показать
							еще <?php echo $hided ?></a><?php
						}
						?>
						<!--								<a href="#" class="articleHeader__tag tagButton tagButton_active">свернуть</a>-->
						<time class="articleHeader__date"><?php the_date('j F Y') ?></time>
					</div>

					<a href="<?php echo get_permalink(); ?>" class="mainCard__title"><?php echo get_the_title(); ?></a>
				</div>
			</div>
		</div>
		<div class="news">
			<div class="news__list">
		<?php
		$first = false;
	} else {
		$post_tags = wp_get_post_tags($post->ID, array('orderby' => 'count', 'order' => 'DESC'));
		$count = count($post_tags);
		$i = 0;
		$thumbnail = get_the_post_thumbnail_url();
		$card = "
				<div class=\"news__item card\">".(($thumbnail)? "<div class=\"card__image\" style=\"background-image: url('$thumbnail')\"></div>" : "")."
						<div class=\"card__content\">
							<div class=\"card__contentHeader articleHeader\">";
		foreach ($post_tags as $post_tag) {
			$tag_link = get_tag_link($post_tag->term_id);
			$card .= "<a href=\"$tag_link\" class=\"articleHeader__tag tag " . ((++$i > $max_tags_per_post) ? 'to_hide' : '') . "\"># {$post_tag->name}</a>";
		}
		if ($count > $max_tags_per_post) {
			$hided = $count - $max_tags_per_post;
			$card .= "<a href=\"#\" class=\"articleHeader__tag tagButton show_all_tags active\">показать еще $hided</a>";
			$card .= "<a href=\"#\" class=\"articleHeader__tag tagButton show_all_tags\" data-action='hide'>убрать лишнее</a>";
		}

		$card .= "
								<time class=\"articleHeader__date\">" . get_the_date('j F Y') . "</time>
							</div>
							<a href=\"" . get_permalink() . "\" class=\"card__title\">" . get_the_title() . "</a>
						</div>
					</div>
				";
		switch ($column++) {
			case 1:
			{
				$news_column1 .= $card;
				break;
			}
			case 2:
			{
				$news_column2 .= $card;
				break;
			}
			case 3:
			{
				$news_column3 .= $card;
				$column = 1;
				break;
			}
		}
	}
}
wp_reset_postdata();
include('posts_list_end.php');