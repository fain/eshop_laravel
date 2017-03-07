<?php

namespace Eshop\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Eshop\Http\Requests;
use Eshop\Http\Controllers\Controller;

use Eshop\Cart;
use Eshop\CartItem;

use DB;


class CartController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        
  

    }

    public function addCart ($productId){

        $cart = Cart::where('user_id',Auth::user()->id)->first();


        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }


        $cartItem  = new Cartitem();
        $cartItem->product_id=$productId;
        $cartItem->cart_id= $cart->user_id;
        // $cartItem->quantity=$cart->default_id_cart;

        $cartItem->save();

        return redirect('/product_carts');
    }

    public function showCart(){
        $cart = Cart::where('user_id',Auth::user()->id)->first();


        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }

        $id = Auth::user()->id;

        $product_cart = DB::table('carts')
                         ->leftjoin('users', 'users.id', '=', 'carts.user_id')
                         ->leftjoin('cart_items', 'carts.user_id', '=', 'cart_items.cart_id')
                         ->leftjoin('products_info', 'cart_items.product_id', 'products_info.products_id')
                         ->leftjoin('merchants_info', 'products_info.merchant_shipping_id', 'merchants_info.id')
                         ->leftjoin('product_image', 'cart_items.product_id', 'product_image.products_id')
                         ->select('users.name', 'cart_items.*', 'products_info.*', 'merchants_info.*', 'product_image.*', 'cart_items.id as id_ci') 
                         ->WHERE('users.id', '=', $id)
                         ->groupBy('cart_items.product_id')
                         ->get();


        //$items = $cart->cartItems;

        $total=0;
        // foreach($product_carts as $product_cart){
        //     $total+=$product_cart->price;
        // }

        return view('front.product_carts',
            [
            // 'items' => $items,
            'product_carts' => $product_cart,
            'total'=>$total
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeCart($id){

        CartItem::destroy($id);
        return redirect('/product_carts')->withSuccessMessage('Product cart has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart(){

        CartItem::removeCart();
        return redirect('/product_carts')->withSuccessMessage('Your product cart has been cleared!');
    }

}