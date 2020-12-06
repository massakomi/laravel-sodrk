@extends('layouts.app')

@section('content')

<p class="heading2">Кабинет</p>

<!-- profile -->
<div class="form_fields">
							<p class="head3">Контактное лицо (ID {{ auth()->user()->id }})</p>
	<div class="profile">



		<div class="row_sec">
			<div class="txt">Ф.И.О.:</div>
			<div class="fields edit">
				<input type="text" class="txt_field" name="name" value="andymc@inbox.ru" disabled="disabled">
				<div class="btn_ok">ok</div>
			</div>
		</div>

		<div class="row_sec">
			<div class="txt">Телефон:</div>
			<div class="fields edit">
				<input type="text" class="txt_field" name="phone" value="andymc@inbox.ru" disabled="disabled">
				<div class="btn_ok">ok</div>
			</div>
		</div>

		<div class="row_sec">
			<div class="txt">Электронная почта:</div>
			<div class="fields">
				<input type="text" class="txt_field" disabled="" value="andymc@inbox.ru">
			</div>
		</div>

		<div class="row_sec">
			<div class="txt">Номер дисконтной карты</div>
			<div class="fields edit">
				<input type="text" class="txt_field" name="card" value="" disabled="disabled" data-c="1">
				<div class="btn_ok" data-d="1">ok</div>
			</div>
		</div>


	</div>
	<a name="form"></a>
							<form action="#form" method="post">
		<div class="change_pass">
			<p class="head3">Смена пароля</p>
			<div class="row_sec">
				<div class="txt">Действующий пароль:</div>
				<div class="fields">
					<input type="password" class="txt_field" name="pass">
														</div>
			</div>
			<div class="row_sec">
				<div class="txt">Новый пароль:</div>
				<div class="fields">
					<input type="password" class="txt_field" name="npass">
														</div>
			</div>
			<div class="row_sec">
				<div class="txt">Новый пароль еще раз:</div>
				<div class="fields">
					<input type="password" class="txt_field" name="cpass">
														</div>
			</div>
		</div>
		<div class="btn_save">
			<input type="submit" value="Сохранить изменения">
		</div>
	</form>
						</div>
<!-- profile end -->



@endsection
