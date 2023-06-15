@extends('layouts.sideNav')

@section('content')
<h4>E-Jobsheet</h4>
<h6>Add New e-jobsheet</h6>

<!-- message box if the new proposal has been added -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<head>
    <style>
    table {
        border: 2px solid grey;
    }

    .name1 {
        border: 1px solid white;
        background-color: #FECB8B;
        border-radius: 1px;
        padding: 5px;
        border-color: grey;
        resize: none;
        font-size: 14px;

    }

    .name {
        border: 1px solid white;
        background-color: #FECB8B;
        border-radius: 1px;
        padding: 5px;
        border-color: grey;
        resize: none;
        font-size: 14px;
        width: 15%;

    }

    .textarea {
        resize: none;
    }

    .container1,
    .container2,
    .container3,
    .container4,
    .container5 {
        border-radius: 10px;
        border-style: solid;
        border-width: thin;
        border-color: grey;
        padding: 10px;
        border: solid 1px solid blue;
    }

    .margin-right {
        margin-right: 10px !important;
    }
    </style>
</head>

<div class="card">
    <div class="card-body">
        <!-- form add proposal -->
        <form method="POST" action="{{ route('insertForm', $customer->id) }}" id="repairForm">
            @csrf
            <div class="container1">
                <div class="row">
                    <div class="col-6">
                        <table>
                            <tr>
                                <th class="name1">Customer Name</th>
                                <td><input type="text" name="repairFormName" class="form-control"
                                        placeholder="Customer Name" value="{{$customer->fullname}}" readonly></td>
                            </tr>
                            <tr>
                                <th class="name1">Received Date</th>
                                <td><input type="date" name="receivedDate" class="form-control" id="txtDate" required>
                                </td>
                            </tr>
                            <tr>
                                <th class="name1">Brand Name</th>
                                <td><input type="text" name="brandName" class="form-control" placeholder="Brand Name"
                                        required></td>
                            </tr>
                            <tr>
                                <th class="name1">Model Name</th>
                                <td><input type="text" name="modelName" class="form-control" placeholder="Model Name"
                                        required></td>
                            </tr>
                            <tr>
                                <th class="name1">Password</th>
                                <td><input type="text" name="password" class="form-control" placeholder="Password"
                                        required></td>
                            </tr>
                        </table>

                    </div>
                    <div class="col-6">
                        <table>
                            <tr>
                                <th class="name1" width="20%">Problem Description</th>
                            </tr>
                            <tr>
                                <td><textarea id="w3review" name="probDesc" rows="10" cols="50" type="textarea"
                                        name="probDesc" class="form-control" placeholder="Problem Description"
                                        required></textarea></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <!-- -container 4 -->
            <div class="container4">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="User">Managed By</label>
                        <select class="form-control" name="managedBy" id="managedBy" required>
                            <option value="">Please Select</option>
                            @foreach($repairForm as $manage)
                            <option value="{{$manage->id}}">{{$manage->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div>
                <input type="submit" name="submitRepairForm" class="btn btn-primary" id="repairForm"
                    style="float: right;">
            </div>
        </form>
    </div>

</div>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection