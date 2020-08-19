<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

use App\Http\Requests\LanguageRequest;

class LanguagesController extends Controller
{
    public function index() {

    	$languages = Language::select()->paginate(3);

    	


    	return view('admin.languages.index')->with('languages',$languages);
    }

    public function create() {

    	return view('admin.languages.create');
    }

    public function store(LanguageRequest $request) {

    	try {
    		Language::create($request->except(['_token']));

    	return redirect()->route('admin.languages.create')->with('success','created');
    } catch(Exception $e) {

         return redirect()->route('admin.languages.index')->with('success','created');
    	
     }
    	
    }

   

}
