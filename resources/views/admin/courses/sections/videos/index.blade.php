@extends('admin.layouts.app')

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.courses.index') }}">Courses</a>
        <a class="breadcrumb-item" href="{{ route('manage.sections.index',$course->id) }}">Sections</a>
        <span class="breadcrumb-item active">Videos</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title ">
            <h3>Manage Course Videos</h3>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 mb-20">
            <h6 class="card-body-title mg-b-20-force">Table for Course-{{ $course->name }} Section-{{ $section->name }}
                @if($section->user_id == auth()->user()->id)
                    <a href="{{ route('manage.videos.create',$section->id) }}" class="btn btn-sm btn-success active" style="float: right;">Create New Video</a>
                @endif
            </h6>


             @include('admin.layouts.alerts')

             <form action="" method="get">
                <div class="ml-auto mg-b-10 col-md-4">
                    <input type="text" class="form-control" name="search" placeholder="Search"
                        value="{{ isset(request()->search) ? request()->search : ''  }}" >
                </div>
            </form>

            <div class="table-responsive col-lg-12">
                <h6>If You Wants to Change The Video Order Just Drag and Drop the Row<h6>
                <table id="table" class="table table-light table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="" style="display:none;">Order</th>
                            <th>ID</th>
                            <th class=""> title</th>
                            <th>Status</th>
                            @canAny(['update','destroy'],auth()->user(),$videos)
                                <th style="width: 150px;">Action</th>
                            @endcanAny
                        </tr>
                    </thead>
                    <tbody id="tablecontents" style="background-color: white;">
                        @foreach($videos as $video)
                            <tr class="row1" data-id="{{ $video->id }}">
                                <td style="display:none;">{{ $video->order }}</td>
                                <td>{{ $video->id }}</td>
                                <td name="title">{{ $video->title }}</td>
                                <td>{!! isset($video->streaming_path) ?
                                    '<span class="badge badge-success">Uploaded</span>' :
                                    '<span class="badge badge-danger">Not Uploaded</span>'
                                    !!}</td>
                                @canAny(['update','destroy'],$video)
                                <td>
                                    <div class="row">
                                        @can('update',auth()->user(),$video)
                                            <a href="{{ route('manage.videos.edit',[$section->id,$video->id]) }}" class="btn btn-sm btn-warning mg-l-15 mg-b-5" id="">Edit</a>
                                        @endcan
                                        @can('destroy',$video)
                                            <form method="post" id="delete" class="ml-3 " action="{{route('manage.videos.destroy',[$section->id,$video->id])}}">
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
                {{-- {{ $videos->links() }} --}}
            </div>
        </div><!-- card -->

    </div><!-- sl-pagebody -->


@endsection


@section('script')
@parent
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script>
        console.log(123);
        $(function () {
            const a=$("#table").DataTable({
                'columnDefs': [{
                    "targets": [1,2,3,4],
                    "orderable": false
                }],
                "paging":   false,
                "info":     false
            });
            // console.log(a);
            $('#table_filter').hide();
                $( "#tablecontents" ).sortable({
                    items: "tr",
                    cursor: 'move',
                    search:false,
                    sort:false,
                    opacity: 0.6,
                    update: function() {
                        sendOrderToServer();
                    }
                });
                console.log(a);

                function sendOrderToServer() {
                    var order = [];
                    var token = $('meta[name="csrf-token"]').attr('content');
                    $('tr.row1').each(function(index,element) {
                        order.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                        });
                    });

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ route('manage.videos.order',$section->id) }}",
                            data: {
                        order: order,
                        _token: token
                        },
                        success: function(response) {
                            if (response.status == "success") {
                            console.log(response);
                            } else {
                            console.log(response);
                            }
                        }
                    });
                }
        });
    </script>
@endsection






