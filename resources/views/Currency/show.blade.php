@extends("style.index")

@section("content")

<a href="{{route('currencies.add')}}" class="btn btn-gradient-primary btn-fw">Add Currency</a>

<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Currencies</h4>
        @if(Session::has('success'))
        <div class="alert alert-success">
              {{Session::get('success')}}</div>
        @endif
        <div class="table-responsive">
        <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
        <thead>
            <tr class="table-responsive-sm">
              <th>  # </th>
              <th> Serial_Number</th>
              <th> Currency_Name</th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>

           @forelse ($Currencies as $Currency)
               
           <tr class="table-responsive-sm">
             <td></td>
             <td>{{$Currency->serial_currency}}</td>
             <td>{{$Currency->currency_name}}</td>
             <td>
              
               <form action="{{route('currencies.edit',$Currency->id)}}" method="post">
                 @csrf
               <input type="submit" class="btn btn-info" value="edit">
               
             </form>

             <form action="{{route('currencies.delete',$Currency->id)}}" method="post">
               @csrf
               <input type="submit" class="btn btn-danger" value="delete">
              </form>
            </td>
            
           @empty
               
           @endforelse
   
          </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>

@endsection