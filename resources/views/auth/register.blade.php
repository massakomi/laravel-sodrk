@extends('layouts.app')

@section('content')

<p class="heading">Регистрация</p>

<div class="srv_r form_fields">

	<div class="ord_info form_fields">

        {{--Ошибки --}}
        @if (count($errors))
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <div class="alert alert-danger" role="alert">
                      <button class="close" aria-label="Close" data-dismiss="alert" type="button">
                          <span aria-hidden="true">×</span>
                      </button>
                      <ul>
                          @foreach($errors->all() as $error)
                              <li> {{{ $error }}} </li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>
      @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
			<div class="row_sec">
				<div class="txt">E-mail:<span>*</span></div>
				<div class="fields">
					<input type="text" class="txt_field" name="email" value="{{ old('email') }}">
														</div>
			</div>
			<div class="row_sec">
				<div class="txt">Пароль:<span>*</span></div>
				<div class="fields">
					<input type="password" class="txt_field" name="password">
														</div>
			</div>
			<div class="row_sec">
				<div class="txt">Повторите пароль:<span>*</span></div>
				<div class="fields">
					<input type="password" class="txt_field" name="cpassword">
														</div>
			</div>
			<div class="row_sec">
				<div class="txt">Имя:<span>*</span></div>
				<div class="fields">
					<input type="text" class="txt_field" name="name" value="{{ old('name') }}">
														</div>
			</div>
			<div class="row_sec">
				<div class="txt">Телефон:<span>*</span></div>
				<div class="fields">
					<input type="text" class="txt_field" name="phone" value="{{ old('phone') }}">
														</div>
			</div>
			<div class="row_sec captcha">
				<div class="fields">
					<img src="{{ captcha_src() }}" alt="">
					<span>=</span>
					<input type="text" class="txt_field" name="captcha">
															<div class="clear"></div>
					<div class="personal_info">
						<input type="checkbox" name="personal" id="personal">
						<label for="personal">Я даю согласие на обработку персональных данных</label>
																</div>
					<p class="mandatory">Поля, отмеченные ( <span>*</span> ), обязательны для заполнения</p>
					<input type="submit" value="Регистрация" class="btn_done">
				</div>
			</div>
		</form>

	</div>

</div>


@endsection
