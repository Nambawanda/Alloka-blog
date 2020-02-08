$(document).ready(function() {
	$('input, textarea').placeholder();
	
	/* кнопка позвонить с сайта */
	$('.fcall').click(function(){
		/* если открыта наверху, скрываем блок */
		if ( $('.b_feedcall').css('bottom') == '40px' ){
			$('.b_feedcall').css('display','none');
		};
		
		if ( $('.b_feedcall').css('display') == 'none' ){
			$('.b_feedcall').css({'display':'block','top':'-840px'});
			$('.b_feedcall').animate({'top':'70px'},400);
			setTimeout(function(){$('.b_feedcall').animate({'top':'30px'},200);},400);
			setTimeout(function(){$('.b_feedcall').animate({'top':'40px'},100);},600);
		} else {
			$('.b_feedcall').animate({'top':'70px'},200);
			setTimeout(function(){$('.b_feedcall').animate({'top':'-840px'},400);},200);
			setTimeout(function(){$('.b_feedcall').css({'display':'none'},400);},600);	
		};
	});
	
		/* кнопка позвонить с сайта */
	$('.callback').click(function(){
		/* если открыта наверху, скрываем блок */
		if ( $('.b_feedcall').css('bottom') == '40px' ){
			$('.b_feedcall').css('display','none');
		};
		
		if ( $('.b_feedcall').css('display') == 'none' ){
			$('.b_feedcall').css({'display':'block','top':'-840px'});
			$('.b_feedcall').animate({'top':'70px'},400);
			setTimeout(function(){$('.b_feedcall').animate({'top':'30px'},200);},400);
			setTimeout(function(){$('.b_feedcall').animate({'top':'40px'},100);},600);
		} else {
			$('.b_feedcall').animate({'top':'70px'},200);
			setTimeout(function(){$('.b_feedcall').animate({'top':'-840px'},400);},200);
			setTimeout(function(){$('.b_feedcall').css({'display':'none'},400);},600);	
		};
	});
	
	
	$('.feedcall_cls').click(function(){
		if ( $('.b_feedcall').css('top') == '40px' ){
			$('.b_feedcall').animate({'top':'70px'},200);
			setTimeout(function(){$('.b_feedcall').animate({'top':'-840px'},400);},200);
			setTimeout(function(){$('.b_feedcall').css({'display':'none'},400);},600);			
		} else {
			$('.b_feedcall').animate({'bottom':'70px'},200);
			setTimeout(function(){$('.b_feedcall').animate({'bottom':'-840px'},400);},200);
			setTimeout(function(){$('.b_feedcall').css({'display':'none'},400);},600);	
		};
	});
	
	
	
	/* кнопка онлайн брифа */
	$('.openbrif').click(function(){
		if ( $('.b_brif').css('bottom') != '0' ){
			$('.b_brif').animate({'bottom':'60px'},400);
			setTimeout(function(){$('.b_brif').animate({'bottom':'-10px'},200);},400);
			setTimeout(function(){$('.b_brif').animate({'bottom':'30px'},100);},600);
		} else {
			$('.b_brif').animate({'bottom':'60px'},400);
			setTimeout(function(){$('.b_brif').animate({'bottom':'-930px'},400);},200);
		};
	});
	
	/* кнопка онлайн брифа */
	$('.openbrif_top').click(function(){
		console.log('suda popal');
		if ( $(this).hasClass('openbrif_top') ){
			if ( $('.b_brif').css('bottom') != '0' ){
				$('.b_brif').css({'bottom':'auto','top':'-930px'});
				$('.b_brif').animate({'top':'60px'},400);
				setTimeout(function(){$('.b_brif').animate({'top':'-10px'},200);},400);
				setTimeout(function(){$('.b_brif').animate({'top':'30px'},100);},600);
			} else {
				$('.b_brif').animate({'top':'60px'},400);
				setTimeout(function(){$('.b_brif').animate({'top':'-930px'},400);},200);
			};
		};
	});
	
		/* кнопка онлайн брифа */
	$('.obrif').click(function(){
		if ( $('.b_brif').css('bottom') != '0' ){
			$('.b_brif').animate({'bottom':'60px'},400);
			setTimeout(function(){$('.b_brif').animate({'bottom':'-10px'},200);},400);
			setTimeout(function(){$('.b_brif').animate({'bottom':'30px'},100);},600);
		} else {
			$('.b_brif').animate({'bottom':'60px'},400);
			setTimeout(function(){$('.b_brif').animate({'bottom':'-930px'},400);},200);
		};
	});
	
	$('.brif_cls').click(function(){
		if ( $('.b_brif').css('top') == '30px' ){
			$('.b_brif').animate({'top':'100px'},300);
			setTimeout(function(){$('.b_brif').animate({'top':'-930px'},500);},300);
			$('.b_brif').css({'top':'auto','bottom':'-930px'});
		} else{
			$('.b_brif').animate({'bottom':'100px'},300);
			setTimeout(function(){$('.b_brif').animate({'bottom':'-930px'},500);},300);
		}
	});
	

	
	/* телефоны в хедере */
	$('.regselect').click(function(){
		var num = $(this).attr('Class');
		num = parseInt(num.replace(/\D+/g,""));
		$('.tphone span').css('display','none');
		$('.tphone span:nth-child(' +num + ')').css('display','block');
		$('.regselect').css('border-bottom','1px dashed #8ac197');
		$(this).css('border','none');
	});
	
	/* телефоны в футере */
	$('.cityitm').click(function(){
		var num = $(this).attr('Class');
		num = parseInt(num.replace(/\D+/g,""));
		$('.foot_phone span').css('display','none');
		$('.foot_phone span:nth-child(' +num + ')').css('display','block');
		$('.cityitm').css('border-bottom','1px dashed #7f7f7f');
		$(this).css('border','none');
	});
	
	
	/* кнопка выпадающаю */
	$('.cost').hover(function(){
		$(this).stop().animate({'height':'73px','bottom':'-73px','line-height':'55px'},100);	
	},function(){
		$(this).stop().animate({'height':'69px','bottom':'-69px','line-height':'50px'},100);	
	});
	/* кнопка выпадающаю */
	$('.cost_top').hover(function(){
		$(this).stop().animate({'height':'73px','bottom':'-73px','line-height':'55px'},100);	
	},function(){
		$(this).stop().animate({'height':'69px','bottom':'-69px','line-height':'50px'},100);	
	});
	
	$('.analys').hover(function(){
		$(this).stop().animate({'height':'73px','bottom':'-73px','line-height':'55px'},100);	
	},function(){
		$(this).stop().animate({'height':'69px','bottom':'-69px','line-height':'50px'},100);	
	});
	
	/* меняем слонов */
	$('.icalls').click(function(){
		icall();
	});

	$('.ianalitics').click(function(){
		act_ianalit();
	});
	
	$('.iplatform').click(function(){
		act_iplatform();
	});
	
	/* тоже самое но для внутренних */
	$('.icalls_in').click(function(){
		act_icalls_in();
	});
	
	$('.ianalitics_in').click(function(){
		ianalit_in();
	});
	
	$('.platf_in').click(function(){
		act_platf_in();
	});
	
	
	/* выбор презентации */
	$('.present1').click(function(){
		$('.video').css('display','none');
		$('.video_1').css('display','block');
		$('.presents').removeClass("active_pres");
		$('.linearrow').animate({'top':'20px'},200);
		$(this).addClass("active_pres");		
	});
	$('.present2').click(function(){
		$('.video').css('display','none');
		$('.video_2').css('display','block');
		$('.presents').removeClass("active_pres");
		$('.linearrow').animate({'top':'58px'},200);
		$(this).addClass("active_pres");
	});
	$('.present3').click(function(){
		$('.video').css('display','none');
		$('.video_3').css('display','block');
		$('.presents').removeClass("active_pres");
		$('.linearrow').animate({'top':'96px'},200);
		$(this).addClass("active_pres");
	});

	
	/* page 404 */
	$('.b_wraper_404').mousemove(function(e){
		wid = $(window).width()/2;
		$('.b_404_eleph').css('margin-left',(-317 + (e.pageX - wid)/30) + 'px');
		$('.b_404_shadow').css('margin-left',(-214 + (e.pageX - wid)/10) + 'px');
	});
	
	/* 15 questions */
	$('.question_title').click(function(){
		if ( !$(this).hasClass('title_activ') ){
			$('.question_answer').slideUp(500);
			$(this).parent().children('.question_answer').slideToggle(500);
			$('.question_title').removeClass('title_activ');
			$(this).addClass('title_activ');	
		}
	});
	
	
	/* calculator */
	$('.calc_btn').hover(function(){
		value_submit = $(this).val();
		$(this).val('Узнать стоимость');
	},function(){
		$(this).val(value_submit);
	});
	
	
	$('.calc_btn_1').click(function(){
		if ( $('.b_change_calcs').css('display') == 'none' ){
			$('.b_change_calcs').slideDown();
			$('body').animate({scrollTop:930}, 300);
		};
		if ( $('.b_calc_1').hide() ){
			$('.b_change_calcs').children('div').fadeOut();
			$('.b_calc_1').fadeIn();
			$('body').animate({scrollTop:930}, 300);
		}
		
		setTimeout(function(){
			$('.b_change_calcs').css('height',($('.b_calc_1').height()+40)+'px' );
		},600);
	});
	
	$('.calc_btn_2').click(function(){
		if ( $('.b_change_calcs').css('display') == 'none' ){
			$('.b_change_calcs').slideDown();
			$('body').animate({scrollTop:930}, 300);
		};
		if ( $('.b_calc_2').hide() ){
			$('.b_change_calcs').children('div').fadeOut();
			$('.b_calc_2').fadeIn();
			$('body').animate({scrollTop:930}, 300);
		};
		
		setTimeout(function(){
			$('.b_change_calcs').css('height',($('.b_calc_2').height()+40)+'px' );
		},600);

	});
	
	$('.calc_btn_3').click(function(){
		if ( $('.b_change_calcs').css('display') == 'none' ){
			$('.b_change_calcs').slideDown();
			$('body').animate({scrollTop:930}, 300);
		};
		if ( $('.b_calc_3').hide() ){
			$('.b_change_calcs').children('div').fadeOut();
			$('.b_calc_3').fadeIn();
			$('body').animate({scrollTop:930}, 300);
		};
		setTimeout(function(){
			$('.b_change_calcs').css('height',($('.b_calc_3').height()+40)+'px' );
		},600);
	});
	
	
	/* select */
	$('.select_main').click(function(){
		var ide = $(this).children('select').attr('id');
		var name = $('#'+ide+' :selected').html();
		$(this).children('p').text(name);
		if ($(this).children('select').val() !=''){
			$(this).children('.selecttitle').css('color','#000');
		} else {
			$(this).children('.selecttitle').css('color','#7f7f7f');
		};
		
	});
	
	
	
	
	
/********************************************************************************************************************************************************/
/********************************************************************************************************************************************************/	
/********************************************************************************************************************************************************/
	
	
	
	
	/* analitika 10 questions */
	$('.question_analitik_title').click(function(){
		if ( !$(this).hasClass('title_analitik_activ') ){
			$('.question_answer').slideUp(500);
			$(this).parent().children('.question_answer').slideToggle(500);
			$('.question_analitik_title').removeClass('title_analitik_activ');
			$(this).addClass('title_analitik_activ');	
		}
	});
	
	
	
	$('.zakaz_uslugi').click(function(){
		if ( $(this).hasClass('zakaz_analitiki')) $('.requesttype').attr("value", "Заказ аналитики")
		else $('.requesttype').attr("value", "Заказ по акции");
		/* если открыта наверху, скрываем блок */
		if ( $('.b_feedcall').css('top') == '40px' ){
			$('.b_feedcall').css('display','none');
		};
		if ( $('.b_feedcall').css('display') == 'none' ){
			$('.b_feedcall').css({'top':'auto','display':'block','bottom':'-840px'});
			$('.b_feedcall').animate({'bottom':'70px'},400);
			setTimeout(function(){$('.b_feedcall').animate({'bottom':'30px'},200);},400);
			setTimeout(function(){$('.b_feedcall').animate({'bottom':'40px'},100);},600);
		} else {
			$('.b_feedcall').animate({'bottom':'70px'},200);
			setTimeout(function(){$('.b_feedcall').animate({'bottom':'-840px'},400);},200);
			setTimeout(function(){$('.b_feedcall').css({'display':'none'},400);},600);	
		};
	});
	
	
	
	/* analitika calc */
	$('.analitika_calc_btn').hover(function(){
		value_submit = $(this).val();
		$(this).val('Расчитать');
	},function(){
		$(this).val(value_submit);
	});
	
	/* телефоны в хедере */
	$('.regselect_blog').click(function(){
		var num = $(this).attr('Class');
		num = parseInt(num.replace(/\D+/g,""));
		$('.tphone_blog span').css('display','none');
		$('.tphone_blog span:nth-child(' +num + ')').css('display','block');
		$('.regselect_blog').css('border-bottom','1px dashed #000');
		$(this).css('border','none');
	});
	
	
	
		/* review */
	$('.l_review_more').click(function(){
		if ( $(this).parent('div').children('.review_prev').height() == 35 ) {
			var wt = $(this).parent().children('.review_prev').children('.review_content').height()+10;
			$(this).parent('div').children('.review_prev').animate({'height':wt+'px'},300);
			$(this).text('свернуть');
		} else {
			$(this).parent('div').children('.review_prev').animate({'height':'35px'},300);
			$(this).text('полностью');
		};
	
	});
	
	/* analitika calculator */
	
	$('.analitik_btn_1').click(function(){
		if ( $('.b_change_analitik').css('display') == 'none' ){
			$('.b_change_analitik').slideDown();
		};
		
		$('.b_analitik_type_1').hide();
		$('.b_change_analitik').children('div').fadeOut();
		$('.b_analitik_type_1').fadeIn();
		$('body').animate({scrollTop:1350}, 300);
		
		
		setTimeout(function(){
			$('.b_change_analitik').css('height',($('.b_analitik_type_1').height())+'px' );
		},600);
	});
	
	$('.analitik_btn_2').click(function(){
		if ( $('.b_change_analitik').css('display') == 'none' ){
			$('.b_change_analitik').slideDown();
		};
		
		$('.b_analitik_type_2').hide();
		$('.b_change_analitik').children('div').fadeOut();
		$('.b_analitik_type_2').fadeIn();
		$('body').animate({scrollTop:1350}, 300);
				
		setTimeout(function(){
			$('.b_change_analitik').css('height',($('.b_analitik_type_2').height())+'px' );
		},600);

	});
	
	$('.analitik_btn_3').click(function(){
		if ( $('.b_change_analitik').css('display') == 'none' ){
			$('.b_change_analitik').slideDown();
		};
		
		$('.b_analitik_type_3').hide();
		$('.b_change_analitik').children('div').fadeOut();
		$('.b_analitik_type_3').fadeIn();
		$('body').animate({scrollTop:1350}, 300);
		
		setTimeout(function(){
			$('.b_change_analitik').css('height',($('.b_analitik_type_3').height())+'px' );
		},600);
	});
	
	$('.analitik_btn_4').click(function(){
		if ( $('.b_change_analitik').css('display') == 'none' ){
			$('.b_change_analitik').slideDown();
		};
		
		$('.b_analitik_type_4').hide();
		$('.b_change_analitik').children('div').fadeOut();
		$('.b_analitik_type_4').fadeIn();
		$('body').animate({scrollTop:1350}, 300);
		
		setTimeout(function(){
			$('.b_change_analitik').css('height',($('.b_analitik_type_4').height())+'px' );
		},600);
	});

	
	/* калькулятор аналитики */
	$('.onchannel').click(calculate_analitycs_price);
	$('.numchannel').change(calculate_analitycs_price);
	if($('.onchannel').size() > 3){
		calculate_analitycs_price();
	};
	
	
	$('form#feedcall_form').ajaxForm({ 
		success: success_request_feedcall 
	});
	
	$('form#brif-form, form.f_calculate_bot_brif').ajaxForm({
		success: function() {
			$('form#brif-form, form.f_calculate_bot_brif').find('input, textarea').removeClass('error');
		
			if (data.status == 200) {
				$('.brif_cls').click();
				document.location.href = '/spasibo-vashe-soobshhenie-otpravleno/';
			}
			else if (data.status == 422) {
				var result = $.parseJSON(data.responseText);
				var errors = [];

				$.each(result.errors, function( index, value ) {
					$.each(value, function( i, v ) {
						errors.push(v.toString());
					});
					$('#' + index.toString()).addClass('error');

				});

				alert(errors.join("\n"));
			}
			else {
				alert("В процессе отправки заявки произошла ошибка");
			}
		},
		error: function(data) {
			$('form#brif-form, form.f_calculate_bot_brif').find('input, textarea').removeClass('error');
		
			if (data.status == 200) {
				$('.brif_cls').click();
				document.location.href = '/spasibo-vashe-soobshhenie-otpravleno/';
			}
			else if (data.status == 422) {
				var result = $.parseJSON(data.responseText);
				var errors = [];

				$.each(result.errors, function( index, value ) {
					$.each(value, function( i, v ) {
						errors.push(v.toString());
					});
					$('#' + index.toString()).addClass('error');

				});

				alert(errors.join("\n"));
			}
			else {
				alert("В процессе отправки заявки произошла ошибка");
			}
		},
	});	
});

