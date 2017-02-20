<?php

namespace Eshop\Http\Controllers;

use Eshop\User;
use Eshop\UserInfo;

use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use Eshop\Http\Requests;

use Eshop\Cart;
use Eshop\Brand;
use Eshop\Merchants;
use Eshop\MerchantsInfo;
use Eshop\Category;
use Eshop\Product;
use Eshop\ProductInfo;
use Eshop\ShippingRate;
use Eshop\ProductImage;
use Eshop\Wishlist;


use Eshop\Http\Controllers\Controller;


use Eshop\Post;

use Validator;
use Session;


//for timestamp
use Carbon\Carbon;

use DB;

class Front extends Controller {

    var $shipping_rate;
    var $brands;
    var $merchants;
    var $merchantsinfo;
    var $categories;
    var $products;
    var $productinfo;
    var $products_image;
    var $title;
    var $description;
    var $carts;
    var $wishlists;

    public function __construct() {
        $this->brands = Brand::all(array('name'));
        $this->merchantsinfo = MerchantsInfo::all(array('id', 'store_name'));
        $this->categories = Category::all(array('name'));
        $this->products = Product::all(array('id','category_id','brand_id', 'merchants_id'));
        $this->shipping_rate = ShippingRate::all(array('id'));
        $this->products_image = ProductImage::all(array('id'));
        $this->carts = Cart::all(array('id'));
        $this->wishlists = Wishlist::all(array('id'));



    }


        public function index() {
        $product = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->get();

       $product_top_sale = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->where('products_info.type', '=', 'New')
                                ->get();

       $product_new = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->where('products_info.type', '=', 'New')
                                ->get();                                

       $product_used = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->where('products_info.type', '=', 'Used')
                                ->get();                                

       $product_pre_order = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'categories.*', 'products_info.*', 'product_image.*', 'categories.name as main_cat',  'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->where('products_info.type', '=', 'Pre-Order')
                                ->get();   

       $twenty_off = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->select('products.*', 'brands.*', 'products_info.*')
                                ->where('products_info.discount_sel', '=', '20%')
                                ->first();  

       $thirty_off = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->select('products.*', 'brands.*', 'products_info.*')
                                ->where('products_info.discount_sel', '=', '30%')
                                ->first();  

        $fifty_off = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->select('products.*', 'brands.*', 'products_info.*')
                                ->where('products_info.discount_sel', '=', '50%')
                                ->first();  

        
        $seventy_off = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->select('products.*', 'brands.*', 'products_info.*')
                                ->where('products_info.discount_sel', '=', '70%')
                                ->first();  

        $treecats = Category::where('main_category_id', 0)
                                ->where('menu_type', 'main')
                                ->with('subcat')
                                ->get();

        $brand_main_category = DB::table('products')
                                     ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                     ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                     ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                     ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                     DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                     ->groupBy('main_cat')
                                     ->orderBy('categories.id')
                                     ->get(); 


        $brand_by_electronic = DB::table('products')
                                     ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                     ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                     ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                     ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                     DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                     ->WHERE('categories.name', '<>', 'Electronics')
                                     ->WHERE('products.category_id', '=', 15)
                                     ->groupBy('brands.name')
                                     ->get(); 


        $brand_by_women = DB::table('products')
                                     ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                     ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                     ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                     ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                     DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                     ->WHERE('categories.name', '<>', 'Women\`s Fashion')
                                     ->WHERE('products.category_id', '=', 17)
                                     ->groupBy('brands.name')
                                     ->get(); 

        $brand_by_men = DB::table('products')
                                     ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                     ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                                     ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                     ->select('products.*', 'categories.*', 'products_info.*', 'brands.*',
                                     DB::raw('(SELECT c.name FROM categories c WHERE c.id = categories.main_category_id) as main_cat'))
                                     ->WHERE('categories.name', '<>', 'Men\`s Fashion')
                                     ->WHERE('products.category_id', '=', 19)
                                     ->groupBy('brands.name')
                                     ->get(); 


        return view('front.home',
            array(
                'title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More',
                'description' => '',
                'page' => 'home',
                'brands' => $this->brands, 
                'merchantsinfo' => $this->merchantsinfo,
                'categories' => $this->categories,
                'products' => $product,
                'products_top_sale' => $product_top_sale,
                'products_new' => $product_new,
                'products_used' => $product_used,
                'products_pre_order' => $product_pre_order,
                'products_image' => $this->products_image,
                'twentypercent_off' => $twenty_off,
                'thirtypercent_off' => $thirty_off,
                'fiftypercent_off' => $fifty_off,
                'seventypercent_off' => $seventy_off,
                'treecat' => $treecats,
                'brands_by_electronics' => $brand_by_electronic,
                'brands_by_womens' => $brand_by_women,
                'brands_by_mens' => $brand_by_men, 
                'brands_main_categories' => $brand_main_category

            )
        );

    }

