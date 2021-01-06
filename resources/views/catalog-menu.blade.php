@if ($sectionCode == 'filter')
    <ul style="display: none">
@else
<div class="l_catalog">
    <ul>
@endif
@foreach ($catalogMenu[''] as $url => $item)
        <li>
        <a href="/{{ $item['alias_full'] }}" class="{{ in_array($item['id'], $categorySelected) ? 'open current' : '' }}"><i></i>{{ $item['name'] }}</a>
        <ul class="sub">
    @if($catalogMenu[$item['id']])
    @foreach ($catalogMenu[$item['id']] as $sub)
            <li>
            <a href="/{{ $sub['alias_full'] }}" class="{{ in_array($sub['id'], $categorySelected) ? 'cur' : '' }}"><i></i>{{ $sub['name'] }}</a>
            </li>
    @endforeach
    @endif
        </ul>
        </li>
@endforeach
    </ul>
@if ($sectionCode != 'filter')
</div>
@endif
