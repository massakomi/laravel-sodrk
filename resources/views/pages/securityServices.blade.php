@extends('layouts.app')
 
@section('content')
 
   <p class="heading">Каталог услуг</p>
   <!-- services -->
   <div class="services">
      <div class="serv_category">
         <div class="serv_one">
            <div class="price">
               <button class="btn_ord" onclick="window.location.href='/request/security/3';return false;">Заказать</button>
            </div>
            <p class="head"><a href="/security/service/3">Монтаж и техническое обслуживание охранно-пожарных систем</a></p>
            <p>В настоящее время вопрос создания эффективной общей системы безопасности помещений различного назначения, от квартиры до крупного торгового, промышленного или любого иного здания, является достаточно актуальным.</p>
         </div>
         <div class="serv_one">
            <div class="price">
               <button class="btn_ord" onclick="window.location.href='/request/security/2';return false;">Заказать</button>
            </div>
            <p class="head"><a href="/security/service/2">Проектирование и монтаж систем видеонаблюдения</a></p>
            <p>За годы работы на рынке систем безопасности компания «Содействие» накопила большой опыт установки, проектирования и модернизации систем видеонаблюдения для офисов, складов, предприятий, автостоянок и зданий различной степени сложности.</p>
         </div>
         <div class="serv_one">
            <div class="price">
               <button class="btn_ord" onclick="window.location.href='/request/security/1';return false;">Заказать</button>
            </div>
            <p class="head"><a href="/security/service/1">Проектирование и монтаж структурированных кабельных систем</a></p>
            <p>СКС (структурированная кабельная система) - физическая основа инфраструктуры современного здания, позволяющая свести воедино множество сетевых сервисов различного предназначения.</p>
         </div>
         <div class="serv_one">
            <div class="price">
               <button class="btn_ord" onclick="window.location.href='/request/security/4';return false;">Заказать</button>
            </div>
            <p class="head"><a href="/security/service/4">Монтаж и проектирование систем контроля и учета доступа (СКУД)</a></p>
            <p>Данные системы предназначены для разрешения или запрета доступа сотрудников в то или иное помещение охраняемого объекта.</p>
         </div>
         <div class="serv_one">
            <div class="price">
               <button class="btn_ord" onclick="window.location.href='/request/security/5';return false;">Заказать</button>
            </div>
            <p class="head"><a href="/security/service/5">Системы IP-телефонии на базе программной IP-АТС Asterisk</a></p>
            <p>IP-телефония в настоящее время самое востребованное средство коммуникаций. Большинство компаний рано или поздно приходит к тому, что им необходима система корпоративной связи. Компания «Содействие» предлагает решения для систем IP-телефонии на базе программной IP-АТС Asterisk.</p>
         </div>
         <div class="serv_one">
            <div class="price">
               <button class="btn_ord" onclick="window.location.href='/request/security/6';return false;">Заказать</button>
            </div>
            <p class="head"><a href="/security/service/6">Обслуживание систем видеонаблюдения</a></p>
            <p>Обслуживание систем видеонаблюдения может проводиться с различной периодичностью. Для конкретного объекта компания «Содействие» подбирает оптимальный график работ, которые позволяют регулярно оценивать исправность системы и поддерживать должный уровень ее функциональности.</p>
         </div>
      </div>
   </div> 

@endsection
