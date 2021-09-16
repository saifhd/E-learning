@extends('layouts.app')

@section('content')
@include('layouts.banner')

<section id="courses-part" class="pt-120 pb-120 gray-bg">
    <div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                            {{-- <li class="nav-item">Showning 4 0f 24 Results</li> --}}
                        </ul> <!-- nav -->

                        <div class="courses-search float-right">
                            <form method="get" action="">
                                <input type="text" name="search" value="{{ request()->search }}" placeholder="Search">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> <!-- courses search -->
                    </div> <!-- courses top search -->
                </div>
            </div> <!-- row -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                    <div class="row">
                        @if(count($courses)>0)
                        @foreach ($courses as $course)
                            <div class="col-lg-4 col-md-6">
                                <div class="singel-course mt-30">
                                    <div class="thum">
                                        <div class="image">
                                            <img src="{{ asset($course->image) }}" alt="Course">
                                        </div>
                                        <div class="row">
                                            @if($course->discount)
                                                <div class="col-md-6">
                                                    <div class="price" >
                                                        <span style="background-color: red; color:white;">{{ $course->discount }}%</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="price">
                                                    <span>${{ ($course->price*(100-$course->discount))/100 }}</span>
                                                </div>
                                            </div>
                                            @endif
                                            @if(!$course->discount)
                                                <div class="price">
                                                    <span>${{ $course->price }}</span>
                                                </div>
                                            @endif


                                        </div>


                                    </div>
                                    <div class="cont">
                                        <ul>
                                            @if($course->reviews()->count()>0)
                                            @for($i = 0; $i < ceil($course->reviews()->sum('rating')/$course->reviews()->count()); $i++)
                                                <li><i class="fa fa-star"></i></li>
                                            @endfor
                                            @endif
                                        </ul>
                                        <span>{{ $course->reviews()->count() }} Reviews</span>
                                        <br>
                                        <a href="{{ route('front.courses.show',$course->id) }}"><h4>{{ $course->name }}</h4></a>
                                        <div class="course-teacher">
                                            <div class="thum">

                                                <a href=""><img src="{{ $course->teacher->getAvatar() }}" alt="teacher"></a>
                                            </div>
                                            <div class="name">
                                                <a href=""><h6>{{ $course->teacher->name }}</h6></a>
                                            </div>
                                            <div class="admin">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
                                                    <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- singel course -->
                            </div>
                        @endforeach
                        @endif

                    </div> <!-- row -->
                </div>
                <div class="tab-pane fade" id="courses-list" role="tabpanel" aria-labelledby="courses-list-tab">
                    <div class="row">
                        @if(count($courses)>0)
                        @foreach ($courses as $course)
                            <div class="col-lg-12">
                                <div class="singel-course mt-30">
                                    <div class="row no-gutters">
                                        <div class="col-md-6">
                                            <div class="thum">
                                                <div class="image">
                                                    <img src="{{ asset($course->image) }}" alt="Course">
                                                </div>
                                                <div class="price">
                                                    <span>free1</span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="cont">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                                <span>(20 Reviws)</span>
                                                <br>
                                                <a href="{{ route('front.courses.show',$course->id) }}"><h4>{{ $course->name }}</h4></a>
                                                <div class="course-teacher">
                                                    <div class="thum">
                                                        <a href=""><img src="{{ $course->teacher->getAvatar() }}" alt="teacher"></a>
                                                    </div>
                                                    <div class="name">
                                                        <a href="#"><h6>{{ $course->teacher->name }}</h6></a>
                                                    </div>
                                                    <div class="admin">
                                                        <ul>
                                                            <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
                                                            <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!--  row  -->
                                </div> <!-- singel course -->
                            </div>
                        @endforeach
                        @endif

                    </div> <!-- row -->
                </div>
            </div> <!-- tab content -->
            {{ $courses->links('vendor.pagination.frontend-paginator') }}
        </div>
        <div class="col-md-3">
            <div class="saidbar">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="saidbar-search ">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> <!-- saidbar search -->
                        <div class="categories mt-30">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="{{ route('front.courses.index') }}">All</a></li>
                                @foreach ($categories as $category)
                                    <li><a href="?category={{ $category->id }}">{{ $category->name }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div> <!-- categories -->

                </div> <!-- row -->
            </div> <!-- saidbar -->
        </div>
    </div>
    </div>
</section>

@endsection
