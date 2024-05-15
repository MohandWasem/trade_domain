@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Expense</h4>
<br>

<form class="forms-sample" action="{{route('Expenses.update',$Expenses->id)}}" method="post" >
@csrf

<div class="form-group">
<label for="total">Expense Name</label>
<input type="text" name="expense_name" class="form-control" value="{{$Expenses->expense_name}}" placeholder="Expense Name" required>
</div>

<div class="form-group">
<label for="exampleSelectGender">Currency</label>
<select class="form-control" name="currency_id" id="exampleSelectGender">
@forelse ( $currencies as $currency )

<option value="{{$currency->id}}" @selected($Expenses->currency_id == $currency->id)>{{$currency->currency_name}}</option>
@empty
@endforelse

</select>
</div>

<div class="form-group">
<label for="quantity">Expense Cost</label>
<input type="number" name="expense_cost" class="form-control" value="{{$Expenses->expense_cost}}" placeholder="Expense Cost" required>
</div>

<input type="hidden" name="shipment_id" value="{{ $Expenses->shipment_id }}">
  
<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('Expenses')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection


