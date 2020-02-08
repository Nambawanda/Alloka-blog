<?php /*для миниатюр*/
if ( function_exists('add_theme_support') ) {
    add_theme_support('post-thumbnails');
}

/* убрать верхнюю панель у пользователей */
add_filter( 'show_admin_bar', '__return_false' );

/* для виждетов */
if ( function_exists('register_sidebar')){
    /* register_sidebars();  */ 
	register_sidebar(array('name'=>'rightblog'));
	register_sidebar(array('name'=>'mailchimp'));  
}


 
/********************************************************************
Theme Control Panel
********************************************************************/
class ControlPanel {
	/********************************************************
	Array for Default Options
	********************************************************/
	var $default_settings = Array(
	'headtext' => 'Аллока',
	'fphone' => '<span>(499)</span> 400-24-91',
	'headtextcall' => '',
	'headtextan' => '',
	'headtextplatf' => '',

	);
	var $options;
	/********************************************************
	Initiate new control panel function
	********************************************************/
	function ControlPanel() {
    	add_action('admin_menu', array(&$this, 'add_menu'));
	if (!is_array(get_option('themadmin')))
	add_option('themadmin', $this->default_settings);
	$this->options = get_option('themadmin');
	}
	/********************************************************
	Create a theme settings page to edit theme settings and put its css
	********************************************************/
	function add_menu() {
	add_theme_page('WP Theme Options', 'Опции темы', 8, "themadmin", array(&$this, 'optionsmenu'));
	}
	/********************************************************
	The options page in control panel. Saving and editing goes here
	********************************************************/
	function optionsmenu() {
	if ($_POST['ss_action'] == 'save') {
	$this->options["headtext"] = $_POST['cp_headtext'];
	$this->options["fphone"] = $_POST['cp_fphone'];
	$this->options["headtextcall"] = $_POST['cp_headtextcall'];
	$this->options["headtextan"] = $_POST['cp_headtextan'];
	$this->options["headtextplatf"] = $_POST['cp_headtextplatf'];
	update_option('themadmin', $this->options);
	echo '<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204); width: 400px; margin-left: 17px; margin-top: 17px;"><p>Ваши изменения <strong>сохранены</strong>.</p></div>';
	}
	echo '<form action="" method="post" class="themeform">';
	echo '<input type="hidden" id="ss_action" name="ss_action" value="save">';
	
	print '
	<div class="cptab"><br />
	<b>Настройки темы</b>
	<br />
	<p>Слоган:<br /><textarea style="width:400px;height:75px;" name="cp_headtext" id="cp_headtext">'.stripslashes($this->options["headtext"]).'</textarea></p>
	<p>Телефон в футере:<br /><textarea style="width:400px;height:75px;" name="cp_fphone" id="cp_fphone">'.stripslashes($this->options["fphone"]).'</textarea></p>
	<p>Верхний текст звонки:<br /><textarea style="width:400px;height:150px;" name="cp_headtextcall" id="cp_headtextcall">'.stripslashes($this->options["headtextcall"]).'</textarea></p>
	<p>Верхний текст аналитика:<br /><textarea style="width:400px;height:150px;" name="cp_headtextan" id="cp_headtextan">'.stripslashes($this->options["headtextan"]).'</textarea></p>
	<p>Верхний текст платформа:<br /><textarea style="width:400px;height:150px;" name="cp_headtextplatf" id="cp_headtextplatf">'.stripslashes($this->options["headtextplatf"]).'</textarea></p>
	</div>
	<br />
	';
	
	echo '<input type="submit" value="Сохранить" name="cp_save" class="dochanges" />';
	echo '</form>';
	}
/* ended cpanel class */
}
$cpanel = new ControlPanel();
$mytheme = get_option('themadmin');

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $tempcontent	= strip_tags (get_the_content());
  $content = explode(' ', $tempcontent, $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}


function title($f) {
	$strtitle = get_the_title();
	if ($f==1) {
		if (strlen($strtitle)>5){
			$title = explode(' ', $strtitle);
			$titleout = $title[0];
		}
		else{
			$titleout = $strtitle;
		}
	  }
	  else {
		if (strlen($strtitle)>5){
			$title = trim ($strtitle);
			$titleout = trim (strstr($title, ' '));
		}
		else {
		$titleout = '';
		}
	  }
	return $titleout;
}

//Похожие записи в WordPress без плагинов (тег)
function digatalart_tag_rel_post(){
    global $post;
    $tags = wp_get_post_tags($post->ID);
    if($tags){
        $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
        $args = array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'showposts'=>5, // Количество выводимых похожих записей.
            'caller_get_posts'=>1
        );
        $my_query = new wp_query($args);
        if($my_query->have_posts()){
            echo '<ul id="relPost">';
            while($my_query->have_posts()){
                $my_query->the_post();
            ?>
                <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
            <?php
            }
            echo '</ul>';
        }
        else{
            echo '<p>Другие записи по теме отсутствуют.</p>';
        }
        wp_reset_postdata();
    }
}

?>