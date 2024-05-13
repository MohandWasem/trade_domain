@extends("style.index")

@section("content")

<a href="{{route('suppliers.add')}}" class="btn btn-gradient-primary btn-fw">Add Supplier</a>

<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Suppliers</h4>
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
              <th> Supplier_Name</th>
              <th> Contact_Person</th>
              <th> Email</th>
              <th> Address</th>
              <th> Telephone</th>
              <th> Mobile</th>
              <th> Tax_id</th>
              <th> Notes</th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>

           @forelse ($Suppliers as $supplier)
               
           <tr class="table-responsive-sm">
             <td></td>
             <td>{{$supplier->serial_supplier}}</td>
             <td>{{$supplier->supplier_name}}</td>
             <td>{{$supplier->contact_person}}</td>
             <td>{{$supplier->email}}</td>
             <td>{{$supplier->address}}</td>
             <td>{{$supplier->telephone}}</td>
             <td>{{$supplier->mobile}}</td>
             <td>{{$supplier->tax_id}}</td>
             <td>{{$supplier->notes}}</td>
             <td>
              
               <form action="{{route('suppliers.edit',$supplier->id)}}" method="post">
                 @csrf
               <input type="submit" class="btn btn-info" value="edit">
               
             </form>

             <form action="{{route('suppliers.delete',$supplier->id)}}" method="post">
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