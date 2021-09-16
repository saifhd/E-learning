@extends('admin.layouts.app')

@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.roles.index') }}">Manage Roles</a>
        <span class="breadcrumb-item active">Create Role</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h3>Create Role</h3>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Create New Role Form</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')


            <form action="{{ route('manage.roles.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg">
                        <label for="name">Role Name</label>
                        <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="row mg-t-20">

                    <div class="col-lg">
                        <label for="permissions" >Permissions</label>
                        <select class="form-control select2 mr-0" id="permissions" name="permissions[]" data-placeholder="Choose Browser" multiple>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach

                        </select>
                    </div><!-- col-4 -->

                </div><!-- row -->
                <div class="row mg-t-20">
                    <div class="col-lg text-right" >
                            <button class="btn btn-info mt-10 ">Update Profile</button>
                    </div>
                </div>
            </form>

        </div>

    </div><!-- sl-pagebody -->


@endsection
