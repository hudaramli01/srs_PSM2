@extends('layouts.sideNav')

@section('content')
<h4>Stock</h4>
<h6>Add New Stock</h6>

<!-- message box if the new Stock has been added -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <!-- form add Stock -->
        <form method="POST" action="{{ route('insertProduct') }}" enctype="multipart/form-data" id="product" >
            @csrf
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Stock Name</label>
                                <input type="text" name="productName" class="form-control" placeholder="Stock Name"
                                    required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Problem Description</label>
                                <textarea type="text" name="productDesc" class="form-control"
                                    placeholder="Description" required></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Quantity</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Number" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Price" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <div class="text-center">
                                <input type="file" name="picture" class="form-control" id="image" accept="image/*" onchange="loadImage(this)" required>
                                <br>
                                <img id="imgPreview" style="width: 250px; height: 250px; border-style: dashed; margin:auto;display:flex; top:0; bottom:0; right:0; left:0;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"
                                        value="available">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Available
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2"
                                        value="unavailable">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Unavailable
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            <input type="submit" name="submitProduct" class="btn btn-primary" id="product" style="float: right;">

        </form>
    </div>

</div>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- to preview the chosen file from computer -->
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