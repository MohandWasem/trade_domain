<!DOCTYPE html>
<html>
<head>
    <title>OverSeas Egypt</title>
    <h2>{{$title}}</h2>
    <span>Professional Freight Forwarder</span>
    <br>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        table {
         width: 100%;
         border-spacing: 0;
        }
        table.products {
         font-size: 0.875rem;
        }
       table.products tr {
         background-color: rgb(96 165 250);
        }
       table.products th {
         color: #ffffff;
         padding: 0.5rem;
        }
        table tr.items {
          background-color: rgb(241 245 249);
        }
        table tr.items td {
         padding: 0.5rem;
        }
       .margin-top {
         margin-top: 1.25rem;
       }
       .footer {
        font-size: 0.875rem;
        padding: 1rem;
        background-color: rgb(241 245 249);
       }
    </style>
</head>
<body>

    <h4 class="margin-right">Date:{{$date}}</h4>
    <p></p>
    <br/>
    <br/>

    <table class="table table-bordered products">
        <thead>
            <tr>
                <th> # </th>
                <th>description</th>
                <th>quantity</th>
                <th>price</th>
                <th>currency</th>
                <th>conversion_rate</th>
                <th>total_price</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
            <tr  class="items">
                <td></td>
                <td>{{ $item->description}}</td>
                <td>{{ $item->quantity}}</td>
                <td>{{ $item->price}}</td>
                <td>{{ $item->currency}}</td>
                <td>{{ $item->conversion_rate}}</td>
                <td>{{ $item->total_price}}</td>
            </tr>
            @empty
                  
            @endforelse
        </tbody>
    </table>

    <div class="footer margin-top">
        <div>Thank you for your interest in our services and we hope our offer meets your requirements</div>
        <div>Overseas Egypt</div>
    </div>
</body>
</html>