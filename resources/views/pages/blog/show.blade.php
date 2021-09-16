@extends('layouts.app')

@section('content')

@include('layouts.banner')

<section id="blog-singel" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details mt-30">
                    <div class="singel-blog mt-30">
                        <div class="blog-thum">
                            <img src="{{ asset($post->image) }}" alt="Blog Details">
                        </div>
                    </div>
                    <div class="cont">
                        <h3>{{ $post->title }}</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-calendar"></i>{{ $post->created_at->diffForHumans() }}</a></li>
                            <li><a href="#"><i class="fa fa-user"></i>{{ $post->author->name }}</a></li>
                            <li><a href="#"><i class="fa fa-tags"></i>{{ $post->category->name }}</a></li>
                        </ul>
                        {!! $post->body !!}
                        <div class="addthis_inline_share_toolbox_a5hs"></div>

                        <div class="blog-comment pt-45">
                            <div class="title pb-15">
                                <h3>Comments</h3>
                                <div class="fb-comments" data-href="{{ asset('blog/posts/').$post->id }}" data-width="650" data-numposts="10"></div>
                            </div>
                        </div>
                            {{-- <div class="blog-comment pt-45">
                            <div class="title pb-15">
                                <h3>Comment (3)</h3>
                            </div>  <!-- title -->
                            <ul>
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <div class="author-thum">
                                                <img src="images/review/r-1.jpg" alt="Reviews">
                                            </div>
                                            <div class="comment-name">
                                                <h6>Bobby Aktar</h6>
                                                <span>April 03, 2019</span>
                                            </div>
                                        </div>
                                        <div class="comment-description pt-20">
                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                        </div>
                                        <div class="comment-replay">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div> <!-- comment -->
                                    <ul class="replay">
                                        <li>
                                            <div class="comment">
                                                <div class="comment-author">
                                                    <div class="author-thum">
                                                        <img src="images/review/r-2.jpg" alt="Reviews">
                                                    </div>
                                                    <div class="comment-name">
                                                        <h6>Humayun Ahmed</h6>
                                                        <span>April 03, 2019</span>
                                                    </div>
                                                </div>
                                                <div class="comment-description pt-20">
                                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                                </div>
                                                <div class="comment-replay">
                                                    <a href="#">Reply</a>
                                                </div>
                                            </div> <!-- comment -->
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <div class="author-thum">
                                                <img src="images/review/r-3.jpg" alt="Reviews">
                                            </div>
                                            <div class="comment-name">
                                                <h6>Bobby Aktar</h6>
                                                <span>April 03, 2019</span>
                                            </div>
                                        </div>
                                        <div class="comment-description pt-20">
                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</p>
                                        </div>
                                        <div class="comment-replay">
                                            <a href="#">Reply</a>
                                        </div>
                                    </div> <!-- comment -->
                                </li>
                            </ul>
                            <div class="title pt-45 pb-25">
                                <h3>Leave a comment</h3>
                            </div> <!-- title -->
                            <div class="comment-form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-singel">
                                                <input type="text" placeholder="Name">
                                            </div> <!-- form singel -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-singel">
                                                <input type="email" placeholder="email">
                                            </div> <!-- form singel -->
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-singel">
                                                <textarea placeholder="Comment"></textarea>
                                            </div> <!-- form singel -->
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-singel">
                                                <button class="main-btn">Submit</button>
                                            </div> <!-- form singel -->
                                        </div>
                                    </div> <!-- row -->
                                </form>
                            </div>  <!-- comment-form -->
                        </div> <!-- blog comment --> --}}
                    </div> <!-- cont -->
                </div> <!-- blog details -->
            </div>
            <div class="col-lg-4">
                <div class="saidbar">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="saidbar-search mt-30">
                                <form method="get" action="">
                                    <input type="text" name="search" placeholder="Search">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div> <!-- saidbar search -->
                            <div class="categories mt-30">
                                <h4>Categories</h4>
                                <ul>
                                    @foreach ($categories as $category)
                                        <li><a href="#">{{ $category->name }}</a></li>
                                    @endforeach


                                </ul>
                            </div>
                        </div> <!-- categories -->

                    </div> <!-- row -->
                </div> <!-- saidbar -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
<div id="fb-root"></div>

@endsection
@section('scripts')

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=4535362966484375&autoLogAppEvents=1" nonce="agxszpTk"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eac3290710e5ce4"></script>

@endsection
