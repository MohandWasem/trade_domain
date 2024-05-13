@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Clients</h4>
<br>

<form class="forms-sample" action="{{route('clients.update',$Clients->id)}}" method="post" enctype="multipart/form-data">
@csrf

<div class="form-group">
<label for="exampleInputName1">Client Name</label>
<input type="text" name="client_name" class="form-control" id="exampleInputName1" value="{{$Clients->client_name}}" placeholder="Client Name" required>
</div>

<div class="form-group">
<label for="exampleInputEmail3">Contact Person</label>
<input type="text" name="contact_person" class="form-control" id="exampleInputEmail3" value="{{$Clients->contact_person}}" placeholder="Contact Person" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Email</label>
<input type="email" name="email" class="form-control" id="exampleInputPassword4" value="{{$Clients->email}}" placeholder="Email" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Telephone</label>
<input type="text" name="telephone" class="form-control" id="exampleInputPassword4" placeholder="Telephone" value="{{$Clients->telephone}}" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Mobile</label>
<input type="phone" name="mobile" class="form-control" id="exampleInputPassword4" placeholder="Mobile" value="{{$Clients->mobile}}" required>
</div>

<div class="form-group">
<label for="exampleInputEmail3">Address</label>
<input type="text" name="address" class="form-control" id="exampleInputEmail3" value="{{$Clients->address}}" placeholder="Address" required>
</div>

<div class="form-group">
<label for="exampleInputEmail3">Tax_id</label>
<input type="text" name="tax_id" class="form-control" id="exampleInputEmail3" value="{{$Clients->tax_id}}" placeholder="Tax_id" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Notes</label>
<textarea name="notes" class="form-control"placeholder="Message" id="exampleInputPassword4" cols="30" rows="10">{{$Clients->notes}}</textarea>
</div>

<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('clients')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection