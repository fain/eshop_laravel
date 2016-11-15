<?php

namespace Eshop\Http\Controllers;

use Illuminate\Http\Request;

use Eshop\Http\Requests;

use Eshop\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Eshop\Category;
use Eshop\Brand;

class ApiController extends Controller
{
    //
    public function categoryDropDownData($id){
        $main_category = $id;

        $sub_category = Category::where('main_category_id', '=', $main_category)
            ->where('main_category_id', '!=', 0)
            ->where('status', 'A')
            ->where('menu_type', 'sub')
//            ->orderBy('name', 'asc')
            ->get();

        return Response::json($sub_category);
    }

    public function brandDropDownData($id){
        $category = $id;

        $brands = Brand::where('category_id', $category)
//            ->where('status', 'A')
//            ->orderBy('name', 'asc')
            ->get();

        return Response::json($brands);
    }
}
