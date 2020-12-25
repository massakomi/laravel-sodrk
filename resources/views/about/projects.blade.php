@extends('layouts.app')

@section('content')

   <div class="heading">
      Проекты
      @include('directions')
   </div>
<div class="projects">
   @foreach ($data as $key => $item)
   <div class="pr_one">
      <div class="img"><a href="/project/{{ $item->id }}"><img src="/files/{{ $item->image['path'] }}?{{ time() }}" alt=""></a></div>
      <div class="txt">
         <p class="hd">{{ $item->name }}</p>
         <p>{{ $item->content }}</p>
         <a href="/project/{{ $item->id }}" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
  @endforeach
   <div class="pr_fix"></div>
</div>

@include('paginate')

@endsection

