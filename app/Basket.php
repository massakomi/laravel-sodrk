<?php

namespace App;

class Basket
{
	public $count;

	public $sum;

	public function __construct()
    {
	}

	public static function get()
	{
        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }
        return $cart;
	}

	public static function countSum($cart=false)
	{
        if (!$cart) {
            $cart = self::get();
        }
        $total = $sum = 0;
        foreach ($cart as $k => $v) {
            $total += $v['quantity'];
            $sum += $v['quantity'] * $v['price'];
        }
        $sum = number_format($sum, 2, '.', ' ');
        return compact('total', 'sum');
	}

	public static function addProduct($product)
	{
		$cart = self::get();
        if (!isset($cart [$product->id])) {
            $cart [$product->id]= $product->toArray();
            $cart [$product->id]['quantity']= 1;
        } else {
            $cart [$product->id]['quantity'] ++;
        }
        session()->put('cart', $cart);
        return Basket::countSum($cart);
	}

    public static function removeProduct($product)
    {
        $cart = self::get();
        if (isset($cart [$product->id])) {
            unset($cart [$product->id]);
        }
        session()->put('cart', $cart);
    }
}
