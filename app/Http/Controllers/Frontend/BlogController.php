<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $search=request()->search;
        $categories=Category::all();
        $posts=Post::filter($search)->Paginate(10);
        if(request()->has('filter')){
            $posts=Post::where('category_id',request()->filter)->with(['author','category'])->Paginate(10);
        }
        // dd($posts);
        $pageTitle="Blog";
        return view('pages.blog.index',compact('posts','categories','pageTitle'));
    }

    public function show(Post $post){
        if(request()->has('search')){
            return redirect()->route('front.posts.index',['search'=>request()->search]);
        }
        $categories=Category::all();
        $pageTitle=$post->title;
        return view('pages.blog.show',compact('pageTitle','post','categories'));
    }
}
