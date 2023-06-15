@extends('layouts.sideNav')

@section('content')
<h4>Customer</h4>
<h6>Edit Customer</h6>

<!-- message box if the new waste has been added -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <!-- form add waste -->
        <form method="POST" action="{{ route('UpdateCustomer',  $customer->id) }}" enctype="multipart/form-data"
            id="customer">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Fullname</label>
                                <input type="text" name="fullname" class="form-control" placeholder="fullname"
                                    value="{{$customer->fullname}}" required>
                            </div>
                        </div>
                        <div class="col">
                            <label>Phone Number</label>
                            <input type="number" name="phoneNumber" class="form-control" placeholder="phone number"
                                value="{{$customer->phoneNumber}}" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Email</label>
                                <input type="email" name="Email" class="form-control" placeholder="Email"
                                    value="{{$customer->Email}}" required>
                            </div>
                        </div>
                        <div class="col">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" placeholder="address"
                                value="{{$customer->address}}" required>
                        </div>
                    </div>
                    <br>
                </div>

            </div>

            <div>
                <button type="submit" class="btn btn-info" id="updateStatus" style="float: right;">Update</button>
            </div>
            
        </form>
    </div>

</div>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection