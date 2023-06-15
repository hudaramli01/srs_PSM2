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
                                <label>FULLNAME</label>
                                <input type="text" name="fullname" class="form-control" placeholder="fullname"
                                    value="{{$customer->fullname}}" required>
                            </div>
                        </div>
                        <div class="col">
                            <label>PHONE NUMBER</label>
                            <input type="number" name="phoneNumber" class="form-control" placeholder="phone number"
                                value="{{$customer->phoneNumber}}" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>EMAIL</label>
                                <input type="email" name="Email" class="form-control" placeholder="Email"
                                    value="{{$customer->Email}}" required>
                            </div>
                        </div>
                        <div class="col">
                            <label>ADDRESS</label>
                            <input type="text" name="address" class="form-control" placeholder="address"
                                value="{{$customer->address}}" required>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <input type="submit" name="submitProduct" class="btn btn-primary" id="product" style="float: right;">

        </form>
    </div>

</div>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection