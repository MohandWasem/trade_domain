@extends("style.index")

@section("content")

<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Expenses</h4>
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
              <th> Expense_Name</th>
              <th> Currency</th>
              <th> Expense_Cost</th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>

           @forelse ($Expenses as $Expense)
               
           <tr class="table-responsive-sm">
             <td></td>
             <td>{{$Expense->serial_expense}}</td>
             <td>{{$Expense->expense_name}}</td>
             <td>{{$Expense->currencies->currency_name}}</td>
             <td>{{$Expense->expense_cost}}</td>
             <td>
              
               <form action="{{route('Expenses.edit',$Expense->id)}}" method="post">
                 @csrf
               <input type="submit" class="btn btn-info" value="edit">
               
             </form>

             <form action="{{route('Expenses.delete',$Expense->id)}}" method="post">
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