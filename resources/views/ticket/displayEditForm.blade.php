    @extends('layouts.sideNav')

    @section('content')
    <h4>FORM</h4>
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
            <form method="POST" action="" enctype="multipart/form-data" id="repairForm">
                @csrf
                @method('PUT')
                <div class="container1">
                    <div class="row">
                        <div class="col-6">
                            <table>
                                @if ($repairForm)
                                <tr>
                                    <th class="name1">CUSTOMER NAME</th>
                                    <td>
                                        <input type="text" name="fullname" class="form-control" id="text" readonly
                                            value="{{ $repairForm->fullname }}">
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="2">No data available</td>
                                </tr>
                                @endif


                                <tr>
                                    <th class="name1">RECEIVED DATE</th>
                                    <td><input type="date" name="repairFormDate" class="form-control" id="txtDate"
                                            value="{{$repairForm->receivedDate}}" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="name1">BRAND NAME</th>
                                    <td><input type="text" name="brandName" class="form-control"
                                            value="{{$repairForm->brandName}}" readonly></td>
                                </tr>
                                <tr>
                                    <th class="name1">MODEL NAME</th>
                                    <td><input type="text" name="modelName" class="form-control"
                                            value="{{$repairForm->modelName}}" readonly></td>
                                </tr>
                                <tr>
                                    <th class="name1">PASSWORD</th>
                                    <td><input type="text" name="password" class="form-control"
                                            value="{{$repairForm->password}}" readonly></td>
                                </tr>
                            </table>

                        </div>
                        <div class="col-6">
                            <table>
                                <tr>
                                    <th class="name1" width="20%">PROBLEM DESCRIPTION</th>
                                </tr>
                                <tr>
                                    <td><input id="w3review" name="w3review" rows="10" cols="50" type="textarea"
                                            name="probDesc" class="form-control" placeholder="Problem Description"
                                            value="{{$repairForm->probDesc}}" readonly></input></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <br>

                <div class="container2">
                    <tr>
                        <th class="name">PROBLEM TYPE</th>
                    </tr>
                    <tr>
                        <td>
                            <input id="probDesc" name="probDesc" class="form-control"
                                value="{{$repairForm->solutionName}}" readonly></input>
                        </td>
                    </tr>
                </div>
                <br>
                <!---container 3--->
                <div class="container3">
                    <tr>
                        <th class="name">SOLUTION</th>
                    </tr>
                    <tr>
                        <td>

                            <input id="service" name="service" class="form-control" value="{{$repairForm->serviceName}}"
                                readonly></input>

                        </td>
                    </tr>
                </div>
                <br>
                <!---container 4--->
                <div class="container4">
                    <tr>
                        <th class="name">PRODUCT</th>
                    </tr>
                    <tr>
                        <td>

                            <input id="productName" name="productName" class="form-control"
                                value="{{$repairForm->productName}}" readonly></input>

                        </td>
                    </tr>
                </div>
                <br>
                <!---container 5--->
                <div class="container5">
                    <tr>
                        <th class="name">DUE DATE</th>
                    </tr>
                    <tr>
                        <td>
                            <input id="dueDate" name="dueDate" class="form-control" value="{{$repairForm->dueDate}}"
                                readonly></input>
                        </td>
                    </tr>
                </div>
                <br>
      <!-- -container 4 -->
      <div class="container4">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Product">STATUS</label>
                        <select class="form-control" name="productName" id="productName">
                        <option value=>REJECTED</option>
                            <option value=1>REJECTED</option>
                            <option value=2>PROCEED</option>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <!-- -container 4 -->
      <div class="container4">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="Product">MANAGED BY</label>
                        <select class="form-control" name="productName" id="productName">
                            <option value=></option>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            </form>
        </div>
    </div>
    <script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
    <script type="text/javascript"
        src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    @endsection