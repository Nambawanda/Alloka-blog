
<?php wp_footer(); ?>

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '3sszrjTwKC';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->

<script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
    var js = d.createElement(s); js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '11015');
</script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<!--<script src="--><?//=get_template_directory_uri()?><!--/js/libs.js"></script>-->
<!--<script src="--><?//=get_template_directory_uri()?><!--/js/script.js"></script>-->
<script>
	$(document).ready(function () {
		//подгрузка новостей
		$('.news__showMore').on('click', function () {
			var page = parseInt($(this).attr('data-page')),
				pages = parseInt($(this).attr('data-pages')),
				loader = $(this), tag = $(this).attr('data-tag');
			if(page <= pages){
				$.ajax({
					type   : 'POST',
					url    : window.blog_autoload.ajax_url,
					data   : {
						page: page,
						action: 'get_posts',
						tag: tag
					},
					success: function ( res ) {
						var data = JSON.parse(res.data);
						console.log(data);
						if(data.status == 'ok'){
							var column1 = '', column2 = '', column3 = '', card, tags, column = 0;
							$('.news__column .news__item_preview').remove();
							data.data.forEach(function (post) {
								var tags = 0;
								card = "<div class=\"news__item card\">"+((post.thumbnail)?
								"<div class=\"card__image\" style=\"background-image: url('" + post.thumbnail + "')\"></div>" : '')+
									"<div class=\"card__content\">"+
								"<div class=\"card__contentHeader articleHeader\">";
								post.post_tags.forEach(function (tag) {
									tags = tags + 1;
									card = card + "<a href='/tag/" + tag.slug + "/' class='articleHeader__tag tag" + ((tags > 3)? ' to_hide' : '') + "'># " + tag.name + "</a>";
								});
								if (tags > 3){
									card = card + "<a href=\"#\" class=\"articleHeader__tag tagButton show_all_tags active\">показать еще " + (tags - 3) + "</a>";
									card = card + "<a href=\"#\" class=\"articleHeader__tag tagButton show_all_tags\">убрать лишнее</a>";
								}
								card = card + "<time class=\"articleHeader__date\">" + post.date + "</time>"+
								"</div>"+
								"<a href=\"" + post.link + "\" class=\"card__title\">" + post.name + "</a>"+
								"</div>"+
								"</div>";

								var column1_height = parseInt($('.news__column:nth-child(1)').height()),
									column2_height = parseInt($('.news__column:nth-child(2)').height()),
									column3_height = parseInt($('.news__column:nth-child(3)').height()),
									minColumn = 0, column = 0;
								if (column1_height < column2_height){
									minColumn = column1_height;
									column = 1;
								}else{
									minColumn = column2_height;
									column = 2;
								}
								if(column3_height < minColumn) {
									column = 3;
								}
								$('.news__column:nth-child('+column+')').append(card);
							});
							$('.news__column').append('<div class="news__item news__item_preview"></div>');
							if(page + 1 < pages){
								loader.attr('data-page', parseInt(page)+1);
							}else{
								loader.remove();
								$('.news__column .news__item_preview').remove();
							}
						}
					}
				});
			}
			return false;
		})

		//показывать теги
		$(document).on('click', '.show_all_tags', function () {
			var header = $(this).closest('.articleHeader');
			header.find('.tag.to_hide').toggleClass('show');
			header.find('.show_all_tags').toggleClass('active');
			return false;
		});
	})
</script>
