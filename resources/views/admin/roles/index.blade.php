@extends('admin.layouts.app')

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Manage Roles</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title ">
            <h3>Manage Roles</h3>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 mb-20">
            <h6 class="card-body-title mg-b-20-force">Table for All Roles
                @can('create',Spatie\Permission\Models\Role::class)
                    <a href="{{ route('manage.roles.create') }}" class="btn btn-sm btn-success active" style="float: right;">Create New Role</a>
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
                            <th class="" style="max-width: 400px;">Permissions</th>
                            @canany(['update','destroy'],Spatie\Permission\Models\Role::class)
                                <th style="width: 150px;">Action</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody style="background-color: white;">
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge badge-info" style="font-size: 12px;">{{ $permission->name }}</span>
                                    @endforeach
                                </td>

                                <td>
                                    <div class="row">
                                        @can('update',$role)
                                            <a href="{{ route('manage.roles.edit',$role->id) }}" class="btn btn-sm btn-warning mg-l-15" id="">Edit</a>
                                        @endcan

                                        @can('destroy',$role)
                                            @if(!($role->name=='Admin' || $role->name=='Super Admin' || $role->name=='User'))
                                                <form method="post" id="delete" class="ml-3" action="{{route('manage.roles.destroy',$role->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            @endif
                                        @endcan

                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $roles->links() }}
            </div>
        </div><!-- card -->

    </div><!-- sl-pagebody -->


@endsection