var success_request = function(data){
	if(data == "ok"){
		//alert("Заявка отправлена");
		document.location.href = '/spasibo-vashe-soobshhenie-otpravleno/';
	} else {
		alert("В процессе отправки заявки произошла ошибка");
		console.log(data);
	}
}

var success_request_feedcall = function(data){
	$('.feedcall_cls').click();
	success_request(data);
}




var calculate_analitycs_price = function(){
	var price = $('#indprice');
	var input_channels = $('#input_channels');
	
	var onchannels = $('.onchannel[type=checkbox]:checked');
	var chan_cust_on  = parseInt($('#numchannel_on').val()) || 0;
	var chan_cust_off = parseInt($('#numchannel_off').val()) || 0;
	$('#numchannel_on').val(chan_cust_on);
	$('#numchannel_off').val(chan_cust_off);
	
	price.html( (onchannels.size()+chan_cust_on)*1500 + chan_cust_off*3500 );
	
	var ch_list = [];
	$.map(onchannels, function(ch){
		ch_list.push($(ch).data('title'));
	});
	ch_list.push("другие online: " + chan_cust_on);
	ch_list.push("offline: " + chan_cust_off);
//	console.log(ch_list);

	input_channels.val( ch_list.join('; ') );
} 


function act_iplatform(){
	$('.slon_calls').css('display','block');
	$('.slon_analitycs').css('display','none');
	
	$('.eleohant_line').css('background-position','-1210px bottom');
	
	$('.icons span').addClass("icons_nonact");
	$('.iplatform span').removeClass("icons_nonact");
	
	$('.analys').css('display','none');
	$('.cost_top').css('display','block');
	
	$('.h_title_front').css('display','none');
	$('.hplatform').css('display','block');	

	$('.p_head_info').css('display','none');
	$('.infplatf').css('display','block');
	
	$('.servicelinks_main').stop().animate({'margin-left':'-960px'},700);
	$('.counttext').text('звонков учтено на сегодняшний день');
}

function act_ianalit(){
	$('.slon_calls').css('display','none');
	$('.slon_analitycs').css('display','block');
	
	$('.eleohant_line').css('background-position','-1410px bottom');
	
	$('.icons span').addClass('icons_nonact');
	$('.ianalitics span').removeClass('icons_nonact');
	
	$('.cost_top').css('display','none');
	$('.analys').css('display','block');
	
	$('.h_title_front').css('display','none');
	$('.hanalit').css('display','block');
	
	$('.p_head_info').css('display','none');
	$('.infanalit').css('display','block');
	
	$('.servicelinks_main').stop().animate({'margin-left':'0px'},700);
	
	$('.counttext').text('звонков посчитано на сегодняшний день');
};

function act_platf_in(){
	$('.eleohant_line_in').css('background-position','-600px bottom');
	$('.icons span').addClass("icons_nonact");
	$('.platf_in span').removeClass("icons_nonact");
	$('.servicelinks_main').stop().animate({'margin-left':'-960px'},700);

}

function ianalit_in(){
	$('.eleohant_line_in').css('background-position','-780px bottom');
	$('.icons span').addClass("icons_nonact");
	$('.ianalitics_in span').removeClass("icons_nonact");
	$('.servicelinks_main').stop().animate({'margin-left':'0px'},700);
};

