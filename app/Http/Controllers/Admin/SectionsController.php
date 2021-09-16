<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Courses\Sections\SectionsRequest;
use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    //
    public function __construct(){
        $this->authorizeResource(Section::class, 'section');
    }

    public function index(Course $course){
        $sections = $course->sections()->latest();
        $search=request()->search;
        if($search){
            $sections=$sections->where('name','Like',"%$search%");
        }
        $sections=$sections->paginate(20);

        return view('admin.courses.sections.index',compact('sections','course'));
    }

    public function create(Course $course){
        if($course->user_id !== auth()->user()->id){
            abort(401);
        }
        return view('admin.courses.sections.create',compact('course'));
    }

    public function store(SectionsRequest $request,Course $course){
        if ($course->user_id !== auth()->user()->id) {
            abort(401);
        }
        $course->sections()->create([
            'name'=>$request->name,
            'user_id'=>auth()->user()->id
        ]);
        return redirect()->route('manage.sections.index',$course->id)->with('success','Success - New Section Created');
    }

    public function edit(Course $course,Section $section){

        return view('admin.courses.sections.edit',compact('course','section'));
    }

    public function update(Course $course,Section $section,SectionsRequest $request){

        $section->update([
            'name'=>$request->name
        ]);
        return redirect()->back()->with('success','Success - Section Updated');
    }

    public function destroy(Course $course,Section $section){
        $section->delete();
        return redirect()->back()->with('success','Success - Section Deleted');
    }
}
