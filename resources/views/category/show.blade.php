@extends("style.index")

@section("content")

<a href="{{route('categories.add')}}" class="btn btn-gradient-primary btn-fw">Add Category</a>

<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Categories</h4>
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
              <th> Category_Name</th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>

           @forelse ($Categories as $Category)
               
           <tr class="table-responsive-sm">
             <td></td>
             <td>{{$Category->serial_category}}</td>
             <td>{{$Category->category_name}}</td>
             <td>
              
               <form action="{{route('categories.edit',$Category->id)}}" method="post">
                 @csrf
               <input type="submit" class="btn btn-info" value="edit">
               
             </form>

             <form action="{{route('categories.delete',$Category->id)}}" method="post">
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