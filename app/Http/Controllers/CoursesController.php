<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Courses\CourseRequest;
use App\Http\Requests\Admin\Courses\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Course::class, 'course');
    }

    public function index(){
        $search=request()->search;
        $courses=Course::filter($search)->paginate(20);
        return view('admin.courses.index',compact('courses'));
    }

    public function create(){
        return view('admin.courses.create');
    }

    public function store(CourseRequest $request){
        $image_url = $request->file('image')->store('courses', 'public');
        auth()->user()->courses()->create([
            'name' => $request->name,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'image'=>'storage/'.$image_url
        ]);
        return redirect()->route('manage.my-courses')->with('success','Success - New Course Created');
    }

    public function edit(Request $request,Course $course){

        $course=Course::with(['category','sub_category'])->findOrFail($course->id);
        return view('admin.courses.edit',compact('course'));
    }

    public function update(UpdateCourseRequest $request,Course $course){
        if ($request->file('image')) {
            Storage::disk('public')->delete($course->image);
            $image_url = $request->file('image')->store('courses', 'public');
            // dd($image_url);
            $course->update([
                'image' => 'storage/' . $image_url
            ]);
        }
        $course->update([
            'name'=>$request->name,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id
        ]);
        return redirect()->back()->with('Success', 'Success - Course Updated');
    }

    public function myCourses(){
        $courses=auth()->user()->courses()->paginate(20);
        return view('admin.courses.my-courses',compact('courses'));
    }

    public function destroy(Course $course){
        $course->delete();
        return redirect()->back()->with('success','Success - Course Deleted');
    }

}
