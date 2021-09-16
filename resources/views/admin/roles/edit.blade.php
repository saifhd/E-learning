@extends('admin.layouts.app')

@section('content')

   <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="{{ route('manage.roles.index') }}">Manage Roles</a>
        <span class="breadcrumb-item active">Edit Role</span>

    </nav>

    <div class="sl-pagebody">

        <div class="sl-page-title">
            <h3>Edit Role</h3>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Edit Role Form - {{ $role->name }}</h6>

            {{-- alerts --}}
             @include('admin.layouts.alerts')


            <form action="{{ route('manage.roles.update',$role->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg">
                        <label for="name">Role Name</label>
                        <input class="form-control" id="name" type="text" name="name" value="{{ $role->name }}">
                    </div>
                </div>
                <div class="row mg-t-20">

                    <div class="col-lg-12">
                        <label for="permissions" >Permissions</label>
                        <select class="form-control select2 mr-0" id="permissions" name="permissions[]" data-placeholder="Choose Browser" multiple>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}" {{ in_array($permission->name,$role_permissions) ? 'selected' : '' }}>{{ $permission->name }}</option>
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
@section('script')
    <script src="{{ asset('lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
    <script>
      $(function(){

        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        // Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });

        // Select2 with tagging support
        $('.select2-tag').select2({
          tags: true,
          tokenSeparators: [',', ' ']
        });



        // Color picker


      });
    </script>
@endsection
