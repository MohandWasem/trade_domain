@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add ShipmentProductSale</h4>
<br>

<form class="forms-sample" action="{{route('ShipmentProductSale.create')}}" method="post" >
@csrf

<div class="form-group">
<label for="quantity">quantity</label>
<input type="number" name="quantity" class="form-control" id="quantity" value="{{$ShipmentSales->quantity}}" placeholder="quantity" required>
</div>

<div class="form-group">
<label for="price">Price per unit</label>
<input type="number" name="price" class="form-control" id="price" value="{{$ShipmentSales->price}}" placeholder="price" required>
</div>

<div class="form-group">
<label for="price">Currency</label>
<input type="text" name="currency_id" class="form-control" id="price" value="{{$ShipmentSales->currencies->currency_name}}" placeholder="price" required>
</div>

<div class="form-group">
<label for="total">Total Price</label>
<input type="text" name="total_price" class="form-control" id="total" value="{{$ShipmentSales->total_price}}" placeholder="total price" readonly required>
</div>

<div class="form-group">
<label for="quantity_sale">quantity</label>
<input type="number" name="quantity_sale" class="form-control" id="quantity_sale" value="" placeholder="quantity Sales" required>
</div>

<div class="form-group">
<label for="sales">Sales per unit</label>
<input type="text" name="sales_price" class="form-control" id="sales" value="" placeholder="Sales Price" required>
</div>

<div class="form-group">
<label for="total_sales_price">Total Sales Price</label>
<input type="text" name="total_sales_price" class="form-control" id="total_sales_price" value="" placeholder="Total Sales Price" readonly required>
</div>

<input type="hidden" name="shipmentproduct_id" value="{{ $ShipmentSales->id }}">
{{-- <input type="text" name="shipmentproduct_id" value="{{ $ShipmentSales->shipment_id }}"> --}}
  
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
          $('#sales').on('input', function () {
                // Get input values
                var amount = parseFloat($('#quantity_sale').val()) || 0;
                var taxRate = parseFloat($(this).val()) || 0;

                 $('#total_sales_price').val( taxRate * amount );
            });
</script>
@endpush

