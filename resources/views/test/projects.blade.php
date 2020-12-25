@extends('layouts.app')

@section('content')

   <div class="heading">
      Проекты
      <div class="head_select">
         Направление:
         <div class="select change">
                <select name="direction">
                @foreach ($directions as $key => $item)
                    <option value="{{$key ?: ''}}" @if ($directionId == $key) selected @endif data-url="/news{{$key ? '/'.$key : ''}}">{{$item}}</option>
                @endforeach
                </select>
         </div>
      </div>
      <div class="clear"></div>
   </div>
 

<div class="projects">
   <div class="pr_one">
      <div class="img"><a href="/project/30"><img src="/files/projects/30_thumbnail.jpg?1511735144" alt=""></a></div>
      <div class="txt">
         <p class="hd">Ввод в промышленную эксплуатацию корпоративной мини-АТС.</p>
         <p>Работы проводились в ГБУЗ РК «Республиканская инфекционная больница».</p>
         <a href="/project/30" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
   <div class="pr_one">
      <div class="img"><a href="/project/29"><img src="/files/projects/29_thumbnail.jpg?1511994242" alt=""></a></div>
      <div class="txt">
         <p class="hd">Техническое обслуживание и ремонт копировально-печатной и организационной техники органов государственной власти и подведомственных им учреждений по всей территории РК.</p>
         <p>Заключен контракт на 2016 год.</p>
         <a href="/project/29" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
   <div class="pr_one">
      <div class="img"><a href="/project/28"><img src="/files/projects/28_thumbnail.jpg?1511821410" alt=""></a></div>
      <div class="txt">
         <p class="hd">Автоматизация продуктовых магазинов.</p>
         <p>Подключение к системе ЕГАИС.</p>
         <a href="/project/28" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
   <div class="pr_one">
      <div class="img"><a href="/project/27"><img src="/files/projects/27_thumbnail.jpg?1511735144" alt=""></a></div>
      <div class="txt">
         <p class="hd">Монтаж локально-вычислительной сети в Государственном учреждении регионального отделения фонда социального страхования по РК в Ухте и Печоре. </p>
         <p>Проводим работы по всей республике!</p>
         <a href="/project/27" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
   <div class="pr_one">
      <div class="img"><a href="/project/26"><img src="/files/projects/26_thumbnail.jpg?1511735144" alt=""></a></div>
      <div class="txt">
         <p class="hd">Монтаж охранно-пожарной сигнализации в ГБУЗ РК «Воркутинская больница скорой помощи».</p>
         <p>Новый проект по охранно-пожарной сигнализации.</p>
         <a href="/project/26" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
   <div class="pr_one">
      <div class="img"><a href="/project/25"><img src="/files/projects/25_thumbnail.jpg?1511821409" alt=""></a></div>
      <div class="txt">
         <p class="hd">Монтаж систем видеонаблюдение в спортивном комплексе с бассейном в г.Воркута.</p>
         <p>Наша компания проводила работы на новом спортивном объекте на карте нашей Республики.</p>
         <a href="/project/25" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
   <div class="pr_one">
      <div class="img"><a href="/project/24"><img src="/files/projects/24_thumbnail.jpg?1511821410" alt=""></a></div>
      <div class="txt">
         <p class="hd">Салон-бутик для животных "Монамур" </p>
         <p>Новый зоомагазин открылся по адресу ул. Орджоникидзе 47. Современный магазин зоотоваров - это широкий ассортимент кормов и аксессуаров для питомцев.</p>
         <a href="/project/24" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
   <div class="pr_one">
      <div class="img"><a href="/project/23"><img src="/files/projects/23_thumbnail.jpg?1511735144" alt=""></a></div>
      <div class="txt">
         <p class="hd">Автоматизация магазина "Мастер House"</p>
         <p>В административном центре Сысольского района, в с.Визинга открылся магазин строительного и отделочного инвентаря – «Мастер House».</p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <a href="/project/23" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
   <div class="pr_one">
      <div class="img"><a href="/project/22"><img src="/files/projects/22_thumbnail.jpg?1511735144" alt=""></a></div>
      <div class="txt">
         <p class="hd">Филиал ОАО "СО ЕЭС" Коми РДУ</p>
         <p style="text-align: justify;">Цель проекта: определить оптимальное кол-во точек доступа и их расположение для обеспечения полного покрытия сетью Wi-Fi всех помещений здания Коми РДУ.</p>
         <a href="/project/22" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
   <div class="pr_one">
      <div class="img"><a href="/project/21"><img src="/files/projects/21_thumbnail.png?1607985128" alt=""></a></div>
      <div class="txt">
         <p class="hd">Анкер Макс</p>
         <p>Обслуживание компании, занимающейся продажей строительных материалов и техники.</p>
         <a href="/project/21" class="btn">Подробнее</a>
      </div>
      <div class="clear"></div>
   </div>
   <div class="pr_fix"></div>
</div>


  <div class="pagination">
    <table>
      <tbody><tr>
        <td class="col1">
                                            </td>
        <td class="col2">
          <span class="current">1</span>
<span class="pag_sep">.</span>
<span><a href="/projects?page=2">2</a></span>
<span class="pag_sep">.</span>
<span><a href="/projects?page=3">3</a></span>               </td>
        <td class="col3">
          <a href="/projects?page=3" class="btn_last"></a>                  <a href="/projects?page=2" class="btn_next" rel="next"></a>               </td>
      </tr>
    </tbody></table>
  </div>

   <!-- promo -->
   <div class="pag_show">
      <p>Страница 1 из 1</p>
      <div class="pag_select">
         <p>Выводить на странице</p>
         <div class="select change">
            <select name="on-page" style="opacity: 0; position: absolute; top: -10000px; right: 1000px; display: none;">
               <option value="все" data-url="/news?on-page=%D0%B2%D1%81%D0%B5">все</option>
               <option value="10" data-url="/news?on-page=10">10</option>
               <option value="20" data-url="/news?on-page=20">20</option>
               <option value="30" data-url="/news?on-page=30">30</option>
            </select>
         </div>
      </div>
      <div class="clear"></div>
   </div>
   <!-- pagination end -->


@endsection
