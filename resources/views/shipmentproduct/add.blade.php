@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add ShipmentProduct</h4>
<br>

<form class="forms-sample" action="{{route('ShipmentProducts.create')}}" method="post" >
@csrf

<div class="form-group">
<label for="exampleSelectGender">Product_Name</label>
<select class="form-control" name="product_id" id="exampleSelectGender">
 @forelse ( $products as $product )

 <option value="{{$product->id}}">{{$product->product_name}}</option>
 @empty
 @endforelse

</select>
</div>

<div class="form-group">
<label for="quantity">quantity</label>
<input type="number" name="quantity" class="form-control" id="quantity" value="" placeholder="quantity" required>
</div>

<div class="form-group">
<label for="price">Price per unit</label>
<input type="number" name="price" class="form-control" id="price" value="" placeholder="price" required>
</div>

<div class="form-group">
<label for="total">Total Price</label>
<input type="text" name="total_price" class="form-control" id="total" value="" placeholder="total price" readonly required>
</div>

<input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
  
<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('shipments')}}" class="btn btn-light">Cancel</a>
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

