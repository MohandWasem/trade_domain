@extends("style.index")

@section("content")

<a href="{{route('clients.add')}}" class="btn btn-gradient-primary btn-fw">Add Client</a>

<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Clients</h4>
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
              <th> Client_Name</th>
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

           @forelse ($Clients as $client)
               
           <tr class="table-responsive-sm">
             <td></td>
             <td>{{$client->serial_client}}</td>
             <td>{{$client->client_name}}</td>
             <td>{{$client->contact_person}}</td>
             <td>{{$client->email}}</td>
             <td>{{$client->address}}</td>
             <td>{{$client->telephone}}</td>
             <td>{{$client->mobile}}</td>
             <td>{{$client->tax_id}}</td>
             <td>{{$client->notes}}</td>
             <td>
              
               <form action="{{route('clients.edit',$client->id)}}" method="post">
                 @csrf
               <input type="submit" class="btn btn-info" value="edit">
               
             </form>

             <form action="{{route('clients.delete',$client->id)}}" method="post">
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