@extends('admin.layouts.app')

@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.course-categories.index') }}">Categories</a>
        <span class="breadcrumb-item active">Create Category</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h3>Create Category</h3>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Create New Category Form</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')


            <form action="{{ route('manage.course-categories.store') }}" method="post">
                @csrf
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="name">Category Name</label>
                        <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
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
