@extends('admin.layouts.app')

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Posts</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title ">
            <h3>Manage Posts</h3>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 mb-20">
            <h6 class="card-body-title mg-b-20-force">Table for All Posts
                <a href="{{ route('manage.posts.create') }}" class="btn btn-sm btn-success active"
                    style="float: right;">Create New Post</a>
            </h6>

            {{-- alerts --}}
            @include('admin.layouts.alerts')

            <form action="" method="get">
                <div class="ml-auto mg-b-10 col-md-4">
                    <input type="text" class="form-control" name="search" placeholder="Search"
                        value="{{ isset(request()->search) ? request()->search : '' }}">
                </div>
            </form>

            <div class="table-responsive col-lg-12">
                <table class="table table-light table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="">ID</th>
                            <th class=""> Name</th>
                                <th>Author</th>
                                <th>Category</th>
                                @canany(['update','destroy'],auth()->user(),App\Models\Post::class)
                                    <th style="width: 150px;">Action</th>
                                @endcanany
                        </tr>
                    </thead>
                    <tbody style="background-color: white;">
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>{{ $post->category->name }}</td>


                                <td>
                                    <div class="row">
                                        @can('update',$post)
                                            <a href="{{ route('manage.posts.edit', $post->id) }}"
                                                class="btn btn-sm btn-warning mg-l-15" id="">Edit</a>
                                        @endcan
                                        @can('destroy',$post)
                                            <form method="post" id="delete" class="ml-3"
                                                action="{{ route('manage.posts.destroy', $post->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        @endcan


                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div><!-- card -->

    </div><!-- sl-pagebody -->


@endsection
