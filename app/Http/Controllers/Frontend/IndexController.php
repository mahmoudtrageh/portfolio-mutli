<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\HomeAbout;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Detail;

use Image;
use Illuminate\Http\Request;
use Response;
use Session;
use App\Models\Counter;

use AtmCode\ArPhpLaravel\ArPhpLaravel;
 
class IndexController extends Controller
{
	public function Home(){
		$brands = Brand::latest()->get();
		$abouts = HomeAbout::first();
		$products = Product::latest()->get();
		$services = Service::latest()->get();
		return view('home', compact('brands','abouts', 'products', 'services'));
	}
	
	public function printForMe() {

		$details = Detail::latest()->get();

		$abouts = HomeAbout::first();
		return view('print-for-me', compact('abouts', 'details'));

	}

	public function printerDetails($id) {
		$product = Product::findOrFail($id);
        $categories = Category::orderBy('category_name','ASC')->get();

		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$category = Category::findOrFail($cat_id);
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
		$abouts = HomeAbout::first();
		return view('printer-details', compact('abouts', 'category','categories', 'product','multiImag','relatedProduct'));

	}

}
 