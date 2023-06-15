@extends('layouts.sideNav')

@section('content')
<h4>Problem</h4>
<h6>Add New Problem</h6>

<!-- message box if the new prob has been added -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <!-- form add waste -->
        <form method="POST" action="{{ route('UpdateSolution',  $solution->id) }}" enctype="multipart/form-data"
            id="solution">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>PROBLEM NAME</label>
                                <input type="text" name="solutionName" class="form-control"
                                    value="{{$solution->solutionName}}" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>PROBLEM DESCRIPTION</label>

                                <textarea name="solutionDesc" class="form-control" placeholder="Description"
                                    required>{{$solution->solutionDesc}}</textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <input type="submit" name="submitSolution" class="btn btn-primary" id="solution" style="float: right;">

        </form>
    </div>

</div>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection