<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request; 
use App\Models\User;
use App\Models\MultiImg;
use App\Models\Category;
use App\Models\HomeAbout;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog\BlogPostCategory;

 
class IndexController extends Controller
{
	public function Home(){
		$brands = Brand::latest()->get();
		$abouts = HomeAbout::first();
		return view('home', compact('brands','abouts'));
	}

	public function BlogView(){
		$posts = BlogPost::latest()->paginate(2);
		$blogcategory = BlogPostCategory::latest()->get();
		return view('blog.blog', compact('posts', 'blogcategory'));
	}

	public function BlogPost($id){
		$post = BlogPost::findOrFail($id);
		$related_posts = BlogPost::where('category_id',$post->id)->latest()->get();
		return view('blog.blog_post', compact('post', 'related_posts'));
	}

	public function HomeBlogCatPost($category_id){

    	$blogcategory = BlogPostCategory::latest()->get();
		$category = BlogPostCategory::find($category_id);
    	$blogpost = BlogPost::where('category_id',$category_id)->orderBy('id','DESC')->paginate(2);
    	return view('blog.blog-cat',compact('blogpost','blogcategory', 'category'));

    } // end mehtod 

	public function ShopView(){
		$products = Product::latest()->get();
		$categories = Category::latest()->get();
		return view('shop', compact('products','categories'));
	}

	public function ProfileView(){
		$orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
		$id = Auth::user()->id;
    	$user = User::find($id);
		return view('profile', compact('orders', 'user'));
	}

    public function UserLogout($username){
    	Auth::logout();
    	return Redirect()->route('login',$username);
    }


    public function UserProfile($username){
    	$id = Auth::guard('web')->user()->id;
    	$user = User::find($id);
    	return view('frontend.profile.user_profile',compact('user','username'));
    }



    public function UserProfileStore(Request $request){
        $data = User::find(Auth::guard('web')->user()->id);
		$data->first_name = $request->first_name;
		$data->last_name = $request->last_name;
		$data->email = $request->email;
		$data->phone = $request->phone;
 

		if ($request->file('img')) {
			$file = $request->file('img');
			@unlink(public_path('upload/admin_images/'.$data->img));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/admin_images'),$filename);
			$data['img'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => trans('site.user-profile-updated-success'),
			'alert-type' => 'success'
		);

		return redirect()->route('profile.view',Auth::guard('web')->user()->id)->with($notification);

    } // end method 
 

    public function UserPasswordUpdate(Request $request){

		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('home');
		}else{
			return redirect()->back();
		}


	}// end method



    /// Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category')->findOrFail($id);

		return response()->json(array(
			'product' => $product,
		));

	} // end method 


	public function ProductDetails($id,$slug){
		$product = Product::findOrFail($id);
        $categories = Category::orderBy('category_name','ASC')->get();

		$multiImag = MultiImg::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$category = Category::findOrFail($cat_id);
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
	 	return view('product_details',compact('category','categories', 'product','multiImag','relatedProduct'));

	}

	



}
 