@extends('admin.layouts.app')

@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.courses.index') }}">Courses</a>
        <a class="breadcrumb-item" href="{{ route('manage.sections.index',$course->id) }}">Sections</a>
        <span class="breadcrumb-item active">Edit Section</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h3>Edit Section</h3>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Course - {{ $course->name }}</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')


            <form action="{{ route('manage.sections.update',[$course->id,$section->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="name">Section Name</label>
                        <input class="form-control" placeholder="Course Title" type="text" name="name" value="{{ $section->name }}">
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
