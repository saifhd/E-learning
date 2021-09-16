<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index(){
        $search=request()->search;
        $categories=CourseCategory::all();
        $courses = Course::filter($search)->with('reviews')->paginate(9);

        // $courses = Course::find(1)->whereHas('reviews',function($q){
            // dd($q->get());
        // });
        // dd($courses->last()->reviews()->sum('rating'));



        // $courses=$courses->each(function($q){
        //     $q->total_stars=$q->reviews->sum('rating');
        //     $q->review_count=$q->reviews->count();

        // });
        // dd($courses);

        if(request()->has('category')){
            $courses=Course::latest()->with(['category','sub_category'])->where('category_id',request()->category)->paginate(9);
        }

        return view('pages.courses.index',[
            'pageTitle' => 'Our Courses',
            'courses' => $courses,
            'categories' => $categories
        ]);
    }

    public function show(Course $course){
        $course=Course::where('id',$course->id)->with(['teacher','category', 'sections.uploaded_videos', 'reviews.commented_user'])->first();
        $counts=$this->duration($course->sections);
        // dd($course->sections->uploaded_videos->count());
        // dd($duration);

        return view('pages.courses.show',[
            'pageTitle' => $course->name,
            'course'=>$course,
            'counts'=>$counts
        ]);
    }

    protected function duration($sections){
        $duration=0;
        $lectures=0;
        foreach($sections as $section){
            foreach($section->uploaded_videos as $video){
                $duration=$duration+$video->duration;
                $lectures=$lectures+1;

            }
        }
        return [
            'duration'=>CarbonInterval::seconds($duration)->cascade()->forHumans(),
            'lectures'=>$lectures
        ];
    }

    public function store_reviews(Course $course,Request $request){
        $course->reviews()->create([
            'commented_by'=>auth()->user()->id,
            'massage'=>$request->message,
            'rating' =>$request->rating
        ]);
        return redirect()->back();
    }
}
