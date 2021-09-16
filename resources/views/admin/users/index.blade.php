@extends('admin.layouts.app')

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <span class="breadcrumb-item active">Manage Users</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title ">
            <h3>Manage Users</h3>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 mb-20">
            <h6 class="card-body-title mg-b-20-force">Table for All Users</h6>

            {{-- alerts --}}
            @include('admin.layouts.alerts')

            <form action="" method="get">
                <div class="ml-auto mg-b-10 col-md-4">
                    <input type="text" class="form-control" name="search" placeholder="Search"
                        value="{{ isset(request()->search) ? request()->search : ''  }}">
                </div>
            </form>
            <div class="table-responsive ">
                <table class="table table-light table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="">ID</th>
                            <th class=""> Name</th>
                            <th class="">Email</th>
                            <th class="" style="">Role</th>
                            @canany(['destroy','update'],auth()->user())
                                <th style="width:150px;">Action</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody style="background-color: white;">
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td class="tb">{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-info">{{ $role->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="row">
                                        @can('update',$user)
                                            <a href="{{ route('manage.users.edit',$user->id) }}" class="btn btn-sm btn-warning mg-l-10 " id="">Edit</a>
                                        @endcan
                                        @can('destroy',$user)
                                            <form method="post" id="delete" class="ml-3" action="{{route('manage.users.destroy',$user->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" id="">Trash</button>
                                            </form>
                                        @endcan

                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div><!-- card -->

    </div><!-- sl-pagebody -->


@endsection
