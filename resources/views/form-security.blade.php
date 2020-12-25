@extends('layouts.app')
 
@section('content')
  
<p class="heading">Оформление заявки</p>

@if ($success)
   Сообщение отправлено!
   
@else

<!-- service request -->
<div class="srv_r form_fields">
   <div class="ord_info form_fields">
      <form action="" method="post">
         {{ csrf_field() }}
         <div class="row_sec">
            <div class="txt">ФИО:<span>*</span></div>
            <div class="fields">
               <input type="text" class="txt_field" name="name" value="">
                 <?php
                 if ($errors && $errors->has('name')) {
                     echo '<p class="error" style="display:block;">Поле обязательно для заполнения</p>';
                 }
                 ?>
            </div>
         </div>
         <div class="row_sec">
            <div class="txt">Контактный телефон:<span>*</span></div>
            <div class="fields">
               <input type="text" class="txt_field" name="phone" value="">
                 <?php
                 if ($errors && $errors->has('phone')) {
                     echo '<p class="error" style="display:block;">Поле обязательно для заполнения</p>';
                 }
                 ?>
            </div>
         </div>
         <div class="row_sec">
            <div class="txt">Контрагент:<span>*</span></div>
            <div class="fields">
               <div class="radio">
                  <input type="radio" name="person" id="p1" value="0" checked="checked">
                  <label for="p1">Физическое лицо</label>
               </div>
               <div class="radio">
                  <input type="radio" name="person" id="p2" value="1">
                  <label for="p2">Юридическое лицо</label>
               </div>
               <div class="clear"></div>
            </div>
         </div>
         <div class="row_sec">
            <div class="txt">Вид ремонта:<span>*</span></div>
            <div class="fields">
               <div class="radio">
                  <input type="radio" name="type" id="t1" value="0" checked="checked">
                  <label for="t1">Гарантийный</label>
               </div>
               <div class="radio">
                  <input type="radio" name="type" id="t2" value="1">
                  <label for="t2">Негарантийный</label>
               </div>
               <div class="clear"></div>
            </div>
         </div>
         <div class="row_sec">
            <div class="txt">Документ продажи:</div>
            <div class="fields">
               <input type="text" class="txt_field" name="doc" value="">
                 <?php
                 if ($errors && $errors->has('doc')) {
                     echo '<p class="error" style="display:block;">Поле обязательно для заполнения</p>';
                 }
                 ?>
            </div>
         </div>
         <div class="row_sec captcha">
            <div class="txt">Сосчитайте:<span>*</span></div>
            <div class="fields">
               <img src="/captcha" alt="">
               <span>=</span>
               <input type="text" class="txt_field" name="captcha">
                 <?php
                 if ($errors && $errors->has('captcha')) {
                     echo '<p class="error" style="display:block;">Поле обязательно для заполнения</p>';
                 }
                 ?>
               <div class="clear"></div>
               <p class="mandatory">Поля, отмеченные ( <span>*</span> ), обязательны для заполнения</p>
               <div class="personal_info">
                  <input type="checkbox" name="personal" id="personal">
                  <label for="personal">Я даю согласие на обработку персональных данных</label>          
                  {!! $errors && $errors->has('personal') ? ' <p class="error">Нужно дать согласие на обработку персональных данных</p>' : '' !!}
               </div>
               <input type="submit" value="Готово" class="btn_done" onclick="yaCounter6742378.reachGoal('security');" >
            </div>
         </div>
      </form>
   </div>
</div>
@endif


@endsection
