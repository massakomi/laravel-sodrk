@extends('layouts.app')

@section('meta_title', 'Содействие - Вакансии')
@section('meta_description', '')
@section('meta_keywords', '')

@section('content')
<p class="heading">Вакансии</p>
<div class="vacancies">
    <div class="wysiwyg">
        <p>Компания «Содействие» постоянно и динамично развивается. Компания заинтересована в привлечении молодых, энергичных, целеустремленных специалистов. Мы ценим людей, ориентированных на результат, на профессиональное развитие и самосовершенствование, способных профессионально и на современном уровне решать сложные задачи. Мы ценим трудолюбие, коммуникабельность, ответственность и активную жизненную позицию.
        </p>
        <p>Работа в Содействии — это интересные вакансии, достойный уровень заработной платы, возможность обучения на курсах повышения квалификации, программа карьерного и профессионального роста, социальный пакет, доброжелательный коллектив, разнообразные корпоративные мероприятия, как для самих сотрудников, так и для их семей (спорт, активный отдых).
        </p>
        <p>Обучение и развитие, а также создание комфортных условий для эффективной работы — основа кадровой политики компании.
        </p>
        <p>Если Вы перспективный специалист и уверены в себе, присоединяйтесь к нашей сплоченной команде! Здесь Вы можете найти список вакансий, открытых на данный момент.
        </p>
    </div>
    @foreach ($data as $key => $item)
    <div class="vacancy_one">
        <p class="hd">Программист 1С</p>
        <div class="field">
            <span class="name">Пол:</span>
            <p>Не важно</p>
        </div>
        @if ($item->education)
        <div class="field">
            <span class="name">Уровень образования:</span>
            <div>{!! $item->education !!}</div>
        </div>
        @endif
        @if ($item->duty)
        <div class="field">
            <span class="name">Должностные обязанности:</span>
            <div>{!! $item->duty !!}</div>
        </div>
        @endif
        @if ($item->treb)
        <div class="field">
            <span class="name">Требования:</span>
            <div>{!! $item->treb !!}</div>
        </div>
        @endif
        @if ($item->weoffer)
        <div class="field">
            <span class="name">Мы предлагаем:</span>
            <div>{!! $item->weoffer !!}</div>
        </div>
        @endif
        <div class="field">
            <div class="name"></div>
            <div><a href="/vacancy/{{$item->id}}" class="btn_blue">Откликнуться на вакансию</a></div>
        </div>
    </div>
    @endforeach
</div>

@endsection

@section('styles')
<style>
	.field {display:flex; margin-bottom: 10px;}
	.vacancy_one .field .name {width: 25%!important}
	.vacancy_one .field > div {width: 75%; font-size: 14px;}
	.vacancy_one .field p {margin: inherit;}
	.vacancy_one a.btn_blue {margin: 0;}
</style>
@endsection
