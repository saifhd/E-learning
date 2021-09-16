@extends('admin.layouts.app')

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Sub Categories</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title ">
            <h3>Manage Course Sub Categories</h3>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 mb-20">
            <h6 class="card-body-title mg-b-20-force">Table for All Sub Categories
                @can('create',App\Models\Admin\CourseSubCategory::class)
                <a href="{{ route('manage.course-sub-categories.create') }}" class="btn btn-sm btn-success active" style="float: right;">Create New Category</a>
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
                            <th>Category Name</th>
                            @canAny(['destroy','update'],auth()->user(),$sub_categories)
                                <th style="width: 150px;">Action</th>
                            @endcanAny
                        </tr>
                    </thead>
                    <tbody style="background-color: white;">
                        @foreach($sub_categories as $sub_category)
                            <tr>
                                <td>{{ $sub_category->id }}</td>
                                <td>{{ $sub_category->name }}</td>
                                <td>{{ $sub_category->categories->name }}</td>
                                @canAny(['destroy','update'],$sub_category)
                                <td>
                                    <div class="row">
                                        @can('update',$sub_category)
                                            <a href="{{ route('manage.course-sub-categories.edit',$sub_category->id) }}" class="btn btn-sm btn-warning mg-l-15" id="">Edit</a>
                                        @endcan
                                        @can('destroy',$sub_category)
                                            <form method="post" id="delete" class="ml-3" action="{{route('manage.course-sub-categories.destroy',$sub_category->id)}}">
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
                {{ $sub_categories->links() }}
            </div>
        </div><!-- card -->

    </div><!-- sl-pagebody -->


@endsection
