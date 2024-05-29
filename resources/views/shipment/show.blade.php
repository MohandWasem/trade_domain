@extends("style.index")

@section("content")

<a href="{{route('shipments.add')}}" class="btn btn-gradient-primary btn-fw">Add Shipment</a>

<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Shipments</h4>
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
              <th> Supplier_Name</th>
              <th> Shipping_Agent</th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>

           @forelse ($Shipments as $Shipment)
               
           <tr class="table-responsive-sm">
             <td></td>
             <td>{{$Shipment->serial_shipment}}</td>
             <td>{{$Shipment->clients->client_name}}</td>
             <td>{{$Shipment->suppliers->supplier_name}}</td>
             <td>{{$Shipment->shipping_agent}}</td>
             <td>
               <a href="{{route('ShipmentProducts.add',$Shipment)}}" class="btn btn-gradient-dark btn-fw">Add Product</a><a href="{{route('Expenses.add',$Shipment)}}" class="btn btn-gradient-success btn-fw">Add Expenses</a><a href="{{route('pdf.invoice',$Shipment->id)}}" class="btn btn-gradient-primary btn-fw">Shipment Report</a>
               <form action="{{route('shipments.edit',$Shipment->id)}}" method="post">
                 @csrf
               <input type="submit" class="btn btn-info" value="edit">
               
             </form>

             <form action="{{route('shipments.delete',$Shipment->id)}}" method="post">
               @csrf
               <input type="submit" class="btn btn-danger" value="delete">
              </form>
              <a href="{{route('payment.add',$Shipment)}}" class="btn btn-gradient-warning btn-fw">Add Payment</a>
            </td>
            
           @empty
               
           @endforelse
   
          </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>

        {{---------------- ShipmentProducts -----------------}}
  <div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Shipment_Products</h4>
        <div class="table-responsive">
        <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
        <thead>
            <tr class="table-responsive-sm">
              <th>  # </th>
              <th> Serial_Number</th>
              <th> Client_Name</th>
              <th> Supplier_Name</th>
              <th> Product_Name</th>
              <th> Quantity</th>
              <th> Price</th>
              <th> Currency</th>
              <th> Total_Price</th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>

           @forelse ($ShipmentProducts as $ShipmentProduct)
               
           <tr class="table-responsive-sm">
             <td></td>
             <td>{{$ShipmentProduct->serial_shipmentproduct}}</td>
             <td>{{$ShipmentProduct->shipment->clients->client_name}}</td>
             <td>{{$ShipmentProduct->shipment->suppliers->supplier_name}}</td>
             <td>{{$ShipmentProduct->products->product_name}}</td>
             <td>{{$ShipmentProduct->quantity}}</td>
             <td>{{$ShipmentProduct->price}}</td>
             <td>{{$ShipmentProduct->currencies->currency_name}}</td>
             <td>{{$ShipmentProduct->total_price}}</td>
             <td>
               <a href="{{route('ShipmentProductSale.add',$ShipmentProduct)}}" class="btn btn-gradient-success btn-fw">Add ProductSales</a>
               <form action="{{route('ShipmentProducts.edit',$ShipmentProduct->id)}}" method="post">
                 @csrf
               <input type="submit" class="btn btn-info" value="edit">
               
             </form>

             <form action="{{route('ShipmentProducts.delete',$ShipmentProduct->id)}}" method="post">
               @csrf
               <input type="submit" class="btn btn-danger" value="delete">
              </form>
              {{-- <a href="{{route('payment.add',$ShipmentProduct)}}" class="btn btn-gradient-warning btn-fw">Add Payment</a> --}}
            </td>
            
           @empty
               
           @endforelse
   
          </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>


          {{---------------- ShipmentProductSales -----------------}}
          <div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Shipment_Product_Sales</h4>
                <div class="table-responsive">
                <table id="example" class="table table-striped table-responsive-sm table-bordered" style="width:100%">
                <thead>
                    <tr class="table-responsive-sm">
                      <th>  # </th>
                      <th> Serial_Number</th>
                      <th> Client_Name</th>
                      <th> Supplier_Name</th>
                      <th> Product_Name</th>
                      <th> Quantity</th>
                      <th> Price</th>
                      <th> Total_Price</th>
                      <th> Quantity_Sales</th>
                      <th> Sales_Price</th>
                      <th> Currency</th>
                      <th> Total_Price_Sales</th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                   @forelse ($ShipmentProductSales as $ShipmentProductSale)
                       
                   <tr class="table-responsive-sm">
                     <td></td>
                     <td>{{$ShipmentProductSale->serial_shipmentproductsale}}</td>
                     <td>{{$ShipmentProductSale->products->shipment->clients->client_name}}</td>
                     <td>{{$ShipmentProductSale->products->shipment->suppliers->supplier_name}}</td>
                     <td>{{$ShipmentProductSale->products->products->product_name}}</td>
                     <td>{{$ShipmentProductSale->products->price}}</td>
                     <td>{{$ShipmentProductSale->products->currencies->currency_name}}</td>
                     <td>{{$ShipmentProductSale->products->total_price}}</td>
                     <td>{{$ShipmentProductSale->quantity_sale}}</td>
                     <td>{{$ShipmentProductSale->sales_price}}</td>
                     <td>{{$ShipmentProductSale->currencies->currency_name}}</td>
                     <td>{{$ShipmentProductSale->total_sales_price}}</td>
                     <td>
                       
                       <form action="{{route('ShipmentProductSale.edit',$ShipmentProductSale->id)}}" method="post">
                         @csrf
                       <input type="submit" class="btn btn-info" value="edit">
                       
                     </form>
        
                     <form action="{{route('ShipmentProductSale.delete',$ShipmentProductSale->id)}}" method="post">
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