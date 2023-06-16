@extends('layouts.sideNav')

@section('content')
<h4>Product</h4>
<h6>Display Product</h6>

<!-- message box if the new product has been added -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <!-- form add waste -->
        <form method="POST" action="{{ route('UpdateProduct', $product->id) }}" enctype="multipart/form-data"
            id="product">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Product Name</label>
                                <input type="text" name="productName" class="form-control" placeholder="Product Name"
                                    value="{{$product->productName}}" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Product Description</label>
                                <textarea name="productDesc" class="form-control" placeholder="Description" >{{$product->productDesc}}</textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Quantity</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Number"
                                    value="{{$product->quantity}}" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Price"
                                    value="{{$product->price}}" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <div class="text-center">
                                    <input type="file" name="picture" class="form-control" id="image" accept="image/*"
                                        onchange="loadImage(this)" value="{{$product->picture}}" required>
                                    <br>
                                    <img src="/assets/{{$product->picture}}" width="200px" style="float: middle">
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
<!-- <script>
    // Get the radio button elements
var availableRadio = document.getElementById("flexRadioDefault1");
var unavailableRadio = document.getElementById("flexRadioDefault2");

// Add event listeners to the radio buttons
availableRadio.addEventListener("change", handleRadioChange);
unavailableRadio.addEventListener("change", handleRadioChange);

// Event handler function
function handleRadioChange() {
    // Check the value of the selected radio button
    if (availableRadio.checked) {
        console.log("Status: Available");
        // Add your code here for the 'Available' case
    } else if (unavailableRadio.checked) {
        console.log("Status: Unavailable");
        // Add your code here for the 'Unavailable' case
    }
}
    </script> -->

@endsection