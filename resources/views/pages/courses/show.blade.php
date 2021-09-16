@extends('layouts.app')

@section('content')
@include('layouts.banner')


<section id="corses-singel" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="corses-singel-left mt-30">
                    <div class="title">
                        <h3>{{ $course->name }}</h3>
                    </div> <!-- title -->
                    <div class="course-terms">
                        <ul>
                            <li>
                                <div class="teacher-name">
                                    <div class="thum">
                                        <img src="{{ $course->teacher->getAvatar() }}" style="width:50px; height:50px;" alt="Teacher">
                                    </div>
                                    <div class="name">
                                        <span>Teacher</span>
                                        <h6>{{ $course->teacher->name }}</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="course-category">
                                    <span>Category</span>
                                    <h6>{{ $course->category->name }} </h6>
                                </div>
                            </li>
                            <li>
                                <div class="review">
                                    <span>Review</span>
                                    <ul>
                                        @if($course->reviews->count()>0)
                                        @for($i = 0; $i < ceil($course->reviews->sum('rating')/$course->reviews->count()); $i++ )
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        @endfor
                                        @endif
                                        <li class="rating">{{ $course->reviews()->count() }} Reviews</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- course terms -->

                    <div class="corses-singel-image pt-50">
                        <img src="{{ asset($course->image) }}" alt="Courses">
                    </div> <!-- corses singel image -->

                    <div class="corses-tab mt-30">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab" aria-controls="curriculam" aria-selected="false">Curriculam</a>
                            </li>
                            <li class="nav-item">
                                <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab" aria-controls="instructor" aria-selected="false">Instructor</a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="overview-description">
                                    {{ $course->description }}
                                </div> <!-- overview description -->
                            </div>
                            <div class="tab-pane fade" id="curriculam" role="tabpanel" aria-labelledby="curriculam-tab">
                                <div class="curriculam-cont">
                                    <div class="title">
                                        <h6>Learn basis javascirpt Lecture Started</h6>
                                    </div>
                                    <div class="accordion" id="accordionExample">
                                        @foreach ($course->sections as $section)
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse">
                                                        <ul>
                                                            <li><i class="fa fa-file-o"></i></li>
                                                            <li><span class="lecture">Section {{ $loop->iteration }}</span></li>
                                                            <li><span class="head">{{ $section->name }}</span></li>
                                                            <li><span class="time d-none d-md-block"></span></li>
                                                        </ul>
                                                    </a>
                                                </div>

                                                <div id="collapse{{ $loop->iteration }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <p>{{ $section->description }}</p>
                                                        <div class="accordion" id="accordionExample-child">
                                                        @foreach ($section->uploaded_videos as $video)
                                                            <div class="card">
                                                                <div class="card-header" id="headingtwo">
                                                                    <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse-child{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapseOne">
                                                                        <ul>
                                                                            <li><span class="lecture">Lecture {{ $loop->iteration }}</span></li>
                                                                            <li><span class="head">{{ $video->title }}</span></li>
                                                                            <li><span class="time d-none d-md-block"><i class="fa fa-clock-o"></i> <span> {{ gmdate("H:i:s",$video->duration) }}</span></span></li>
                                                                        </ul>
                                                                    </a>
                                                                </div>
                                                                <div id="collapse-child{{ $loop->iteration }}" class="collapse" aria-labelledby="headingtwo" data-parent="#accordionExample-child">
                                                                    <div class="card-body">
                                                                        <p>{{ $video->description }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div> <!-- curriculam cont -->
                            </div>
                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                <div class="instructor-cont">
                                    <div class="instructor-author">
                                        <div class="author-thum">
                                            <img src="{{ $course->teacher->getAvatar() }}" alt="Instructor">
                                        </div>
                                        <div class="author-name">
                                            <a href="#"><h5>{{ $course->teacher->name }}</h5></a>
                                            <span>Senior WordPress Developer</span>
                                            <ul class="social">
                                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="instructor-description pt-25">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fuga ratione molestiae unde provident quibusdam sunt, doloremque. Error omnis mollitia, ex dolor sequi. Et, quibusdam excepturi. Animi assumenda, consequuntur dolorum odio sit inventore aliquid, optio fugiat alias. Veritatis minima, dicta quam repudiandae repellat non sit, distinctio, impedit, expedita tempora numquam?</p>
                                    </div>
                                </div> <!-- instructor cont -->
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont">
                                    <div class="title">
                                        <h6>Student Reviews</h6>
                                    </div>
                                    <ul>
                                        @foreach ($course->reviews as $review)
                                            <li>
                                                <div class="singel-reviews">
                                                    <div class="reviews-author">
                                                        <div class="author-thum">
                                                            <img src="{{ $review->commented_user->getAvatar() }}" alt="Reviews">
                                                        </div>
                                                        <div class="author-name">
                                                            <h6>{{ $review->commented_user->name }}</h6>
                                                            <span>{{ $review->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="reviews-description pt-20">
                                                        <p>{{ $review->massage }} </p>
                                                        <div class="rating">
                                                            <ul>
                                                                @for($i = 0; $i < $review->rating; $i++)
                                                                    <li><i class="fa fa-star"></i></li>
                                                                @endfor
                                                            </ul>
                                                            <span>/ {{ $review->rating }} Star</span>
                                                        </div>
                                                    </div>
                                                </div> <!-- singel reviews -->
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="title pt-15">
                                        <h6>Leave A Comment</h6>
                                    </div>
                                    <div class="reviews-form">
                                        <form action="{{ route('front.courses.reviews.store',$course->id) }}" method="post">
                                            @csrf
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <div class="rate-wrapper">
                                                            <div class="rate-label">Your Rating:</div>
                                                            <input type="hidden" name="rating" value="1" id="rating">
                                                            <div class="rate" mb-5>
                                                                <button class='btn btn-sm' style="" type="button" id="rate1"><div class="rate-item"><i id="star1" class="fa fa-star" style="" aria-hidden="true"></i></div></button>
                                                                <button class='btn btn-sm' type="button" id="rate2"><div class="rate-item"><i id="star2" class="fa fa-star" aria-hidden="true"></i></div></button>
                                                                <button class='btn btn-sm' type="button" id="rate3"><div class="rate-item"><i id="star3" class="fa fa-star" aria-hidden="true"></i></div></button>
                                                                <button class='btn btn-sm' type="button" id="rate4"><div class="rate-item"><i id="star4" class="fa fa-star" aria-hidden="true"></i></div></button>
                                                                <button class='btn btn-sm' type="button" id="rate5"><div class="rate-item"><i id="star5" class="fa fa-star" aria-hidden="true"></i></div></button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <textarea name="message" placeholder="Comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <button type="submit" class="main-btn">Post Comment</button>
                                                    </div>
                                                </div>
                                            </div> <!-- row -->
                                        </form>
                                    </div>
                                </div> <!-- reviews cont -->
                            </div>
                        </div> <!-- tab content -->
                    </div>
                </div> <!-- corses singel left -->

            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="course-features mt-30">
                            <h4>Course Features </h4>
                            <ul>

                                <li><i class="fa fa-clock-o"></i>Duaration : <span>{{ $counts['duration'] }}</span></li>
                                <li><i class="fa fa-clone"></i>Sections : <span>{{ $course->sections->count() }}</span></li>
                                <li><i class="fa fa-beer"></i>Lectures :  <span>{{ $counts['lectures'] }}</span></li>
                                <li><i class="fa fa-user-o"></i>Students :  <span>100</span></li>
                            </ul>
                            <div class="price-button pt-10">
                                @if(isset($course->discount))
                                    <span>Price : <del>${{ $course->price }}</del>
                                        <b> &ensp;  ${{ $course->price-(($course->price * $course->discount)/100) }}</b></span>
                                @else
                                    <span>Price : <b> ${{ $course->price }}</b></span>
                                @endif
                                <br>
                                <a href="#" class="main-btn">Enroll Now</a>
                            </div>
                        </div> <!-- course features -->
                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

@endsection
@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#rate1').click(function (e) {
            e.preventDefault();
            $('#star1').css('color','#ffc600');
            $('#star2').css('color','');
            $('#star3').css('color','');
            $('#star4').css('color','');
            $('#star5').css('color','');
            $('#rating').val(1);
        });
        $('#rate2').click(function (e) {
            // e.preventDefault();
                $('#star1').css('color','#ffc600');
                $('#star2').css('color','#ffc600');
                $('#star3').css('color','');
                $('#star4').css('color','');
                $('#star5').css('color','');
                $('#rating').val(2);

        });
        $('#rate3').click(function (e) {
            e.preventDefault();
            $('#star1').css('color','#ffc600');
            $('#star2').css('color','#ffc600');
            $('#star3').css('color','#ffc600');
            $('#star4').css('color','');
            $('#star5').css('color','');
            $('#rating').val(3);

        });
        $('#rate4').click(function (e) {
            e.preventDefault();
            $('#star1').css('color','#ffc600');
            $('#star2').css('color','#ffc600');
            $('#star3').css('color','#ffc600');
            $('#star4').css('color','#ffc600');
            $('#star5').css('color','');
            $('#rating').val(4);

        });
        $('#rate5').click(function (e) {
            e.preventDefault();
            $('#star1').css('color','#ffc600');
            $('#star2').css('color','#ffc600');
            $('#star3').css('color','#ffc600');
            $('#star4').css('color','#ffc600');
            $('#star5').css('color','#ffc600');
            $('#rating').val(5);

        });
    });
</script>
@endsection
