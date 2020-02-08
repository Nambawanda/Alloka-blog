<div class="b_block_calc_brif">
	<div class="shaddow_top"></div>
	<div class="b_band  b_calc_brif_band">
		<?php
		if (is_page('analitika-kalkulyator')) {
			echo '<h1>Отправьте заявку</h1><br /><p style="text-align:center;">и мы бесплатно предоставим вам пробный период на тарифе PRO</p>';
		}
		else {
			echo '<h1>On-line бриф</h1>';
		}
		?>
		
		<form method="post" action="https://analytics.alloka.ru/api/request/brief" class="request_form f_calculate_bot_brif">
			<input    id="company_name"          name="brief[company_name]" class="calc_bot_input" type="text" placeholder="Название компании" />
			<input    id="products_and_services" name="brief[products_and_services]" class="calc_bot_input" type="text" placeholder="Продвигаемые продукты/услуги" />
			<input    id="site_url"              name="brief[site_url]" class="calc_bot_input" type="text" placeholder="Адрес сайта" />
			<input    id="regions"               name="brief[regions]" class="calc_bot_input" type="text" placeholder="Регионы клиентов" />
			<textarea id="regions"               name="brief[notes]" class="calc_bot_text" rows="3" cols="30" placeholder="Примечания и пожелания"></textarea>
			<input    id="contact_name"          name="brief[contact_name]" class="calc_bot_input" type="text" placeholder="* Контактное лицо" />
			<input    id="contact_email"         name="brief[contact_email]" class="calc_bot_input" type="text" placeholder="* Email для связи"  />
			<input    id="brif_btn"              class="f_calc_btn calc_bot_brif" type="submit" placeholder="Жду предложения" value="Отправить" />
		</form>

	</div>
</div>
