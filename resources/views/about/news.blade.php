@extends('layouts.app')

@section('content')

   <div class="heading">
      Новости
      <div class="head_select">
         Направление:
         <div class="select change">
                <select name="direction">
                @foreach ($directions as $key => $item)
                    <option value="{{$key ?: ''}}" @if ($directionId == $key) selected @endif data-url="/news{{$key ? '/'.$key : ''}}">{{$item}}</option>
                @endforeach
                </select>
         </div>
      </div>
      <div class="clear"></div>
   </div>
   <!-- projects -->
   <div class="news_list">
      @foreach ($data as $key => $item)
      <div class="pr_one">
         <div class="img"><a href="/news/{{ $item['alias'] }}"><img src="/files/{{ $item->file['path'] }}?{{ time() }}" alt=""></a></div>
         <div class="txt">
            <p class="date">{{ $item['created_at'] }}</p>
            <p class="hd">{{ $item['name'] }}</p>
            <a href="/news/{{ $item['alias'] }}" class="btn">Подробнее</a>
         </div>
         <div class="clear"></div>
      </div>
      @endforeach
      <div class="pr_fix"></div>
   </div>
   
@include('paginate')


@endsection
