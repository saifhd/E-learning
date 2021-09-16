@extends('admin.layouts.app')

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Categories</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title ">
            <h3>Manage Course Categories</h3>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 mb-20">
            <h6 class="card-body-title mg-b-20-force">Table for All Course Categories
                @can('create',App\Models\Admin\CourseCategory::class)
                    <a href="{{ route('manage.course-categories.create') }}" class="btn btn-sm btn-success active" style="float: right;">Create New Category</a>
                @endcan
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
                            @canAny(['update','destroy'],auth()->user(),App\Models\CourseCategory::class)
                            <th style="width: 150px;">Action</th>
                            @endcanAny
                        </tr>
                    </thead>
                    <tbody style="background-color: white;">
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                @canAny(['update','destroy'],$category)
                                <td>
                                    <div class="row">
                                        @can('update',$category)
                                            <a href="{{ route('manage.course-categories.edit',$category->id) }}" class="btn btn-sm btn-warning mg-l-15" id="">Edit</a>
                                        @endcan
                                        @can('destroy',$category)
                                            <form method="post" id="delete" class="ml-3" action="{{route('manage.course-categories.destroy',$category->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        @endcan


                                    </div>
                                </td>
                                @endcanAny
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div><!-- card -->

    </div><!-- sl-pagebody -->


@endsection
