<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\HomeAbout;
use App\Models\Brand;


 
class IndexController extends Controller
{
	public function Home(){
		$brands = Brand::latest()->get();
		$abouts = HomeAbout::first();
		return view('home', compact('brands','abouts'));
	}

}
 