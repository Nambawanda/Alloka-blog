<!-- feedcall -->
<div class="b_feedcall">
	<div class="feedcall_cls"></div>
	<h2>Обратный звонок</h2>
	<p class="feedcall_info">Оставьте свой номер телефона и удобное время для звонка, и мы вам обязательно позвоним</p>
	<form id="feedcall_form" class="b_feedcall_inputs" action="<?= bloginfo('template_url'); ?>/send_request.php" method="post">
		<input name="request_type" type="hidden" value="feedcall" style="display:none;" />
		<input name="phone" type="text" class="fd_input" onfocus="if (this.value == 'Телефон') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Телефон'; this.style.color='#b2b2b2'}" value="Телефон"/>
		<input name="time" type="text" class="fd_input" onfocus="if (this.value == 'Удобное время звонка') {this.value = ''; this.style.color='#000'}" onblur="if (this.value == '') {this.value = 'Удобное время звонка'; this.style.color='#b2b2b2'}" value="Удобное время звонка"/>
		<input name="requesttype" type="hidden" value="" class="requesttype" />
		<input type="submit" class="fd_btn" value="Позвоните мне" />
	</form>
</div>