@extends('layouts.sideNav')

@section('content')
<h4>E-JOBSHEET</h4>
<h6></h6>

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
        <form method="POST" action="{{ route('updateStatus', $repairForm->formID) }}" enctype="multipart/form-data"
            id="updateStatus">
            @csrf
            @method('POST')
            <div class="container1">
                <div class="row">
                    <div class="col-6">
                        <table>

                            <tr>
                                <th class="name1">Customer Name</th>
                                <td>
                                    <input type="text" name="fullname" class="form-control" id="text" readonly
                                        value="{{ $repairForm->fullname }}">
                                </td>
                            </tr>


                            <tr>
                                <th class="name1">Received Date</th>
                                <td><input type="date" name="repairFormDate" class="form-control" id="txtDate"
                                        value="{{ $repairForm->receivedDate }}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="name1">Brand Name</th>
                                <td><input type="text" name="brandName" class="form-control" placeholder="Brand Name"
                                        value="{{ $repairForm->brandName }}" readonly></td>
                            </tr>
                            <tr>
                                <th class="name1">Model Name</th>
                                <td><input type="text" name="modelName" class="form-control" placeholder="Model Name"
                                        value="{{ $repairForm->modelName }}" readonly></td>
                            </tr>
                            <tr>
                                <th class="name1">Password</th>
                                <td><input type="text" name="password" class="form-control" placeholder="Password"
                                        value="{{ $repairForm->password }}" readonly></td>
                            </tr>
                            <tr>
                                <th class="name1">Managed By</th>
                                <td><input type="text" name="password" class="form-control" placeholder="Password"
                                        value="{{ $repairForm->managedBy }}" readonly></td>
                            </tr>
                        </table>

                    </div>
                    <div class="col-6">
                        <table>
                            <tr>
                                <th class="name1" width="20%">Problem Description</th>
                            </tr>
                            <tr>
                                <td><textarea name="textarea" type="textarea" name="probDesc" class="form-control"
                                        placeholder="Problem Description" readonly>{{$repairForm->probDesc}}</textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <br>



            <!-- -container 2- -->
            <div class="container2">
                <div class="row">

                    <div class="form-group col-md-12">
                        <label for="Problem">Problem Type</label>
                        <select class="form-control" name="solution" id="solution">
                        <option value="" readonly>Please Select</option>
                            @foreach($solution as $data)
                            <option value="{{$data->id}}">{{$data->solutionName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <!-- -container 3 -->
            <div class="container3">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Problelm">Solution</label>
                        <select class="form-control" name="service" id="service">
                        <option value="">Please Select</option>
                            @foreach($service as $data)
                            <option value="{{$data->id}}">{{$data->serviceName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <!-- -container 4 -->
            <div class="container4">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Product">Product</label>
                        <select class="form-control" name="productName" id="productName">
                        <option value="">Please Select</option>
                            @foreach($product as $data)
                            <option value="{{$data->id}}">{{$data->productName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <!---container 5--->
            <div class="container5">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Product">Due Date</label>
                        <input type="date" class="form-control" name="dueDate" id="txtDate" value="">
                    </div>
                </div>
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-info" id="updateStatus">Update</button>
            </div>
        </form>

    </div>
</div>

@endsection

<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
</script>