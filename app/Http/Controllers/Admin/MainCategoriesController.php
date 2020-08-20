<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Main_Category;

use App\Http\Requests\MainCategoryRequest;

class MainCategoriesController extends Controller
{

    public function index() {

        $default_lang = get_default_lang();

        $categories = Main_Category::where('trans_lang', $default_lang);

        return view('admin.maincategories.index', compact('categories'));

    }

    public function create() {

        return view('admin.maincategories.create');
    }

    public function store(MainCategoryRequest $request) {

        return $request;
    }
    

   

}
