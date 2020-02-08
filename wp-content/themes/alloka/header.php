<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( '%s страница'), max( $paged, $page ) ); ?>
</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

<script src='//ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js'></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/slides.min.jquery.js"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/jquery.form.js"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/jquery.placeholder.js"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/alloka.js"></script>
<link href='//fonts.googleapis.com/css?family=Ubuntu:300,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link type="text/css" href="<?php echo bloginfo('template_url'); ?>/style.css?2" rel="stylesheet" />

<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '1482365732003539']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1482365732003539&amp;ev=NoScript" /></noscript>

<?php wp_head(); ?>

<!-- Разместите этот тег в теге head или непосредственно перед закрывающим тегом body -->
<script type="text/javascript" src="//apis.google.com/js/plusone.js"></script>

<!-- Put this script tag to the <head> of your page -->
<script type="text/javascript" src="//vk.com/js/api/openapi.js"></script>
<script type="text/javascript">
  VK.init({apiId: 3586988, onlyWidgets: true});
</script>

<?php /*
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-12960304-1']);
  _gaq.push(['_setDomainName', 'alloka.ru']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
*/?>

<?php
// Получаем IP-адрес посетителя вашего сайта
$ip = $_SERVER['REMOTE_ADDR'];

// Составляем URL запроса к Alloka API
$url = "https://api.alloka.ru/v1/geo/ip/{$ip}"; 

// Указываем ваш API-ключ авторизации в Alloka API
$api_key = "LcyGA2Gs49fTNkjc7yLu9eVmpnRo7MT2";

// Инициализация запроса
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 1);

// Авторизация
curl_setopt($ch, CURLOPT_USERPWD, $api_key . ":");

// Производим запрос и закрываем соединение
$response = curl_exec($ch);
curl_close($ch);

define('REGION_DEFAULT', 'MOSCOW CITY'); // shared with footer

// shared with footer
$RegionData = array(
  'Россия'   =>           '[GROUP]',
  'MOSCOW CITY' =>           array(
    'oid' => '27d2610d26bdbfa1',
    'phone' => '+7 (499) 649-60-08',
    'city' => 'Москва'
  ),
  'SAINT PETERSBURG CITY' => array(
    'oid' => '0a859b1896bf83d9',
    'phone' => '+7 (499) 649-60-08',
    'city' => 'Санкт-Петербург'
  ),
  'NIZHEGOROD'  =>           array(
    'oid' => '74fe981decbdcc28',
    'phone' => '+7 (499) 649-60-08',
    'city' => 'Нижний Новгород'
  ),
  'SVERDLOVSK'  =>           array(
    'oid' => '75b12d90c4b65382',
    'phone' => '+7 (499) 649-60-08',
    'city' => 'Екатеринбург'
  ),
  'NOVOSIBIRSK' =>           array(
    'oid' => '303fb1960b75a24a',
    'phone' => '+7 (499) 649-60-08',
    'city' => 'Новосибирск'
  ),
  'SAMARA'      =>           array(
    'oid' => '16a8d1a1dffc5ae8',
    'phone' => '+7 (499) 649-60-08',
    'city' => 'Самара'
  ),
  'TATARSTAN'   =>           array(
    'oid' => 'ceb5770d55476dc3',
    'phone' => '+7 (499) 649-60-08',
    'city' => 'Казань'
  ),
  'Казахстан'   =>           '[GROUP]',
  'ALMATY CITY' =>           array(
    'oid' => 'ca3aad71680782ab',
    'phone' => '+7 (499) 649-60-08',
    'city' => 'Алматы',
    'country' => 'KAZAKHSTAN'
  ),
);

// Заполним страны конвертируемые в регионы
$CountryData = array();

foreach ($RegionData as $region => $data) {
  if (is_array($data) && array_key_exists('country', $data)) {
    $CountryData[$data['country']] = $region;
  }
}

// В куке хранится последний выранный регион, $visitor_region глобальная переменная
$visitor_region = $_COOKIE['visitor_region'];
$visitor_country = NULL;

// Определение региона по данным: сначала ищем регион в списке регионов,
// затем, если не находим, ищем страну в списке стран
function getSuitableRegion() {
  global $RegionData, $CountryData;
  global $visitor_region, $visitor_country;
  if ($visitor_region && in_array($visitor_region, array_keys($RegionData))) {
    return $visitor_region;
  } else if ($visitor_country && in_array($visitor_country, array_keys($CountryData))) {
    return $countryData[$visitor_country];
  } else {
    NULL;
  }
}

// Если регион еще не сохранялся в куки, берем данные о местонахождении из апи
if (!getSuitableRegion()) {
// Обработка ответа от Alloka API
  if ($response != null)
    {
      $json = @json_decode($response);

      if ($json != null && property_exists($json, 'city')) {
        $visitor_region = $json->region;
        $visitor_country = $json->country;
      }
    }
}

