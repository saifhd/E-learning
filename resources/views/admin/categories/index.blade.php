@extends('admin.layouts.app')

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Categories</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title ">
            <h3>Manage Categories</h3>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 mb-20">
            <h6 class="card-body-title mg-b-20-force">Table for All Roles
                <a href="{{ route('manage.categories.create') }}" class="btn btn-sm btn-success active" style="float: right;">Create New Category</a>
            </h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')

             <form action="" method="get">
                <div class="ml-auto mg-b-10 col-md-4">
                    <input type="text" class="form-control" name="search" placeholder="Search"
                        value="{{ isset(request()->search) ? request()->search : ''  }}" >
                </div>
            </form>

            <div class="table-responsive col-lg-12">
                <table class="table table-light table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="">ID</th>
                            <th class=""> Name</th>
                            <th>Posts Count</th>
                            <th style="width: 150px;">Action</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: white;">
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>

                                <td>{{ $category->posts_count }}</td>
                                <td>
                                    <div class="row">
                                            <a href="{{ route('manage.categories.edit',$category->id) }}" class="btn btn-sm btn-warning mg-l-15" id="">Edit</a>



                                                <form method="post" id="delete" class="ml-3" action="{{route('manage.categories.destroy',$category->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>


                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div><!-- card -->

    </div><!-- sl-pagebody -->


@endsection
