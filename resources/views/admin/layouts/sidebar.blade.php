<div class="sl-logo">
    <a href=""><i class="icon ion-android-star-outline"></i> {{ config('app.name') }} </a>
</div>
<div class="sl-sideleft">
    <?php
        $url=request()->url();
        $url_array=explode('/',$url);
    ?>

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
    <a href="index.html" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    @canany(['viewAny','viewTrashes'],auth()->user())
        <a href="#" class="sl-menu-link {{ in_array('manage',$url_array) && in_array('users',$url_array) ? 'active' : '' }}">
            <div class="sl-menu-item">
            <i class="menu-item-icon fa fa-users tx-20"></i>
            <span class="menu-item-label">Users</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            @can('viewAny',auth()->user())
                <li class="nav-item"><a href="{{ route('manage.users.index') }}" class="nav-link">Manage Users</a></li>
            @endcan
            @can('viewTrashes',auth()->user())
                <li class="nav-item"><a href="{{ route('manage.users.trashed') }}" class="nav-link">Trashed Users</a></li>
            @endcan
        </ul>
    @endcanany
    @if(auth()->user()->can('viewAny',Spatie\Permission\Models\Role::class) || auth()->user()->can('viewAny',Spatie\Permission\Models\Permission::class))
        <a href="#" class="sl-menu-link {{ in_array('roles',$url_array) || in_array('permissions',$url_array) ? 'active' : '' }}">
            <div class="sl-menu-item">
            <i class="menu-item-icon fas fa-user-tag tx-20"></i>
            <span class="menu-item-label">Roles & Permissions</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            @can('viewAny',Spatie\Permission\Models\Role::class)
                <li class="nav-item"><a href="{{ route('manage.roles.index') }}" class="nav-link">Manage Roles</a></li>
            @endcan
            @can('viewAny',Spatie\Permission\Models\Permission::class)
                <li class="nav-item"><a href="{{ route('manage.permissions.index') }}" class="nav-link">All Permissions</a></li>
            @endcan

        </ul>
    @endif
    <a href="#" class="sl-menu-link {{ in_array('posts',$url_array) || in_array('categories',$url_array) ? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item fas fa-blog tx-24"></i>
        <span class="menu-item-label">Blog</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('manage.categories.index') }}" class="nav-link">Categories</a></li>
        <li class="nav-item"><a href="{{ route('manage.posts.index') }}" class="nav-link">Posts</a></li>

    </ul>
    <a href="#" class="sl-menu-link
        {{ in_array('course-categories',$url_array) || in_array('courses',$url_array) ||
            in_array('course-sub-categories',$url_array) || in_array('my-courses',$url_array)
            || in_array('sections',$url_array)? 'active' : '' }}">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon fas fa-university tx-24"></i>
        <span class="menu-item-label">Courses</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('manage.course-categories.index') }}" class="nav-link">Categories</a></li>
        <li class="nav-item"><a href="{{ route('manage.course-sub-categories.index') }}" class="nav-link">Sub Categories</a></li>
        <li class="nav-item"><a href="{{ route('manage.courses.index') }}" class="nav-link">All Courses</a></li>
        <li class="nav-item"><a href="{{ route('manage.my-courses') }}" class="nav-link">My Courses</a></li>
    </ul>
    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
        <span class="menu-item-label">Tables</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="table-basic.html" class="nav-link">Basic Table</a></li>
        <li class="nav-item"><a href="table-datatable.html" class="nav-link">Data Table</a></li>
    </ul>
    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
        <span class="menu-item-label">Maps</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>
        <li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>
    </ul>
    <a href="mailbox.html" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
        <span class="menu-item-label">Mailbox</span>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
        <span class="menu-item-label">Pages</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
        <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
        <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
        <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
    </ul>
    </div><!-- sl-sideleft-menu -->

    <br>
</div>
