@extends('layouts.app')

@section('meta_title', $meta_title)
@section('meta_description', $meta_description)

@section('content')

    <h1 class="heading2">{{ $section_name }}</h1>
    @if ($seo_txt)
    <div class="seo_txt">
        <div class="seo_txt_wrap">
            <div class="wysiwyg">
                {!! $seo_txt !!}
            </div>
        </div>
        <div class="btn_txt_show" style="display: none;"> <span> <b>Подробнее</b> <i></i> </span> </div>
    </div>
    @endif

    @if ($data)

@include('paginate', ['style' => 'background: none;margin: -14px 0 17px;padding: 0;', 'nopages' => 1])

<!-- filter -->
<div class="catalog_f">
    <span class="hd">Упорядочить по:</span>
    <span class="name">
        Наименованию
        <a href="{{ url()->current() }}?sort-by=name-up" {!! request()->get('sort-by') == 'name-up' ? ' class="current"' : '' !!}>Ая</a>
        <a href="{{ url()->current() }}?sort-by=name-down" {!! request()->get('sort-by') == 'name-down' ? ' class="current"' : '' !!}>Яа</a>
    </span>
    <span class="price">
        Цене
        <a href="{{ url()->current() }}?sort-by=price-up" class="btn_up{!! request()->get('sort-by') == 'price-up' ? ' current' : '' !!}"></a>
        <a href="{{ url()->current() }}?sort-by=price-down" class="btn_down{!! request()->get('sort-by') == 'price-down' ? ' current' : '' !!}"></a>
    </span>
    <span class="new">
        <a href="{{ url()->current() }}?sort-by=novelty" {!! request()->get('sort-by') == 'novelty' ? ' class="current"' : '' !!}>Сначала новинки</a>
    </span>
    <span class="pull-right">
        <a href="{{ url()->current() }}?sort-by=sale" {!! request()->get('sort-by') == 'sale' ? ' class="current"' : '' !!}>Сначала спецпредложения</a>
    </span>
    <div class="clear"></div>
</div>

<!-- filter end -->
<div class="catalog_list3">
   @foreach ($data as $key => $item)
    <div class="it_one">
        <div class="img">
            <a href="/item/{{ $item->alias }}"><img src="/files/{{ $item->image['path'] }}?{{ time() }}" style="max-height: 110px; max-width: 110px" alt=""></a>
        </div>
        <div class="txt">
            <p class="name"><a href="/item/{{ $item->alias }}">{!! $item->name !!}</a></p>
            <table>
                <tbody>
                    <tr>
                        <td>Операционная система:</td>
                        <td>Linux</td>
                    </tr>
                    <tr>
                        <td> Линейка процессора:</td>
                        <td>Intel Core i3</td>
                    </tr>
                    <tr>
                        <td>Объём оперативной памяти, Гб:</td>
                        <td>4 Гб</td>
                    </tr>
                    <tr>
                        <td> Жесткий диск (HDD), Гб:</td>
                        <td>1000 Гб</td>
                    </tr>
                    <tr>
                        <td>Твердотельный диск (SSD), Гб:</td>
                        <td>свободный слот M.2 SATA</td>
                    </tr>
                    <tr>
                        <td>Модель видеокарты:</td>
                        <td>Intel HD</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="price">
            <p>Розничная цена: <br><span>{{ $item->priceFormatted }}</span><i></i></p>
            @if ($item->price_old)
                <p class="black"><b class="line">{{ $item->priceOldFormatted }}</b></p>
            @endif
            @if ($item->credit)
                <p class="gray">Кредит от р/мес:<br><span>{{ $item->priceCredit }}<span></span><i></i></span></p>
            @endif
        </div>
        <div class="icon">
            @if ($item->sale)
            <div class="sale"><span style="display: none;">Распродажа</span></div>
            @endif
            @if ($item->special)
            <div class="spec"><span style="display: none;">Спецпредложение</span></div>
            @endif
        </div>
        <div class="buttons">
            <div class="bsk_info choice">
                <div class="close"></div> <i></i>
                <p>Товар в корзине</p>
                <a href="javascript:void(0)" class="cont close_bsk_info">Продолжить</a>
                <a href="/order/cart" class="ord">В корзину</a>
                <div class="clear"></div>
            </div>
            <input type="submit" value="Купить" data-src="/order/add-to-cart/{{ $item->id }}" class="add-to-cart">
            <p>{{ $item->stock }}</p>
            @if ($item->credit)
            <div class="catalog_list__credit"></div>
            @endif
        </div>
        <div class="clear"></div>
    </div>
  @endforeach
</div>
@include('paginate')

@else
<a href="/import?alias={{ $alias_full }}" class="href" style="font-size: 40px; color: red">import</a>

    @endif


    <div class="catalog_list2">
        <!-- categories list -->
        <div class="row categories" style="display: flex; flex-wrap: wrap">
                @foreach ($categories as $key => $item)
                    <p><a href="/{{ $item['alias_full'] }}">{{ $item['name'] }}</a> {{ $item['total'] ? '('.$item['total'].')' : '' }}</p>
                @endforeach
        </div>
        <!-- categories list end -->
        <!-- category one -->
        @foreach ($categories as $item)
        <div class="category">
            <p class="hd"><a href="/{{ $item['alias_full'] }}">{{ $item['name'] }}</a> {{ $item['total'] ? '('.$item['total'].')' : '' }}</p>
            <ul>
                @foreach ($item['projects'] as $product)
                <li style="z-index: 0;">
                    <a href="/item/{{ $product->alias }}">
                        <span class="icon_wrap">
                            @if ($product->special)
                            <i class="spec"><span style="display: none;">Специальное предложение</span></i>
                            @endif
                            @if ($product->sale)
                            <i class="sale"><span style="display: none;">Распродажа</span></i>
                            @endif
                        </span>
                        <span class="img">
                            <img src="/files/{{ $product->image['path'] }}?{{ time() }}" style="max-height: 110px; max-width: 110px" alt="{{ $product->name }}">
                        </span>
                        <span class="txt">{{ $product->name }}</span>
                    </a>
                    <div class="bsk_info choice">
                        <div class="close"></div> <i></i>
                        <p>Товар в корзине</p> <a href="javascript:void(0)" class="cont close_bsk_info">Продолжить</a> <a href="/order/cart" class="ord">В корзину</a>
                        <div class="clear"></div>
                    </div>
                    <p class="price">{{ $product->priceFormatted }}<i></i></p>
                    <p class="old_price">{{ $product->priceOldFormatted }}</p>
                    <span class="status_wrap">
                        <a href="#" class="status add" data-src="/order/add-to-cart/26181"></a> В наличии
                    </span>
                </li>
                @endforeach
            </ul>
            <div class="clear"></div>
        </div>
        @endforeach
    </div>
    <div class="wysiwyg">
        {!! $content !!}
    </div>


@endsection
