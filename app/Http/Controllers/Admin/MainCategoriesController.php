<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Main_Category;
use App\Http\Requests\LanguageRequest;

class MainCategoriesController extends Controller
{

    public function index() {

        $default_lang = get_default_lang();

        $categories = Main_Category::where('trans_lang', $default_lang);

        return view('admin.maincategories.index', compact('categories'));

    }
    

   

}
