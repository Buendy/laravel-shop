<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
        $cart = auth()->user()->cart;
        $cart->status = 'Pending';
        $cart->order_date = Carbon::now();
        $cart->save();

        return back()->with('status', 'Tu pedido se ha registrado correctamente');
    }
}
