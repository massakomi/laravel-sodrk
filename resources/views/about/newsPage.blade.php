@extends('layouts.app')

@section('content')

   <div class="heading">
      {{ $item->name }}
    </div> 

{!! $item->content !!}

@endsection
