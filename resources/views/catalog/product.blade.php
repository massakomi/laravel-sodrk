@extends('layouts.app')

@section('meta_title', $meta_title)
@section('meta_description', $meta_description)

@section('content')

<h1 class="heading2">{{$item->name}}</h1>
<div class="catalog_item">
    <div class="item_ph">
        <div class="img_full">
            <div class="icon_wrap">
                @if ($item->sale)
                <div class="sale"><span>Распродажа</span></div>
                @endif
            </div>
            <a href="{{ $item->imagePath }}" class="fancybox" rel="group">
                <img src="{{ $item->imagePreview(370) }}"  alt="{{$item->name}}">
            </a>
            @foreach ($item->imagesAttached as $key => $img)
            <a href="/files/{{ $img->path }}?{{ time() }}" style="display: none;" class="fancybox" rel="group">
                <img src="/files/{{ $img->path }}?{{ time() }}" alt="">
            </a>
            @endforeach
        </div>

        @if ($item->imagesAttached)
        <div class="thumb_wrap">
            <div class="thumb_one current">
                <a href="#"><img src="/files/{{ $item->image['path'] }}?{{ time() }}" style="width: 68px; height: 68px" alt=""><i></i></a>
            </div>
            @foreach ($item->imagesAttached as $key => $img)
            <div class="thumb_one">
                <a href="#"><img src="/files/{{ $img->path }}?{{ time() }}" style="width: 68px; height: 68px" alt=""><i></i></a>
            </div>
            @endforeach
            <div class="clear"></div>
        </div>
        @endif

    </div>
    <div class="it_txt_wrap">
        <div class="price">
            <p class="main-price">Розничная цена: <br><span>{{ $item->priceFormatted }}</span><i></i></p>
            @if ($item->price_old)
            <p class="gray">Старая цена:<br><span>{{ $item->priceOldFormatted }}<span class="line"></span><i style="top: 8px;"></i></span></p>
            @endif
            @if ($item->credit)
            <div class="product_credit">
                Кредит р/мес:
                <span id="loan-23989">{{ $item->priceCredit }}<i style="top: 8px;"></i></span>
                <div class="product_credit__popup">
                    <span>Как купить в кредит?</span>
                    <div class="product_credit__content">
                    <p>Просто положите товар в корзину. При выборе способа оплаты выберите «В кредит». Дальше система сама проведет вас через процедуру покупки.</p>
                    <a href="/about-credit">Пошаговая инструкция</a>
                    <div class="product_credit__cross"></div>
                    </div>
                </div>
            </div>
            @endif
            <p>Гарантия:<br><span class="garanthy">{{ $item->garanthy }}</span></p>
        </div>
        <div class="buttons">
            <div class="bsk_info choice item">
                <div class="close"></div> <i></i>
                <p>Товар в корзине</p> <a href="javascript:void(0)" class="cont close_bsk_info">Продолжить</a>
                <a href="/order/cart" class="ord">В корзину</a>
                <div class="clear"></div>
            </div>
            <button data-src="/order/add-to-cart/{{$item->id}}" class="add-to-cart"> В корзину<i></i></button>
            <div class="availability">
                <p class="hd">Наличие:</p>
                @foreach ($item->stocks as $key => $stock)
                <div class="av_one">
                    <p>{{ $stock->name }}</p>
                    @for ($i = 0; $i < 10; $i++)
                        <div class="{{ $i < $stock->value ? 'it_y' : '' }}"></div>
                    @endfor
                    @if (!$stock->value)
                       <p class="ord">В транзите</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!-- info -->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="tabs">
                <!-- tab links -->
                <div class="tab_links"> <a id="tab1" href="#" class="active">Технические характеристики</a> <span></span> <a id="tab3" href="#">Информация</a>
                    <div class="clear"></div>
                </div>
                <!-- tab links end -->
                <div id="con_tab1" class="tab active">
                    <div class="wysiwyg">
                        <p>{{$item->name}}, купить в Сыктывкаре в интернет магазине СоДействие, цена {{ $item->price }} рублей</p>
                    </div>
                    @foreach ($propValues as $group => $items)
                    <div class="params">
                        <h2 class="hd">{{ $group }}</h2>
                        @foreach ($items as $name => $value)
                        <p class="p_one"> <span class="name">{{$name}}</span> <span class="dots"></span> <span class="txt">{{$value}}</span> </p>
                        @endforeach
                    </div>
                    @endforeach
                    <div class="wysiwyg">
                        <p>{{ $item->name }}</p>
                    </div>
                </div>
                <div id="con_tab3" class="tab">
                    <!--noindex-->
                    <div class="wysiwyg">
                        {!! $item->description !!}
                    </div>
                    <!--/noindex-->
                </div>
            </div>
        </div>
    </div>
    <!-- info end -->
    <!-- pagination -->
    <div class="pagination">
        <table>
            <tr>
                <td class="col1"> </td>
                <td class="col2"> <span><a href="{{ $item->category['alias_full'] }}">Вернуться к списку</a></span> </td>
                <td class="col3">
                    <a href="/item/veb-kamera-acd-vision-uc100-cmos-0-3mpiks-640x480p" class="btn_next"></a>
                </td>
            </tr>
        </table>
    </div>
    <div class="pag_show"> </div>
    <!-- pagination end -->
    <!-- category one -->
    <!-- category one -->
    <div class="category">
        <p class="hd"><a href="">Похожие товары</a></p>
        <ul>
            @foreach ($similars as $key => $stm)
            <li>
                <a href="/item/{{ $stm->alias }}">
                    <span class="icon_wrap">
                        @if ($istmtem->sale)
                        <i class="sale"><span>Скидка на товар</span></i>
                        @endif
                    </span>
                    <span class="img"><img src="/files/{{ $stm->image['path'] }}?{{ time() }}" alt="" style="max-width: 110px"></span>
                    <span class="txt">{{ $stm->name }}</span>
                </a>
                <div class="bsk_info choice">
                    <div class="close"></div> <i></i>
                    <p>Товар в корзине</p> <a href="javascript:void(0)" class="cont close_bsk_info">Продолжить</a> <a href="/order/cart" class="ord">В корзину</a>
                    <div class="clear"></div>
                </div>
                <p class="price">{{ $stm->priceFormatted }}<i></i></p>

                <p class="old_price">{{ $stm->priceOldFormatted }}</p>

                <span class="status_wrap"><a href="#" class="add" data-src="/order/add-to-cart/{{ $stm->id }}"></a>В наличии</span>
            </li>
            @endforeach
        </ul>
        <div class="clear"></div>
    </div>
    <!-- category one end -->
</div>


<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "{{ $item->name }}",
  "image": "https://{{ request()->getHttpHost() }}/files/{{ $item->image['path'] }}",
  "description": "11",
  "mpn": "{{ $item->mpn }}",
  "brand": {
    "@type": "Brand",
    "name": "{{ $propValues['Общие']['Производитель'] }}"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "{{ $item->ratingValue }}",
    "reviewCount": "{{ $item->reviewCount }}"
  },
  "offers": {
    "@type": "Offer",
    "priceCurrency": "RUB",
    "price": "{{ $item->price }}",
    "itemCondition": "http://schema.org/UsedCondition",
    "availability": "http://schema.org/InStock",
    "seller": {
      "@type": "Organization",
      "name": "Содействие"
    }
  }
}
</script>

@endsection
