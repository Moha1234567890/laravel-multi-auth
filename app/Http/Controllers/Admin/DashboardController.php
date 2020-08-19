<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Requests\LoginRequest;

class DashboardController extends Controller
{
    public function index() {


    	return view('admin.dashboard');
    }

   

}
