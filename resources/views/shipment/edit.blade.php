@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Shipment</h4>
<br>

<form class="forms-sample" action="{{route('shipments.update',$Shipments->id)}}" method="post" >
@csrf

<div>
<label for="toggleCheckbox">Shipment Type:</label>
<input type="checkbox" id="toggleCheckbox" value="1" name="is_selected" onclick="toggleSelect()" {{ $Shipments->is_selected ? 'checked' : '' }}>
</div>
<br>
<div class="form-group" style="display:  {{ $Shipments->is_selected ? 'block' : 'none' }}" id="selectContainer">
<label for="exampleSelectGender">Clients</label>
<select class="form-control" name="client_id" id="exampleSelectGender">
 @forelse ( $Clients as $Client )

<option value="{{$Client->id}}" @selected($Shipments->client_id == $Client->id)>{{$Client->client_name}}</option>
 @empty

 @endforelse       

</select>

</div>

<div class="form-group">
<label for="exampleSelectGender">Suppliers</label>
<select class="form-control" name="supplier_id" id="exampleSelectGender">
 @forelse ( $Suppliers as $Supplier )

<option value="{{$Supplier->id}}" @selected($Shipments->supplier_id == $Supplier->id)>{{$Supplier->supplier_name}}</option>
 @empty

 @endforelse       

</select>

</div>

<div class="form-group">
<label for="exampleInputName1">Shipping Agent</label>
<input type="text" name="shipping_agent" class="form-control" id="exampleInputName1" value="{{$Shipments->shipping_agent}}" placeholder="Shipping Agent" required>
</div>

<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('shipments')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection

@push('scripts')
<script>
    function toggleSelect() {
        var checkbox = document.getElementById('toggleCheckbox');
        var selectContainer = document.getElementById('selectContainer');
        if (checkbox.checked) {
            selectContainer.style.display = 'block';
        } else {
            selectContainer.style.display = 'none';
        }
    }
</script>
@endpush 