
<div class="l_catalog">
    <ul>
@foreach ($catalogMenu[''] as $url => $item)
        <li>
        <a href="/{{ $item['alias_full'] }}"><i></i>{{ $item['name'] }}</a>
        <ul class="sub" style="display: none;">
    @if($catalogMenu[$item['id']])
    @foreach ($catalogMenu[$item['id']] as $sub)
            <li>
            <a href="/{{ $item['alias_full'] }}"><i></i>{{ $sub['name'] }}</a>
            </li>
    @endforeach
    @endif
        </ul>
        </li>
@endforeach
    </ul>
</div>