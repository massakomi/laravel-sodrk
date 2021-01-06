
    <div class="catalog_filter">
        <div class="l_catalog">
            <p class="lnk">Показать весь каталог<i></i>
            </p>
            @include('catalog-menu')
            <ul class="border-top m15">
                <li>
                <a href="/catalog/2-ofisnaya-tehnika-periferiya"><i></i>Офисная техника, периферия</a>
                </li>
                <li>
                <a href="/catalog/2-8-ibp-filtry" class="cur"><i></i>ИБП, фильтры</a>
                </li>
            </ul>
            <p class="lnk open">Подбор по параметрам<i></i>
            </p>
            <form action="/items/2-8-1-ibp" method="post">
                <ul class="border-top-gray">
                    <li>
                    <a href="#" class="sub open"><i></i>Цена, руб.</a>
                    <div class="sub_item">
                        <div class="pr_slider">
                            <input type="text" class="txt min pull-left" name="minPrice" value="">
                            <span class="sep">—
                            </span>
                            <input type="text" class="txt max pull-right" name="maxPrice" value="">
                            <div class="clear">
                            </div>
                            <div class="price-slider" data-values="[7300,12149]" data-mm="[2450,16999]">
                            </div>
                        </div>
                    </div>
                    </li>
                    <li>
                    <a href="#" class="sub open"><i></i>Наличие</a>
                    <div class="sub_item">
                        <div class="checkbox_wrap">
                            <div class="checkbox">
                                <input type="checkbox" id="ch-s8" name="s[]" value="8">
                                <label for="ch-s8">ул. Первомайская, д. 70а
                                </label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="ch-s9" name="s[]" value="9">
                                <label for="ch-s9">ул. Первомайская, д. 149
                                </label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="ch-s7" name="s[]" value="7">
                                <label for="ch-s7">ул. Мира, д. 68 (Эжва)
                                </label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="ch-s11" name="s[]" value="11">
                                <label for="ch-s11">ул. 40 Лет Коми АССР, д. 4 (Ухта)
                                </label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="ch-s5" name="s[]" value="5">
                                <label for="ch-s5">Оптовый склад
                                </label>
                            </div>
                        </div>
                    </div>
                    </li>
                    <li>
                    <a href="#" class="sub open"><i></i>Производитель</a>
                    <div class="sub_item">
                        <div class="radio_wrap">
                            <div class="checkbox">
                                <input type="checkbox" name="v[]" id="rc-v-112" value="112">
                                <label for="rc-v-112">APC
                                </label>
                            </div>
                        </div>
                    </div>
                    </li>
                </ul>
                <div class="buttons">
                    <input type="submit" value="Подобрать" class="btn_ok">
                    <input type="reset" value="Сбросить" class="btn_reset">
                    <div class="clear">
                    </div>
                </div>
            </form>
        </div>
        <a href="javascript:;" data-h="/request/form/item-price" class="btn_cont open_p blue"><i></i>В каталоге нет,
            <br/> но мне нужен...</a>
    </div>
