<?php
$news_column1 = '<div class="news__column">';
$news_column2 = '<div class="news__column">';
$news_column3 = '<div class="news__column">';
$column = 1;
$max_tags_per_post = 3;
if(have_posts()){
	?>
	<div class="articlesByTag__newsTitle">Все новости по запросу “<?php echo $wp_query->query['s'];?>”</div>
	<div class="news">
		<div class="news__list">
	<?php
	while (have_posts()){
		the_post();
		$post_tags = get_the_tags();
		$tags_count = count($post_tags);
		$i = 0;
		$thumbnail = get_the_post_thumbnail_url();
		$card = "
				<div class=\"news__item card\">".(($thumbnail)? "<div class=\"card__image\" style=\"background-image: url('$thumbnail')\"></div>" : "")."
						<div class=\"card__content\">
							<div class=\"card__contentHeader articleHeader\">";
		if ($post_tags){
			foreach ($post_tags as $post_tag) {
				$tag_link = get_tag_link($post_tag->term_id);
				$card .= "<a href=\"$tag_link\" class=\"articleHeader__tag tag " . ((++$i > $max_tags_per_post) ? 'to_hide' : '') . "\"># {$post_tag->name}</a>";
			}
		}
		if ($tags_count > $max_tags_per_post) {
			$hided = $tags_count - $max_tags_per_post;
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
	$news_column_end = "</div>\r\n";
	echo $news_column1.$news_column_end.$news_column2.$news_column_end.$news_column3.$news_column_end;
	?></div>
	</div><?php
}else{
	echo "<div class=\"articlesByTag__newsTitle\">По вашему запросу ничего не найдено</div>";
}
?>