// Если регион определяется, записываем его обратно в глобальную переменную,
// иначе записываем регион по умолчанию
if (getSuitableRegion()) {
  $visitor_region = getSuitableRegion();
} else {
  $visitor_region = REGION_DEFAULT;
}

?>

<script type="text/javascript">
    var _alloka = {
        objects: {
          <?php foreach ($RegionData as $region_data) { ?>
            <?php if ($region_data != '[GROUP]') { ?>

              // <?php echo $region_data['city']; ?>

              '<?php echo $region_data['oid']; ?>': {
                  block_class: 'phone_alloka_<?php echo $region_data['oid'] ?>',
                  roistat_alloka_oid: '<?php echo $region_data['oid'] ?>'
              },
            <?php } ?>
          <?php } ?>
        },
        trackable_source_types: ['typein', 'referrer', 'utm'],
        calldron_alloka_oid: '27d2610d26bdbfa1', 
        use_geo: true,
        options: {
            timerDuration: 30,
            verticalAlign: 'bottom',
            horizontalAlign: 'right',
            verticalMargin: 71,
            horizontalMargin: 30
        }
    };
</script>
<script src="//analytics.alloka.ru/integrations/roistat.js" type="text/javascript"></script>
<script src="//analytics.alloka.ru/v4/alloka.js" type="text/javascript"></script>
<script src="https://analytics.alloka.ru/integrations/catch_form.js" type="text/javascript"></script>
  <script src="https://analytics.alloka.ru/integrations/calldron.js" type="text/javascript"></script>
  <script src="https://analytics.alloka.ru/integrations/calldron/widget.js" type="text/javascript"></script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter6376351 = new Ya.Metrika({
                    id:6376351,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/6376351" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script>
  function metrika(goal){
    console.log("goal")
    console.log(goal)
    yaCounter6376351.reachGoal(goal);
  };
</script>
<!-- <script src="/alloka_debug.js" type="text/javascript"></script> -->

<!-- <script src="https://cdn.smooch.io/smooch.min.js"></script>
<script>
Smooch.init({ appToken: '7njb5jujgfooxs541uoebi36e' });
</script>-->

<!-- <script src="data:text/javascript;charset=utf-8;base64,ZnVuY3Rpb24gX3dqZyhpLHUpewpzZXRUaW1lb3V0KGZ1bmN0aW9uKCl7IHZhciBkID0gZG9jdW1lbnQ7IGYgPSBkLmdldEVsZW1lbnRzQnlUYWdOYW1lKCdzY3JpcHQnKVswXTsKcyA9IGQuY3JlYXRlRWxlbWVudCgnc2NyaXB0Jyk7IGggPSBlc2NhcGUoZC5yZWZlcnJlcik7IHMudHlwZSA9ICd0ZXh0L2phdmFzY3JpcHQnOyAKcy5hc3luYyA9IHRydWU7IHMuc3JjID0gdSsiP2lkPSIraSsiJmg9IitoKyImcj0iK01hdGgucmFuZG9tKCk7IApmLnBhcmVudE5vZGUuaW5zZXJ0QmVmb3JlKHMsIGYpOyB9LCAxKTt9Cl93amcoJzJhYzdlZmQ0MWQ4Y2Q5OTgzMTM3NTM0JywnLy9zbycrJ2NnYXQnKydlLnJ1L3N0JysncmFjay8nKTsK" async></script> -->

<!-- CarrotQuest BEGIN -->
<script type="text/javascript">
 (function(){
   if (typeof carrotquest === 'undefined') {
     var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
     s.src = '//cdn.carrotquest.io/api.min.js';
     var x = document.getElementsByTagName('head')[0]; x.appendChild(s);

     carrotquest = {}; window.carrotquestasync = []; carrotquest.settings = {};
     m = ['connect', 'track', 'identify', 'auth', 'open', 'onReady', 'addCallback', 'removeCallback', 'trackMessageInteraction'];
     function Build(name, args){return function(){window.carrotquestasync.push(name, arguments);} }
     for (var i = 0; i < m.length; i++) carrotquest[m[i]] = Build(m[i]);
   }
 })();
carrotquest.connect('2184-792a0735439541a2020b74190c3');
</script>
<!-- CarrotQuest END -->

<script type="text/javascript">
(function() {
    var alloka_oid = '27d2610d26bdbfa1';
    var delay = 500, repetitions = 20, i = 0;
    var interval = setInterval(function() {
      var carrot_uid = allokaGetCookie('carrotquest_uid');
      if (allokaGetCookie('aa_v4_number_' + alloka_oid) && carrot_uid) {
        allokaSendCustomData(alloka_oid, {'carrot_uid': carrot_uid});
        return clearInterval(interval);
      }
      if (++i == repetitions) {
        return clearInterval(interval);
      }
    }, delay);
})();
</script>
