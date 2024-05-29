@extends("style.index")

@section("content")

<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Accounts</h4>
        @if(Session::has('success'))
        <div class="alert alert-success">
              {{Session::get('success')}}</div>
        @endif
        <div class="table-responsive">
        <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
        <thead>
            <tr class="table-responsive-sm">
              <th>  # </th>
              <th> Client Name</th>
              <th> Amount Paid	</th>
              <th> Amount Due </th>
            </tr>
          </thead>
          <tbody>

           @forelse ($Payments as $payment)
               
           <tr class="table-responsive-sm">
             <td></td>
             <td>{{$payment->client->client_name}}</td>
             <td>{{$payment->amount_paid}}</td>
             <td>{{$payment->amount_due}}</td>

            
           @empty
               
           @endforelse
   
          </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>

@endsection