<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseCategories\CategoryRequest;
use App\Http\Requests\Admin\CourseCategories\UpdateCategoryRequest;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use Illuminate\Http\Request;

class CourseCategoriesController extends Controller
{
    public function __construct(){
        $this->authorizeResource(CourseCategory::class, 'course_category');
    }

    public function index(){
        if(request()->ajax()){
            $categories=CourseCategory::all();
            return response()->json($categories);
        }
        $search=request()->search;
        $categories=CourseCategory::filter($search)->paginate(20);
        return view('admin.course-categories.index',compact('categories'));
    }

    public function create(){
        return view('admin.course-categories.create');
    }

    public function store(CategoryRequest $request){
        CourseCategory::create([
            'name'=>$request->name
        ]);
        return redirect()->route('manage.course-categories.index')->with('success','Success - New Category Created');
    }

    public function edit(CourseCategory $course_category){
        return view('admin.course-categories.edit',compact('course_category'));
    }

    public function update(CourseCategory $course_category,UpdateCategoryRequest $request){
        $course_category->update([
            'name'=>$request->name
        ]);
        return redirect()->back()->with('success','Success - Category Updated');
    }

    public function destroy(CourseCategory $course_category){
        $course_category->delete();
        return redirect()->back()->with('success','Success - Category Deleted');
    }

    public function show(CourseCategory $course_category){
        if(request()->ajax()){
            $sub_categories=CourseSubCategory::where('category_id',$course_category->id)->get();
            return response()->json($sub_categories);
        }
    }


}
