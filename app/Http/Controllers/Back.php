<?php

namespace Eshop\Http\Controllers;

use Eshop\Category;
use Illuminate\Http\Request;

use Eshop\Http\Requests;

use Eshop\State;
use Eshop\Merchants;
use Eshop\MerchantsInfo;
use Eshop\MerchantsBusDetails;

use Illuminate\Support\Facades\Hash;

use Validator;

use Illuminate\Support\Facades\Auth;

class Back extends Controller
{
    //
    public function login(Request $request) {
        return view('back.login', array('title' => 'Eshop - Seller Login Page','description' => '','page' => 'home'));
    }

    public function login_handler(Request $request) {
//        if(Auth::attempt(['email' => $request->username, 'password' => $request->password])){
        if(Auth::guard('merchants')->attempt(['username' => $request->username, 'password' => $request->password])){
//            return redirect('/');
            $request->session()->flash('success', 'You are successfully logged in!');
            return redirect('/backend/home');
        }else{
            $request->session()->flash('danger', 'Your Username or Password might be wrong!');
            return redirect('/backend/login');
        }
    }

    public function home() {
        if(Auth::guard('merchants')->check()){
            $merchants_id = Auth::guard('merchants')->user()->id;

            $merchants_info = MerchantsInfo::where('merchants_id', $merchants_id)->first();

            return view('back.home',
                array(
                    'title' => 'Dashboard',
                    'description' => '',
                    'page' => 'home',
                    'users_name' => $merchants_info->name
                ));
        }else{
            return redirect('/backend/login');
        }

    }

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
            'email' => 'required|email|max:50|unique:merchants_info,email',
            'dob' => 'required|date_format:d-m-Y',
            'contact_number' => 'required|numeric|digits_between:10,12',
            'gender' => 'required',
            'store_name' => 'required|max:30|unique:merchants_info,store_name',
            'store_url' => 'required|max:30|unique:merchants_info,store_url',
            'username' => 'required|min:6|max:20|unique:merchants,username',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
            'pic_name' => 'required|max:100',
            'pic_email' => 'required|max:50|unique:merchants_info,email|email',
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

        $cur_datetime = date("Y-m-d h:i:s");

        if ($validator->fails()){
            return redirect('/backend/register')
                ->withErrors($validator)
                ->withInput();
        }else{
            $merchants = new Merchants;
            $merchants_info = new MerchantsInfo;
            $merchants_bus_details = new MerchantsBusDetails;

            $merchants->username = $request->username;
            $merchants->password = Hash::make($request->password);
            $merchants->user_group = "Merchant";
            $merchants->updated_at = $cur_datetime;
            $merchants->created_at = $cur_datetime;

            $merchants->save();

            $merchants_id = $merchants->id;

            $merchants_info->merchants_id = $merchants_id;
            $merchants_info->name = $request->name;
            $merchants_info->email = $request->email;
            $merchants_info->dob = date("Y-m-d", strtotime($request->dob));
            $merchants_info->phone = $request->contact_number;
            $merchants_info->gender = $request->gender;
            $merchants_info->store_name = $request->store_name;
            $merchants_info->store_url = $request->store_url;
            $merchants_info->updated_at = $cur_datetime;
            $merchants_info->created_at = $cur_datetime;

            $merchants_info->save();

            $merchants_bus_details->merchants_id = $merchants_id;
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

    public function categories() {
        if(Auth::guard('merchants')->check()){
            $merchants_id = Auth::guard('merchants')->user()->id;
            $merchants_info = MerchantsInfo::where('merchants_id', $merchants_id)->first();

            $treecat = Category::with('subcat')->get();

            return view('back.categories',
                array(
                    'title' => 'Categories',
                    'page' => 'categories',
                    'users_name' => $merchants_info->name,
                    'treecat' => $treecat
                ));
        }else{
            return redirect('/backend/login');
        }

    }
}
