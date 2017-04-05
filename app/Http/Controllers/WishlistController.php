<?php

namespace Eshop\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Eshop\Http\Requests;
use Eshop\Http\Controllers\Controller;

use Eshop\Wishlist;
use Eshop\WishlistItem;


use DB;


class WishlistController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addWishlist ($productId){

      
        $wishlistItem  = new Wishlistitem();
 
        $id = Auth::user()->id; 
        $wishlist = DB::table('carts')
                    ->LEFTJOIN('cart_items', 'carts.user_id', '=', 'cart_items.cart_id')
                    ->SELECT('cart_items.product_id') 
                    ->WHERE('cart_id', '=', $id)
                    ->WHERE('cart_items.product_id', '=', $productId)
                    ->first();
        
        if (is_null($wishlist))
        { 
         
            $id = Auth::user()->id;

            $wishlistItem->product_id=$productId;
            $wishlistItem->wishlist_id= $id;
        
            $wishlistItem->save();
            return redirect('/')->withSuccessMessage('');
        }

        else
        {
           return redirect('/')->withInfoMessage('');
        }

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


        $total_cart = DB::table('carts')
                         ->leftjoin('users', 'users.id', '=', 'carts.user_id')
                         ->leftjoin('cart_items', 'cart_items.cart_id', '=', 'carts.user_id')
                         ->leftjoin('products_info', 'products_info.products_id', '=', 'cart_items.product_id')
                         ->select('users.name', 'cart_items.product_id', 'products_info.*') 
                         ->WHERE('cart_id', '=', $id)
                         ->groupBy('cart_items.product_id')
                         ->count();


        return view('front.product_carts',
            [
            'product_carts' => $product_cart,
            'total_carts' => $total_cart
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
        return redirect('/product_carts')->withSuccessRemoveCartMessage('Product cart has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart(){

        CartItem::removeCart();
        return redirect('/product_carts')->withSuccessEmptyCartMessage('');
    }
}