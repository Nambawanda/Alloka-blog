<div class="b_brif">
	<div class="brif_cls"></div>
	<h2>On-line бриф</h2>
	<p class="brif_info">Заполните поля формы, и мы предоставим вам тестовый доступ</p>

	<form id="brif-form" class="b_feedcall_inputs alloka-catch-form" name="onlinebrifform"  action="https://analytics.alloka.ru/api/request/brief" method="post">
		<input id="company_name"          type="text" name="brief[company_name]"          class="brif_input company-name" placeholder="Название компании"/>
		<input id="site_url"              type="text" name="brief[site_url]"              class="brif_input" placeholder="Адрес сайта"/>
		<input id="contact_name"          type="text" name="brief[contact_name]"          class="brif_input catch-name" placeholder="*Контактное лицо"/>
		<input id="contact_email"         type="text" name="brief[contact_email]"         class="brif_input email" placeholder="*Email для связи"/>
		<input id="products_and_services" type="text" name="brief[products_and_services]" class="brif_input" placeholder="Продвигаемые продукты/услуги"/>
		<input id="regions"               type="text" name="brief[regions]"               class="brif_input" placeholder="Регионы клиентов"/>
		<input id="notes"                 type="text" name="brief[notes]"                 class="brif_input alloka-catch-form-input-phone" placeholder="Примечания и пожелания"/>
		<input id="brif_btn"              type="submit"                                   class="brif_btn" value="Отправить" />
	</form>
</div>