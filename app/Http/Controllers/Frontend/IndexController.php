<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\HomeAbout;
use App\Models\Brand;
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
		return view('home', compact('brands','abouts'));
	}

	public function writeOnImagePage(){
		return view('write_image');
	}

	public function textOnImage(Request $request)  
    {  
		$session_token = Session::get('_token');

		if($request->type == 'فرد') {
			$img = Image::make('upload/individual.jpg');  
		} else {
			$img = Image::make('upload/all.jpg');  
		}
	  
	   $name = ArPhpLaravel::utf8Glyphs($request->name);

       $img->text($name , 4250, 850, function($font) {  
		$font->file(public_path('/font.ttf'));  
          $font->size(150);  
          $font->color('#fff');  
          $font->align('right');  
          $font->valign('top'); 
		  $font->angle(0);   
		  
      });  
	  
       $img->save('upload/ramadan/ramadan_with_text_'.$session_token.'.jpg');  

	   $counter = Counter::first();

	  
	   $counter['count'] = $counter->count + 1;
	  	$counter->save();

	   $notification = array(
		'message' => 'تم إنشاء الصورة بنجاح',
		'alert-type' => 'success'
	);

	return redirect()->route('write.image')->with($notification);
    }

	public function downloadImage() {
		$session_token = Session::get('_token');
		
		$filepath = public_path('upload/ramadan/')."ramadan_with_text_$session_token.jpg";
		return response()->download($filepath)->deleteFileAfterSend(true);

	}
}
 