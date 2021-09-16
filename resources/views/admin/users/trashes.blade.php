@extends('admin.layouts.app')

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Trashes</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title ">
            <h3>Trashed Users</h3>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 mb-20">
            <h6 class="card-body-title mg-b-20-force">Table for Trashed Users</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="">ID</th>
                        <th class=""> Name</th>
                        <th class="">Email</th>
                        <th>Role</th>
                        @canany(['restore','forceDelete'],auth()->user())
                            <th>Action</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge badge-info">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="row">
                                    @can('forceDelete',$user)
                                        <a href="{{ route('manage.users.restore',$user->id) }}" class="btn btn-sm btn-success" id="">Restore</a>
                                    @endcan
                                    @can('restore',$user)
                                        <form method="post" id="delete" class="ml-3" action="{{route('manage.users.forcedelete',$user->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" id="">Delete</button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach

                </tbody>
            </table>
        </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-pagebody -->


@endsection
