
@if (!$nopages)
   {{ $data->appends(['on-page' => $onPage, 'sort-by' => request()->get('sort-by')])->links('vendor.pagination.default') }}
@endif

<?php
$url = parse_url(url()->full());
if ($url['query']) {
    parse_str($url['query'], $query);
    if (isset($query['on-page'])) {
        unset($query['on-page']);
    }
    if (!$query) {
        unset($url['query']);
    } else {
        $url['query'] = http_build_query($query);
    }
}
$path = $pathAll = url()->current();
if ($url['query']) {
    $pathAll .= '?'.$url['query'];
    $path = $pathAll.'&';
} else {
    $path .= '?';
}
?>

   <!-- promo -->
   <div class="pag_show" style="{{ $style }}">
      <p>Страница 1 из 1</p>
      <div class="pag_select">
         <p>Выводить на странице</p>
         <div class="select change">
            <select name="on-page" style="opacity: 0; position: absolute; top: -10000px; right: 1000px; display: none;">
               <option value="все" data-url="{{$pathAll}}">все</option>
                @for ($i = 10; $i <= 50; $i+= 10)
                    <option value="{{$i}}" data-url="{{$path}}on-page={{$i}}" {{$onPage == $i ? 'selected' : ''}}>{{$i}}</option>
                @endfor
            </select>
         </div>
      </div>
      <div class="clear"></div>
   </div>
   <!-- pagination end -->
