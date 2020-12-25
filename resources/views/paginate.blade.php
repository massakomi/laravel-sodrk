
   {{ $data->appends(['on-page' => $onPage])->links('vendor.pagination.default') }}

   <!-- promo -->
   <div class="pag_show">
      <p>Страница 1 из 1</p>
      <div class="pag_select">
         <p>Выводить на странице</p>
         <div class="select change">
            <select name="on-page" style="opacity: 0; position: absolute; top: -10000px; right: 1000px; display: none;">
               <option value="все" data-url="/{{$path}}?on-page=%D0%B2%D1%81%D0%B5">все</option>
                @for ($i = 10; $i <= 50; $i+= 10)
                    <option value="{{$i}}" data-url="/{{$path}}?on-page={{$i}}" {{$onPage == $i ? 'selected' : ''}}>{{$i}}</option>
                @endfor 
            </select>
         </div>
      </div>
      <div class="clear"></div>
   </div>
   <!-- pagination end -->