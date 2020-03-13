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
	$params = $_REQUEST; // Тут передаются параметры
	$first_page_count = ($_REQUEST['tag'])? 6 : 7;
	$params = array('numberposts' => 12, 'category' => 3, 'offset' => ($_REQUEST['page'] * 12) + $first_page_count);
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