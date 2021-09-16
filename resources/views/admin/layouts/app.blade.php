<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- vendor css -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <link href="{{asset('lib/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('css/starlight.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}



    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    @yield('style')
  </head>

  <body>


    @include('admin.layouts.sidebar')

    <div id="app">
        <div class="sl-header">
        <div class="sl-header-left">
            <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
            <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        </div><!-- sl-header-left -->
        <div class="sl-header-right">
            <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                <span class="logged-name">{{ auth()->user()->name }}</span>
                @if(!is_null(auth()->user()->getAvatar()))
                    <img src="{{ auth()->user()->getAvatar() }}" class="wd-32 rounded-circle" alt="">
                @endif
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                <ul class="list-unstyled user-profile-nav">
                    <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                    <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                    <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                    <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                    <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                    <form id="form" action="{{ route('logout') }}" method="post">
                        @csrf
                        <li><a href="" onclick="event.preventDefault();document.getElementById('form').submit();"><i class="icon ion-power"></i> Sign Out</a></li>
                    </form>

                </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
            </nav>
            <div class="navicon-right">
            <a id="btnRightMenu" href="" class="pos-relative">
                <i class="icon ion-ios-bell-outline"></i>
                <!-- start: if statement -->
                <span class="square-8 bg-danger"></span>
                <!-- end: if statement -->
            </a>
            </div><!-- navicon-right -->
        </div><!-- sl-header-right -->
        </div>

        <div class="sl-sideright">
        <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
            </li>
        </ul><!-- sidebar-tabs -->

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                <a href="" class="media-list-link">
                <div class="media">
                    <img src="{{ asset('img/img3.jpg') }}" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                    <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                    <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                    </div>
                </div><!-- media -->
                </a>
                <!-- loop ends here -->
                <a href="" class="media-list-link">
                <div class="media">
                    <img src="{{ asset('img/img4.jpg') }}" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                    <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                    <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                    </div>
                </div><!-- media -->
                </a>
                <a href="" class="media-list-link">
                <div class="media">
                    <img src="{{ asset('img/img7.jpg') }}" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                    <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                    <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                    </div>
                </div><!-- media -->
                </a>
                <a href="" class="media-list-link">
                <div class="media">
                    <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                    <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                    <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                    </div>
                </div><!-- media -->
                </a>
                <a href="" class="media-list-link">
                <div class="media">
                    <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                    <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                    <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                    </div>
                </div><!-- media -->
                </a>
            </div><!-- media-list -->
            <div class="pd-15">
                <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
            </div>
            </div><!-- #messages -->

            <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                    <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                    <span class="tx-12">October 03, 2017 8:45am</span>
                    </div>
                </div><!-- media -->
                </a>
                <!-- loop ends here -->
                <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                    <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                    <span class="tx-12">October 02, 2017 12:44am</span>
                    </div>
                </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                    <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                    <span class="tx-12">October 01, 2017 10:20pm</span>
                    </div>
                </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                    <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                    <span class="tx-12">October 01, 2017 6:08pm</span>
                    </div>
                </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                    <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                    <span class="tx-12">September 27, 2017 6:45am</span>
                    </div>
                </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                    <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                    <span class="tx-12">September 28, 2017 11:30pm</span>
                    </div>
                </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                    <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                    <span class="tx-12">September 26, 2017 11:01am</span>
                    </div>
                </div><!-- media -->
                </a>
                <a href="" class="media-list-link read">
                <div class="media pd-x-20 pd-y-15">
                    <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
                    <div class="media-body">
                    <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                    <span class="tx-12">September 23, 2017 9:19pm</span>
                    </div>
                </div><!-- media -->
                </a>
            </div><!-- media-list -->
            </div><!-- #notifications -->

        </div><!-- tab-content -->
        </div>

        <div class="sl-mainpanel">

            @yield('content')


            @include('admin.layouts.footer')
        </div>
    </div>



    {{-- <script src="{{asset('lib/jquery/jquery.js')}}"></script> --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('lib/popper.js/popper.js') }}"></script>


    {{-- <script src="{{asset('lib/bootstrap/bootstrap.js') }}"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> --}}
    <script src="{{asset('lib/jquery-ui/jquery-ui.js') }}"></script>
    {{-- <script src="{{asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script> --}}
    {{-- <script src="{{asset('lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script> --}}



    <script src="{{asset('js/starlight.js')}}"></script>
    <script src="{{ asset('/lib/highlightjs/highlight.pack.js')}}"></script>





    {{-- <script src="{{ asset('lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('lib/datatables-responsive/dataTables.responsive.js')}}"></script> --}}


    {{-- <script>
        $('#datatable1').DataTable({
            responsive:true ,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });

    </script> --}}
    <script>
        $(document).on('submit','#delete',function(e){
            e.preventDefault();
            var form=$(this)[0];
            console.log(form);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        })
    </script>
    {{-- <script src="{{asset('lib/select2/js/select2.min.js')}}"></script> --}}
    {{-- <script src="{{asset('lib/spectrum/spectrum.js')}}"></script> --}}
    {{-- <script>
      $(function(){

        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });
        $('.select2-tag').select2({
          tags: true,
          tokenSeparators: [',', ' ']
        });


      });
    </script> --}}


    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')



  </body>
</html>
