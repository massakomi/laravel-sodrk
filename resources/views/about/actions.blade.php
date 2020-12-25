@extends('layouts.app')

@section('content')

   <div class="heading">
      Акции
      @include('directions')
   </div>
<div class="promo">
   @foreach ($data as $key => $item)
    <div class="promo_one">
      <div class="img"><a href="/action/{{ $item->alias }}"><img height="126" src="/files/{{ $item->image['path'] }}?{{ time() }}" alt=""></a></div>
      <div class="txt">
        <p class="date">{{ date('d.m.Y', strtotime($item->created_at)) }}</p>
        <p class="hd">{{ $item->name }}</p>
        <p>{{ $item->from_to }}</p>
        <a href="/action/{{ $item->alias }}" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
    </div> 
  @endforeach 
</div>

@include('paginate')

@endsection

