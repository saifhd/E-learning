<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Posts\PostsRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(){

        $posts=Post::Filter(request()->search)->paginate(20)->withQueryString();
        return view('admin.posts.index',compact('posts'));
    }

    public function create(){
        $categories= Category::all();
        return view('admin.posts.create',compact('categories'));
    }

    public function store(PostsRequest $request){
        $image_url=$request->file('image')->store('posts','public');
        
        auth()->user()->posts()->create([
            'title'=>$request->title,
            'body'=>$request->body,
            'category_id'=>$request->category,
            'image'=>'storage/'.$image_url
        ]);
        return redirect()->route('manage.posts.index')->with('success','Success - New Post Created');
    }

    public function edit(Post $post){
        $categories = Category::all();
        return view('admin.posts.edit', compact('categories','post'));
    }

    public function update(Request $request,Post $post){
        if($request->file('image')){
            Storage::disk('public')->delete($post->image);
            $image_url= $request->file('image')->store('posts', 'public');
            // dd($image_url);
            $post->update([
                'image'=>'storage/'.$image_url
            ]);
        }
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category
        ]);
        return redirect()->back()->with('success','Success - Post Updated');

    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->back()->with('success', 'Success - Post Deleted');
    }
}
