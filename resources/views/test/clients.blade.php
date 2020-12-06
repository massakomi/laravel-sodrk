@extends('layouts.app')

@section('content')

    <div class="heading">
        Клиенты
        <div class="head_select">
            Направление:
            <div class="select change">
                <select name="direction">
                @foreach ($directions as $key => $item)
                    <option value="{{$key ?: ''}}" @if ($directionId) selecte @endif data-url="/clients{{$key ? '/'.$key : ''}}">{{$item}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <!-- clients -->
    <div class="clients">
        <div class="row_c">
            <div class="client_one">
                <a href="http://www.prockomi.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/67_image.jpg?1510845264" alt="">
                    <span>Прокуратура Республики Коми
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="https://www.pochta.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/66_image.jpg?1511561346" alt="">
                    <span>Почта России
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.ethnopark-rk.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/65_image.jpeg?1511906889" alt="">
                    <span>ГАУ РК "ФИННО-УГОРСКИЙ ЭТНОКЛЬТУРНЫЙ ПАРК"
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://komi.rtrs.ru/prof/rtrs-region/" target="_blank" rel="nofollow">
                    <img src="/files/clients/64_image.jpg?1511734289" alt="">
                    <span>Федеральное государственное унитарное предприятие «Российская телевизионная и радиовещательная сеть»
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://www.tplusgroup.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/63_image.jpg?1510845264" alt="">
                    <span>ПАО "Т Плюс "
                    </span>								</a>
            </div>
            <div class="client_one">
                <img src="/files/clients/62_image.png?1607204525" alt="">
                <span>Государственное учреждение регионального отделения фонда социального страхования по РК
                </span>
            </div>
            <div class="client_one">
                <img src="/files/clients/61_image.jpg?1511561346" alt="">
                <span>ГБУЗ РК «Воркутинская больница скорой помощи»
                </span>
            </div>
            <div class="client_one">
                <a href="http://irao-generation.com" target="_blank" rel="nofollow">
                    <img src="/files/clients/60_image.jpg?1511561346" alt="">
                    <span>АО "Интер РАО-Электрогенерация" - филиал "Печорская ГРЭС"
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://www.syktyvkar.komi.com/" target="_blank" rel="nofollow">
                    <img src="/files/clients/36_image.jpg?1510845264" alt="">
                    <span>Администрация МО город Сыктывкар
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.ngrkomi.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/47_image.png?1607204525" alt="">
                    <span>ГБУ РК "Национальная галерея Республики Коми"
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://komiaviatrans.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/33_image.png?1607204525" alt="">
                    <span>ОАО "Комиавиатранс"
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://komirsk.ru/web/" target="_blank" rel="nofollow">
                    <img src="/files/clients/32_image.png?1607204524" alt="">
                    <span>ООО "Республиканская сетевая компания"
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://www.s-hleb.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/31_image.png?1607204525" alt="">
                    <span>ООО "Сыктывкарский хлебокомбинат"
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.nbrkomi.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/46_image.jpg?1510845264" alt="">
                    <span>Национальная библиотека Республики Коми
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.nalog.ru/rn11/" target="_blank" rel="nofollow">
                    <img src="/files/clients/55_image.jpg?1510845264" alt="">
                    <span>Управление федеральной налоговой службы
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.rshb.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/45_image.png?1607204524" alt="">
                    <span>ОАО "Россельхозбанк"
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://www.sfml.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/41_image.jpg?1511561346" alt="">
                    <span>Физико-математический лицей
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://izbirkom.rkomi.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/37_image.png?1607204525" alt="">
                    <span>Избирательная комиссия Республики Коми
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://komitk.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/30_image.jpg?1511820520" alt="">
                    <span>ОАО "Коми тепловая компания"
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://komifoms.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/35_image.png?1607204525" alt="">
                    <span>ОАО "Коми энергосбытовая компания"
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://11.rospotrebnadzor.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/48_image.jpg?1510845264" alt="">
                    <span>Управление Роспотребнадзора по Республике Коми
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.plypan.com/" target="_blank" rel="nofollow">
                    <img src="/files/clients/24_image.png?1607204524" alt="">
                    <span>ООО "Сыктывкарский фанерный завод"
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.zpfrk.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/23_image.jpg?1511561346" alt="">
                    <span>ОАО Птицефабрика «Зеленецкая»
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://usd.komi.sudrf.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/20_image.jpg?1511561346" alt="">
                    <span>Управление судебного департамента в Республике Коми
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://www.vtb24.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/17_image.png?1607204524" alt="">
                    <span>Филиал № 7806 ВТБ 24 (ПАО)
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://komi.tele2.ru/about/tele2/requisite/" target="_blank" rel="nofollow">
                    <img src="/files/clients/14_image.png?1607204524" alt="">
                    <span>ЗАО «Теле2-Коми»
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.pfrf.ru/ot_komi/" target="_blank" rel="nofollow">
                    <img src="/files/clients/44_image.png?1607204525" alt="">
                    <span>Пенсионный фонд РФ
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.komienergo.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/11_image.png?1607204524" alt="">
                    <span>«Комиэнерго»&nbsp;- филиал ОАО «МРСК Северо-Запада»
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://cit.rkomi.ru/glavnaya.html" target="_blank" rel="nofollow">
                    <img src="/files/clients/10_image.png?1607204524" alt="">
                    <span>Государственное автономное учреждение Республики Коми «Центр информационных технологий»
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.komi-aids.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/9_image.png?1607204525" alt="">
                    <span>ГАУ РК «Республиканский информационный центр оценки качества образования»
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="https://alfabank.ru" target="_blank" rel="nofollow">
                    <img src="/files/clients/8_image.jpg?1510845264" alt="">
                    <span>ОАО "Альфа-Банк" филиал "Нижегородский"
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.komi-aids.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/6_image.png?1607204524" alt="">
                    <span>Республиканский центр по профилактике и борьбе со СПИДом и инфекционными заболеваниями
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://tetra-komi.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/29_image.jpg?1510845264" alt="">
                    <span>ПТК Тетра
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.sbbank.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/18_image.png?1607204524" alt="">
                    <span>ОАО "АКБ Саровбизнесбанк"
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://komikz.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/52_image.jpg?1510845264" alt="">
                    <span>Независимая газета Республики Коми
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://ekozem.com/" target="_blank" rel="nofollow">
                    <img src="/files/clients/25_image.png?1607204525" alt="">
                    <span>ООО "ЭКОЗЕМ КАДАСТР"
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://vertikalrk.ru" target="_blank" rel="nofollow">
                    <img src="/files/clients/22_image.png?1607204524" alt="">
                    <span>ООО «Вертикаль»
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://nordmixrk.com/" target="_blank" rel="nofollow">
                    <img src="/files/clients/58_image.png?1607204524" alt="">
                    <span>ООО НордМикс
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://itstaff-rk.ru" target="_blank" rel="nofollow">
                    <img src="/files/clients/7_image.png?1607204524" alt="">
                    <span>АйТиСтаф
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://sto-komi.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/50_image.jpg?1511561346" alt="">
                    <span>ООО «СТО-АВТО-Сервис»
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://oao1rst.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/51_image.png?1607204524" alt="">
                    <span>ОАО «Первый Ремонтно-Строительный Трест»
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.cem11.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/57_image.png?1607204525" alt="">
                    <span>Центр эстетической медицины
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://zfk11.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/28_image.png?1607204525" alt="">
                    <span>Жешартский фанерный комбинат
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.energogarant.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/42_image.png?1607204524" alt="">
                    <span>Страховая Компания «Комиэнергогарант»
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://www.garazhnaya1.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/38_image.jpg?1510845264" alt="">
                    <span>АлексМоторс
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://autoresurs.kia.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/19_image.jpg?1510845264" alt="">
                    <span>Авторесурс
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.ipoteka-rk.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/16_image.jpg?1510845264" alt="">
                    <span>ОАО "Коми ипотечная компания"
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://ksalfa.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/34_image.png?1607204525" alt="">
                    <span>Компания «КС Альфа»
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://www.komitex.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/27_image.jpg?1511734289" alt="">
                    <span>ОАО Комитекс
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://syktsu.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/39_image.png?1607204525" alt="">
                    <span>Сыктывкарский государственный университет
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://11.mvd.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/21_image.png?1607204525" alt="">
                    <span>Министерство внутренних дел по Республике Коми
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.assorti-retail.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/26_image.jpg?1511561346" alt="">
                    <span>ЗАО Ассорти
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://www.11.mchs.gov.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/56_image.jpg?1511734289" alt="">
                    <span>ГУ МЧС России по Республике Коми
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.roslesinforg.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/43_image.gif?1466671005" alt="">
                    <span>Федеральное агентство лесного хозяйства
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.sberbank.ru/komi/ru/s_m_business/" target="_blank" rel="nofollow">
                    <img src="/files/clients/15_image.png?1607204525" alt="">
                    <span>ОАО «Сбербанк»
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.rigla.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/12_image.png?1607204524" alt="">
                    <span>Аптеки «Будь здоров»
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="row_c">
            <div class="client_one">
                <a href="http://fskn.rkomi.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/4_image.png?1607204524" alt="">
                    <span>Управление федеральной службы РФ по контролю за оборотом наркотиков по РК
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.finnougoria.ru/about/" target="_blank" rel="nofollow">
                    <img src="/files/clients/54_image.png?1607204525" alt="">
                    <span>Финно-Угорский культурный центр РФ
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="https://www.fgup-ohrana.ru/web/komi/" target="_blank" rel="nofollow">
                    <img src="/files/clients/53_image.png?1607204524" alt="">
                    <span>Филиал ФГУП «Охрана» МВД России по Республике Коми
                    </span>								</a>
            </div>
            <div class="client_one">
                <a href="http://www.moduscenter.ru/" target="_blank" rel="nofollow">
                    <img src="/files/clients/59_image.jpg?1510845264" alt="">
                    <span>Медицинская клиника "Модус центр"
                    </span>								</a>
            </div>
            <div class="clear">
            </div>
        </div>
    </div>

@endsection
