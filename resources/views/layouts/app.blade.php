@if (!$__env->yieldContent('meta_title'))
    @section('meta_title', 'Содействие - '.$title)
@endif
<!doctype html>
<html>
<head>
	<title>@yield('meta_title')</title>
    @if($__env->yieldContent('meta_description'))
	<meta name="description" content="@yield('meta_description')">
    @endif
    @if($__env->yieldContent('meta_keywords'))
	<meta name="keywords" content="@yield('meta_keywords')">
    @endif
	<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="author" content="SiluetStudio">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta property="og:title" content="@yield('meta_title')">
	<meta property="og:description" content="@yield('meta_description')">
	<meta property="og:url" content="https://<?=$_SERVER['HTTP_HOST']?>/">
	<meta property="og:image" content="https://<?=$_SERVER['HTTP_HOST']?>/img/og.png" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="ru_RU" />
    <meta property="vk:image" content="https://<?=$_SERVER['HTTP_HOST']?>/img/og.png" />

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui-1.8.16.custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iview.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('css/screen.css') }}" rel="stylesheet">

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="alternate" media="only screen and (max-width: 640px)" href="https://m.sodrk.ru/">
	<script src="{{ asset('js/modernizr-2.0.6.min.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

<!-- content -->
	<div class="content">
		<div class="container" role="main">
			<!-- header -->
						<header>
				<!-- top header -->
				<div class="row">
					<div class="col-xs-12 col-md-12 col-lg-12">
						<div class="top_head">
							<ul>
								<li><a href="{{ url('/about') }}">О компании</a></li>
								<li><a href="{{ url('/catalog') }}">Каталог товаров</a></li>
								<li><a href="{{ url('/vacancies') }}">Вакансии</a></li>
								<li><a href="/contacts">Контакты</a></li>
								<li><a href="http://vk.com/sodrk" class="vk" target="_blank"></a></li>
																								<li>
																		<p class="t_ph">
										<i></i>
										(8212) 21-48-08									</p>
																											<p class="t_m">
										<i></i>
										<a href="mailto:all@sodrk.ru">all@sodrk.ru</a>
									</p>
																	</li>

								<li class="t_b pull-right" data-h="/order/cart">
									<i></i>
																			<div class="no_link">
											<span class="count">0</span>
											0.00											<b></b>
										</div>
																	</li>
								<li class="l_r pull-right">
									<i></i>


                                    @guest
									<a href="/cabinet/login">Вход</a>
									<span> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
									<a href="/cabinet/register">Регистрация</a>
                                    @else
                                    <a href="/cabinet">Кабинет</a>
									<span> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
									<a href="/cabinet/logout">Выход</a>
                                    @endauth


								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- top header end -->

				<!-- search field -->
				<div class="row">
					<div class="col-xs-12 col-md-12 col-lg-12">
						<div class="search_f">
							<form action="/catalog/search" method="get">
								<label>
									<span>Поиск</span>
									<input type="text" name="query" value="">
								</label>
								<button class="btn">Найти</button>
							</form>
						</div>
					</div>
				</div>
				<!-- search field end -->

				<div class="row">
					<div class="col-xs-12 col-md-3 col-lg-3">
						<div class="logo">
							<a href="/"></a>
						</div>
					</div>
					<div class="col-xs-12 col-md-9 col-lg-9 t_menu">
						<ul>
							<li class="lnk1"><a href="{{ url('/retail') }}"><i></i>Розничная<br>торговля</a></li>
							<li class="lnk2"><a href="{{ url('/corporate') }}"><i></i>Корпоративный<br>отдел</a></li>
							<li class="lnk3"><a href="{{ url('/1C') }}" class="_1c"><i></i></a></li>
							<li class="lnk4"><a href="{{ url('/security') }}"><i></i>Сети и системы<br>безопасности</a></li>
							<li class="lnk5"><a href="{{ url('/services') }}"><i></i>Сервисный<br>центр</a></li>
							<li class="lnk6 pull-right"><a href="{{ url('/subscription-service') }}"><i></i>Абонентское<br>обслуживание</a></li>
						</ul>
					</div>
				</div>

                @if ($path == '/')
                    @include('topslider')
                @endif

			</header>			<!-- header end -->

                @if ($path != '/')
                @include('breadcrumbs')
                @endif

				<div class="row">

				<!-- left column -->
				<div class="col-xs-12 col-md-3 col-lg-3">

                    @if ($sectionCode == 'corporate')
                    <div class="l_links">
                        <p class="l_head">Также в разделе</p>
                        <a href="/clients/2"><i></i>Наши клиенты</a>
                        <a href="/for-dealers"><i></i>Для дилеров</a>
                        <a href="/corp-payment-delivery"><i></i>Оплата и доставка</a>
                        <a href="/statuses"><i></i>Статусы компании</a>
                        <a href="/contacts/2"><i></i>Контакты</a>
                    </div>
                    <a href="/corporate/price-list" class="btn_price"><i></i>Прайс<br>листы</a>
                    @endif

                    @if ($sectionCode == 'subscription-service')
                    <div class="l_catalog_sec">
                        <p class="l_head">Также в разделе</p>
                        <ul>
                        <li><a href="/subscription-services/services"><i></i>Об услуге</a></li>
                        <li><a href="/subscription-services/tariffs"><i></i>Тарифные планы</a></li>
                        <li><a href="/projects/6"><i></i>Наши проекты</a></li>
                        <li><a href="http://servicedesk.sodrk.ru/" target="_blank" rel="nofollow"><i></i>Service Desk <b></b></a></li>
                        </ul>
                    </div>
                    <a href="/subscription-service/calc" class="btn_calc"><i></i>Рассчитать<br> стоимость</a>
                    @endif

                    @if ($sectionCode == 'about')
                    <div class="l_links">
						<p class="l_head">О компании</p>
						<a href="/news"><i></i>Новости</a>
						<a href="/projects"><i></i>Проекты</a>
						<a href="/actions"><i></i>Акции</a>
						<a href="/clients"><i></i>Клиенты</a>
					</div>
                    @endif

                    @if ($sectionCode == 'contacts')
                    <div class="l_links">
                        <p class="l_head">Контакты</p>
                        <a href="/contacts/1"><i></i>Розничная торговля</a>
                        <a href="/contacts/2"><i></i>Корпоративный отдел</a>
                        <a href="/contacts/3"><i></i>1С</a>
                        <a href="/contacts/4"><i></i>Сети и системы безопасности</a>
                        <a href="/contacts/5"><i></i>Сервисный центр</a>
                        <a href="/contacts/6"><i></i>Абонентское обслуживание</a>
                    </div>
                    @endif

                    @if ($sectionCode == 'services')
                    <div class="l_links">
                    <p class="l_head">Также в разделе</p>
                    <a href="/services/services"><i></i>Услуги</a>
                    <a href="/contacts/5"><i></i>Сервисные центры</a>
                    <a href="/services/catalog"><i></i>Каталог услуг</a>
                    <a href="/services/conditions-repaire"><i></i>Условия ремонта</a>
                    <a href="/services/people"><i></i>Наши специалисты</a>
                    <a href="/services/vendors"><i></i>Авторизации</a>
                    <a href="/clients/5"><i></i>Клиенты</a>
                    <a href="/request/services"><i></i>Оформление заявки</a>
                    <a href="/list"><i></i>Информация</a>
                    </div>

                    <a href="javascript:;" class="btn_calc open_p blue" data-h="/request/form/service-price"><i></i>Сколько будет <br /> стоить ремонт...</a>
					<a href="/services/check" class="btn_receipt"><i></i>Проверка <br>квитанции</a>
                    @endif


                    @if ($showCatalogMenu)
                    <div class="l_catalog">
                        <p class="l_head">Каталог</p>
                        @include('catalog-menu')
                    </div>
                    <a href="javascript:;" data-h="/request/form/item-price" class="btn_cont open_p blue"><i></i>В каталоге нет, <br> но мне нужен...</a>
                    @endif

					<p class="l_head2">Мы на связи</p>
					<a href="/contacts#form" class="write_us"><i></i>Напишите нам</a>
				</div>
                <!-- left column end -->

				<!-- right column -->
			    <div class="col-xs-12 col-md-9 col-lg-9 cnt">
                    @yield('content')
				</div>
                <!-- right column end -->

			</div>


		</div>
	</div>
	<!-- content end -->

	<!-- footer -->
			<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<footer>
						<div class="col-xs-12 col-md-3 col-lg-2 f_l">

							<div class="copyright">&copy; Содействие, 1991-2020</div>

							<!-- siluet -->
							<div class="siluet">
								<p>Веб-студия «Силуэт»:<br><a href="http://www.siluetstudio.com" target="_blank">разработка и продвижение сайтов</a></p>
							</div>
							<!-- siluet end -->

							<div class="f_info">
								<a href="/info-list"><i></i>Полезная информация</a>
							</div>
							<div class="f_map">
								<a href="/sitemap"><i></i>Карта сайта</a>
							</div>
                            <div class="f_mobile">
                                <a href="https://m.sodrk.ru">Мобильная версия</a>
                            </div>
						</div>
						<div class="col-xs-12 col-md-9 col-lg-10 f_r">
							<div class="wrap">
								<div class="f_link">
									<p class="hd">Розничная<br>торговля</p>
									<p><a href="/discount-programm">Дисконтная программа</a></p>
									<p><a href="/certificates">Подарочные сертификаты</a></p>
									<p><a href="/retail-payment-delivery">Оплата и доставка</a></p>
									<p><a href="/contacts/1">Наши магазины</a></p>
								</div>
								<div class="f_link">
									<p class="hd">Корпоративный<br>отдел</p>
									<p><a href="/clients/2">Наши клиенты</a></p>
									<p><a href="/for-dealers">Для дилеров</a></p>
									<p><a href="/corp-payment-delivery">Оплата и доставка</a></p>
									<p><a href="/statuses">Статусы компании</a></p>
									<p><a href="/contacts/2">Контакты</a></p>
								</div>
								<div class="f_link">
									<p class="hd">1С</p>
									<p><a href="/1C/services">Каталог услуг</a></p>
									<p><a href="/1C/competentions">Компетенции</a></p>
									<p><a href="/clients/3">Наши клиенты</a></p>
									<p><a href="/contacts/3">Контакты</a></p>
									<p><a href="/request/1C">Оформление заявки</a></p>
								</div>
								<div class="f_link">
									<p class="hd">Сети и системы безопасности</p>
									<p><a href="/projects/4">Наши проекты</a></p>
									<p><a href="/contacts/4">Контакты</a></p>
									<p><a href="/request/security">Оформление заявки</a></p>
								</div>
								<div class="f_link">
									<p class="hd">Сервисный<br>центр</p>
									<p><a href="/services/services">Услуги</a></p>
									<p><a href="/contacts/5">Сервисные центры</a></p>
									<p><a href="/services/catalog">Каталог услуг</a></p>
									<p><a href="/services/conditions-repaire">Условия ремонта</a></p>
									<p><a href="/services/people">Наши специалисты</a></p>
									<p><a href="/services/vendors">Авторизации</a></p>
									<p><a href="/clients/5">Клиенты</a></p>
									<p><a href="/request/services">Оформление заявки</a></p>
								</div>
								<div class="f_link">
									<p class="hd">Абонентское обслуживание</p>
									<p><a href="/subscription-services/services">Об услуге</a></p>
									<p><a href="/subscription-services/tariffs">Тарифные планы</a></p>
									<p><a href="/subscription-service/calc">Калькулятор</a></p>
									<p><a href="/projects/6">Наши проекты</a></p>
									<p><a href="http://servicedesk.sodrk.ru/" target="_blank" rel="nofollow"><i></i>Service Desk</a></p>
							     </div>
								<div class="clear"></div>
							</div>
						</div>
					</footer>
				</div>

			</div>
		</div>	<!-- footer end -->

	<div class="bg_overlay" style="display: none;"></div>
	<div class="popup form" style="display: none;"></div>

	<!-- JavaScript at the bottom for fast page loading -->
	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<script src="/js/jquery-1.11.1.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/raphael-min.js"></script>
	<script src="/js/jquery.easing.js"></script>
	<script src="/js/fluid_columns.js"></script>
	<script src="/js/chosen.jquery.min.js"></script>
	<script src="/js/jquery-ui.min.js"></script>
	<script src="/js/jquery.ezmark.js"></script>
	<script src="/js/slick.min.js"></script>

    <script src="{{ asset('js/jquery-ready.js?20190926') }}"></script>

	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
		chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7 ]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
</body>
</html>