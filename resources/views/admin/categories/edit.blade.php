@extends('admin.layouts.app')

@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.categories.index') }}">Categories</a>
        <span class="breadcrumb-item active">Edit Category</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h3>Edit Category</h3>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Edit Category Form</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')


            <form action="{{ route('manage.categories.update',$category->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg">
                        <label for="name">Category Name</label>
                        <input class="form-control" id="name" type="text" name="name" value="{{ $category->name }}">
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
