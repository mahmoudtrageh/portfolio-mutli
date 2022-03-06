<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
 
class CategoryController extends Controller
{
    public function CategoryView(){

    	$category = Category::latest()->get();
    	return view('admin.category.category_view',compact('category'));
    }

    public function CategoryStore(Request $request){


		
       $request->validate([
    		'category_name' => 'required',
    	],[
    		'category_name.required' => trans('admin.add-category-en-name'),
    	]);

		

	Category::insert([
		'category_name' => $request->category_name,
		'category_slug' => str_replace(' ', '-',$request->category_name),

    	]);

	    $notification = array(
			'message' => trans('admin.category-added-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 


    public function CategoryEdit($id){
    	$category = Category::findOrFail($id);
    	return view('admin.category.category_edit',compact('category'));

    }


    public function CategoryUpdate(Request $request ,$id){

    	 

      Category::findOrFail($id)->update([
		'category_name' => $request->category_name,
		'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),

    	]);

	    $notification = array(
			'message' => trans('admin.category-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('all.category')->with($notification);


    } // end method


    public function CategoryDelete($id){

    	Category::findOrFail($id)->delete();

    	$notification = array(
			'message' => trans('admin.category-deleted-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 


}
 