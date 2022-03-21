<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use App\Models\BlogPost;
use Intervention\Image\ImageManagerStatic as Image;

class BlogManagementController extends Controller
{
	public function BlogCategory()
	{

		$blogcategory = BlogPostCategory::latest()->get();
		return view('admin.blog.category.category_view', compact('blogcategory'));
	}


	public function BlogCategoryStore(Request $request)
	{

		$request->validate([
			'blog_category_name' => 'required',

		], [
			'blog_category_name.required' => trans('admin/controllers.add-blog-category-name'),
		]);

		BlogPostCategory::insert([
			'blog_category_name' => $request->blog_category_name,
			'blog_category_slug' => str_replace(' ', '-', $request->blog_category_name),
			'created_at' => Carbon::now(),
		]);

		$notification = array(
			'message' => trans('admin/controllers.blog-category-added-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	} // end method 

	public function BlogCategoryEdit($id)
	{

		$blogcategory = BlogPostCategory::findOrFail($id);
		return view('admin.blog.category.category_edit', compact('blogcategory'));
	}

	public function BlogCategoryUpdate(Request $request)
	{

		$blogcar_id = $request->id;

		$request->validate([
			'blog_category_name' => 'required',

		], [
			'blog_category_name.required' => trans('admin/controllers.add-blog-category-name'),
		]);

		BlogPostCategory::findOrFail($blogcar_id)->update([
			'blog_category_name' => $request->blog_category_name,
			'blog_category_slug' => str_replace(' ', '-', $request->blog_category_name),
			'created_at' => Carbon::now(),


		]);

		$notification = array(
			'message' => trans('admin/controllers.blog-category-updated-successfully'),
			'alert-type' => 'info'
		);

		return redirect()->route('blog.category')->with($notification);
	} // end method 

	public function BlogCategoryDelete($id)
	{

		BlogPostCategory::find($id)->delete();
		$notification = array(
			'message' => trans('admin/controllers.blog-category-deleted-successfully'),
			'alert-type' => 'error'
		);
		return Redirect()->back()->with($notification);
	}

	///////////////////////////// Blog Post ALL Methods //////////////////

	public function ListBlogPost()
	{
		$blogpost = BlogPost::with('category')->latest()->get();
		return view('admin.blog.post.post_list', compact('blogpost'));
	}


	public function AddBlogPost()
	{

		$blogcategory = BlogPostCategory::latest()->get();
		$blogpost = BlogPost::latest()->get();
		return view('admin.blog.post.post_view', compact('blogpost', 'blogcategory'));
	}

	public function BlogPostStore(Request $request)
	{

		$request->validate([
			'post_details' => 'required',
		], [
			'post_details.required' => trans('admin/controllers.this-field-required'),
		]);

		$image = $request->file('post_image');
		$name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
		Image::make($image)->resize(780, 433)->save('upload/blog/' . $name_gen);
		$save_url = 'upload/blog/' . $name_gen;

		BlogPost::insert([
			'category_id' => $request->category_id,
			'post_title' => $request->post_title,
			'post_slug' => str_replace(' ', '-', $request->post_title),
			'post_image' => $save_url,
			'post_details' => $request->post_details,
			'created_at' => Carbon::now(),

		]);

		$notification = array(
			'message' => trans('admin/controllers.blog-post-added-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('list.post')->with($notification);
	} // end mehtod 


	public function BlogPostEdit($id)
	{

		$post = BlogPost::findOrFail($id);
		$blogcategory = BlogPostCategory::latest()->get();
		return view('admin.blog.post.post_edit', compact('post', 'blogcategory'));
	}

	public function BlogPostUpdate(Request $request)
	{
		$post_id = $request->id;
		$old_img = $request->old_image;

		$request->validate([
			'post_details' => 'required',
		], [
			'post_details.required' => trans('admin/controllers.this-field-required'),
		]);

		if ($request->file('post_image')) {

			unlink($old_img);
			$image = $request->file('post_image');
			$name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(300, 300)->save('upload/blog/' . $name_gen);
			$save_url = 'upload/blog/' . $name_gen;

			BlogPost::findOrFail($post_id)->update([
				'category_id' => $request->category_id,
				'post_title' => $request->post_title,
				'post_slug' => str_replace(' ', '-', $request->post_title),
				'post_image' => $save_url,
				'post_details' => $request->post_details,
				'created_at' => Carbon::now(),

			]);

			$notification = array(
				'message' => trans('admin/controllers.blog-post-updated-successfully'),
				'alert-type' => 'info'
			);

			return redirect()->route('list.post')->with($notification);
		} else {

			BlogPost::findOrFail($post_id)->update([
				'category_id' => $request->category_id,
				'post_title' => $request->post_title,
				'post_slug' => str_replace(' ', '-', $request->post_title),
				'post_details' => $request->post_details,
				'created_at' => Carbon::now(),
			]);

			$notification = array(
				'message' => trans('admin/controllers.blog-post-updated-successfully'),
				'alert-type' => 'info'
			);

			return redirect()->route('list.post')->with($notification);
		} // end else 
	} // end method 

	public function BlogPostDelete($id)
	{

		BlogPost::find($id)->delete();
		$notification = array(
			'message' => trans('admin/controllers.blog-post-deleted-successfully'),
			'alert-type' => 'error'
		);
		return Redirect()->back()->with($notification);
	}
}
