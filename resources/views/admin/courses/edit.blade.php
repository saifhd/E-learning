@extends('admin.layouts.app')

@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item">Roles & Permissions</span>
        <a class="breadcrumb-item" href="{{ route('manage.roles.index') }}">Roles</a>
        <span class="breadcrumb-item active">Create Role</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h3>Edit Course</h3>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Edit Course Form</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')


            <form action="{{ route('manage.courses.update',$course->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="name">Course Name</label>
                        <input class="form-control" placeholder="Course Title" type="text" name="name" value="{{ $course->name }}">
                    </div>
                    <div class="col-lg mg-t-40 mg-lg-t-0">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="name">Price($)</label>
                        <input class="form-control" placeholder="Course Price" type="text" name="price" value="{{ $course->price }}">
                    </div>
                    <div class="col-lg">
                        <label for="name">Discount(%)</label>
                        <input class="form-control" placeholder="Discount" type="number" name="discount" value="{{ $course->discount }}">
                    </div>
                </div>
                {{-- Use Vue for Retrieve Categories --}}
                {{-- @dd($course->sub_category->id ) --}}
                <course-edit-categories :category_id='{{  $course->category->id  }}'
                    :sub_category_id='{{ $course->sub_category->id }}'></course-edit-categories>

                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="name">Course Description</label>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $course->description }}</textarea>
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