function regionCityMenu(el) {
    return $(el).closest('.js-region-label').find('.js-regions-menu');
}

// Выбор города
$(function(){
    $('.js-region-city-link').on('click', function(e){
	var menu = regionCityMenu(this);
	menu.toggleClass('regions__menu__shown');
	$('html').one('click', function(){
	    menu.removeClass('regions__menu__shown');
	});
	e.stopPropagation();
    });
    $('.js-region-change-link').on('click', function(){
	$('.js-region-city').text($(this).data('region-city'));
	$('.js-region-phone').html($(this).find('.js-phone-alloka').clone());
	var date = new Date( new Date().getTime() + 3600*24*365*1000 );
	setCookie('visitor_region', $(this).data('region'), { expires: date.toUTCString() });
    });
});

function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
	"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function setCookie(name, value, options) {
    options = options || {};

    var expires = options.expires;

    if (typeof expires == "number" && expires) {
	var d = new Date();
	d.setTime(d.getTime() + expires*1000);
	expires = options.expires = d;
    }
    if (expires && expires.toUTCString) {
  	options.expires = expires.toUTCString();
    }

    value = encodeURIComponent(value);

    var updatedCookie = name + "=" + value;
    updatedCookie += "; path=/";
    for(var propName in options) {
	updatedCookie += "; " + propName;
	var propValue = options[propName];
	if (propValue !== true) {
	    updatedCookie += "=" + propValue;
	}
    }
    document.cookie = updatedCookie;
}
