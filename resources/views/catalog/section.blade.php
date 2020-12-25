@extends('layouts.app')

@section('meta_title', '')

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

    <div class="catalog_list2">
        <!-- categories list -->
        <div class="row categories" style="display: flex; flex-wrap: wrap"> 
                @foreach ($categories as $key => $item)
                    <p><a href="/{{ $item->alias_full }}">{{ $item->name }}</a> (total)</p>
                @endforeach 
        </div>
        <!-- categories list end -->
        <!-- category one -->
        @foreach ($categories as $key => $item)
        <div class="category">
            <p class="hd"><a href="/{{ $item->alias_full }}">{{ $item->name }}</a> (total)</p>
            <ul>
                <li style="z-index: 0;">
                    <a href="/item/adapter-ac-hp-pa-1900-08h2-hp-pavilion-14-e-14-n-15"> <span class="icon_wrap"><i class="sale"><span style="display: none;">Распродажа</span></i>
                        </span> <span class="img"><img src="/files/items/26181_thumbnail.jpg?1604114670" alt="Адаптер AC HP PA-1900-08H2 HP Pavilion 14-e, 14-n"></span> <span class="txt">Адаптер AC HP PA-1900-08H2 HP Pavilion 14-e, 14-n, 15-e, 15-n, 17-e, 15-e051sr, 15-n001sr, 17-e001sc, 19.5V, 4.62A, 90W с иглой</span> </a>
                    <div class="bsk_info choice">
                        <div class="close"></div> <i></i>
                        <p>Товар в корзине</p> <a href="javascript:void(0)" class="cont close_bsk_info">Продолжить</a> <a href="/order/cart" class="ord">В корзину</a>
                        <div class="clear"></div>
                    </div>
                    <p class="price">999.00<i></i></p>
                    <p class="old_price"> 1 199.00 </p> <span class="status_wrap">
                                    <a href="#" class="status add" data-src="/order/add-to-cart/26181"></a>
                                    В наличии                                   </span> </li>
            </ul>
            <div class="clear"></div>
        </div>
        @endforeach
    </div>
    <div class="wysiwyg">
        {!! $content !!}
    </div>


@endsection
