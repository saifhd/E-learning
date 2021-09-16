@extends('admin.layouts.app')

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Permissions</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title ">
            <h3>All Permissions</h3>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 mb-20">
            <h6 class="card-body-title mg-b-20-force">Table for All Permisssions</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')

            <div class="table-responsive col-lg-12">
                <table class="table table-light table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr style="border-color:black;">
                            <th class="">ID</th>
                            <th class=""> Name</th>
                        </tr>
                    </thead>
                    <tbody class="text-black" style="background-color: white;">
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>

                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $permissions->links() }}
            </div>
        </div><!-- card -->

    </div><!-- sl-pagebody -->


@endsection
