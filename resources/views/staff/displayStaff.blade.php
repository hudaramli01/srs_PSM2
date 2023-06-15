@extends('layouts.sideNav')

@section('content')
<h4>PROFILE</h4>
<h6>User Profile</h6>

<!-- message box if the new Product has been added -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <!-- form add waste -->
        <form method="POST" action="{{ route('updateProfile',  $profile->id) }}" enctype="multipart/form-data"
            id="Profile">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">

                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <div class="text-center">
                                    <img id="imgPreview" src="{{asset('assets/'.$profile->image)}}"
                                        style="width: 150px; height: 150px; border-style: dashed; margin:auto;display:flex; border-radius: 90px;">
                                    <br>
                                    <input type="file" name="image" class="form-control" id="image"
                                        accept="image/png, image/gif, image/jpeg" onchange="loadImage(this)"
                                        value="{{$profile->image}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>FULLNAME</label>
                                <input type="text" name="name" class="form-control" placeholder="fullname"
                                    value="{{$profile->name}}" required>
                            </div>
                        </div>
                        <div class="col">
                            <label>USERNAME</label>
                            <input type="text" name="userName" class="form-control" placeholder="username"
                                value="{{$profile->userName}}" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>EMAIL ADDRESS</label>
                                <input type="text" name="email" class="form-control" placeholder="email"
                                    value="{{$profile->email}}" required>
                            </div>
                        </div>
                        <div class="col">
                            <label>PHONE NUMBER</label>
                            <input type="number" name="phoneNumber" class="form-control" placeholder="PhoneNumber"
                                value="{{$profile->phoneNumber}}" required>
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
<script>
function loadImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imgPreview')
                .attr('src', e.target.result)
                .width(250)
                .height(250);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection