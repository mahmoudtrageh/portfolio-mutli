<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;

class BlogController extends Controller
{
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
}
