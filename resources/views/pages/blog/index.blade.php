@extends('layouts.app')

@section('content')

@include('layouts.banner')

<section id="blog-page" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if(count($posts)>0)
                @foreach ($posts as $post)
                    <div class="singel-blog mt-30">
                        @if(isset($post->image))
                            <div class="blog-thum">
                                <img src="{{ asset($post->image) }}" alt="Blog">
                            </div>
                        @endif
                        <div class="blog-cont">
                            <a href="{{ route('front.posts.show',$post->id) }}"><h3>{{ $post->title }}</h3></a>
                            <ul>
                                <li><a href="#"><i class="fa fa-calendar"></i>{{ $post->created_at->diffForHumans() }}</a></li>
                                <li><a href="#"><i class="fa fa-user"></i>{{ $post->author->name }}</a></li>
                                <li><a href="#"><i class="fa fa-tags"></i>{{ $post->category->name }}</a></li>
                            </ul>
                        </div>
                    </div> <!-- singel blog -->
                @endforeach
                @endif

                {{-- @include('layouts.pagination') --}}

                {{ $posts->links('vendor.pagination.frontend-paginator') }}
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
                                    @if(count($categories)>0)
                                        @foreach ($categories as $category)
                                            <li><a href="?filter={{ $category->id }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div> <!-- categories -->

                    </div> <!-- row -->
                </div> <!-- saidbar -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>


@endsection
