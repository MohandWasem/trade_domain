@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add ShipmentProductSale</h4>
<br>

<form class="forms-sample" action="{{route('ShipmentProductSale.update',$ShipmentProductSale->id)}}" method="post" >
@csrf


<div class="form-group">
<label for="quantity_sale">quantity</label>
<input type="number" name="quantity_sale" class="form-control" id="quantity_sale" value="{{$ShipmentProductSale->quantity_sale}}" placeholder="quantity Sales" required>
</div>

<div class="form-group">
<label for="sales">Sales per unit</label>
<input type="text" name="sales_price" class="form-control" id="sales" value="{{$ShipmentProductSale->sales_price}}" placeholder="Sales Price" required>
</div>

<div class="form-group">
<label for="exampleSelectGender">Currency_Name</label>
<select class="form-control" name="currency_id" id="exampleSelectGender">
@forelse ( $currencies as $currency )

<option value="{{$currency->id}}" @selected($ShipmentProductSale->currency_id == $currency->id)>{{$currency->currency_name}}</option>
@empty
@endforelse

</select>
</div>

<div class="form-group">
<label for="total_sales_price">Total Sales Price</label>
<input type="text" name="total_sales_price" class="form-control" id="total_sales_price" value="{{$ShipmentProductSale->total_sales_price}}" placeholder="Total Sales Price" readonly required>
</div>

<input type="hidden" name="shipmentproduct_id" value="{{ $ShipmentSales->id }}">
  
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

