<?php

namespace App\Http\Controllers;

use App\Models\Pakaian;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
       
          $pakaian = Pakaian::paginate(8);
        
        return view('home' , compact('pakaian'));
    }
}
