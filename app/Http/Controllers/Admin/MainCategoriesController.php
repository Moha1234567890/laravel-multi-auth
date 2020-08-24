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

        //return $request;
        $main_categories = collect($request->category);

            $filter = $main_categories->filter(function ($value, $key) {
                return $value['abbr'] == get_default_lang();
            });

            $default_category = array_values($filter->all()) [0];


            $filePath = "";
            if ($request->has('photo')) {

                $filePath = uploadImage('maincategories', $request->photo);
            }

          //  DB::beginTransaction();

            $default_category_id = Main_Category::insertGetId([
                'trans_lang' => $default_category['abbr'],
                'trans_of' => 0,
                'name' => $default_category['name'],
                'slug' => $default_category['name'],
                'photo' => $filePath
            ]);

            $categories = $main_categories->filter(function ($value, $key) {
                return $value['abbr'] != get_default_lang();
            });


            if (isset($categories) && $categories->count()) {

                $categories_arr = [];
                foreach ($categories as $category) {
                    $categories_arr[] = [
                        'trans_lang' => $category['abbr'],
                        'trans_of' => $default_category_id,
                        'name' => $category['name'],
                        'slug' => $category['name'],
                        'photo' => $filePath
                    ];
                }

                Main_Category::insert($categories_arr);
            }





    }
    

   

}
