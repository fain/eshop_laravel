<?php

namespace Eshop\Http\Controllers;

use Illuminate\Http\Request;

use Eshop\Http\Requests;

use Illuminate\Support\Facades\Hash;

use Validator;

use Illuminate\Support\Facades\Auth;

use Session;

//for timestamp
use Carbon\Carbon;

//model
use Eshop\State;
use Eshop\User;
use Eshop\UserInfo;
use Eshop\MerchantsInfo;
use Eshop\MerchantsBusDetails;
use Eshop\Category;
use Eshop\Brand;

use Illuminate\Support\Facades\DB;

class Back extends Controller
{
    /*******************************Auth start*********************************/
    public function login(Request $request) {
        return view('back.login', array('title' => 'Eshop - Seller Login Page','description' => '','page' => 'home'));
    }

    public function login_handler(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
//        if(Auth::guard('merchants')->attempt(['username' => $request->username, 'password' => $request->password])){
//            return redirect('/');
            $request->session()->flash('success', 'You are successfully logged in!');
            return redirect('/backend/home');
        }else{
            $request->session()->flash('danger', 'Your Username or Password might be wrong!');
            return redirect('/backend/login');
        }
    }

    public function logout(){
        Auth::logout();
        Session::flash('success', 'You are successfully logged out!');
        return redirect('/backend/login');
    }
    /*******************************Auth end*********************************/

    /*******************************Reg start*********************************/
    public function register() {

        $states = State::get();

        $content = array(
            'title' => 'Eshop - Seller Registration Page',
            'description' => '',
            'page' => '',
            'ship_states' => $states,
            'rtn_states' => $states);
        return view('back.register', $content);
    }

    public function register_seller(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|email|max:50|unique:users,email',
            'dob' => 'required|date_format:d-m-Y',
            'contact_number' => 'required|numeric|digits_between:10,12',
            'gender' => 'required',
            'store_name' => 'required|max:30|unique:merchants_info,store_name',
            'store_url' => 'required|max:30|unique:merchants_info,store_url',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
            'pic_name' => 'required|max:100',
            'pic_email' => 'required|max:50|unique:users,email|email',
            'pic_phone' => 'required|numeric|digits_between:10,12',
            'ship_add' => 'required|max:200',
            'ship_state' => 'required',
            'ship_city' => 'required|max:100',
            'ship_pcode' => 'required|max:5',
            'rtn_add' => 'required|max:200',
            'rtn_state' => 'required',
            'rtn_city' => 'required|max:100',
            'rtn_pcode' => 'required|max:5',
        ]);

        $cur_datetime = Carbon::now();

        if ($validator->fails()){
            return redirect('/backend/register')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user = new User;
            $user_info = new UserInfo;
            $merchants_info = new MerchantsInfo;
            $merchants_bus_details = new MerchantsBusDetails;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->user_group = "Merchant";
            $user->updated_at = $cur_datetime;
            $user->created_at = $cur_datetime;

            $user->save();

            $user_id = $user->id;

            $user_info->user_id = $user_id;
            $user_info->dob = date("Y-m-d", strtotime($request->dob));
            $user_info->c_number = $request->contact_number;
            $user_info->gender = $request->gender;
            $user_info->updated_at = $cur_datetime;
            $user_info->created_at = $cur_datetime;

            $user_info->save();

            $merchants_info->user_id = $user_id;
            $merchants_info->store_name = $request->store_name;
            $merchants_info->store_url = $request->store_url;
            $merchants_info->status = "Pending";
            $merchants_info->updated_at = $cur_datetime;
            $merchants_info->created_at = $cur_datetime;

            $merchants_info->save();

            $merchants_bus_details->user_id = $user_id;
            $merchants_bus_details->name = $request->pic_name;
            $merchants_bus_details->email = $request->pic_email;
            $merchants_bus_details->phone = $request->pic_phone;
            $merchants_bus_details->ship_add = $request->ship_add;
            $merchants_bus_details->ship_state = $request->ship_state;
            $merchants_bus_details->ship_city = $request->ship_city;
            $merchants_bus_details->ship_pcode = $request->ship_pcode;
            $merchants_bus_details->rtn_add = $request->rtn_add;
            $merchants_bus_details->rtn_state = $request->rtn_state;
            $merchants_bus_details->rtn_city = $request->rtn_city;
            $merchants_bus_details->rtn_pcode = $request->rtn_pcode;
            $merchants_bus_details->updated_at = $cur_datetime;
            $merchants_bus_details->created_at = $cur_datetime;

            $merchants_bus_details->save();

            $request->session()->flash('success', 'You had been successfully Registered. Please wait for approval from Us!');
            return redirect('/backend/login');
        }
    }
    /*******************************Reg end*********************************/


    /*******************************Home start*********************************/
    public function home() {
        if(Auth::check()){

            return view('back.home',
                array(
                    'title' => 'Dashboard',
                    'description' => '',
                    'page' => 'home',
                    'mainmenu' => 'dashboard'
                ));
        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }
    /*******************************Home ends*********************************/

    /*******************************Categories start*********************************/
    public function categories() {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){
                $treecat = Category::where('main_category_id', 0)->where('menu_type', 'main')->with('subcat')->get();

                return view('back.categories',
                    array(
                        'title' => 'Categories',
                        'page' => 'categories',
                        'treecat' => $treecat,
                        'basecat_url' => '/backend/categories/',
                        'currmenu' => ''
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }

    public function categories_more($category) {
        if(Auth::check()){

            $treecat = Category::where('main_category_id', 0)->where('menu_type', 'main')->with('subcat')->get();
            $maincat = Category::where('main_category_id', 0)->where('status', 'A')->where('menu_type', 'main')->get();

            $catdetails = Category::where('id', $category)->first();

            return view('back.cat_detail',
                array(
                    'title' => 'Categories',
                    'page' => 'categories',
                    'treecat' => $treecat,
                    'basecat_url' => '/backend/categories/',
                    'maincat' => $maincat,
                    'catdetails' => $catdetails,
                    'currmenu' => $category
                ));
        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }

    public function categories_update(Request $request, Category $category){
        $cattype = $request->type;
        $cur_datetime = Carbon::now();

        if($cattype=="sub"){
            $maincat = $request->main_cat_id;
        }else{
            $maincat = 0;
        }

        $cats = array(
            'name' => $request->name,
            'slug' => $request->slug,
            'menu_set' => $request->menu_set,
            'menu_type' => $cattype,
            'main_category_id' => $maincat,
            'status' => $request->status,
            'description' => $request->description,
            'updated_at' => $cur_datetime,
            'updated_at_ip' => $request->ip
        );

        $category->where('id', $category->id)->update($cats);

        $request->session()->flash('success', 'Category detail successfully updated');
        return redirect('/backend/categories/'.$category->id);
    }

    public function new_cat() {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){
                $treecat = Category::where('main_category_id', 0)->where('menu_type', 'main')->with('subcat')->get();
                $maincat = Category::where('main_category_id', 0)->where('status', 'A')->where('menu_type', 'main')->get();

                return view('back.new_cat',
                    array(
                        'title' => 'Add New Categories',
                        'page' => 'categories',
                        'treecat' => $treecat,
                        'maincat' => $maincat,
                        'basecat_url' => '/backend/categories/',
                        'currmenu' => ''
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }

    public function new_cat_handler(Request $request, Category $category){
        $cattype = $request->type;
        $cur_datetime = Carbon::now();

        if($cattype=="sub"){
            $maincat = $request->main_cat_id;
        }else{
            $maincat = 0;
        }

        $categories = new Category();

        $categories->name = $request->name;
        $categories->slug = $request->slug;
        $categories->menu_set = $request->menu_set;
        $categories->menu_type = $cattype;
        $categories->main_category_id = $maincat;
        $categories->status = $request->status;
        $categories->description = $request->description;
        $categories->updated_at = $cur_datetime;
        $categories->created_at = $cur_datetime;
        $categories->updated_at_ip = $request->ip;
        $categories->created_at_ip = $request->ip;

        $categories->save();

        $request->session()->flash('success', 'New categories successfully inserted!');
        return redirect('/backend/categories/');
    }

    public function delete_cat($category){
        $categories = new Category();

        $categories->destroy($category);

        Session::flash('success', 'Category had been successfully deleted!');
        return redirect('/backend/categories/');
    }
    /*******************************Categories ends*********************************/

    /*******************************Product Listing start*********************************/
    public function product_listing() {
        if(Auth::check()){

            $maincat = Category::where('main_category_id', 0)->where('status', 'A')->where('menu_type', 'main')->get();
//            $subcat = Category::where('main_category_id', '!=', 0)->where('status', 'A')->where('menu_type', 'sub')->get();

            return view('back.product_listing',
                array(
                    'title' => 'Product Listing',
                    'page' => 'product_listing',
                    'basecat_url' => '/backend/product_listing/',
                    'currmenu' => '',
                    'mainmenu' => 'product',
                    'maincat' => $maincat,
//                    'subcat' => $subcat
                ));
        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }

    }

    public function product_listing_handler(Request $request){
        $cur_datetime = Carbon::now();

        $products = new Product();

        if($request->sub_category!=""){
            $cat_id = $request->sub_category;
        }else{
            $cat_id = $request->main_category;
        }

        $products->category_id = $cat_id;
        $products->category_id = $cat_id;

//        $categories->save();

        $request->session()->flash('success', 'New product successfully inserted!');
        return redirect('/backend/categories/');
    }
    /*******************************Product Listing ends*********************************/

    /*******************************Brand starts*********************************/
    public function brand() {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){
//                $brandlist = Brand::leftjoin('categories', 'brands.category_id', '=', 'categories.id')
//                    ->select('brands.*', 'categories.name')
//                    ->get();
                $brandlist = DB::table('brands')
                                ->leftjoin('categories', 'brands.category_id', '=', 'categories.id')
                                ->select('brands.*', 'categories.name as catname')
                                ->get();

                return view('back.brand',
                    array(
                        'title' => 'Brands',
                        'page' => 'brand',
                        'basecat_url' => '/backend/brand/',
                        'currmenu' => '',
                        'brandlist' => $brandlist
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }
    }

    public function new_brand() {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){
                $maincat = Category::where('main_category_id', 0)->where('status', 'A')->where('menu_type', 'main')->get();

                return view('back.new_brand',
                    array(
                        'title' => 'Brands',
                        'page' => 'brand',
                        'basecat_url' => '/backend/brand/',
                        'maincat' => $maincat,
                        'currmenu' => ''
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }
    }

    public function new_brand_handler(Request $request){
        $cur_datetime = Carbon::now();

        $validator = Validator::make($request->all(), [
            'main_category' => 'required',
            'name' => 'required|unique:brands,name'
        ]);

        if ($validator->fails()){
            return redirect('/backend/new_brand')
                ->withErrors($validator)
                ->withInput();
        }else{
            $brands = new Brand();

            if($request->sub_category!=""){
                $cat_id = $request->sub_category;
            }else{
                $cat_id = $request->main_category;
            }

            $brands->category_id = $cat_id;
            $brands->name = $request->name;
            $brands->status = $request->status;
            $brands->updated_at = $cur_datetime;
            $brands->created_at = $cur_datetime;
            $brands->updated_at_ip = $request->ip;
            $brands->created_at_ip = $request->ip;

            $brands->save();

            $request->session()->flash('success', 'New brand successfully inserted!');
            return redirect('/backend/brand/');
        }
    }

    public function edit_brand($brand) {
        if(Auth::check()){
            if(Auth::user()->user_group == 'Admin'){
                $maincat = Category::where('main_category_id', 0)->where('status', 'A')->where('menu_type', 'main')->get();

                $bdetails = DB::table('brands')
                    ->leftjoin('categories', 'brands.category_id', '=', 'categories.id')
                    ->select('brands.*', 'categories.name as catname','categories.id as catid',
                        'categories.main_category_id as cat_maincatid', 'categories.menu_type as cat_menutype')
                    ->where('brands.id', $brand)
                    ->first();

                return view('back.edit_brand',
                    array(
                        'title' => 'Brands',
                        'page' => 'brand',
                        'basecat_url' => '/backend/brand/',
                        'maincat' => $maincat,
                        'bdetails' => $bdetails,
                        'currmenu' => ''
                    ));
            }else{
                Session::flash('danger', 'You are not authorized to view this page!');
                return redirect('/backend/home');
            }

        }else{
//            $request->session()->flush();
            Auth::logout();
            Session::flash('warning', 'You have been logged out!');
            return redirect('/backend/login');
        }
    }

    public function edit_brand_handler(Request $request, Brand $brand){
        $cur_datetime = Carbon::now();

        $validator = Validator::make($request->all(), [
            'main_category' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()){
            return redirect('/backend/edit_brand/'.$request->b_id)
                ->withErrors($validator)
                ->withInput();
        }else{
            if($request->sub_category!=""){
                $cat_id = $request->sub_category;
            }else{
                $cat_id = $request->main_category;
            }

            $brnd = array(
                'category_id' => $cat_id,
                'name' => $request->name,
                'status' => $request->status,
                'updated_at' => $cur_datetime,
                'updated_at_ip' => $request->ip
            );

            $brand->where('id', $request->b_id)->update($brnd);

            $request->session()->flash('success', 'Brand successfully updated!');
            return redirect('/backend/brand/');
        }
    }
    /*******************************Brand ends*********************************/

}
