@extends('layouts.sideNav')

@section('content')

<script src="{{ asset('frontend') }}/js/jquery.dataTables.js"></script>
<script src="{{ asset('frontend') }}/js/dataTables.bootstrap4.js"></script>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script>
// to search the REPAIR FORM 
$(document).ready(function() {
    $('#dataTable').DataTable({
        "order": [
            [0, "asc"]
        ],
        "language": {
            search: '<i class="fa fa-search" aria-hidden="true"></i>',
            searchPlaceholder: 'Search E-Jobsheet'
        }
    });

    // filter REPAIR FORM
    $('.dataTables_filter input[type="search"]').css({
        'width': '300px',
        'display': 'inline-block',
        'font-size': '15px',
        'font-weight': '400'
    });
});
</script>

<!-- to display the alert message if the record has been deleted -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            @if( auth()->user()->category== "Technician" ||
            auth()->user()->category== "Internship Student")
            <div
                class=" {{  auth()->user()->category== 'Technician' ? 'col-lg-12 col-md-12 col-sm-12' : (request()->routeIs('listOfTicket') ? 'col-lg-12 col-md-12 col-sm-12' : 'col-lg-12 col-md-12 col-sm-12') }}">
                <nav class="">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('listOfTicket') ? 'active' : '' }}"
                                href="{{ route('listOfTicket') }}" role="tab" aria-selected="true">E-Jobsheet</a>
                        </li>
                    </ul>
                </nav>
            </div>
            @elseif( auth()->user()->category== "Admin")
            <div
                class=" {{  auth()->user()->category== 'Technician' ? 'col-lg-10 col-md-10 col-sm-10' : (request()->routeIs('listOfTicket') ? 'col-lg-10 col-md-10 col-sm-10' : 'col-lg-12 col-md-12 col-sm-12') }}">
                <nav class="">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('newTicketAdmin') ? 'active' : '' }}"
                                href="{{ route('newTicketAdmin') }}" role="tab" aria-selected="true">E-Jobsheet</a>
                        </li>
                    </ul>
                </nav>
            </div>
            @endif
        </div>
    </div>


    <!-- start -->
    <div class="card-body">
        <div class="overflow-auto" style="overflow:auto;">
            <div class="table-responsive">

                @if( auth()->user()->category== "Technician" ||
                auth()->user()->category== "Internship Student")
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width=5%>ID</th>
                            <th width=15%>Received Date</th>
                            <th width=15%>Due Date</th>
                            <th width=5%>Time Remaining</th>
                            <th width=10%>Status</th>
                            <th width=30%>Managed By</th>
                            <th width=20%>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repairForm As $key=>$data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->receivedDate}}</td>
                            <td>{{$data->dueDate}}</td>
                            @if(isset($remainDate[$key]['diffInDays']))
                            {{ ceil($remainDate[$key]['diffInDays']) }} day/days
                            @endif
                            @if ($data->status == 'Pending')
                            <td style="color: blue">
                                {{$data->status}}
                            </td>
                            @elseif ($data->status == 'Reviewed')
                            <td style="color: orange">
                                {{$data->status}}
                            </td>
                            @elseif ($data->status == 'Proceed')
                            <td style="color: purple">
                                {{$data->status}}
                            </td>
                            @elseif ($data->status == 'Rejected')
                            <td style="color: red">
                                {{ $data->status }}
                            </td>
                            @elseif ($data->status == 'Proceed')
                            <td style="color: brown">
                                {{ $data->status }}
                            </td>
                            @elseif ($data->status == 'Completed')
                            <td style="color: green">
                                {{ $data->status }}
                            </td>
                            @endif
                            <td>{{$data->name}}</td>
                            <td>
                                <a type="button" class="btn btn-danger" style="color:aliceblue"
                                    onclick="deleteItem(this)" data-id="{{ $data->id }}">Delete</a>

                                @if ($data->status == 'Pending')
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayForm', $data->id) }}">Info</a>
                                @elseif ($data->status == 'Reviewed')
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayEdit', $data->id) }}">Info</a>
                                @elseif ($data->status == 'Rejected')
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayEdit', $data->id) }}">Info</a>
                                @elseif ($data->status == 'Proceed')
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayEdit', $data->id) }}">Info</a>
                                @elseif ($data->status == 'Completed')
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayEdit', $data->id) }}">Info</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif


                @if( auth()->user()->category== "Admin")
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width=5%>ID</th>
                            <th width=15%>Received Date</th>
                            <th width=15%>Due Date</th>
                            <th width=5%>Time Remaining</th>
                            <th width=10%>Status</th>
                            <th width=30%>Managed By</th>
                            <th width=20%>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repairForm As $key=>$data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->receivedDate}}</td>
                            <td>{{$data->dueDate}}</td>
                            <td>
                            @if(isset($remainDate[$key]['diffInDays']))
                            {{ ceil($remainDate[$key]['diffInDays']) }} day/days
                            @endif
                            </td>
                            @if ($data->status == 'Pending')
                            <td style="color: blue">
                                {{$data->status}}
                            </td>
                            @elseif ($data->status == 'Reviewed')
                            <td style="color: orange">
                                {{$data->status}}
                            </td>
                            @elseif ($data->status == 'Proceed')
                            <td style="color: purple">
                                {{$data->status}}
                            </td>
                            @elseif ($data->status == 'Rejected')
                            <td style="color: red">
                                {{ $data->status }}
                            </td>
                            @elseif ($data->status == 'Proceed')
                            <td style="color: brown">
                                {{ $data->status }}
                            </td>
                            @elseif ($data->status == 'Completed')
                            <td style="color: green">
                                {{ $data->status }}
                            </td>
                            @endif
                            <td>{{$data->name}}</td>
                            <td>
                                <a type="button" class="btn btn-danger" style="color:aliceblue"
                                    onclick="deleteItem(this)" data-id="{{ $data->id }}">Delete</a>

                                @if ($data->status == 'Pending')
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayForm', $data->id) }}">Info</a>
                                @elseif ($data->status == 'Reviewed')
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayEdit', $data->id) }}">Info</a>
                                @elseif ($data->status == 'Rejected')
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayEdit', $data->id) }}">Info</a>
                                @elseif ($data->status == 'Proceed')
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayEdit', $data->id) }}">Info</a>
                                @elseif ($data->status == 'Completed')
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayEdit', $data->id) }}">Info</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                <!-- FOR TECHNICIAN TO VIEW RECORD REPAIR FORM LIST END -->
            </div>
        </div>
    </div>


</div>

<script src="{{ asset('frontend') }}/js/jquery.dataTables.js"></script>
<script>
function deleteItem(e) {
    let id = e.getAttribute('data-id');

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ml-1',
            cancelButton: 'btn btn-danger mr-1'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        html: "You won't be able to revert this!",
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'DELETE',
                    url: '{{url("/deleteRepairForm")}}/' + id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if (data.success) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'E-Jobsheet has been deleted.',
                                "success"
                            );

                            $("#row" + id).remove(); // you can add name div to remove
                        }


                    }
                });

            }

        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            // swalWithBootstrapButtons.fire(
            //     'Cancelled',
            //     'Your imaginary file is safe :)',
            //     'error'
            // );
        }
    });

}
</script>
@endsection