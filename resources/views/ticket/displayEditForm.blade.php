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

            <div class="container1">
                <div class="row">
                    <div class="col-6">
                        <table width="100%">
                            <tr>
                                <th class="name1">Customer Name</th>
                                <td>
                                    <input type="text" name="fullname" class="form-control" id="text" readonly
                                        value="{{ $repairForm->fullname }}">
                                </td>
                            </tr>
                            <tr>
                                <th class="name1">Phone Number</th>
                                <td>
                                    <input type="text" name="phoneNumber" class="form-control" id="text" readonly
                                        value="{{ $repairForm->phoneNumber }}">
                                </td>
                            </tr>
                            <tr>
                                <th class="name1">Received Date</th>
                                <td><input type="date" name="receivedDate" class="form-control" id="txtDate"
                                        value="{{$repairForm->receivedDate}}" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="name1">Brand Name</th>
                                <td><input type="text" name="brandName" class="form-control"
                                        value="{{$repairForm->brandName}}" readonly></td>
                            </tr>
                            <tr>
                                <th class="name1">Model Name</th>
                                <td><input type="text" name="modelName" class="form-control"
                                        value="{{$repairForm->modelName}}" readonly></td>
                            </tr>
                            <tr>
                                <th class="name1">Password</th>
                                <td><input type="text" name="password" class="form-control"
                                        value="{{$repairForm->password}}" readonly></td>
                            </tr>
                            <tr>
                                <th class="name1">Managed By</th>
                                <td><input type="text" name="password" class="form-control" placeholder="Password"
                                        value="{{ $repairForm->name }}" readonly></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table>
                            <tr>
                                <th class="name1" width="20%">Problem Description</th>
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
                    <th class="name">Problem Type</th>
                </tr>
                <tr>
                    <td>
                        <input id="probDesc" name="probDesc" class="form-control" value="{{$repairForm->solutionName}}"
                            readonly></input>
                    </td>
                </tr>
            </div>
            <br>
            <!---container 3--->
            <div class="container3">
                <tr>
                    <th class="name">Solution</th>
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
                    <th class="name">Stock</th>
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
                    <th class="name">Notes</th>
                </tr>
                <tr>
                    <td>
                        <input id="w3review" name="w3review" rows="10" cols="50" type="textarea" name="payment"
                            class="form-control" placeholder="Problem Description" value="{{$repairForm->payment}}"
                            readonly></input>
                    </td>
                </tr>
            </div>
            <br>
            <!---container 5--->
            <div class="container5">
                <tr>
                    <th class="name">Due Date</th>
                </tr>
                <tr>
                    <td>
                        <input id="dueDate" name="dueDate" class="form-control" value="{{$repairForm->dueDate}}"
                            readonly></input>
                    </td>
                </tr>
            </div>
            <br>
            @if( auth()->user()->category== "Technician" ||
            auth()->user()->category== "Internship Student")
            <!-- -container 4 -->
            <form method="POST" action="{{ route('updateRejectProceed', $repairForm->formID) }}"
                enctype="multipart/form-data" id="repairForm">
                @csrf
                @method('Post')
                <div class="container4">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="Status">Status</label>
                            <select class="form-control" name="Status" id="Status">
                                <option value=>Please Select</option>
                                <option value='Rejected'>Rejected</option>
                                <option value='Proceed'>Proceed</option>
                                <option value='Completed'>Completed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-info" id="updateStatus" style="float: right;">Update</button>
                </div>
            </form>
            @elseif (auth()->user()->category== "Admin")
            <div class="container4">
                <tr>
                    <th class="name">Status</th>
                </tr>
                <tr>
                    <td>

                        <input id="status" name="status" class="form-control" value="{{$repairForm->formStatus}}"
                            readonly></input>
                    </td>
                </tr>
            </div>
            @endif
        </div>
    </div>
    <script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
    <script type="text/javascript"
        src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    @endsection