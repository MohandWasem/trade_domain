@extends("style.index")

@section("content")
<div class="col-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h4 class="card-title">Add Offers</h4>
<br>

<form class="forms-sample" action="{{route('offers.create')}}" method="post" >
@csrf

<div class="form-group">
<label for="exampleInputName1">Client</label>
<input type="text" name="client" class="form-control" id="exampleInputName1" value="{{old('client')}}" placeholder="Client" required>
</div>


<div class="form-group">
<label for="time_from">Date</label>
<input type="text" class="form-control datetimepicker" id="time_from" name="date" value="{{old('date')}}" required />
</div>

<div class="form-group">
    <label for="exampleInputName1">Sales_Man</label>
    <input type="text" name="sales_man" class="form-control" id="exampleInputName1" value="{{old('sales_man')}}" placeholder="Sales_Man" required>
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