@extends('layouts.app')


@section('content')

<p class="heading">Авторизация</p>
<div class="srv_r form_fields">

	<div class="ord_info form_fields">
		<form action="{{ route('login') }}" method="post">
            @csrf
			<div class="row_sec">
				<div class="txt">E-mail:<span>*</span></div>
				<div class="fields">
					<input type="text" class="txt_field" name="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="error" role="alert" style="display:block;">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
				</div>
			</div>
			<div class="row_sec">
				<div class="txt">Пароль:<span>*</span></div>
				<div class="fields">
					<input type="password" class="txt_field" name="password">
                    @error('password')
                        <p class="error" role="alert" style="display:block;">
                            <strong>{{ $message }}</strong>
                        </p>
                    @enderror
				</div>
			</div>

            <div class="row">
				<div class="txt">&nbsp;</div>
				<div class="fields">
                <input class="form-check-input" type="checkbox" style="-webkit-appearance: checkbox;" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label><br />
				</div><br />
            </div>

			<div class="row_sec captcha">
				<div class="fields">
					<input type="submit" value="Войти" class="btn_done">

																<a class="btn" style="padding: 5px 9px 6px;display: inline-block;" href="/cabinet/forgot">Забыли пароль?</a>
														</div>
			</div>
		</form>

	</div>

</div>


@endsection
