@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Products</h4>
<br>

<form class="forms-sample" action="{{route('products.create')}}" method="post">
@csrf

<div class="form-group">
<label for="exampleInputName1">Product_Name</label>
<input type="text" name="product_name" class="form-control" id="exampleInputName1" value="{{old('product_name')}}" placeholder="Product_Name" required>
</div>

<div class="form-group">
<label for="exampleInputEmail3">Product_Arabic_Name</label>
<input type="text" name="product_arabic_name" class="form-control" id="exampleInputEmail3" value="{{old('product_arabic_name')}}" placeholder="Product_Arabic_Name" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Product_Description</label>
<input type="text" name="product_description" class="form-control" id="exampleInputPassword4" value="{{old('product_description')}}" placeholder="Product_Description" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Product_Arabic_Description</label>
<input type="text" name="product_arabic_description" class="form-control" id="exampleInputPassword4" placeholder="Product_Arabic_Description" value="{{old('product_arabic_description')}}" required>
</div>

<div class="form-group">
<label for="exampleSelectGender">Category</label>
<select class="form-control" name="category_id" id="exampleSelectGender">
@forelse ( $Categories as $Category )
    
<option value="{{$Category->id}}">{{$Category->category_name}}</option>
@empty
@endforelse

</select>
</div>

<div class="form-group">
<label for="exampleInputEmail3">Part_Name</label>
<input type="text" name="part_number" class="form-control" id="exampleInputEmail3" value="{{old('part_number')}}" placeholder="Part_Name" required>
</div>

<div class="form-group">
<label for="exampleInputEmail3">HS_Code</label>
<input type="text" name="hs_code" class="form-control" id="exampleInputEmail3" value="{{old('hs_code')}}" placeholder="HS_Code" required>
</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('products')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection