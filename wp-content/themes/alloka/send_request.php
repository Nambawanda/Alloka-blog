<?php
	$wp_root = $_SERVER[DOCUMENT_ROOT];
	require_once($wp_root.'/wp-load.php');
	require_once($wp_root.'/wp-includes/wp-db.php');

global $wpdb;

//$mail_to = 'akimova@alloka.ru, ys@alloka.ru, info@alloka.ru, webmaster@alloka.ru';
$mail_to = 'admin@alloka.ru';

if( isset($_POST['mode']) && ($_POST['mode'] == 'debug') ){
	$mail_to = 'webmaster@alloka.ru';
}

$blocks = array(
	
	'brief' => array(
		'title'  => 'Бриф',
		'blocks' => array(
			array(
				'title'  => '',
				'fields' => array(
					'company' => array('title'=>'Название компании'),
					'site'    => array('title'=>'Адрес сайта'),
					'cname'   => array('title'=>'Контактное лицо'),
					'kontakt' => array('title'=>'Email для связи'),
					'uslugi'  => array('title'=>'Продвигаемые продукты/услуги'),
					'regions' => array('title'=>'Регионы клиентов'),
					'primech' => array('title'=>'Примечания и пожелания')
				)
			)
		)
	),
	
	'feedcall' => array(
		'title'  => 'Обратный звонок',
		'blocks' => array(
			array(
				'title'  => '',
				'fields' => array(
					'phone' => array('title'=>'Телефон'),
					'time'  => array('title'=>'Удобное время звонка')
				)
			)
		)
	),
	
	'calls' => array(
		'title'  => 'Заявка по звонкам',
		'blocks' => array(
			array(
				'title'  => 'Пакет',
				'fields' => array(
					'packet_name'        => array('title'=>'Название пакета')
				)
			),
			array(
				'title'  => 'Калькулятор',
				'fields' => array(
					'calc_region_name'   => array('title'=>'Регион'),
					'calc_category_name' => array('title'=>'Категория'),
					'calc_product_name'  => array('title'=>'Продукт'),
					'calc_price'         => array('title'=>'Цена')
				)
			),
			array(
				'title'  => 'Выбранные каналы',
				'fields' => array(
					'internet_kanal'  => array('title'=>'Интернет', 'type'=>'checkbox'),
					'mobile_kanal'    => array('title'=>'Мобильная реклама', 'type'=>'checkbox'),
					'radio_kanal'     => array('title'=>'Радио', 'type'=>'checkbox'),
					'transport_kanal' => array('title'=>'Транспорт', 'type'=>'checkbox'),
					'your_kanal'      => array('title'=>'Предложенные нестандартые каналы')
				),
				'conditions' => array('packet' => 'individual')
			),
			array(
				'title'  => 'Бриф',
				'fields' => array(
					'company'   => array('title'=>'Название компании или адрес сайта'),
					'direction' => array('title'=>'Продвигаемые продукты'),
					'person'    => array('title'=>'Контактное лицо (ФИО, должность)'),
					'region'    => array('title'=>'Регионы клиентов'),
					'phone'     => array('title'=>'Телефон'),
					'info'      => array('title'=>'Примечания'),
					'email'     => array('title'=>'Email'),
					'subscribe' => array('title'=>'Подписка на новости', 'type'=>'checkbox')
				)
			)
		)
	),
	
	'analitika' => array(
		'title'  => 'Заявка по аналитике',
		'blocks' => array(
			array(
				'title'  => 'Тариф',
				'fields' => array(
					'packet_name' => array('title'=>'Название тарифа')
				)
			),
			array(
				'title'  => 'Бриф',
				'fields' => array(
					'company'   => array('title'=>'Название компании'),
					'direction' => array('title'=>'Сайт (если есть)'),
					'person'    => array('title'=>'Контактное лицо'),
					'phone'     => array('title'=>'Телефон'),
					'email'     => array('title'=>'Email'),
					'region'    => array('title'=>'Регионы клиентов'),
					'subscribe' => array('title'=>'Подписка на новости', 'type'=>'checkbox')
				)
			),
			array(
				'title'  => 'Каналы',
				'fields' => array(
					'channels' => array('title'=>'Каналы')
				),
				'conditions' => array('packet' => 'individual')
			)
		)
	),
	
	'inpost' => array(
		'title'  => 'Alloka Leads',
		'blocks' => array(
			array(
				'title'  => '',
				'fields' => array(
					'title'    => array('title'=>'Продукт'),
					'fullname' => array('title'=>'ФИО'),
					'phone'    => array('title'=>'Телефон'),
					'email'    => array('title'=>'email')
				)
			)
		)
	),
	
);

//var_dump($_POST);

if( isset($_POST['request_type']) && isset($blocks[$_POST['request_type']]) ){
	header('HTTP/1.1 200 OK');
	
	$config = $blocks[$_POST['request_type']];
	$body = '<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>';
	$body .= '<h1>'.$config['title'].'</h1>';
	foreach($config['blocks'] as $block){
		$is_include = true;
		if(isset($block['conditions'])){
			foreach($block['conditions'] as $key => $value ){
				if(!isset($_POST[$key]) || ($_POST[$key] != $value)){
					$is_include = false;
				}
			}
		}
		if($is_include){
			$body .= '<h3>'.$block['title'].'</h3>';
			foreach($block['fields'] as $key => $field_data){
				if(isset($field_data['type']) && ($field_data['type'] == 'checkbox')){
					$_POST[$key] ? $t = "Да" : $t = "Нет";
					$body .= '<p><b>'.$field_data['title'].':</b> '.$t.'</p>';
				} else {
					$body .= '<p><b>'.$field_data['title'].':</b><br/>'.htmlspecialchars($_POST[$key]).'</p>';
				}
			}
		}
	}
	
	$body .= '</body></html>';
	
	date_default_timezone_set('Europe/Moscow');
	$subject = $config['title'].' - '.date("d.m.Y H:i");
	
	$headers = array("Content-Type: text/html");
	$h = implode("\r\n",$headers) . "\r\n";

	$res = mail($mail_to, $subject, $body, $h);

	//if($res){
	//	echo "ok";
	//} else {
		echo "error";
	//}
	
} else {
	header("HTTP/1.1 401 Access denied");
	echo "401 Access Denied";
}
?>