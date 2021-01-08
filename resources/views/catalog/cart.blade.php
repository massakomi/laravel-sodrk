@extends('layouts.app')

@section('content')
<p class="heading2">Корзина</p>
<div class="basket">
	<!-- baket items -->
	<table>
		<tr>
			<td class="b1">Артикул</td>
			<td class="b2">Наименование</td>
			<td class="b3">Цена, руб.</td>
			<td class="b4">Ваша цена, руб.</td>
			<td class="b5">Количество</td>
			<td class="b6">Итого, руб.</td>
			<td></td>
		</tr>
		@foreach ($cart as $id => $item)
		<tr class="">
			<td class="b1">
				<div></div>
			</td>
			<td class="b2">
				<div><a href="/item/{{ $item['alias'] }}">{{ $item['name'] }}</a></div>
			</td>
			<td class="b3">
				<div>{{ number_format($item['price'], 2, '.', ' ') }}</div>
			</td>
			<td class="b4">
				<div>{{ number_format($item['price'], 2, '.', ' ') }}</div>
			</td>
			<td class="b5">
				<div class="cnt">
					<div class="less"></div>
					<input type="text" value="{{ $item['quantity'] }}" name="q[{{ $id }}]">
					<div class="more"></div>
				</div>
			</td>
			<td class="b6">
				<div>{{ number_format($item['price'] * $item['quantity'], 2, '.', ' ') }}</div>
			</td>
			<td>
				<div class="delete" data-href="/order/toggle-item/{{ $id }}"></div>
			</td>
		</tr>
		@endforeach
	</table>
	<div class="card">
		<p class="bold">Введите:</p>
		<label class="radio">
			<input type="hidden" name="ud" value="1"> <span>промокод рекламной акции</span>
			<input type="text" class="txt" placeholder="xxx-xxx-xxx-xxx" name="promo" value=""> </label>
	</div>
	<!-- total -->
	<div class="total sec">
		<p>Итого: <span>{{ $basket['total'] }}</span> предмета на сумму <span>{{ $basket['sum'] }}</span> руб.</p> <a href="#" class="btn_calc" data-src="/order/recalc">Пересчитать</a>
		<div class="clear"></div>
	</div>
	<!-- total end -->
	<div class="order_head">Оформление заказа</div>
	<div class="ord_links"> <span>Прежде чем продолжить, вы можете </span> <a href="/cabinet/login">Авторизоваться</a> <a href="/cabinet/register">Зарегистрироваться</a> <a href="/order/cart">Продолжить без регистрации</a> </div>
	<!-- order info -->
	<!-- order info end -->
</div>
@endsection
