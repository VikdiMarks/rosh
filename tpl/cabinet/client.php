<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Личный кабинет</title>
	<link rel="icon" href="/favicon.svg" type=" image/svg+xml">
</head>

<body class="body lk-cabinet" data-barba="wrapper">

<div class="scroll-container" data-scroll-container>
	<div>
		<wb-module wb="module=yonger&mode=render&view=header"></wb-module>
	</div>

	<main class="page" data-barba="container" data-barba-namespace="lk-cabinet" wb-off>
		<div class="loading-overlay">
			<div class="loader"></div>
		</div>
		<div class="container">
			<div class="account">
				<div class="crumbs">
					<a class="crumbs__arrow">
						<svg class="svgsprite _crumbs-back">
							<use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
						</svg>
					</a>
					<a class="crumbs__link" href="/">Главная</a>
					<span class="crumbs__link">Личный кабинет</span>
				</div>

				<div class="title-flex --flex --jcsb">
					<div class="title">
						<h1 class="h1 mb-10">Личный кабинет</h1>
					</div>
					<button class="btn btn--black --openpopup" data-popup="--record"
						onclick="popupCreateQuote('{{user.id}}')">
						Записаться на прием
					</button>
				</div>

				<div class="account__panel">
					<div class="account__info">
						<div class="user">
							<div class="user__name">
								{{user.fullname}}
								<button class="user__edit">
									<svg class="svgsprite _edit">
										<use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
									</svg>
								</button>
							</div>
							<div class="user__group">
								<div class="user__birthday">Дата рождения:
									<span>{{user.birthdate_fmt}}</span>
								</div>
								<div class="user__phone">Тел:
									<span>{{user.phone}}</span>
								</div>
							</div>
							<div class="user__confirm">
								<svg class="svgsprite _confirm">
									<use xlink:href="assets/img/sprites/svgsprites.svg#confirm"></use>
								</svg>
								Подтвержденный аккаунт
							</div>
						</div>
					</div>
					<a href="/signout" class="account__exit">Выйти из аккаунта</a>
					<form class="profile-edit" on-submit="profileSave">
						{{#user}}
						<p class="text-bold mb-30">Редактировать профиль</p>
						<div class="row profile-edit__wrap">
							<div class="col-md-3">
								<div class="input input--grey">
									<input class="input__control datebirthdaypickr"
										name="birthdate"
										value="{{.birthdate}}"
										type="text"
										placeholder="Дата рождения" twoway="false">
									<div class="input__placeholder input__placeholder--dark">Дата рождения</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="input input--grey">
									<input class="input__control" type="tel" name="phone" value="{{.phone}}" placeholder="Телефон" data-inputmask="'mask': '+9 (999) 999-99-99'">
									<div class="input__placeholder input__placeholder--dark">Телефон</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="input input--grey">
									<input class="input__control" type="email"
										name="email" value="{{.email}}" placeholder="E-mail">
									<div class="input__placeholder input__placeholder--dark">E-mail</div>
								</div>
							</div>
							<div class="col-md-2">
								<button class="btn btn--white profile-edit__submit">Сохранить</button>
							</div>
						</div>
						<p class="text-bold mb-30 delivery-address">Адрес доставки</p>
						<div class="row profile-edit__wrap">
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-3">
										<div class="input input--grey">
											<input class="input__control" type="text" name="country" value="{{.country}}" placeholder="Страна">
											<div class="input__placeholder input__placeholder--dark">Страна</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="input input--grey">
											<input class="input__control" type="text" name="city" value="{{.city}}" placeholder="Город">
											<div class="input__placeholder input__placeholder--dark">Город</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input input--grey">
											<input class="input__control" type="text" name="street" value="{{.street}}" placeholder="Улица">
											<div class="input__placeholder input__placeholder--dark">Улица
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="input input--grey">
											<input class="input__control" type="text" name="build" value="{{.build}}" placeholder="Дом">
											<div class="input__placeholder input__placeholder--dark">Дом</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row profile-edit__wrap">
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-3">
										<div class="input input--grey">
											<input class="input__control" type="text" name="flat" placeholder="Кв./офис" value="{{.flat}}">
											<div class="input__placeholder input__placeholder--dark">Кв./офис</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="input input--grey">
											<input class="input__control" type="text" name="intercom" placeholder="Домофон" value="{{.intercom}}">
											<div class="input__placeholder input__placeholder--dark">Домофон</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="input input--grey">
											<input class="input__control" type="text" name="entrance" placeholder="Подъезд" value="{{.entrance}}">
											<div class="input__placeholder input__placeholder--dark">Подъезд</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="input input--grey">
											<input class="input__control" type="text" name="level" placeholder="Этаж" value="{{.level}}">
											<div class="input__placeholder input__placeholder--dark">Этаж</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<button class="btn btn--white profile-edit__submit">Сохранить</button>
							</div>
						</div>
						{{/user}}
					</form>
				</div>

				{{#if events.current}}
				<div class="lk-title">Текущее событие</div>
				<div class="account-events">
					<!-- multiple: .account-events__block -->
					{{#each events.current}}
					<div class="account-events__block">
						<div class="account-events__block-wrap mb-20">
							<div class="account-events__item">
								<div class="account-event-wrap">
									<div class="account-events__name">Услуги:</div>
									<div class="account-event">
										{{#services}}
										{{catalog.services[this].header}}<br>
										{{/services}}
									</div>
								</div>
							</div>
							<div class="account-events__item">
								<div class="account-event-wrap">
									<div class="account-events__name">Дата приема:</div>
									<div class="account-event">
										<p>{{this.event_date}}</p>
									</div>
								</div>
								<div class="account-event-wrap">
									<div class="account-events__name">Время приема:</div>
									<div class="account-event">
										<p>{{this.event_time}}</p>
									</div>
								</div>
							</div>
							<div class="account-events__item">
								<div class="account-event-wrap">
									<div class="account-events__name">Специалист:</div>
									<div class="account-event">
										{{#this.experts}}
										<p>{{catalog.experts[this].name}}</p>
										{{/this.experts}}
									</div>
								</div>
							</div>
						</div>

						{{#if this.type == 'online'}}
						<div class="account-events__btns">
							<div class="account-event-wrap --aicn">
								<div class="account-events__btn">
									<a class="btn btn--black"
										onclick="window.open('/cabinet/online#{{this.id}}',
											 '_blank',
                                             'width='+screen.availWidth+',height='+screen.availHeight+
                                             ',location=yes,scrollbars=yes,status=no');">
										Начать консультацию
									</a>
								</div>
								<p>Вас ожидает специалист, можете подключиться прямо сейчас</p>
							</div>
						</div>
						{{/if}}

						{{#if this.analises}}
						<div class="account-events__download">
							<div class="lk-title">Анализы</div>
							<a class="btn btn--white" href="[[this.analises.src]]" download="Анализы.pdf">Скачать анализы</a>
						</div>
						{{/if}}
					</div>
					{{/each}}
				</div>
				{{/if}}

				{{#if events.upcoming}}
				<div class="lk-title">Предстоящие события</div>
				<div class="account-events">
					{{#each events.upcoming}}
					<div class="account-events__block">
						<div class="account-events__block-wrap mb-20">
							<div class="account-events__item">
								<div class="account-event-wrap">
									<div class="account-events__name">Услуги:</div>
									<div class="account-event">
										{{#services}}
										{{catalog.services[this].header}}<br>
										{{/services}}
									</div>
								</div>
							</div>
							<div class="account-events__item">
								<div class="account-event-wrap">
									<div class="account-events__name">Дата приема:</div>
									<div class="account-event">
										<p>{{this.event_date}}</p>
									</div>
								</div>
								<div class="account-event-wrap">
									<div class="account-events__name">Время приема:</div>
									<div class="account-event">
										<p>{{this.event_time}}</p>
									</div>
								</div>
							</div>
							<div class="account-events__item">
								<div class="account-event-wrap">
									<div class="account-events__name">Специалист:</div>
									<div class="account-event">
										{{#this.experts}}
										<p>{{catalog.experts[this].name}}</p>
										{{/this.experts}}
									</div>
								</div>
							</div>
						</div>

						{{#if this.pay_status == 'unpay'}}
						<div class="account-events__btns">
							<div class="account-event-wrap --aicn">
								<div class="account-events__btn">
									<button class="btn btn--black"
										onclick="popupPay('{{this.id}}','{{this.price}}','{{this.client}}')">
										Внести предоплату
									</button>
								</div>
								<p>Услуга требует внесения предоплаты</p>
							</div>
						</div>
						{{elseif this.type == 'online'}}
						<div class="account-events__btns">
							<div class="account-event-wrap --aicn">
								<div class="account-events__btn">
									<button class="btn btn--white disabled" disabled>
										Онлайн консультация
									</button>
								</div>
								<p>Кнопка станет активной за 5 минут до начала приема</p>
							</div>
						</div>
						{{/if}}

						{{#if this.analises}}
						<div class="account-events__download">
							<div class="lk-title">Анализы</div>
							<a class="btn btn--white" href="{{this.analises.src}}" download="Анализы.pdf">Скачать анализы</a>
						</div>
						{{/if}}

					</div>
					{{/each}}
				</div>
				{{/if}}

				<div class="account__history data-tab-wrapper" data-tabs="history">
					<div class="account__tab-items">
						<div class="account__tab-item data-tab-link active" data-tabs="history" data-tab="visits">
							История посещений
						</div>
						<div class="account__tab-item data-tab-link" data-tabs="history" data-tab="longterm">
							Продолжительное лечение
						</div>
					</div>
					<!-- !!! quote history tab !!! -->
					<div class="account__tab data-tab-item active" data-tab="visits">
						<div class="account__table">
							<div class="account__table-head">
								<div class="history-item">Дата</div>
								<div class="history-item">Время</div>
								<div class="history-item">Специалисты</div>
								<div class="history-item">Услуги</div>
								<div class="history-item">Анализы</div>
							</div>
							<div class="account__table-body">
								<!-- !!! quote history item !!! -->
								{{#each history.visits}}
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main accardeon__click">
										<div class="history-item">
											<p>Дата</p>{{this.event_date}}
										</div>
										<div class="history-item">
											<p>Время</p>{{this.event_time}}
										</div>
										<div class="history-item">
											<p>Специалисты</p>
											{{#experts}}
											{{catalog.experts[this].name}}<br>
											{{/experts}}
										</div>
										<div class="history-item">
											<p>Услуги</p>
											{{#services}}
											{{catalog.services[this].header}}<br>
											{{/services}}
										</div>
										<div class="history-item">
											<p>Анализы</p>
											{{#if this.analises}}
											Есть анализы
											{{else}}
											Нет анализов
											{{/if}}
										</div>
									</div>
									<div class="acount__table-list accardeon__list">
										<div class="analysis mb-40">
											<div class="row">
												<div class="col-md-6">
													{{#if analises}}
													<div class="account-events__download">
														<div class="lk-title">Анализы</div>
														<a class="btn btn--white" href="{{.}}"
															download="Анализы(за {{this.event_date}}).pdf">
															Скачать анализы
														</a>
													</div>
													{{/if}}

													<div class="analysis__description">
														<p class="text-bold mb-20">Выполнялись процедуры</p>
														<p class="text-grey">{{this.description}}</p>
													</div>
												</div>
												<div class="col-md-6">
													{{#if this.analises}}
													<a class="btn btn--black mb-20 --openpopup"
														data-popup="--analize-type"
														onclick="popupAnalizeInterpretation('{{user.id}}', '{{this.id}}', '{{this.analises}}')">
														Получить расшифровку анализов
													</a>
													{{/if}}
													<div class="analysis__description">
														<p class="text-bold mb-20">Рекомендация врача</p>
														<div class="text">
															{{this.recommendation}}
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="experts__worked">
											<div class="experts__worked-title">С вами работали</div>
											<div class="row">
												{{#experts}}
												<div class="col-md-6">
													<a class="expert__worked"
														target="_blank"
														data-href="/about/experts/{{catalog.experts[this].info_uri}}">
														<div class="expert__worked-pic">
															<img src="{{catalog.experts[this].image.0.src}}" alt="{{catalog.experts[this].name}}">
														</div>
														<div class="expert__worked-name">{{catalog.experts[this].name}}</div>
														<div class="expert__worked-work">{{catalog.experts[this].spec}}</div>
													</a>
												</div>
												{{/experts}}
											</div>
										</div>
										<div class="acount__photos d-none">
											<div class="row acount__photos-wrap">
												<div class="col-md-6">
													<div class="acount__photo">
														<p>Фото до начала лечения</p>
														{{#each photos.before}}
														<div class="col-md-6">
															<a class="after-healing__item"
																data-fancybox="images"
																href="{{.src}}"
																data-caption="{{.date}}">
																<div class="healing__date">{{.date}}</div>
																<div class="after-healing__photo"
																	style="background-image: url({{.src}})">
																</div>
															</a>
														</div>
														{{else}}

														{{/each}}
													</div>
												</div>
												<div class="col-md-6">
													<div class="acount__photo">
														<p>Фото в процессе лечения</p>
														{{#each photos.after}}
														<a class="after-healing__item"
															data-fancybox="images"
															href="{{.src}}"
															data-caption="{{.date}}">
															<img src="{{.src}}" alt="After visit {{.date}}">
														</a>
														{{/each}}
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								{{else}}
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main">
										Нет записей о посещении
									</div>
								</div>
								{{/each}}
								<!-- !!! / quote history item !!! -->
							</div>
						</div>
					</div>
					<!-- !!! longterm tab !!! -->
					<div class="account__tab data-tab-item" data-tab="longterm">
						<div class="account__table">
							<div class="account__table-head">
								<div class="healing-item">Дата</div>
								<div class="healing-item">Услуги</div>
							</div>
							<div class="account__table-body">
								{{#each history.longterms}}
								<!-- !!! longterm item !!! -->
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main accardeon__click">
										<div class="healing-item">
											<p>Дата</p> {{this.longterm_date_from}} - {{this.longterm_date_to}}
										</div>
										<div class="healing-item">
											<p>Услуги</p> {{this.title}}
										</div>
									</div>
									<div class="acount__table-list accardeon__list">
										<div class="row">
											<div class="col-md-4">
												<div class="text-bold text-big mb-20">Фото до начала лечения</div>
												{{#each this.photos.before}} <!--single photo!-->
												<a class="after-healing__item"
													data-fancybox="images"
													href="{{.src}}"
													data-caption="{{.date}}">
													<h2 class="h2 healing__date-title">{{.date}}</h2>
													<div class="after-healing__photo"
														style="background-image: url('{{.src}}')">
													</div>
													<div class="healing__description">
														{{.comment}}
													</div>
												</a>
												{{/each}}
											</div>
											<div class="col-md-8">
												<div class="text-bold text-big mb-20">
													Фото после начала лечения
												</div>
												<div class="after-healing">
													<h2 class="h2 healing__date-title d-none month-header"></h2>
													<div class="row">
														{{#each this.photos.after}}
														<div class="col-md-6">
															<a class="after-healing__item"
																data-fancybox="images"
																href="{{.src}}"
																data-caption="{{.date}}">
																<div class="healing__date">{{.date}}</div>
																<div class="after-healing__photo"
																	style="background-image: url({{.src}});">
																</div>
															</a>
														</div>
														{{/each}}
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								{{else}}
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main">
										Нет записей о продолжительном лечении
									</div>
								</div>
								{{/each}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script wbapp>
		var cabinet = new Ractive({
			el: 'main.page',
			template: $('main.page').html(),
			data: {
				catalog: {},
				user: wbapp._session.user,
				events: {
					'upcoming': [],
					'current': []
				},
				history: {
					'events': [],
					'longterms': []
				}
			},

			on: {
				complete() {
					$(this.el).find('.loading-overlay').remove();
				},
				init() {
					wbapp.get('/api/v2/read/users/' + wbapp._session.user.id, function (data) {
						data.birthdate_fmt = Utils.formatDate(data.birthdate);
						data.phone         = Utils.formatPhone(data.phone);
						cabinet.set('user', data); /* get actually user data */
					});

					wbapp.get('/api/v2/list/records?status=upcoming&client=' + wbapp._session.user.id,
						function (data) {
							let curr_timestamp = parseInt(getdate()[0]);

							data.forEach(function (rec) {
								if (rec.event_date !== (new Date()).toLocaleDateString()) {
									cabinet.push('events.upcoming', rec); /* get actually user next events */
								}

								let times                = rec.event_time.split(' - ');
								let event_from_timestamp = Utils.timestamp(rec.event_date + ' ' + times[0]);
								let event_to_timestamp   = Utils.timestamp(rec.event_date + ' ' + times[1]);

								if (event_from_timestamp < curr_timestamp
								    && (event_to_timestamp >= curr_timestamp)) {
									cabinet.push('events.current', rec);
								}
							});
						});

					wbapp.get('/api/v2/list/records?status=past&client=' + wbapp._session.user.id,
						function (data) {
							console.log('history.events:', data);
							cabinet.set('history.events', data); /* get actually user next events */
						});

					wbapp.get('/api/v2/list/records?longterm=1&client=' + wbapp._session.user.id,
						function (data) {
							console.log('history.longterms:', data);
							cabinet.set('history.longterms', data); /* get actually user next events */
						});

					setTimeout(function () {
						cabinet.set('catalog', catalog);
					});
				},
				profileSave(ev) {
					let $form = $(ev.node);
					let uid   = cabinet.get('user.id');
					if ($form.verify() && uid > '') {
						let data = $form.serializeJSON();
						CabinetController.updateProfile(uid, data, function (data) {
							data.birthdate_fmt = Utils.formatDate(data.birthdate);
							data.phone         = Utils.formatPhone(data.phone);
							cabinet.set('user', data); /* get actually user data */
							toast('Профиль успешно обновлён');
						});
					}
					return false;
				},
				prepay(ev) {
					popupPay.showPopup($(ev.node).data('record'));
				}
			}
		});
	</script>
</div>

<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>