<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\HomeAbout;
use App\Models\Brand;
use Image;
use Illuminate\Http\Request;
use Response;

use AtmCode\ArPhpLaravel\ArPhpLaravel;
 
class IndexController extends Controller
{
	public function Home(){
		$brands = Brand::latest()->get();
		$abouts = HomeAbout::first();
		return view('home', compact('brands','abouts'));
	}

	public function writeOnImagePage(){
		return view('write_image');
	}

	public function textOnImage(Request $request)  
    {  
       $img = Image::make('upload/ramadan.jpg');  

	  
	   $name = ArPhpLaravel::utf8Glyphs($request->name);

       $img->text($name , 4250, 850, function($font) {  
		$font->file(public_path('/font.ttf'));  
          $font->size(150);  
          $font->color('#fff');  
          $font->align('right');  
          $font->valign('top'); 
		  $font->angle(0);   
		  
      });  
	  
       $img->save('upload/ramadan/ramadan_with_text.jpg');  


	   $notification = array(
		'message' => 'نجحت العملية',
		'alert-type' => 'success'
	);

	return redirect()->back()->with($notification);
    }

	public function downloadImage() {
	
		$filepath = public_path('upload/ramadan/')."ramadan_with_text.jpg";
		return Response::download($filepath);		

	}
}
 