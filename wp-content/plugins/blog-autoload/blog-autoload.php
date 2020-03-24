<?php
/**
 * Plugin Name: blog-autoload
 */
/**
 * Инициализация нужных js переменные для backend
 */
function js_event_plugin_variables()
{
	$variables = array(
		'ajax_url' => admin_url('admin-ajax.php'),
	);

	echo '<script type="text/javascript">window.plugin_name = ' . json_encode($variables) . ';</script>';

}

add_action('admin_head', 'js_event_plugin_variables');


/**
 * Инициализация нужных js переменные для frontend
 */
function js_test_plugin_front_variables()
{
	$variables = array(
		'ajax_url' => admin_url('admin-ajax.php'),
	);

	echo '<script type="text/javascript">window.blog_autoload = ' . json_encode($variables) . ';</script>';

}

add_action('wp_head', 'js_test_plugin_front_variables');

/**
 * Обработка ajax
 */
function get_posts_callback()
{
	$first_page_count = ($_REQUEST['tag'])? 6 : 7;
	switch (get_locale()){
		case "tr_TR": {
			$language = 'tr';
			$category = 244;
			break;
		}
		case "en_US":{
			$language = 'en';
			$category = 242;
			break;
		}
		default:{
			$language = 'ru';
			$category = 3;
		}
	}
	$params = array('numberposts' => 12, 'lang' => $language,'category' => $category, 'offset' => ($_REQUEST['page'] * 12) + $first_page_count);
	if($_REQUEST['tag']){
		$params['tag'] = $_REQUEST['tag'];
	}
	$posts = get_posts($params);
	$data = [];

	foreach( $posts as $post ) {
		$tmp['name'] = $post->post_title;
		$tmp['thumbnail'] = get_the_post_thumbnail_url($post->ID);
		$tmp["post_tags"] = wp_get_post_terms($post->ID, 'post_tag',array('orderby' => 'count', 'order'   => 'DESC'));
		$tmp['date'] = get_the_date('j F Y', $post->ID);
		$tmp['link'] = get_permalink($post->ID);
		$data[] = $tmp;
	}
	wp_send_json_success(json_encode(array('status' => 'ok', 'request_vars' => $_REQUEST, 'data' => $data, 'post' => $posts)));

	// Если ничего не надо выводить
	wp_die();
}

add_action('wp_ajax_get_posts', 'get_posts_callback'); // Для авторизованных пользователей
add_action('wp_ajax_nopriv_get_posts', 'get_posts_callback'); // Для не авторизованных

function send_mail_callback(){
	$email = $_REQUEST['email'];
	$subject = "Новая подписка на новости";
	$message = "<b>$email</b> только что подписался(ась) на новостную рассылку, с этим надо что-то сделать!";
	$headers = 'From: blog@alloka.ru' . "\r\n";
	$headers .= 'X-Mailer: PHP/' . phpversion(). "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	if (mail( 'support@alloka.ru', $subject, $message, $headers)){
		wp_send_json_success(json_encode(array('status' => 'ok')));
		wp_die();
	}else{
		wp_send_json_success(json_encode(array('status' => 'fail')));
		wp_die();
	}
}

add_action('wp_ajax_send_mail', 'send_mail_callback'); // Для авторизованных пользователей
add_action('wp_ajax_nopriv_send_mail', 'send_mail_callback'); // Для не авторизованных