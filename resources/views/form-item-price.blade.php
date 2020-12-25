
<div class="close"></div>
<div class="hd">Уточните возможность покупки товара не из каталога</div>

@if ($success)
	Сообщение отправлено!
	
@else

<form action="/request/form/item-price" class="form_fields" method="post">
  {{ csrf_field() }}
	<div class="row_sec">
		<div class="txt">Ваше имя:</div>
		<div class="fields">
			<input type="text" class="txt_field {{ $errors && $errors->has('name') ? ' error' : ''}}" name="name" value="">
					</div>
	</div>
	<div class="row_sec">
		<div class="txt">Контактная информация:</div>
		<div class="fields">
			<input type="text" class="txt_field {{ $errors && $errors->has('contacts') ? ' error' : ''}}" name="contacts" value="">
					</div>
	</div>
	<div class="row_sec">
		<div class="txt" style="padding-top: 5px;">Наименование желаемого товара:</div>
		<div class="fields">
			<input type="text" class="txt_field" name="item {{ $errors && $errors->has('item') ? ' error' : ''}}" value="">
					</div>
	</div>
	<div class="row_sec captcha">
		<div class="txt">Сосчитайте:</div>
		<div class="fields">
			<img src="/captcha?r={{time()}}" alt="">
			<span>=</span>
			<input type="text" placeholder="??" class="txt_field {{ $errors && $errors->has('captcha') ? ' error' : ''}}" name="captcha">
					<div class="clear"></div>
			<div class="personal_info">
				<input type="checkbox" name="personal" id="personal">
				<label for="personal">Я даю согласие на обработку персональных данных</label>				
				{!! $errors && $errors->has('personal') ? ' <p class="error">Нужно дать согласие на обработку персональных данных</p>' : '' !!}
			</div>
			<input type="submit" value="Узнать" class="btn_done">
		</div>
	</div>
</form>

@endif