<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Mamburao - @yield('up_title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="{{asset('dist/favicon.png')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
          <!-- BEGIN: CSS Assets-->

        <link rel="stylesheet" href="{{asset('dist/css/login_style.css')}}" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}" />
        <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>




        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="{{route('set')}}" class="flex mr-auto">
                    <div style="color:white" > <img src="" width="300px" alt="Survey App"></div>
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                    <li>
                        <a href="{{route('nene')}}" class="menu">
                            <div class="menu__icon"> <i data-feather="home"></i> </div>
                            <div class="menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('set')}}" class="menu">
                            <div class="menu__icon"> <i data-feather="settings"></i> </div>
                            <div class="menu__title"> Settings </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('acs')}}" class="menu">
                            <div class="menu__icon"> <i data-feather="key"></i> </div>
                            <div class="menu__title"> Reset Admin Account </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logo')}}" class="menu">
                            <div class="menu__icon"> <i data-feather="log-out"></i> </div>
                            <div class="menu__title"> Log Out </div>
                        </a>
                    </li>

            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="{{route('set')}}" class="intro-x flex items-center pl-5 pt-4">
                    <div style="color: white; font-weight:bold; font-size:20px;" > <img src="" width="170px" alt="Survey App"></div>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="{{route('nene')}}" class="side-menu @yield('pg_act_da')">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('set')}}" class="side-menu @yield('pg_act_se')">
                            <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                            <div class="side-menu__title"> Settings </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('acs')}}" class="side-menu @yield('pg_act_ra')">
                            <div class="side-menu__icon"> <i data-feather="key"></i> </div>
                            <div class="side-menu__title"> Reset Admin Account </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('logo')}}" class="side-menu @yield('pg_act_lo')">
                            <div class="side-menu__icon"> <i data-feather="log-out"></i> </div>
                            <div class="side-menu__title"> Log Out </div>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->


            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
                        <a href="{{route('set')}}" class="">Mamburao &nbsp;</a>
                        <a href="@yield('first_add')" class="@yield('pg_act')">@yield('first_ref') &nbsp;</a>
                        <a href="@yield('second_add')" class="@yield('pg_act_2')">@yield('second_ref') &nbsp;</a>
                        <a href="@yield('third_add')" class="@yield('pg_act_3')">@yield('third_ref') &nbsp;</a>
                    </div>
                    <!-- END: Breadcrumb -->


                    <!-- BEGIN: Account Menu -->
                    {{-- <div class="intro-x dropdown w-8 h-8 relative ml-auto">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="admin" src="{{asset('dist/images/profile-2.jpg')}}">
                        </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-1 dark:bg-dark-6 text-white">
                                <div class="p-4 border-b dark:border-dark-3">
                                    <div class="font-medium">Admin</div>
                                </div>
                                <div class="p-2">
                                    <a href="profile.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                </div>
                                <div class="p-2 dark:border-dark-3">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->

            @yield('main_content')

            </div>
            <!-- END: Content -->
        </div>
        <script src="{{asset('dist/js/app.js')}}"></script>
        <!-- END: JS Assets-->
    </body>
</html>
