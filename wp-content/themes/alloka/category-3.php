<?php  /* Template Name: Блог */
 require('./wp-blog-header.php');
 require_once('header_v2.php');
 ?>
<body>
<?php include_once('googletag.php'); //todo: проверить гугл тэг ?>
<!-- Page -->
<div class="page" id="root">
	<div class="page__layout">
		<form action="#" class="page__search search">
			<label class="search__field">
				<input type="text" class="search__input" placeholder="Искать по статьям" required>
				<button class="search__button"></button>
			</label>
		</form>

		<h1 class="page__title title">Наши мысли</h1>
		<?php
		echo get_the_tag_list('<ul class="page__taglist taglist"><li class="taglist__item">','</li><li class="taglist__item">','</li></ul>');
		?>k

		<div class="mainCardContainer">
			<div class="mainCard">
				<div class="mainCard__image" style="background-image: url('./images/temporary/card_01.jpg')"></div>

				<div class="mainCard__content">
					<div class="mainCard__contentHeader articleHeader">
						<a href="#" class="articleHeader__tag tag"># alloka</a>
						<a href="#" class="articleHeader__tag tag"># alloka analytics</a>
						<a href="#" class="articleHeader__tag tagButton">+5 тегов показать</a>
						<a href="#" class="articleHeader__tag tagButton tagButton_active">свернуть</a>
						<time class="articleHeader__date">10 февраля</time>
					</div>

					<a href="#" class="mainCard__title">Либерально настроенные коллтрекеры интегрировали-интегрировали...</a>
				</div>
			</div>
		</div>

		<div class="news">
			<div class="news__list">
				<div class="news__column">
					<div class="news__item card">
						<div class="card__image" style="background-image: url('./images/temporary/card_01.jpg')"></div>

						<div class="card__content">
							<div class="card__contentHeader articleHeader">
								<a href="#" class="articleHeader__tag tag"># alloka</a>
								<a href="#" class="articleHeader__tag tag"># alloka analytics</a>
								<a href="#" class="articleHeader__tag tagButton">+5 тегов показать</a>
								<a href="#" class="articleHeader__tag tagButton tagButton_active">свернуть</a>
								<time class="articleHeader__date">10 февраля</time>
							</div>

							<a href="#" class="card__title">Либерально настроенные коллтрекеры интегрировали-интегрировали...</a>
						</div>
					</div>

					<div class="news__item card">
						<div class="card__image" style="background-image: url('./images/temporary/card_03.jpg')"></div>

						<div class="card__content">
							<div class="card__contentHeader articleHeader">
								<a href="#" class="articleHeader__tag tag"># интернет-маркетинг</a>
								<time class="articleHeader__date">12 мая</time>
							</div>

							<a href="#" class="card__title">Нижний Новгород. Деловой завтрак «Как продавать 100 квартир в месяц»</a>
						</div>
					</div>

					<div class="news__item news__item_preview"></div>
				</div>

				<div class="news__column">
					<div class="news__item card">
						<div class="card__image" style="background-image: url('./images/temporary/card_02.jpg')"></div>

						<div class="card__content">
							<div class="card__contentHeader articleHeader">
								<a href="#" class="articleHeader__tag tag"># alloka</a>
								<time class="articleHeader__date">10 февраля</time>
							</div>

							<a href="#" class="card__title">Изменения в 152-ФЗ о персональных данных. Что нужно знать</a>
						</div>
					</div>

					<div class="news__item card">
						<div class="card__image" style="background-image: url('./images/temporary/card_03.jpg')"></div>

						<div class="card__content">
							<div class="card__contentHeader articleHeader">
								<a href="#" class="articleHeader__tag tag"># интернет-маркетинг</a>
								<time class="articleHeader__date">12 мая</time>
							</div>

							<a href="#" class="card__title">Нижний Новгород. Деловой завтрак «Как продавать 100 квартир в месяц»</a>
						</div>
					</div>

					<div class="news__item news__item_preview"></div>
				</div>

				<div class="news__column">
					<div class="news__item card">
						<div class="card__image" style="background-image: url('./images/temporary/card_03.jpg')"></div>

						<div class="card__content">
							<div class="card__contentHeader articleHeader">
								<a href="#" class="articleHeader__tag tag"># интернет-маркетинг</a>
								<time class="articleHeader__date">12 мая</time>
							</div>

							<h6 class="card__title">Нижний Новгород. Деловой завтрак «Как продавать 100 квартир в месяц»</h6>
						</div>
					</div>

					<div class="news__item news__item_preview"></div>
				</div>
			</div>

			<div class="news__footer">
				<a href="#" class="news__showMore button button_secondary">Показать еще</a>
			</div>
		</div>
	</div>
</div>
<!--/Page -->

<!--wraper end-->
<?php require('footer.php'); ?>

</body>
</html>