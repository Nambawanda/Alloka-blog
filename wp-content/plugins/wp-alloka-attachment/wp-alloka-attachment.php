<?php
/*
Plugin Name: Alloka Attachment
Description: Plugin for downloading attachents with request email adress. Use [ALLOKA-ATTACHMENT id=<attachment_id>] into your Post.
Author: Dmitry
Author URI: http://alloka.ru
Version: 0.1
*/


/*

CREATE TABLE IF NOT EXISTS `wp_alloka_attachments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `attachment_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 
 */

$aa_version = '0.1';
$alloka_attachment = new AllokaAttachment();


class AllokaAttachment {

	/**
	 * Constructor
	 */	
	function AllokaAttachment() {
		add_shortcode('ALLOKA-ATTACHMENT', array( &$this, 'shortcode'));
	}
	
	
	/**
	 * parses parameters
	 *
	 * @param string $atts parameters
	 */
	function shortcode( $atts ) {
		// e.g. [ALLOKA-ATTACHMENT id=<attachment_id>]
		return $this->showForm($atts['id']);
	}
	
	
	/**
	 * creates tcf code
	 *
	 * @return string form code
	 */
	function showForm($id) {
		
		if ( isset($_POST['aaf_email']) && isset($_POST['aaf_file']) ) {
			$link = $this->sendFile($_POST['aaf_file'], $_POST['aaf_email']);
			SetCookie('attachment_email', $_POST['aaf_email']);
			$form = '<p class="">Чтобы скачать файл, нажмите на ссылку:<br/> 
					<a target="_blank" href="'.$link.'">'.$link.'</a>.</p>';
			return $form;
		} else {
			if(isset($_COOKIE['attachment_email'])){
				$form = "<form action='#' method='post'>
					  <div class='clearfix'>
					    <div class='input'>
					      <input id='wf-email' name='aaf_email' type='hidden' value='".$_COOKIE['attachment_email']."' />
					      <input id='wf-file'  name='aaf_file'  type='hidden' value='".$id."' />
					    </div>
					  </div>
					  <div class='clearfix'>
					    <div class='input'>
					      <input class='btn large' type='submit' value='Скачать бесплатно'>
					    </div>
					  </div>
					</form>";
			} else {
				$form = "<form action='#' method='post'>
					  <div class='clearfix'>
					    <label for='wf-email'>Для загрузки файла введите свой e-mail:</label>
					    <div class='input'>
					      <input class='xlarge' id='wf-email' maxlength='250' name='aaf_email' placeholder='e-mail' required='required' type='email'>
					      <!--span class='help-block'>конфиденциальная информация, нигде не отображается</span-->
					      <input id='wf-file' name='aaf_file' type='hidden' value='".$id."'/>
					    </div>
					  </div>
					  <div class='clearfix'>
					    <div class='input'>
					      <input class='btn large' type='submit' value='Скачать бесплатно'>
					    </div>
					  </div>
					</form>";
			}
			return $form;
		}
	}
	
	
	/**
	 * send file
	 * 
	 * @return string Link
	 */
	function sendFile($id, $email) {
		global $wpdb;
		//$link = get_attachment_link($id);
		$link = wp_get_attachment_url($id);
		$rows_affected = $wpdb->insert('wp_alloka_attachments', array('attachment_id'=>$id, 'email'=>$email));
		return $link;
	}
	

} // AllokaAttachment Class

?>