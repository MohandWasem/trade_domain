@extends("style.index")

@section("content")

<a href="{{route('offers.show')}}" class="btn btn-gradient-primary btn-fw">Add Offer</a>

<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Offers</h4>
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
              <th> Client</th>
              <th> Date</th>
              <th> Sales_Man</th>
              <th> Attention</th>
              <th> Subject</th>
              <th> Terms & Conditions:</th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
           
             @forelse ($Offers as $offer)
                 
             <tr class="table-responsive-sm">
               <td></td>
               <td>{{$offer->serial_offer}}</td>
               <td>{{$offer->client}}</td>
               <td>{{$offer->date}}</td>
               <td>{{$offer->sales_man}}</td>
               <td>{{$offer->attention}}</td>
               <td>{{$offer->subject}}</td>
               <td>{{$offer->terms}}</td>
               <td>
                <a href="{{route('items.add',$offer)}}" class="btn btn-gradient-dark btn-fw">Add Item</a><a href="{{route('pdf.create',$offer->id)}}" class="btn btn-gradient-success btn-fw">Create PDF</a>
                 <form action="{{route('offers.edit',$offer->id)}}" method="post">
                   @csrf
                 <input type="submit" class="btn btn-info" value="edit">
                 
               </form>

               <form action="{{route('offers.delete',$offer->id)}}" method="post">
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