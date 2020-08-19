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

    	return redirect()->route('admin.languages.index')->with('success','created');
    } catch(Exception $e) {

         return redirect()->route('admin.languages.index')->with('success','created');
    	
     }
    	
    }


     public function edit($id) {

     	$language = Language::select()->find($id);

     	if(!$language) {
     		return redirect()->route('admin.languages.index')->with(['error' => 'lang not found']);
     	}

    	return view('admin.languages.edit', compact('language'));
    }

     public function update($id, LanguageRequest $request) {

     	try {
     		$language = Language::find($id);

	     	if(!$language) {
	     		return redirect()->route('admin.languages.edit', $id)->with(['error' => 'lang not found']);
	     	}

	     	if(!$request->has('active'))
	     		$request->request->add(['active'=> 0]);

	     	$language->update($request->except('_token'));

	     	return redirect()->route('admin.languages.index')->with(['success' => 'updated']);
	     } catch(Exception $e) {
	     	return redirect()->route('admin.languages.edit', $id)->with(['error' => 'lang not found']);
	     }

    	
    }

    public function delete($id) {

     	try {


     		$language = Language::find($id);

     	if(!$language) {
     		return redirect()->route('admin.languages.index')->with(['error' => 'lang not found']);
     	}

     	$language->delete();

    	return redirect()->route('admin.languages.index')->with(['success' => 'deleted']);
      } catch(Exception $e) {

      	return redirect()->route('admin.languages.index')->with(['error' => 'smth wrong']);

      }
    }

   

}
