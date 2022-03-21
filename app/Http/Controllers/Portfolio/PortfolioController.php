<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
class PortfolioController extends Controller
{
  
    public function AllPortfolio(){

        $portfolios = Portfolio::latest()->paginate(5);
        return view('admin.portfolio.portfolio_view' , compact('portfolios'));
    }


    public function StorePortfolio(Request $request){
        
        $img =  $request->file('img');

        // logo

        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(300,200)->save('upload/portfolio/'.$name_gen);

        $last_img = 'upload/portfolio/'.$name_gen;

        Portfolio::insert([
            'name' => $request->name,
            'img' => $last_img,
            'url' => $request->url,
            'tag' => $request->tag,
            'created_at' => Carbon::now()
        ]);
         
        $notification = array(
            'message' => trans('admin/controllers.portfolio-added-successfully'),
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);

    }


    public function Edit($id){
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.portfolio_edit',compact('portfolio'));

    }
 

    public function Update(Request $request, $id){

       
        $old_image = $request->old_image;

        $img =  $request->file('img');

         
        if($img){
        // logo
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($img->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'upload/portfolio/';
        $last_img = $up_location.$img_name;
        $img->move($up_location,$img_name);

        $file = public_path('upload/portfolio/' . $old_image);

        if( file_exists($file)){
            unlink($old_image);
        }

        Portfolio::find($id)->update([
            'name' => $request->name,
            'img' => $last_img,
            'url' => $request->url,
            'tag' => $request->tag,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => trans('admin/controllers.portfolio-updated-successfully'),
            'alert-type' => 'success'
        );         
        return Redirect()->back()->with($notification);

        }else{
            Portfolio::find($id)->update([
                'name' => $request->name,
            'url' => $request->url,
            'tag' => $request->tag,
            'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => trans('admin/controllers.portfolio-updated-successfully'),
                'alert-type' => 'success'
            );    
             
            return Redirect()->back()->with($notification);

        } 
    }


     public function Delete($id){
         $image = Portfolio::find($id);
         $old_image = $image->img;
         unlink($old_image);

        Portfolio::find($id)->delete();
        $notification = array(
            'message' => trans('admin/controllers.portfolio-deleted-successfully'),
            'alert-type' => 'error'
        );   
        return Redirect()->back()->with($notification);

     }
}