    public function products($id) {
          $product = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->where('product_image.primary_img', '=', 'Y')
                                ->where('products_info.products_id', '=', $id)
                                ->first();


        return view('front.products',
            array('title' => 'Products Listing',
             'description' => '',
                'page' => 'home',
                'product' => $product
                
            ));
    }
    
    // public function cart(Request $request) {

    //     $prod_name = $request->prod_name;

    //     $product = DB::table('products')
    //                             ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
    //                             ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
    //                             ->leftjoin('shipping_rate', 'shipping_rate.id', '=', 'products.id')
    //                             ->select('products.*', 'products_info.*', 'brands.*', 'products_info.prod_name as p_name', 'shipping_rate.*')
    //                             ->first();

      
    //     return view('front.cart', 
    //         array('title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More',
    //             'description' => '',
    //             'page' => 'products',
    //             'prod_name' => $prod_name
                
    //             ));
    // }
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     if (Cart::search(['products_id' => $request->products_id])) {
    //         return redirect('cart')->withSuccessMessage('Item is already in your cart!');
    //     }

    //     Cart::associate('Product','App')->add($request->products_id, $request->prod_name, 1, $request->price);
    //     return redirect('cart')->withSuccessMessage('Item was added to your cart!');
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function update(Request $request, $products_id)
    // {
    //     // Validation on max quantity
    //     $validator = Validator::make($request->all(), [
    //         'quantity' => 'required|numeric|between:1,5'
    //     ]);

    //      if ($validator->fails()) {
    //         session()->flash('error_message', 'Quantity must be between 1 and 5.');
    //         return response()->json(['success' => false]);
    //      }

    //     Cart::update($id, $request->quantity);
    //     session()->flash('success_message', 'Quantity was updated successfully!');
    //     return response()->json(['success' => true]);

    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($products_id)
    // {
    //     Cart::remove($products_id);
    //     return redirect('cart')->withSuccessMessage('Item has been removed!');
    // }

    // /**
    //  * Remove the resource from storage.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function emptyCart()
    // {
    //     Cart::destroy();
    //     return redirect('cart')->withSuccessMessage('Your cart his been cleared!');
    // }

    // /**
    //  * Switch item from shopping cart to wishlist.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function switchToWishlist($products_id)
    // {
    //     $products = Cart::instance('main')->get($products_id);

    //     Cart::instance('main')->remove($products_id);

    //     if (Cart::instance('wishlist')->search(['products_id' => $products->products_id])) {
    //         return redirect('cart')->withSuccessMessage('Item is already in your Wishlist!');
    //     }

    //     Cart::instance('wishlist')->associate('Product','App')->add($products->products_id, $products->prod_name, 1, $products->price);
    //     return redirect('cart')->withSuccessMessage('Item has been moved to your Wishlist!');

    // }


    public function product_details($id) {
        $product = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('shipping_rate', 'shipping_rate.id', '=', 'products.id')
                                ->select('products.*', 'products_info.*', 'brands.*', 'products_info.prod_name as p_name', 'shipping_rate.*')
                                ->where('products_info.products_id', '=', $id)
                                ->first();

      
        return view('front.product_details', 
            array( 
                'title' => $product->p_name,'description' => '',
                'page' => 'products',
                'product' => $product

                
                ));
    }

 
  

    



    public function product_merchants($id) {
        $merchantinfo = DB::table('merchantsinfo')
                                ->leftjoin('merchants', 'merchants.id', '=', 'merchantsinfo.id')
                                ->first();

    }
    public function product_categories($name) {
        return view('front.products', array('title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More','description' => '','page' => 'products', 'brands' => $this->brands, 'merchants' => $this->merchants, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function product_brands($name, $category = null) {
   
        return view('front.products', array('title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More','description' => '','page' => 'products', 'brands' => $this->brands, 'merchants' => $this->merchants, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function blog() {
        $posts = Post::where('id', '>', 0)->paginate(3);
        $posts->setPath('blog');

        $data['posts'] = $posts;

        return view('front.blog', array('data' => $data, 'title' => 'Latest Blog Posts', 'description' => '', 'page' => 'blog', 'brands' => $this->brands, 'merchants' => $this->merchants, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function blog_post($url) {
        $post = Post::whereUrl($url)->first();

        $tags = $post->tags;
        $prev_url = Post::prevBlogPostUrl($post->id);
        $next_url = Post::nextBlogPostUrl($post->id);
        $title = $post->title;
        $description = $post->description;
        $page = 'blog';
        $brands = $this->brands;
        $categories = $this->categories;
        $products = $this->products;

        $data = compact('prev_url', 'next_url', 'tags', 'post', 'title', 'description', 'page', 'brands', 'merchants', 'categories', 'products');

        return view('front.blog_post', $data);
    }
    
    public function contact_us() {
        return view('front.contact_us', array('title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More','description' => '','page' => 'contact_us'));
    }

    public function login() {
        $product = DB::table('products')
                                ->leftjoin('products_info', 'products_info.products_id', '=', 'products.id')
                                ->leftjoin('brands', 'brands.id', '=', 'products.brand_id')
                                ->leftjoin('product_image', 'product_image.products_id', '=', 'products.id')
                                ->select('products.*', 'brands.*', 'products_info.*', 'product_image.*', 'brands.name as p_brand')
                                ->first();

         
        return view('front.login',
         array('title' => 'Log in or Sign Up',
            'description' => '',
            'page' => '',
            'brands' => $this->brands,
            'merchantsinfo' => $this->merchantsinfo,
            'categories' => $this->categories
            

            )
         );
    }

    public function login_handler(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
//        if(Auth::guard('merchants')->attempt(['username' => $request->username, 'password' => $request->password])){
//            return redirect('/');
            $request->session()->flash('success', 'You are successfully logged in!');
            return redirect('/');
        }else{
            $request->session()->flash('danger', 'Your Username or Password might be wrong!');
            return redirect('/login');
        }
    }

    public function register() {
        return view('front.register', array('title' => 'Register new account','description' => '','page' => ''));
    }

    public function register_handler(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email|max:50|unique:merchants_info,email',
            'dob' => 'required|date_format:d-m-Y',
            'gender' => 'required',
            'c_number' => 'required|numeric|digits_between:10,12',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ]);

        $cur_datetime = Carbon::now();

        if ($validator->fails()){
            return redirect('/auth/register')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = new User;
            $user_info = new UserInfo;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->user_group = "Customer";
            $user->updated_at = $cur_datetime;
            $user->created_at = $cur_datetime;

            $user->save();

            $user_id = $user->id;

            $user_info->user_id = $user_id;
            $user_info->dob = date("Y-m-d", strtotime($request->dob));
            $user_info->gender = $request->gender;
            $user_info->c_number = $request->c_number;
            $user_info->updated_at = $cur_datetime;
            $user_info->created_at = $cur_datetime;

            $user_info->save();

            $request->session()->flash('success', 'You had been successfully Registered. You can log in now.');
            return redirect('/auth/login');
        }
    }

    public function logout(){
        Auth::logout();
        Session::flash('success', 'You are successfully logged out!');
        return redirect('/auth/login');
    }

   
    public function checkout() {
        return view('front.checkout', array('title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More','description' => '','page' => 'home'));
    }

    public function search($query) {
        return view('front.products', array('title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More','description' => '','page' => 'products'));
    }
}
