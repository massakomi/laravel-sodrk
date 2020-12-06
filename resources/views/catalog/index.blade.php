@extends('layouts.app')

@section('meta_title', 'Содействие Сыктывкар - Каталог товаров')

@section('content')

<h1 class="heading2">Каталог товаров</h1>
<div class="catalog_list_wrap">
    <div class="catalog_list">
        <ul id="index_catalog_list" class="index_catalog_list level_0"><li class="row_catalog"><ul>
@foreach ($catalogMenu[''] as $url => $item)
            <li class="sub_catalog_item level_0">
                <p class="hd">
                    <a href="/{{ $item['alias_full'] }}">{{ $item['name'] }}</a><i></i>
                </p>
                <span class="count">({{ $item['id'] }})</span>
                @if($catalogMenu[$item['id']])
                    <ul class="sub_catalog_list level_1">
                    @foreach ($catalogMenu[$item['id']] as $sub)
                        <li class="sub_catalog_item level_1">
                            <a href="/{{ $sub['alias_full'] }}">{{ $sub['name'] }}</a>
                            <span class="count">({{ $sub['id'] }})</span>
                            <b></b>
                            @if($catalogMenu[$sub['id']])
                                <ul class="sub_catalog_list level_2">
                                @foreach ($catalogMenu[$sub['id']] as $sub2)
                                    <li class="sub_catalog_item level_2"><a href="/{{ $sub2['alias_full'] }}">{{ $sub2['name'] }}</a></li>
                                @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    </ul>
                @endif
            </li>
@endforeach

        </ul></li> </ul>
    </div>
</div>



@endsection
