@extends('admin.layouts.app')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.posts.index') }}">Posts</a>
        <span class="breadcrumb-item active">Edit Post</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h3>Edit Blog Post</h3>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Edit Post Form</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')


            <form action="{{ route('manage.posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="name">Title</label>
                        <input class="form-control" id="name" type="text" name="title" value="{{ $post->title }}">
                    </div>
                    <div class="col-lg mg-t-40 mg-lg-t-0">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                </div>
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="">Category</label>
                        <select class="form-control select2-show-search" name="category" data-placeholder="Choose one (with searchbox)">
                            @foreach ($categories as $category)
                                 <option value="{{ $category->id }}" {{ ($post->category_id ==$category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-lg">
                        <label for="">Body</label>
                        <textarea id="summernote" name="body">{{ $post->body }}</textarea>
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
@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
@endsection
