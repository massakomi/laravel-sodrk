<div class="head_select">
   Направление:
   <div class="select change">
          <select name="direction">
          @foreach ($directions as $key => $item)
              <option value="{{$key ?: ''}}" @if ($directionId == $key) selected @endif 
              	data-url="/{{ preg_replace('~/\d+$~i', '', $path) }}{{$key ? '/'.$key : ''}}">{{$item}}</option>
          @endforeach
          </select>
   </div>
</div>
<div class="clear"></div>