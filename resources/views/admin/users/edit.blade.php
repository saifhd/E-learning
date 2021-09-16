@extends('admin.layouts.app')

@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.users.index') }}">Manage Users</a>
        <span class="breadcrumb-item active">Edit User</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h3>Edit User</h3>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Edit User Form - {{ $user->name }}</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')

            <form action="{{ route('manage.users.avarar',$user->id) }}" method="post" id="avatar-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <div class="form-group row justify-content-center">
                        <div class="channel-avatar">
                            @if($user->getAvatar())
                                <img src="{{ $user->getAvatar() }}" alt="" style="width:100%;height:100%;position:absolute;width:100px;height:100px;">
                            @endif
                                <div class="channel-avatar-overlay"
                                    onclick="document.getElementById('image').click()">
                                        <i class="fas fa-camera fa-4x m-auto"></i>
                                </div>
                        </div>
                    </div>
                    <input type="file" class="" name="image" id="image" style="display:none;"
                    onchange="document.getElementById('avatar-form').submit()">
                </div>
            </form>
            <form action="{{ route('manage.users.update',$user->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="col-lg mg-t-10 mg-lg-t-0">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="text" name="email" value={{ $user->email }}>
                    </div>
                </div>
                <div class="row mg-t-20">

                    <div class="col-lg">
                        <label for="roles" >Roles</label>
                        <select class="form-control select2" id="roles" name="roles[]" data-placeholder="Choose Browser" multiple>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ in_array($role->name,$user_roles) ? 'selected' : '' }}>{{ $role->name }}</option>
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
            <form action="{{ route('manage.users.destroy',$user->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="row mg-t-10">
                    <div class="col-lg text-right" >
                            <button class="btn btn-danger mt-10 ">Delete Profile</button>

                    </div>
                </div>
            </form>
        </div>

    </div><!-- sl-pagebody -->


@endsection
