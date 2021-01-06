@extends('layouts.app')

@section('content')

   <div class="heading">
      Полезная информация
   </div>
<div class="projects">
   @foreach ($data as $key => $item)
   <div class="pr_one">
      <div class="img"><a href="/info/{{ $item->alias }}"><img src="/files/{{ $item->image['path'] }}?{{ time() }}" alt=""></a></div>
      <div class="txt">
         <p class="hd">{{ $item->name }}</p>
         <p>{!! $item->preview_text !!}</p>
         <a href="/info/{{ $item->alias }}" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
  @endforeach
   <div class="pr_fix"></div>
</div>

@include('paginate')

@endsection

