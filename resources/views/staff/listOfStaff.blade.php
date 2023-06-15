@extends('layouts.sideNav')
@section('content')


<!-- to display the alert message if the record has been deleted -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div
                class=" {{  auth()->user()->category== 'Admin' ? 'col-lg-10 col-md-10 col-sm-10' : (request()->routeIs('listOfStaff') ? 'col-lg-10 col-md-10 col-sm-10' : 'col-lg-12 col-md-12 col-sm-12') }}">
                <nav class="">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('listOfStaff') ? 'active' : '' }}"
                                href="{{ route('listOfStaff') }}" role="tab" aria-selected="true">List Of
                                Staff</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('listTechnician') ? 'active' : '' }}"
                                href="{{ route('listTechnician') }}" role="tab" aria-selected="true">Technician</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('listInternshipStudent') ? 'active' : '' }}"
                                href="{{ route('listInternshipStudent') }}" role="tab" aria-selected="true">Internship
                                Student</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- if user == committee, then have add new repair form button  //routes(name file)-->
            <!-- @if( auth()->user()->category== "Admin")

                <div class="col-lg-2 col-md-2 col-sm-2 auto">
                    <a class="btn btn-primary" role="button" href="">
                        <i class="fas fa-plus"></i>&nbsp; Create Product</a>
                </div>

                @endif-->

        </div>
    </div>

    <div class="card-body">
        @yield('inner_content')
    </div>
</div>
</div>
@endsection