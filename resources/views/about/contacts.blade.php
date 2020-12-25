@extends('layouts.app')

@section('meta_title', 'Содействие - Контакты')
@section('meta_description', '')
@section('meta_keywords', '')

@section('content')

<p class="heading">Контакты</p>
<div class="contacts_all">

@if ($id)
   @include('about.contacts-'.$id)
@else
   @include('about.contacts-all')
@endif

    

    <a name="form"></a>
    <p class="cont_head">Напишите нам
    </p>
    <div class="form_fields">
        <form action="#form" method="post">
            {!! csrf_field() !!}
            <div class="row_sec">
                <div class="txt">Отдел или сотрудник:
                </div>
                <div class="fields">
                    <div class="select">
                        <select name="rec" id="rec">
                            <option value="">--
                            </option>
                            <option value="1-1">Розничная торговля
                            </option>
                            <option value="1-2">Корпоративный отдел
                            </option>
                            <option value="1-3">1С
                            </option>
                            <option value="1-4">Сети и системы безопасности
                            </option>
                            <option value="1-5">Сервисный центр
                            </option>
                            <option value="1-6">Абонентское обслуживание
                            </option>
                            <option value="2-34">Холопов Михаил
                            </option>
                            <option value="2-32">Пахович Виталий
                            </option>
                            <option value="2-5">Вилкова Клавдия
                            </option>
                            <option value="2-16">Пичкурова Екатерина
                            </option>
                            <option value="2-6">Красов Дмитрий
                            </option>
                            <option value="2-20">Камышова Елена
                            </option>
                            <option value="2-19">Груздев Олег
                            </option>
                            <option value="2-13">Кузьмин Василий
                            </option>
                            <option value="2-14">Распутин Павел
                            </option>
                            <option value="2-30">Быняев Иван
                            </option>
                            <option value="2-29">Дейберт Наталья
                            </option>
                            <option value="2-9">Пунегова Ольга
                            </option>
                            <option value="2-21">Потолицына Екатерина
                            </option>
                            <option value="2-10">Розовел Юлия
                            </option>
                        </select>
                        <?php
                        if ($messages && $messages->get('rec')[0]) {
                            echo '<p class="error" style="display:block;">'.$messages->get('rec')[0].'</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row_sec">
                <div class="txt">Ваше имя:
                </div>
                <div class="fields">
                    <input type="text" class="txt_field" name="name" value="{{ request()->get('name') }}">
                    <?php
                    if ($messages && $messages->first('name')) {
                        echo '<p class="error" style="display:block;">'.$messages->first('name').'</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="row_sec">
                <div class="txt">Контактная информация:
                </div>
                <div class="fields">
                    <input type="text" class="txt_field" name="contacts" value="{{ request()->get('contacts') }}">
                    <?php
                    if ($messages && $messages->get('contacts')[0]) {
                        echo '<p class="error" style="display:block;">'.$messages->get('contacts')[0].'</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="row_sec">
                <div class="txt">Текст сообщения:
                </div>
                <div class="fields">
                    <div>
                    <textarea name="message">{{ request()->get('message') }}</textarea>
                    <?php
                    if ($messages && $messages->get('message')[0]) {
                        echo '<p class="error" style="display:block;">'.$messages->get('message')[0].'</p>';
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="row_sec captcha">
                <div class="txt">Сосчитайте:
                </div>
                <div class="fields">
                    <img src="{{ captcha_src() }}" alt="">
                    <span>=
                    </span>
                    <input type="text" class="txt_field" name="captcha">
                    <?php
                    if ($messages && $messages->get('captcha')[0]) {
                        echo '<p class="error" style="display:block;">'.$messages->get('captcha')[0].'</p>';
                    }
                    ?>
                    <div class="clear">
                    </div>
                    <div class="personal_info">
                        <input type="checkbox" name="personal" id="personal">
                        <label for="personal">Я даю согласие на обработку персональных данных
                        </label>
                    <?php
                    if ($messages && $messages->get('personal')[0]) {
                        echo '<p class="error" style="display:block;">'.$messages->get('personal')[0].'</p>';
                    }
                    ?>
                    </div>
                    <input type="submit" value="Готово" class="btn_done">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection