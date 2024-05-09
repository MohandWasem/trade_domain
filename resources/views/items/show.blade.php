@extends("style.index")

@section("content")

               {{-- ITEMS --}}

                   <div class="col-lg-12 stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Items</h4>
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                              {{Session::get('success')}}</div>
                        @endif
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                        <thead>
                            <tr class="table-responsive-sm">
                              <th>  # </th>
                              <th> Description </th>
                              <th> Quantity </th>
                              <th> Price </th>
                              <th> Currency </th>
                              <th> Conversion_Rate </th>
                              <th> Total_Price </th>
                              <th> Action </th>
                            </tr>
                          </thead>
                          <tbody>
                           
                            
                                 @forelse ($items as $items)
                                     
                                 <tr class="table-responsive-sm">
                                    <td></td>
                                    <td>{{$items->description}}</td>
                                    <td>{{$items->quantity}}</td>
                                    <td>{{$items->price}}</td>
                                    <td>{{$items->currency}}</td>
                                    <td>{{$items->conversion_rate}}</td>
                                    <td>{{$items->total_price}}</td>
                                    <td>
                                      <form action="{{route('items.edit',$items->id)}}" method="post">
                                        @csrf
                                        <input type="submit" class="btn btn-info" value="edit">
                                      </form>
                                      
                                      <form action="{{route('items.delete',$items->id)}}" method="post">
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