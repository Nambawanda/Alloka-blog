$(document).ready(function () {
	//подгрузка новостей
	$('.news__showMore').on('click', function () {
		var page = parseInt($(this).attr('data-page')),
			pages = parseInt($(this).attr('data-pages')),
			loader = $(this), tag = $(this).attr('data-tag');

		if(loader.attr('data-busy') == 'yes'){
			return false;
		}else{
			loader.attr('data-busy', 'yes');
		}

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
							loader.attr('data-busy', 'no');
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

	//отправка почты

	$('.subscribe_form').on('submit', function () {
		var email_field = $(this).find('input[name="email"]');
		if(email_field.val()){
			email_field.parent().removeClass('field_error');
			email_field.parent().find('.field__error').addClass('hide');
			$.ajax({
				type: 'POST',
				url: window.blog_autoload.ajax_url,
				data: {
					email: email_field.val(),
					action: 'send_mail',
				},
				success: function (res) {
					res = JSON.parse(res.data);
					if(res['status'] != 'ok'){
						email_field.parent().addClass('field_error');
						email_field.parent().find('.field__error').removeClass('hide');
					}else{
						$('.aside__successMessage').removeClass('hide');
					}
				}
			});
		}else{
			email_field.parent().addClass('field_error');
			email_field.parent().find('.field__error').removeClass('hide');
		}
		return false;
	});

	//показывать теги
	$(document).on('click', '.show_all_tags', function () {
		var header = $(this).closest('.articleHeader');
		header.find('.tag.to_hide').toggleClass('show');
		header.find('.show_all_tags').toggleClass('active');
		return false;
	});

	// поделяшки
	Share = {
		vkontakte: function(purl, ptitle, pimg, text) {
			url  = 'http://vkontakte.ru/share.php?';
			url += 'url='          + encodeURIComponent(purl);
			url += '&title='       + encodeURIComponent(ptitle);
			url += '&description=' + encodeURIComponent(text);
			url += '&image='       + encodeURIComponent(pimg);
			url += '&noparse=true';
			Share.popup(url);
		},
		odnoklassniki: function(purl, ptitle, pimg) {
			url  = 'https://connect.ok.ru/offer?';
			url += '&title' + encodeURIComponent(ptitle);
			url += '&url='    + encodeURIComponent(purl);
			url += '&imageUrl='    + encodeURIComponent(pimg);
			Share.popup(url);
		},
		facebook: function(purl, ptitle, pimg, text) {
			url  = 'http://www.facebook.com/sharer.php?s=100';
			url += '&p[title]='     + encodeURIComponent(ptitle);
			url += '&p[summary]='   + encodeURIComponent(text);
			url += '&p[url]='       + encodeURIComponent(purl);
			url += '&p[images][0]=' + encodeURIComponent(pimg);
			Share.popup(url);
		},
		twitter: function(purl, ptitle) {
			url  = 'http://twitter.com/share?';
			url += 'text='      + encodeURIComponent(ptitle);
			url += '&url='      + encodeURIComponent(purl);
			url += '&counturl=' + encodeURIComponent(purl);
			Share.popup(url);
		},
		mailru: function(purl, ptitle, pimg, text) {
			url  = 'http://connect.mail.ru/share?';
			url += 'url='          + encodeURIComponent(purl);
			url += '&title='       + encodeURIComponent(ptitle);
			url += '&description=' + encodeURIComponent(text);
			url += '&imageurl='    + encodeURIComponent(pimg);
			Share.popup(url)
		},
		telegram: function(purl, ptitle) {
			url  = 'https://telegram.me/share/url?';
			url += 'url='          + encodeURIComponent(purl);
			url += '&text='       + encodeURIComponent(ptitle);
			// url += '&description=' + encodeURIComponent(text);
			// url += '&imageurl='    + encodeURIComponent(pimg);
			Share.popup(url)
		},
		popup: function(url) {
			window.open(url,'','toolbar=0,status=0,width=626,height=436');
		}
	};
})