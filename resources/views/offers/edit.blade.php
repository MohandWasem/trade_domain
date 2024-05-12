@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Edit Offers</h4>
<br>

<form class="forms-sample" action="{{route('offers.update',$Offers->id)}}" method="post" >
@csrf

<div class="form-group">
<label for="exampleInputName1">Client</label>
<input type="text" name="client" class="form-control" id="exampleInputName1" value="{{$Offers->client}}" placeholder="Client" required>
</div>


<div class="form-group">
<label for="time_from">Date</label>
<input type="text" class="form-control datetimepicker" id="time_from" name="date" value="{{$Offers->date}}" required />
</div>

<div class="form-group">
<label for="exampleInputName1">Sales_Man</label>
<input type="text" name="sales_man" class="form-control" id="exampleInputName1" value="{{$Offers->sales_man}}" placeholder="Sales_Man" required>
</div>

<div class="form-group">
<label for="exampleInputName1">Attention</label>
<input type="text" name="attention" class="form-control" id="exampleInputName1" value="{{$Offers->attention}}" placeholder="Attention" required>
</div>

<div class="form-group">
<label for="exampleInputName1">Subject</label>
<input type="text" name="subject" class="form-control" id="exampleInputName1" value="{{$Offers->subject}}" placeholder="Subject" required>
</div>

<div class="form-group">
<label for="exampleInputPassword4">Terms & Conditions:</label>
<textarea name="terms" class="form-control"placeholder="Terms" id="exampleInputPassword4" cols="30" rows="10">{{$Offers->terms}}</textarea>
</div>


<button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
<a href="{{route('offers')}}" class="btn btn-light">Cancel</a>
</form>
</div>
</div>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endpush

@push('scripts')
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>
$('.datetimepicker').datetimepicker({
format: 'YYYY-MM-DD HH:mm',
locale: 'en',
sideBySide: true,
icons: {
up: 'fas fa-chevron-up',
down: 'fas fa-chevron-down',
previous: 'fas fa-chevron-left',
next: 'fas fa-chevron-right'
},

});
</script>
@endpush -->