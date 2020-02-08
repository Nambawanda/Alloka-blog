$(document).ready(function() {
	
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
	
	$('.fcall_bot').click(function(){
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
	
	
	
	/* кнопка онлафн брифа */
	$('.openbrif').click(function(){
		if ( $('.b_brif').css('bottom') != '0' ){
			$('.b_brif').animate({'bottom':'30px'},400);
			setTimeout(function(){$('.b_brif').animate({'bottom':'-10px'},200);},400);
			setTimeout(function(){$('.b_brif').animate({'bottom':'0'},100);},600);
		} else {
			$('.b_brif').animate({'bottom':'30px'},400);
			setTimeout(function(){$('.b_brif').animate({'bottom':'-930px'},400);},200);
		};
	});
	
	$('.brif_cls').click(function(){
		$('.b_brif').animate({'bottom':'100px'},300);
		setTimeout(function(){$('.b_brif').animate({'bottom':'-930px'},500);},300);
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
	
	$('.analys').hover(function(){
		$(this).stop().animate({'height':'73px','bottom':'-73px','line-height':'55px'},100);	
	},function(){
		$(this).stop().animate({'height':'69px','bottom':'-69px','line-height':'50px'},100);	
	});
	
	/* меняем слонов */
 	$('.icalls').click(function(){
		$('.slon_calls').css('display','block');
		$('.slon_analitycs').css('display','none');
		$('.eleohant_line').css('background-position','-230px bottom');
		$('.ianalitics span').addClass("icons_nonact");
		$('.icalls span').removeClass("icons_nonact");
		$('.analys').css('display','none');
		$('.cost').css('display','block');
		$('.servicelinks_main').stop().animate({'margin-left':'-1920px'},700);
	});

	$('.ianalitics').click(function(){
		$('.slon_calls').css('display','none');
		$('.slon_analitycs').css('display','block');
		$('.eleohant_line').css('background-position','-40px bottom');
		$('.ianalitics span').removeClass('icons_nonact');
		$('.icalls span').addClass('icons_nonact');
		$('.cost').css('display','none');
		$('.analys').css('display','block');
		$('.servicelinks_main').stop().animate({'margin-left':'-960px'},700);
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
});