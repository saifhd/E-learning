@extends('admin.layouts.app')

@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.course-categories.index') }}">Categories</a>
        <span class="breadcrumb-item active">Edit Category</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h3>Edit Course Category</h3>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Edit Course Category Category Form</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')


            <form action="{{ route('manage.course-categories.update',$course_category->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="name">Category Name</label>
                        <input class="form-control" id="name" type="text" name="name" value="{{ $course_category->name }}">
                    </div>
                </div>

                <div class="row mg-t-20">
                    <div class="col-lg text-right" >
                            <button class="btn btn-info mt-10 ">Update</button>
                    </div>
                </div>
            </form>

        </div>

    </div><!-- sl-pagebody -->


@endsection
