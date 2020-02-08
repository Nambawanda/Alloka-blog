<?php
/*
Plugin Name: Alloka in post request form
Description: Added request form into post.
Using: [ALLOKA-REQUEST-FORM name=""]
Author: Dmitry
Author URI: http://alloka.ru
Version: 0.1
*/


$alloka_post_form = new AllokaInPostForm();

class AllokaInPostForm {

	/**
	 * Constructor
	 */	
	function AllokaInPostForm() {
		add_shortcode('ALLOKA-REQUEST-FORM', array( &$this, 'shortcode'));
	}
	
	
	/**
	 * parses parameters
	 *
	 * @param string $atts parameters
	 */
	function shortcode( $atts ) {
		// e.g. [ALLOKA-REQUEST-FORM name=""]
		return $this->showForm($atts['name']);
	}
	
	
	/**
	 * creates form code
	 *
	 * @return string form code
	 */
	function showForm($title) {
			
		$id = sha1($title);
		$form = '
			<div id="form-'.$id.'" class="b_inpost_request" style="display:none;">
				<div class="inpost-request-cls"></div>
				
				<h2>&nbsp;</h2>
				<form class="request_form_inpost b_feedcall_inputs" action="/wp-content/themes/alloka/send_request.php" method="post">
				  <input name="title" type="hidden" style="display:none;" value="'.$title.'"/>
				  <input name="request_type" type="hidden" value="inpost" style="display:none;" />
				  
				  <div class="clearfix">
				    <label for="ipf-name">ФИО <span class="required">*</span></label>
				    <input class="xlarge popup_input" id="ipf-name" maxlength="250" name="fullname" required="required" type="text" />
				  </div>
				  
				  <div class="clearfix">
				    <label for="ipf-phone">Телефон <span class="required">*</span></label>
				    <input class="xlarge popup_input" id="ipf-phone" maxlength="50" name="phone" required="required" type="text">
				  </div>
				  
				  <div class="clearfix">
				    <label for="ipf-email">E-mail <span class="required">*</span></label>
				    <input class="xlarge popup_input" id="ipf-email" maxlength="250" name="email" required="required" type="email">
				  </div>
				  
				  <div class="clearfix">
				    <input class="fd_btn btn large" type="submit" value="Отправить">
				  </div>
				</form>
				
				<div class="request-message request-success" style="display:none;">
					<h2>Ваша заявка отправлена.<br/> Менеджер свяжется с вами в ближайшее время.</h2>
				</div>
				<div class="request-message request-failure" style="display:none;">
					<h2>Во время отправки заявки<br/> произошла ошибка.</h2>
				</div>
			</div>
			
			<input id="'.$id.'" class="btn large inpost-request-button" type="button" value="Заказать">';
			
		return $form;
	}
	
}

?>