@extends('layouts.sideNav')

@section('content')
<h4>Product</h4>
<h6>Display Product</h6>

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <label>PRODUCT NAME</label>
                            <input type="text" name="productName" class="form-control" placeholder="Product Name"
                                value="{{$product->productName}}" readonly>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <label>QUANTITY</label>
                            <input type="number" name="quantity" class="form-control" placeholder="Number"
                                value="{{$product->quantity}}" readonly>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <label>PRICE</label>
                            <input type="number" name="price" class="form-control" placeholder="Price"
                                value="{{$product->price}}" readonly>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <div class="text-center">
                                <img src="/assets/{{$product->picture}}" width="200px" style="float: middle">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <label>STATUS</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"
                                    value="available" {{ $product->status === 'available' ? 'checked' : '' }} readonly>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Available
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2"
                                    value="unavailable" {{ $product->status === 'unavailable' ? 'checked' : '' }}
                                    readonly>
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
        <a class="btn btn-primary" id="product" style="float: right;"
            href="{{ route('editProduct', $product->id) }}">Edit</a>
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
<script>
// Get the radio button elements
var availableRadio = document.getElementById("flexRadioDefault1");
var unavailableRadio = document.getElementById("flexRadioDefault2");

// Add event listeners to the radio buttons
availableRadio.addEventListener("change", handleRadioChange);
unavailableRadio.addEventListener("change", handleRadioChange);

// Event handler function
function handleRadioChange() {
    var statusLabel = document.getElementById("status-label");
    var selectedStatus = document.querySelector('input[name="status"]:checked').value;

    if (selectedStatus === "available") {
        statusLabel.textContent = "Status: Available";
    } else if (selectedStatus === "unavailable") {
        statusLabel.textContent = "Status: Unavailable";
    }
}
</script>

@endsection