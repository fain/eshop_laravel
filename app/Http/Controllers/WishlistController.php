<?php

namespace Eshop\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Eshop\Http\Requests;
use Eshop\Http\Controllers\Controller;

use Eshop\Wishlist;
use Eshop\WishlistItem;
use Eshop\CartItem;

use Eshop\Category;

use DB;


class WishlistController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addWishlist ($productId){

        // $cartItem  = new Cartitem();
        $wishlistItem  = new Wishlistitem();
 
        $id = Auth::user()->id; 
        $cart = DB::table('carts')
                    ->LEFTJOIN('cart_items', 'carts.user_id', '=', 'cart_items.cart_id')
                    ->SELECT('cart_items.product_id') 
                    ->WHERE('cart_id', '=', $id)
                    ->WHERE('cart_items.product_id', '=', $productId)
                    ->first();

        $wishlist = DB::table('wishlists')
                    ->LEFTJOIN('wishlist_items', 'wishlists.user_id', '=', 'wishlist_items.wishlist_id')
                    ->SELECT('wishlist_items.product_id') 
                    ->WHERE('wishlist_id', '=', $id)
                    ->WHERE('wishlist_items.product_id', '=', $productId)
                    ->first();

        
        if (is_null($wishlist) && is_null($cart))
        { 
         
            $id = Auth::user()->id;

            $wishlistItem->product_id=$productId;
            $wishlistItem->wishlist_id= $id;
        
            $wishlistItem->save();
            return redirect('/')->withSuccessWishlistMessage('');
        }
        elseif (isset($cart))
        {
            return redirect('/')->withInfoCartMessage('');
        }
        else
        {
            return redirect('/')->withInfoWishlistMessage('');
        }

    }

    public function showWishlist(){
        $wishlist = Wishlist::where('user_id',Auth::user()->id)->first();

        if(!$wishlist){
            $wishlist =  new Wishlist();
            $wishlist->user_id=Auth::user()->id;
            $wishlist->save();
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

        $product_wishlist = DB::table('wishlists')
                         ->leftjoin('users', 'users.id', '=', 'wishlists.user_id')
                         ->leftjoin('wishlist_items', 'wishlists.user_id', '=', 'wishlist_items.wishlist_id')
                         ->leftjoin('products_info', 'wishlist_items.product_id', 'products_info.products_id')
                         ->leftjoin('merchants_info', 'products_info.merchant_shipping_id', 'merchants_info.id')
                         ->leftjoin('product_image', 'wishlist_items.product_id', 'product_image.products_id')
                         ->select('users.name', 'wishlist_items.*', 'products_info.*', 'merchants_info.*', 'product_image.*', 'wishlist_items.id as id_wi') 
                         ->WHERE('users.id', '=', $id)
                         ->groupBy('wishlist_items.product_id')
                         ->get();


        // $total_cart = DB::table('carts')
        //                  ->leftjoin('users', 'users.id', '=', 'carts.user_id')
        //                  ->leftjoin('cart_items', 'cart_items.cart_id', '=', 'carts.user_id')
        //                  ->leftjoin('products_info', 'products_info.products_id', '=', 'cart_items.product_id')
        //                  ->select('users.name', 'cart_items.product_id', 'products_info.*') 
        //                  ->WHERE('cart_id', '=', $id)
        //                  ->groupBy('cart_items.product_id')
        //                  ->count();


        $total_wishlist = DB::table('wishlists')
                         ->leftjoin('users', 'users.id', '=', 'wishlists.user_id')
                         ->leftjoin('wishlist_items', 'wishlist_items.wishlist_id', '=', 'wishlists.user_id')
                         ->leftjoin('products_info', 'products_info.products_id', '=', 'wishlist_items.product_id')
                         ->select('users.name', 'wishlist_items.product_id', 'products_info.*') 
                         ->WHERE('wishlist_id', '=', $id)
                         ->groupBy('wishlist_items.product_id')
                         ->count();

        $treecats = Category::where('main_category_id', 0)
                        ->where('menu_type', 'main')
                        ->with('subcat')
                        ->get();


        return view('front.product_wishlists',
            [
            'product_carts' => $product_cart,
            // 'total_carts' => $total_cart,
            'product_wishlists' => $product_wishlist,
            'total_wishlists' => $total_wishlist,
            'treecat' => $treecats
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeWishlist($id){

        WishlistItem::destroy($id);
        return redirect('/product_wishlists')->withSuccessRemoveWishlistMessage('Product wishlist has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyWishlist(){

        WishlistItem::removeWishlist();
        return redirect('/product_wishlists')->withSuccessEmptyWishlistMessage('');
    }

    /**
     * Switch item from wishlist to shopping cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($productId)
    {
       
        $cartItem  = new Cartitem();

        $wishlistItem = new Wishlistitem();
        $wishlistItem->destroy($productId);

        $id = Auth::user()->id; 
        $cart = DB::table('carts')
                    ->LEFTJOIN('cart_items', 'carts.user_id', '=', 'cart_items.cart_id')
                    ->SELECT('cart_items.product_id') 
                    ->WHERE('cart_id', '=', $id)
                    ->WHERE('cart_items.product_id', '=', $productId)
                    ->first();   

        $switchCart = WishlistItem::where("product_id", "=", $productId)->first();

        if (is_null($cart) && isset($switchCart))
        { 
         
            $id = Auth::user()->id;

            $cartItem->product_id=$productId;
            $cartItem->cart_id= $id;
        
            $cartItem->save();
            $switchCart->delete();

            return redirect('/product_wishlists')->withSuccessMoveCartMessage('');
        }
  
        // else
        // {
        //     return redirect('/')->withInfoCartMessage('');
        // }

    }

}