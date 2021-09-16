<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseSubCategories\CreateSubCategoryRequest;
use App\Http\Requests\Admin\CourseSubCategories\UpdateSubCategoryRequest;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;

class CourseSubCategoriesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(CourseSubCategory::class, 'course_sub_category');
    }

    public function index(){
        $search=request()->search;
        $sub_categories=CourseSubCategory::Filter($search)->paginate(20);
        return view('admin.course-sub-categories.index',compact('sub_categories'));
    }

    public function create(){
        $categories=CourseCategory::all();
        return view('admin.course-sub-categories.create',compact('categories'));
    }

    public function store(CreateSubCategoryRequest $request){
        $category=CourseCategory::findOrFail($request->category);
        $category->subcategories()->create([
            'name'=>$request->name
        ]);
        return redirect()->route('manage.course-sub-categories.index')->with('success','Success - New Sub Category Created');
    }

    public function edit(CourseSubCategory $course_sub_category){
        $categories = CourseCategory::all();
        return view('admin.course-sub-categories.edit',compact('course_sub_category','categories'));
    }

    public function update(UpdateSubCategoryRequest $request, CourseSubCategory $course_sub_category){

        $course_sub_category->update([
            'name'=>$request->name,
            'category_id'=> $request->category
        ]);
        return redirect()->back()->with('success','Success - Sub Category Updated');
    }

    public function destroy(CourseSubCategory $course_sub_category){
        $course_sub_category->delete();
        return redirect()->back()->with('success','Success - Sub Category Deleted');
    }


}
