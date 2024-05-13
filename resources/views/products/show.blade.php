@extends("style.index")

@section("content")

<a href="{{route('products.add')}}" class="btn btn-gradient-primary btn-fw">Add Product</a>

<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Products</h4>
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
              <th> Product_Name</th>
              <th> Product_Arabic_Name</th>
              <th> Product_Description</th>
              <th> Product_Arabic_Description</th>
              <th> Category</th>
              <th> Part_Name</th>
              <th> hs_code</th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>

           @forelse ($Products as $Product)
               
           <tr class="table-responsive-sm">
             <td></td>
             <td>{{$Product->serial_product}}</td>
             <td>{{$Product->product_name}}</td>
             <td>{{$Product->product_arabic_name}}</td>
             <td>{{$Product->product_description}}</td>
             <td>{{$Product->product_arabic_description}}</td>
             <td>{{$Product->categories->category_name}}</td>
             <td>{{$Product->part_number}}</td>
             <td>{{$Product->hs_code}}</td>
             <td>
              
               <form action="{{route('products.edit',$Product->id)}}" method="post">
                 @csrf
               <input type="submit" class="btn btn-info" value="edit">
               
             </form>

             <form action="{{route('products.delete',$Product->id)}}" method="post">
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