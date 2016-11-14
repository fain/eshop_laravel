<?php

namespace Eshop\Http\Controllers;

 use Illuminate\Http\Request;
// use Illuminate\Http\Redirect;

use Eshop\User;
use Eshop\UserInfo;
use Illuminate\Support\Facades\Auth;

use Eshop\Http\Requests;

use Eshop\Brand;
use Eshop\Category;
use Eshop\Product;
use Eshop\Http\Controllers\Controller;

//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;

use Eshop\Post;

use Validator;
use Session;

//for timestamp
use Carbon\Carbon;

class Front extends Controller {

    var $brands;
    var $categories;
    var $products;
    var $title;
    var $description;

    public function __construct() {
        $this->brands = Brand::all(array('name'));
        $this->categories = Category::all(array('name'));
        $this->products = Product::all(array('id','name','price'));
    }

    public function index() {
        return view('front.home',
            array(
                'title' => 'Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More',
                'description' => '',
                'page' => 'home',
                'brands' => $this->brands,
                'categories' => $this->categories,
                'products' => $this->products
            )
        );
    }

    public function products() {
        return view('front.products',
            array('title' => 'Products Listing',
                'description' => '',
                'page' => 'products', 
                'brands' => $this->brands, 
                'categories' => $this->categories, 
                'products' => $this->products
            ));
    }

    public function product_details($id) {
        $product = Product::find($id);
        return view('front.product_details', array('product' => $product, 'title' => $product->name,'description' => '','page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function product_categories($name) {
        return view('front.products', array('title' => ''Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More'','description' => '','page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function product_brands($name, $category = null) {
        return view('front.products', array('title' => ''Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More'','description' => '','page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function blog() {
        $posts = Post::where('id', '>', 0)->paginate(3);
        $posts->setPath('blog');

        $data['posts'] = $posts;

        return view('front.blog', array('data' => $data, 'title' => 'Latest Blog Posts', 'description' => '', 'page' => 'blog', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
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

        $data = compact('prev_url', 'next_url', 'tags', 'post', 'title', 'description', 'page', 'brands', 'categories', 'products');

        return view('front.blog_post', $data);
    }

    public function contact_us() {
        return view('front.contact_us', array('title' => 'Welcome','description' => '','page' => 'contact_us'));
    }

    public function login() {
        return view('front.login', array('title' => 'Log in or Sign Up','description' => '','page' => ''));
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

    public function cart() {
        //update/ add new item to cart
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price));
        }

        //increment the quantity
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rowId = Cart::search(array('id' => Request::get('product_id')));
            $item = Cart::get($rowId[0]);

            Cart::update($rowId[0], $item->qty + 1);
        }

        //decrease the quantity
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rowId = Cart::search(array('id' => Request::get('product_id')));
            $item = Cart::get($rowId[0]);

            Cart::update($rowId[0], $item->qty - 1);
        }

        $cart = Cart::content();

        return view('front.cart', array('cart' => $cart, 'title' => ''Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More'', 'description' => '', 'page' => 'home'));
    }

    public function checkout() {
        return view('front.checkout', array('title' => ''Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More'','description' => '','page' => 'home'));
    }

    public function search($query) {
        return view('front.products', array('title' => ''Shop Online at Angkasa E-Shop | Buy Electronics, Fashion & More'','description' => '','page' => 'products'));
    }
}