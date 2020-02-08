<div class="b_blog_search">
	<div class="b_blog_search_top"></div>
	
	<form method="get" id="searchform" class="f_blog_src" action="<?php bloginfo('home'); ?>" />
		<div id="search">
			<input class="input_blog" type="text" onfocus="if (this.value == 'Поиск...') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Поиск...'; this.style.color='#b2b2b2'}" value="Поиск..." name="s" id="s" />
			<?php $catlist = "3";?>
			<input type="hidden" name="cat" value="<?php echo $catlist ?>" />
			<input name="" type="submit" value="Искать" class="btn" />
		</div>
	</form>
	
	<div class="b_blog_search_bot"></div>
</div>