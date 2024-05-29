@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Payment for Shipment</h4>
<br>

<p><strong>Client:</strong> {{ $shipment->clients->client_name }}</p>
<h2>Products</h2>
<table class="table">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Currency</th>
            <th>Total Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shipment->shipmentproduct as $product)
            <tr>
                <td>{{ $product->products->product_name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->currencies->currency_name }}</td>
                <td>{{ $product->total_price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>

<form class="forms-sample" action="{{route('payment.create',$shipment->id)}}" method="post" >
@csrf

<div class="form-group">
<label for="amount_paid">Amount Paid</label>
<input type="number" name="amount_paid" class="form-control" id="amount_paid" value="" placeholder="Amount Paid" required>
</div>

<div class="form-group">
<label for="amount_due">Amount Due</label>
<input type="number" name="amount_due" class="form-control" id="amount_due" value="" placeholder="Amount Due" required>
</div>

<input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
  
<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('shipments')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection


