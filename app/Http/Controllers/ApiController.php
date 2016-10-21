<?php

namespace Eshop\Http\Controllers;

use Illuminate\Http\Request;

use Eshop\Http\Requests;

use Eshop\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Eshop\Category;

class ApiController extends Controller
{
    //
    public function categoryDropDownData($id)
    {
//        $main_category = Input::get('main_category');
//
//        $sub_category = Category::where('main_category_id', '=', $main_category)
//            ->where('main_category_id', '!=', 0)
//            ->where('status', 'A')
//            ->where('menu_type', 'sub')
////            ->orderBy('name', 'asc')
//            ->get();

        $main_category = $id;

        $sub_category = Category::where('main_category_id', '=', $main_category)
            ->where('main_category_id', '!=', 0)
            ->where('status', 'A')
            ->where('menu_type', 'sub')
//            ->orderBy('name', 'asc')
            ->get();

        return Response::json($sub_category);


    }
}
