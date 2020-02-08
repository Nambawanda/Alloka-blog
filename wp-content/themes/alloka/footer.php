<div class="b_footer">
	<div class="socialgroup">	
		<span></span>
		<a href="http://www.facebook.com/pages/Alloka/371926311480"><img src="<?php echo bloginfo('template_url'); ?>/images/fb.png" alt="" /></a>
		<a href="http://www.linkedin.com/company/alloka-media"><img src="<?php echo bloginfo('template_url'); ?>/images/in.png" alt="" /></a>
	</div>
  <div class="region-list-footer">
    <?php include 'region_phone.php'; ?>
  </div>
	<!-- <div class="fmail"><a href="mailto:request@alloka.ru">request@alloka.ru</a></div> -->
	<a class="support_link" href="http://feedback.alloka.ru/" title="Техническая поддержка, ответы на вопросы">Задать вопрос</a>
	<a class="support_link" href="http://help.alloka.ru/">Справочный центр Аллоки</a>
</div>

<?php wp_footer(); ?>

<?php /*
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter12905731 = new Ya.Metrika({id:12905731, enableAll: true, webvisor:true});
        } catch(e) {}
    });
    
    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/12905731" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter6376351 = new Ya.Metrika({id:6376351,
                    clickmap:true,
                    trackLinks:true});
        }
        catch(e) { }
    });
})(window, 'yandex_metrika_callbacks');
</script></div>
<script src="//mc.yandex.ru/metrika/watch_visor.js" type="text/javascript" defer></script>
<noscript><div><img src="//mc.yandex.ru/watch/6376351" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
*/ ?>

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '3sszrjTwKC';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->

<script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
    var js = d.createElement(s); js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
})(window, document, 'script', 'cloud.roistat.com', '11015');
</script>
