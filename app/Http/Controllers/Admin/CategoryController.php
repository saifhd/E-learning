<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Category::class, 'category');
    }

    public function index(){
        $categories=Category::latest()->filter(request()->search)->paginate(20)->withQueryString();
        return view('admin.categories.index',compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request){
        Category::create([
            'name'=>$request->name
        ]);
        return redirect()->route('categories.index')->with('success','Success - New category created');
    }

    public function edit(Category $category){
        return view('admin.categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request,Category $category){
        $category->update([
            'name'=>$request->name
        ]);
        return redirect()->back()->with('success','Success - Category Updated');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->back()->with('success','Success - Category Deleted');
    }
}
