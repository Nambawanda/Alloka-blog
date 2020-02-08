$(document).ready(function() {
	
	$('.inpost-request-cls').click(function(){
		var form = $(this).parent('.b_inpost_request');
		if ( form.css('top') == '40px' ){
			form.animate({'top':'70px'},200);
			setTimeout(function(){form.animate({'top':'-840px'},400);},200);
			setTimeout(function(){form.css({'display':'none'},400);},600);			
		} else {
			form.animate({'bottom':'70px'},200);
			setTimeout(function(){form.animate({'bottom':'-840px'},400);},200);
			setTimeout(function(){form.css({'display':'none'},400);},600);	
		};
	});
	
    $('.inpost-request-button').click(function(){
    	var btn_id = $(this).attr('id');
    	var form = $('#form-'+btn_id);
    	
    	form.children('.request-success').hide();
		form.children('.request-failure').hide();
		form.children('form').show();
		
    	if ( form.css('bottom') == '40px' ){
			form.css('display','none');
		};
		
		if ( form.css('display') == 'none' ){
			form.css({'display':'block','top':'-840px'});
			form.animate({'top':'70px'},400);
			setTimeout(function(){form.animate({'top':'30px'},200);},400);
			setTimeout(function(){form.animate({'top':'40px'},100);},600);
		} else {
			form.animate({'top':'70px'},200);
			setTimeout(function(){form.animate({'top':'-840px'},400);},200);
			setTimeout(function(){form.css({'display':'none'},400);},600);
		};
    	
    	return false;
    });
    
    $('form.request_form_inpost').ajaxForm({
        success: success_request_inpost_form
    });
	
});

var success_request_inpost_form = function(data){
	$('.b_inpost_request form').hide();
	if(data == "ok"){
		$('.b_inpost_request .request-success').show();
		$('.b_inpost_request .request-failure').hide();
	} else {
		$('.b_inpost_request .request-success').hide();
		$('.b_inpost_request .request-failure').show();
	}
}