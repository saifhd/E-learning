@extends('admin.layouts.app')

@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.course-sub-categories.index') }}">Sub Categories</a>
        <span class="breadcrumb-item active">Create Sub Category</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h3>Create Sub Category</h3>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Create New Sub Category</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')


            <form action="{{ route('manage.course-sub-categories.store') }}" method="post">
                @csrf
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="name">Sub Category Name</label>
                        <input class="form-control" placeholder="Sub Category Name" type="text" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="">Category</label>
                        <select class="form-control select2-show-search" name="category" data-placeholder="Choose one (with searchbox)">
                            @foreach ($categories as $category)
                                 <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="row mg-t-20">
                    <div class="col-lg text-right" >
                            <button class="btn btn-info mt-10 ">Create</button>
                    </div>
                </div>
            </form>

        </div>

    </div><!-- sl-pagebody -->


@endsection
