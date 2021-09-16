@extends('admin.layouts.app')

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.courses.index') }}">Courses</a>
        <span class="breadcrumb-item active">Sections</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title ">
            <h3>Manage Course Sections</h3>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 mb-20">
            <h6 class="card-body-title mg-b-20-force">Table for {{ $course->name }} Sections
                @if(auth()->user()->id==$course->user_id)
                <a href="{{ route('manage.sections.create',$course->id) }}" class="btn btn-sm btn-success active" style="float: right;">Create New Section</a>
                @endif
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
                            <th style="width: 150px;">Action</th>

                        </tr>
                    </thead>
                    <tbody style="background-color: white;">
                        @foreach($sections as $section)
                            <tr>
                                <td>{{ $section->id }}</td>
                                <td>{{ $section->name }}</td>
                                @canAny(['update','destroy'],$section)
                                <td>
                                    <div class="row">
                                        @if(auth()->user()->hasPermissionTo('view_all_videos') || auth()->user()->id == $section->user_id)
                                            <a href="{{ route('manage.videos.index',$section->id) }}" class="btn btn-sm btn-primary mg-l-15 mg-b-5" id="">Videos</a>
                                        @endif
                                        @can('update',$section)
                                            <a href="{{ route('manage.sections.edit',[$course->id,$section->id]) }}" class="btn btn-sm btn-warning mg-l-15 mg-b-5" id="">Edit</a>
                                        @endcan

                                        @can('destroy',$section)
                                            <form method="post" id="delete" class="ml-3 " action="{{route('manage.sections.destroy',[$course->id,$section->id])}}">
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
                {{ $sections->links() }}
            </div>
        </div><!-- card -->

    </div><!-- sl-pagebody -->


@endsection
