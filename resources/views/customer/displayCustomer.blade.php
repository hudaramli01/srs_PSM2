@extends('layouts.sideNav')

@section('content')
<h4>Customer</h4>
<h6>Customer Information</h6>

<!-- message box if the new waste has been added -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <!-- form add waste -->
        @csrf
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <label>FULLNAME</label>
                            <input type="text" name="fullname" class="form-control" placeholder="fullname"
                                value="{{$customer->fullname}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <label>PHONE NUMBER</label>
                        <input type="number" name="phoneNumber" class="form-control" placeholder="phone number"
                            value="{{$customer->phoneNumber}}" readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <label>EMAIL</label>
                            <input type="email" name="Email" class="form-control" placeholder="email"
                                value="{{$customer->Email}}" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <label>ADDRESS</label>
                        <input type="text" name="address" class="form-control" placeholder="address"
                            value="{{$customer->address}}" readonly>
                    </div>
                </div>
                <br>
            </div>

        </div>

        <a class="btn btn-primary" id="product" style="float: right;"
            href="{{ route('editCustomer', $customer->id) }}">Edit</a>

    </div>
</div>
<br>
<div class="card">
    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2" style="float: right;">
                <a class="btn btn-primary" style="float: right; width:100%;" role="button"
                    href="{{ route('repairForm', $customer->id) }}">
                    <i class="fas fa-plus"></i>&nbsp;e-jobsheet</a>
            </div>

        </div>
    </div>

    <div class="card-body">
        <div class="overflow-auto" style="overflow:auto;">
            <div class="table-responsive">
                @if (auth()->user()->category == "Admin")
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Received Date</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Time Remaining</th>
                            <th>Managed By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repairForm as $key => $data)
                        <tr>
                            <td>{{ $data->receivedDate }}</td>
                            <td>{{ $data->dueDate }}</td>
                            @if ($data->status == 'Pending')
                            <td style="color: blue">
                                {{ $data->status }}
                            </td>
                            @elseif ($data->status == 'Reviewed')
                            <td style="color: orange">
                                {{ $data->status }}
                            </td>
                            @elseif ($data->status == 'Rejected')
                            <td style="color: red">
                                {{ $data->status }}
                            </td>
                            @elseif ($data->status == 'Proceed')
                            <td style="color: purple">
                                {{ $data->status }}
                            </td>
                            @elseif ($data->status == 'Completed')
                            <td style="color: green">
                                {{ $data->status }}
                            </td>
                            @endif
                            <td>
                                @if (isset($remainDate[$key]))
                                {{ $remainDate[$key]['diffInDays'] }} 
                                @endif
                            </td>
                            <td>{{$data->name }}</td>
                            <td>
  
                                <a type="button" class="btn btn-danger" style="color: aliceblue"
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
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                                'Repair form has been deleted.',
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