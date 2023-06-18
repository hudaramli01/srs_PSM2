@extends('layouts.sideNav')

@section('content')


<script>
// to search the REPAIR FORM 
$(document).ready(function() {
    $('#dataTable').DataTable({
        "order": [
            [0, "asc"]
        ],
        "language": {
            search: '<i class="fa fa-search" aria-hidden="true"></i>',
            searchPlaceholder: 'Search By Stock  Name'
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
            <div
                class="{{ auth()->user()->category == 'Admin' ? 'col-lg-10 col-md-10 col-sm-10' : (request()->routeIs('listOfService') ? 'col-lg-10 col-md-10 col-sm-10' : 'col-lg-12 col-md-12 col-sm-12') }}">
                <nav class="">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('listOfProduct') ? 'active' : '' }}"
                                href="{{ route('listOfProduct') }}" role="tab" aria-selected="true">List Of Stock </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- if user == committee, then have add new repair form button  //routes(name file)-->
            @if(auth()->user()->category == "Admin")

            @if(request()->routeIs('listOfProduct'))
            <div class="col-lg-2 col-md-2 col-sm-2" style="float: right;">
                <a class="btn btn-primary" style="float: right; width:100%;" role="button"
                    href="{{ route('addProduct') }}">
                    <i class="fas fa-plus"></i>&nbsp; Create Stock </a>
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
                @if(auth()->user()->category == "Admin")
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width=5%>ID</th>
                            <th width=40%>Stock Name</th>
                            <th width=10%>Quantity</th>
                            <th width=10%>Price</th>
                            <th width=10%>Status</th>
                            <th width=15%>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $counter = 1;
                        @endphp
                        @foreach($productList As $key=>$data)
                        <tr>
                            <td>{{ $counter}}</td>
                            <td>{{$data->productName}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>RM {{ number_format($data->price, 2) }}</td>
                            @if ($data->quantity == 0)
                            <td style="color: red">unavailable</td>
                            @elseif ($data->status == 'unavailable')
                            <td style="color: red">
                                {{$data->status}}
                            </td>
                            @elseif ($data->status == 'available')
                            <td style="color: green">
                                {{$data->status}}
                            </td>
                            @endif
                            <td>
                                <button class="btn btn-danger" type="button" onclick="deleteItem(this)"
                                    data-id="{{ $data->id }}" data-name="{{ $data->productName }}">Delete</button>
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayProduct', $data->id)}}">Info</a>
                            </td>
                        </tr>
                        @php
                        $counter++;
                        @endphp
                        @endforeach

                    </tbody>
                </table>
                @elseif(auth()->user()->category == "Internship Student")
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width=5%>ID</th>
                            <th width=60%>Stock Name</th>
                            <th width=10%>Quantity</th>
                            <th width=10%>Price</th>
                            <th width=10%>Status</th>
                            <th width=5%>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $counter = 1;
                        @endphp
                        @foreach($productList As $key=>$data)
                        <tr>
                            <td>{{$counter}}</td>
                            <td>{{$data->productName}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>RM {{ number_format($data->price, 2) }}</td>
                            @if ($data->quantity == 0)
                            <td style="color: red">unavailable</td>
                            @else
                            <td style="color: green">{{$data->status}}</td>
                            @endif
                            <td>
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayProduct', $data->id)}}">Info</a>
                            </td>
                        </tr>
                        @endforeach
                        @php
                        $counter++;
                        @endphp
                    </tbody>
                </table>
                @elseif(auth()->user()->category == "Technician")
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width=5%>ID</th>
                            <th width=60%>Stock Name</th>
                            <th width=10%>Quantity</th>
                            <th width=10%>Price</th>
                            <th width=10%>Status</th>
                            <th width=5%>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $counter = 1;
                        @endphp
                        @foreach($productList As $key=>$data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->productName}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>RM {{ number_format($data->price, 2) }}</td>
                            @if ($data->quantity == 0)
                            <td style="color: red">unavailable</td>
                            @else
                            <td style="color: green">{{$data->status}}</td>
                            @endif
                            <td>
                                <a type="button" class="btn btn-info"
                                    href="{{ route('displayProduct', $data->id)}}">Info</a>
                            </td>
                        </tr>
                        @endforeach
                        @php
                        $counter++;
                        @endphp
                    </tbody>
                </table>
                @endif
                <!-- FOR TECHNICIAN TO VIEW RECORD REPAIR FORM LIST END -->
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('frontend') }}/js/jquery.dataTables.js"></script>
<script src="{{ asset('frontend') }}/js/dataTables.bootstrap4.js"></script>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script src="{{ asset('frontend') }}/js/jquery.dataTables.js"></script>
<!-- JavaScript code -->
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
        console.log(result);
        if (result.value) {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: '{{ url("/DeleteProduct") }}/' + id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        console.log(data);

                        if (data.success) {
                            console.log('Deletion successful.');

                            // Remove the row from the table dynamically
                            $("#row" + id).remove();

                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Product has been deleted.',
                                "success"
                            );
                        } else {
                            console.log('Deletion failed.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX request error:', error);
                    }
                });
            }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            console.log('Deletion canceled.');
            // Handle cancellation
        }
    });
}
</script>



@endsection