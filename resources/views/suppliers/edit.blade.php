@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Suppliers</h4>
<br>

<form class="forms-sample" action="{{route('suppliers.update',$Suppliers->id)}}" method="post" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label for="exampleInputName1">Supplier Name</label>
<input type="text" name="supplier_name" class="form-control" id="exampleInputName1" value="{{$Suppliers->supplier_name}}" placeholder="Supplier Name" required>
</div>

<div class="form-group">
<label for="exampleInputEmail3">Contact Person</label>
<input type="text" name="contact_person" class="form-control" id="exampleInputEmail3" value="{{$Suppliers->contact_person}}" placeholder="Contact Person" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Email</label>
<input type="email" name="email" class="form-control" id="exampleInputPassword4" value="{{$Suppliers->email}}" placeholder="Email" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Telephone</label>
<input type="text" name="telephone" class="form-control" id="exampleInputPassword4" placeholder="Telephone" value="{{$Suppliers->telephone}}" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Mobile</label>
<input type="phone" name="mobile" class="form-control" id="exampleInputPassword4" placeholder="Mobile" value="{{$Suppliers->mobile}}" required>
</div>

<div class="form-group">
<label for="exampleInputEmail3">Address</label>
<input type="text" name="address" class="form-control" id="exampleInputEmail3" value="{{$Suppliers->address}}" placeholder="Address" required>
</div>

<div class="form-group">
<label for="exampleInputEmail3">Tax_id</label>
<input type="text" name="tax_id" class="form-control" id="exampleInputEmail3" value="{{$Suppliers->tax_id}}" placeholder="Tax_id" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Notes</label>
<textarea name="notes" class="form-control"placeholder="Message" id="exampleInputPassword4" cols="30" rows="10">{{$Suppliers->notes}}</textarea>
</div>

<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('suppliers')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection