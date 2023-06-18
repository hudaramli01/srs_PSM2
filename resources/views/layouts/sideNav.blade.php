@extends('layouts.main')

@section('sideNav')

<div class="container-fluid">
    <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
            <div class="main-navbar">
                <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                    <a class="navbar-brand w-100 mr-0" href="{{ route('dashboard') }}" style="line-height: 25px;">
                        <div class="d-table m-auto">
                            <img id="main-logo" class="d-inline-block align-center mr-1" style="max-width: 30px;"
                                src="{{ asset('frontend') }}/images/logo.png" alt="petakom logo">
                            <span class="d-none d-md-inline ml-1"> {{ config('app.name', 'SRS') }}</span>
                        </div>
                    </a>
                    <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                        <i class="material-icons" style="color:orange">&#xE5C4;</i>
                    </a>
                </nav>
            </div>
            <!-- <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
                    <div class="input-group input-group-seamless ml-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search">
                    </div>
                </form> -->
            <div class="nav-wrapper">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <i class="material-icons" style="color:orange">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- DASHBOARD START -->
                    @if( auth()->user()->category== "Technician")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listOfTicket*') ? 'active' : '' }}"
                            href="{{ route('listOfTicket') }}">
                            <i class="material-icons" style="color:orange">description</i>
                            <span> E-Jobsheet</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('stdCalendar*') ? 'active' : '' }}"
                            href="{{ route('stdCalendar') }}">
                            <i class="material-icons" style="color:orange">calendar_today</i>
                            <span>Calendar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listOfSolution*') ? 'active' : '' }}"
                            href="{{ route('listOfSolution') }}">
                            <i class="material-icons" style="color:orange">report_problem</i>
                            <span>Problem Type</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listOfService*') ? 'active' : '' }}"
                            href="{{ route('listOfService') }}">
                            <i class="material-icons" style="color:orange">emoji_objects</i>
                            <span>Solution</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listOfProduct*') ? 'active' : '' }}"
                            href="{{ route('listOfProduct') }}">
                            <i class="material-icons" style="color:orange">inventory_2</i>
                            <span>Stock</span>
                        </a>
                    </li>

                    @endif

                    @if( auth()->user()->category== "Admin")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('newTicketAdmin*') ? 'active' : '' }}"
                            href="{{ route('newTicketAdmin') }}">
                            <i class="material-icons" style="color:orange">description</i>
                            <span>E-Jobsheet</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listOfStaff*') ? 'active' : '' }}"
                            href="{{ route('listOfStaff') }}">
                            <i class="material-icons" style="color:orange">folder_shared</i>
                            <span>Staff</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listOfCustomer*') ? 'active' : '' }}"
                            href="{{ route('listOfCustomer') }}">
                            <i class="material-icons" style="color:orange">person</i>
                            <span>Customer</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listOfProduct') ? 'active' : '' }}"
                            href="{{ route('listOfProduct') }}">
                            <i class="material-icons" style="color:orange">inventory_2</i>
                            <span>Stock</span>
                        </a>
                    </li>
                    @endif

                    @if( auth()->user()->category== "Internship Student")
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listOfTicket*') ? 'active' : '' }}"
                            href="{{ route('listOfTicket') }}">
                            <i class="material-icons" style="color:orange">article</i>
                            <span>E-Jobsheet</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('stdCalendar*') ? 'active' : '' }}"
                            href="{{ route('stdCalendar') }}">
                            <i class="material-icons" style="color:orange">calendar_today</i>
                            <span>Calendar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listOfSolution*') ? 'active' : '' }}"
                            href="{{ route('listOfSolution') }}">
                            <i class="material-icons" style="color:orange">report_problem</i>
                            <span>Problem Type</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listOfService*') ? 'active' : '' }}"
                            href="{{ route('listOfService') }}">
                            <i class="material-icons" style="color:orange">emoji_objects</i>
                            <span>Solution</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('listOfProduct*') ? 'active' : '' }}"
                            href="{{ route('listOfProduct') }}">
                            <i class="material-icons" style="color:orange">inventory_2</i>
                            <span>Stock</span>
                        </a>
                    </li>
                    @endif
                    <!-- DASHBOARD END -->

                </ul>


            </div>

        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <div class="main-navbar sticky-top bg-white">
                <!-- Main Navbar -->
                <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">

                    <div class="row mt-auto mb-auto ml-3 " style="width: auto;">

                        <div class="d-md-flex mt-auto mb-auto mr-md-4 d-none" style="width: auto">

                        </div>

                    </div>
                    <ul class="navbar-nav border-left flex-row ml-auto ">
                        <li class="nav-item border-right dropdown">
                            <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#"
                                role="button" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle mr-2" src="/assets/{{Auth::user()->image}}"
                                    alt="Avatar" width="30px" height="30px" style="vertical-align:baseline">
                                <span class="d-none d-md-inline-block"><strong>{{ Auth::user()->name }}</strong><br>
                                    {{Auth::user()->category}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-small">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-success" href="{{ route('Profile', Auth::user()->id)}}">
                                    <i class="material-icons text-success">manage_accounts</i> Profile </a>
                               
                               <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="material-icons text-danger">&#xE879;</i> Logout </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <nav class="nav">
                        <a href="#"
                            class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
                            data-toggle="collapse" data-target=".header-navbar" aria-expanded="false"
                            aria-controls="header-navbar">
                            <i class="material-icons">&#xE5D2;</i>
                        </a>
                    </nav>
                </nav>
            </div>
            <!-- / .main-navbar -->

            @if(session()->get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-check mx-2"></i>

                {{ session()->get('success') }}
            </div>
            @endif

            @if(session()->get('failed'))
            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <i class="fa fa-times mx-2"></i>

                {{ session()->get('failed') }}
            </div>
            @endif

            <div class="main-content-container container-fluid px-4">
                <br>
                @yield('content')
            </div>

            <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                <span class="copyright ml-auto my-auto mr-2">Copyright © {{ now()->year }}
                    <a href="#" rel="nofollow">Computer Repair Service Resources</a>
                </span>
            </footer>

    </div>
</div>

<!-- End Page Header -->


@endsection