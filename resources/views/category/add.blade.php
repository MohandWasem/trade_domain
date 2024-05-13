@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Category</h4>
<br>

<form class="forms-sample" action="{{route('categories.create')}}" method="post">
@csrf

<div class="form-group">
<label for="exampleInputName1">Category Name</label>
<input type="text" name="category_name" class="form-control" id="exampleInputName1" value="{{old('category_name')}}" placeholder="Category Name" required>
</div>

<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('categories')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection