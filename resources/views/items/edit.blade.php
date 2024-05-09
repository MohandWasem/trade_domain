@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Item</h4>
<br>

<form class="forms-sample" action="{{route('items.update',$Items->id)}}" method="post" >
@csrf

<div class="form-group">
<label for="exampleInputName1">Description</label>
<input type="text" name="description" class="form-control" id="exampleInputName1" value="{{$Items->description}}" placeholder="Description" required>
</div>

<div class="form-group">
<label for="quantity">quantity</label>
<input type="number" name="quantity" class="form-control" id="quantity" value="{{$Items->quantity}}" placeholder="quantity" required>
</div>

<div class="form-group">
<label for="price">Price per unit</label>
<input type="number" name="price" class="form-control" id="price" value="{{$Items->price}}" placeholder="price" required>
</div>

<div class="form-group">
<label for="exampleInputName1">Currency </label>
<input type="text" name="currency" class="form-control" id="exampleInputName1" value="{{$Items->currency}}" placeholder="currency " required>
</div>

<div class="form-group">
<label for="exampleInputName1">Conversion Rate</label>
<input type="number" name="conversion_rate" class="form-control" id="exampleInputName1" value="{{$Items->conversion_rate}}" placeholder="conversion rate" required>
</div>

<div class="form-group">
<label for="total">Total Price</label>
<input type="text" name="total_price" class="form-control" id="total" value="{{$Items->total_price}}" placeholder="total price" readonly required>
</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('items')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
          $('#price').on('input', function () {
                // Get input values
                var amount = parseFloat($('#quantity').val()) || 0;
                var taxRate = parseFloat($(this).val()) || 0;

                 $('#total').val( taxRate * amount );
            });
</script>
@endpush

