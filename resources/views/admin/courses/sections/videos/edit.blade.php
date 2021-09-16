@extends('admin.layouts.app')

@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.courses.index') }}">Courses</a>
        <a class="breadcrumb-item" href="{{ route('manage.sections.index',$course->id) }}">Sections</a>
        <a class="breadcrumb-item" href="{{ route('manage.videos.index',$section->id) }}">Videos</a>
        <span class="breadcrumb-item active">Edit Video</span>
    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h3>Create New Video</h3>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Course - {{ $course->name }}</h6>
            <h6 class="card-body-title">Section - {{ $section->name }}</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')


            <form action="{{ route('manage.videos.update',[$section->id,$video->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="name">Title</label>
                        <input class="form-control" placeholder="Video Title" type="text" name="title" value="{{ $video->title }}">
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="name">Description</label>
                        <textarea name="description" class="form-control" rows="5">{{ $video->description }}</textarea>
                    </div>
                </div>


                <div class="row mg-t-20">
                    <div class="col-lg text-right" >
                            <button type="submit" class="btn btn-info mt-10 ">Update</button>
                    </div>
                </div>
            </form>

        </div>

    </div><!-- sl-pagebody -->


@endsection
@section('script')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@endsection
