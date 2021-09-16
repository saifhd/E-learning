@extends('admin.layouts.app')

@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.courses.index') }}">Courses</a>
        <a class="breadcrumb-item" href="{{ route('manage.sections.index',$course->id) }}">Sections</a>
        <a class="breadcrumb-item" href="{{ route('manage.videos.index',$section->id) }}">Videos</a>
        <span class="breadcrumb-item active">Create new Video</span>
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
             <div class="mg-t-30">
                 <video-uploader :video_id="{{ $video->id }}" :section_id="{{ $section->id }}"></video-uploader>
             </div>

        </div>

    </div><!-- sl-pagebody -->


@endsection
@section('script')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@endsection
