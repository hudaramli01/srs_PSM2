@extends('layouts.sideNav')

@section('content')
<h4>Solution</h4>
<h6>Display Solution</h6>

<!-- message box if the new waste has been added -->
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <!-- form add SERVICE -->
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Solution Name</label>
                                <input type="text" name="serviceName" class="form-control" placeholder="Solution Name" value="{{$service->serviceName}}"
                                readonly>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Description</label>
                                <textarea name="desc" class="form-control" placeholder="Description" readonly>{{$service->desc}}</textarea>
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
                                    value="available" {{ $service->status === 'available' ? 'checked' : '' }} readonly>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Available
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2"
                                    value="unavailable" {{ $service->status === 'unavailable' ? 'checked' : '' }}
                                    readonly>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Unavailable
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="col">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Price" value="{{$service->price}}"
                                readonly>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            <a class="btn btn-primary" id="product" style="float: right;" href="{{ route('editService', $service->id) }}">Edit</a>

        </form>
    </div>

</div>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection