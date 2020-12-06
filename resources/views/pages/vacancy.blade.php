@extends('layouts.app')

@section('meta_title', 'Содействие - Вакансии')
@section('meta_description', '')
@section('meta_keywords', '')

@section('content')
	<p class="heading">Отклик на вакансию</p>

<div class="vac form_fields">
<form action="" method="post">
<div class="ord_vac form_fields">
	<div class="row_sec">
		<div class="txt">Вакансия:<span>*</span></div>
		<div class="fields">
			<div class="select">
				<select name="vacancy" id="vacancy" style="opacity: 0; position: absolute; top: -10000px; right: 1000px; display: none;">
																	<option value="32">Программист 1С</option>
																	<option value="31" selected="selected">Менеджер розничного отдела Сыктывкар, Мира 68</option>
																	<option value="5">Менеджер сервисного центра</option>
																</select>
			</div>
		</div>
	</div>
	<div class="row_sec">
		<div class="txt">Фамилия Имя Отчество:<span>*</span></div>
		<div class="fields">
			<input type="text" class="txt_field" name="name" value="">
												</div>
	</div>
	<div class="row_sec">
		<div class="txt">Возраст:<span>*</span></div>
		<div class="fields">
			<input type="text" class="txt_field" name="age" value="">
												</div>
	</div>
	<div class="row_sec">
		<div class="txt">Семейное положение:<span>*</span></div>
		<div class="fields">
			<div class="radio">
				<input type="radio" name="fs" id="v1" value="0" checked="checked" class="ez-hide">
				<label for="v1">Женат / замужем</label>
			</div>
			<div class="radio">
				<input type="radio" name="fs" id="v2" value="1" class="ez-hide">
				<label for="v2">Не женат / не замужем</label>
			</div>
			<div class="radio">
				<input type="radio" name="fs" id="v3" value="2" class="ez-hide">
				<label for="v3">Разведен / разведена</label>
			</div>
			<div class="clear"></div>
												</div>
	</div>
	<div class="row_sec">
		<div class="txt">Адрес проживания:<span>*</span></div>
		<div class="fields">
			<input type="text" class="txt_field" name="addr" value="">
												</div>
	</div>
	<div class="row_sec">
		<div class="txt">Контактный телефон:<span>*</span></div>
		<div class="fields">
			<input type="text" class="txt_field" name="phone" value="">
												</div>
	</div>
	<div class="row_sec">
		<div class="txt">Электронная почта:<span>*</span></div>
		<div class="fields">
			<input type="text" class="txt_field" name="email" value="">
												</div>
	</div>
	<div class="row_sec">
		<div class="txt">Образование:<span>*</span></div>
		<div class="fields">
			<textarea name="edu" placeholder="Укажите период (годы) обучения, название учебного заведения (курсов), специальность"></textarea>
												</div>
	</div>
	<div class="row_sec">
		<div class="txt">Опыт работы:<span>*</span></div>
		<div class="fields">
			<textarea name="exp" placeholder="Укажите период (годы) работы, название организации (сферу деятельности), Вашу должность и обязанности"></textarea>
												</div>
	</div>
	<div class="row_sec">
		<div class="txt">Профессиональный опыт:</div>
		<div class="fields">
			<textarea name="pexp" placeholder="Укажите участие в проектах, знание определенной специфики, профессиональные знания и опыт"></textarea>
		</div>
	</div>
	<div class="row_sec">
		<div class="txt">Знание компьютера:<span>*</span></div>
		<div class="fields">
			<input type="text" class="txt_field" name="comp" value="">
												</div>
	</div>
	<div class="row_sec">
		<div class="txt">Иностранные языки:<span>*</span></div>
		<div class="fields">
			<input type="text" class="txt_field" name="langs" value="">
												</div>
	</div>
	<div class="row_sec">
		<div class="txt">Дополнительно могу<br>о себе сообщить:</div>
		<div class="fields">
			<textarea name="adv"></textarea>
		</div>
	</div>

	<div class="row_sec captcha">
		<div class="txt">Сосчитайте:<span>*</span></div>
		<div class="fields">
			<img src="/captcha" alt="">
			<span>=</span>
			<input type="text" class="txt_field" name="captcha">
													<div class="clear"></div>
			<div class="personal_info">
				<input type="checkbox" name="personal" id="personal">
				<label for="personal">Я даю согласие на обработку персональных данных</label>
														</div>
			<p class="mandatory">Поля, отмеченные ( <span>*</span> ), обязательны для заполнения</p>
			<input type="submit" value="Готово" class="btn_done">
		</div>
	</div>

</div>
</form>

</div>


@endsection
