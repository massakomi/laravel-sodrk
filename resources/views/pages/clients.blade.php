@extends('layouts.app')

@section('content')

    <div class="heading">
        Клиенты
        <div class="head_select">
            Направление:
            <div class="select change">
                <select name="direction">
                @foreach ($directions as $key => $item)
                    <option value="{{$key ?: ''}}" @if ($directionId == $key) selected @endif data-url="/clients{{$key ? '/'.$key : ''}}">{{$item}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <!-- clients -->
    <div class="clients">
        <div class="row_c">
@foreach ($clients as $key => $item)
    @if ($key && $key % 4 == 0)
        <div class="clear"></div>
        </div><div class="row_c">
    @endif
            <div class="client_one">
                <a href="{{$item->url}}" target="_blank" rel="nofollow">
                    <img src="/files/clients/{{$item->image}}" alt="">
                    <span>{{$item->name}}</span>
                </a>
            </div>
@endforeach
        </div>
    </div>

@endsection
