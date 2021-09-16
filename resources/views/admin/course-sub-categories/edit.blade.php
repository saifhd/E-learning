@extends('admin.layouts.app')

@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="index.html">Dashboard</a>
    <a class="breadcrumb-item" href="{{ route('manage.course-sub-categories.index') }}">Sub Categories</a>
    <span class="breadcrumb-item active">Edit Sub Category</span>

</nav>

<div class="sl-pagebody">

    <div class="sl-page-title">
        <h3>Edit Sub Category</h3>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Edit Sub Category Form</h6>

        {{-- alerts --}}
        @include('admin.layouts.alerts')


        <form action="{{ route('manage.course-sub-categories.update',$course_sub_category->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row mg-t-20">
                <div class="col-lg">
                    <label for="name">Sub Category Name</label>
                    <input class="form-control" placeholder="Sub Category Name" type="text" name="name" value="{{ $course_sub_category->name }}">
                </div>
            </div>
            <div class="row mg-t-20">
                <div class="col-lg">
                    <label for="">Category</label>
                    <select class="form-control select2-show-search" name="category" data-placeholder="Choose one (with searchbox)">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ ($category->id==$course_sub_category->category_id) ? 'selected' : ''  }}>
                            {{ $category->name }}
                        </option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="row mg-t-20">
                <div class="col-lg text-right">
                    <button class="btn btn-info mt-10 ">Create</button>
                </div>
            </div>
        </form>

    </div>

</div><!-- sl-pagebody -->


@endsection
