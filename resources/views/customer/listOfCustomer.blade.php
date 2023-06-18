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
            searchPlaceholder: 'Search By Customer Name'
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


<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div
                class=" {{  auth()->user()->category== 'Admin' ? 'col-lg-10 col-md-10 col-sm-10' : (request()->routeIs('listOfCustomer') ? 'col-lg-10 col-md-10 col-sm-10' : 'col-lg-12 col-md-12 col-sm-12') }}">
                <nav class="">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('listOfCustomer') ? 'active' : '' }}"
                                href="{{ route('listOfCustomer') }}" role="tab" aria-selected="true">List Of
                                Customer</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- if user == committee, then have add new repair form button  //routes(name file)-->
            @if( auth()->user()->category== "Admin")

            @if(request()->routeIs('listOfCustomer'))
            <div class="col-lg-2 col-md-2 col-sm-2" style="float: right;">
                <a class="btn btn-primary" style="float: right; width:100%;" role="button"
                    href="{{ route('addCustomer', ) }}">
                    <i class="fas fa-plus"></i>&nbsp; Create Customer</a>
            </div>
            @else
            <div class="col-lg-2 col-md-2 col-sm-2" style="float: right;">
                <a class="btn btn-success" style="float: right; width:100%;" role="button" href="">
                    <i class="fa fa-cog"></i>&nbsp; -</a>
            </div>
            @endif

            @endif

        </div>
    </div>

    <div class="card-body">
        <div class="overflow-auto" style="overflow:auto;">
            <div class="table-responsive">
                @if( auth()->user()->category== "Admin")
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width=5%>ID</th>
                            <th width=20%>Customer Name</th>
                            <th width=15%>Phone Number</th>
                            <th width=42%>Address</th>
                            <th width=18%>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $counter = 1;
                        @endphp
                        @foreach($customerList As $key=>$data)
                        <tr id="row{{$data->id}}">

                            <td>{{$counter}}</td>
                            <td>{{$data->fullname}}</td>
                            <td>{{$data->phoneNumber}}</td>
                            <td>{{$data->address}}</td>
                            <td><button class="btn btn-danger" type="button" onclick="deleteItem(this)"
                                    data-id="{{ $data->id }}" data-name="{{ $data->fullname }}">Delete</button>
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayCustomer', $data->id)}}">Info</a>
                            </td>
                        </tr>
                        @php
                        $counter++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                @endif
                <!-- FOR TECHNICIAN TO VIEW RECORD REPAIR FORM LIST END -->
            </div>
        </div>
    </div>


</div>


<script>
function deleteItem(e) {
    let id = e.getAttribute('data-id');
    let name = e.getAttribute('data-name');

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ml-1',
            cancelButton: 'btn btn-danger mr-1'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        html: "Name: " + name + "<br> You won't be able to revert this!",
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
                    url: '{{url("/deleteCustomer")}}/' + id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if (data.success) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'User account has been deleted.',
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

<script src="{{ asset('frontend') }}/js/jquery.dataTables.js"></script>

@endsection