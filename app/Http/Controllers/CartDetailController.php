<?php

namespace App\Http\Controllers;

use App\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {

        $cartDetail = new CartDetail();

        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();
        return back()->with('status','EL producto se ha añadido al carrito');

    }

//    public function destroy(Request $request)
//    {
//        $cartDetail = CartDetail::find($request->cart_detail_id);
//        if($cartDetail->cart_id == auth()->user->cart->id){
//            $cartDetail->delete();
//        }
//
//        return back();
//    }
    public function destroy(Request $request)
    {
//        $cartDetail = CartDetail::find($request->cart_detail_id);
//        if ($cartDetail->cart_id == auth()->user()->carts->id) {
//            $cartDetail->delete();
//        }
//        return back()->with('status','Borrado correctamente');

        $cartDetail = CartDetail::findorFail($request->cart_detail_id);

        $cart = auth()->user()->carts()->where('status','Active')->first();

        if($cartDetail->cart_id == $cart->id)
            $cartDetail->delete();

        return back()->with('status','Borrado correctamente');
    }

}
