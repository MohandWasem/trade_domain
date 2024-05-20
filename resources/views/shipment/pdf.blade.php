<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipment invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            direction: ltr;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .invoice-box {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            margin-top: 50px;
        }

        .invoice-box h1 {
            text-align: center;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .company-details, .invoice-details {
            width: 45%;
        }

        .company-details h2 {
            margin: 0;
            color: #333;
        }

        .company-details p, .invoice-details p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f0f0f0;
            color: #333;
        }

        tfoot tr {
            background-color: #f0f0f0;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="invoice-box">
        <h1>Shipment invoice</h1>
        <div class="header">
            <div class="company-details">
                <h2>Overseas Egypt</h2>
                <p>18A El-Obour buildings, Salah Salem St, 13th floor flat 3, Cairo, Egypt.</p>
                <p>+20-02-22622247</p>
                <p>info@os-eg.com</p>
            </div>
            <div class="invoice-details">
                <p><strong>Date:</strong> {{$date}}</p>
            </div>
        </div>
        <table>
            <h2 style="width:200px;">Products invoice</h2>
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Supplier</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total_Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($shipmentproduct as $shipmentproduct)
                    
                <tr>
                    <td>{{$shipmentproduct->shipment->clients->client_name}}</td>
                    <td>{{$shipmentproduct->shipment->suppliers->supplier_name}}</td>
                    <td>{{$shipmentproduct->products->product_name}}</td>
                    <td>{{$shipmentproduct->quantity}}</td>
                    <td>{{$shipmentproduct->price}}</td>
                    <td>{{$shipmentproduct->total_price}}</td>
                </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>


        <table>
            <h2>Sales invoice</h2>
            <thead>
                <tr>
                    <th>Quantity_Sales</th>
                    <th>Sales_Price</th>
                    <th>Total_Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($Sales as $Sale)
                    
                <tr>
                    <td>{{$Sale->quantity_sale}}</td>
                    <td>{{$Sale->sales_price}}</td>
                    <td>{{$Sale->total_sales_price}}</td>
                </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>

        <table>
            <h2>Expenses invoice</h2>
            <thead>
                <tr>
                    <th>Expense_Name</th>
                    <th>Currency</th>
                    <th>Expense_Cost</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($Expenses as $Expense)
                    
                <tr>
                    <td>{{$Expense->expense_name}}</td>
                    <td>{{$Expense->currencies->currency_name}}</td>
                    <td>{{$Expense->expense_cost}}</td>
                </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
      
        @if ($totalShipmentCosts !== null)
        
            <p><strong>Total Shipment Cost: {{$totalShipmentCosts}}</strong></p>
        @endif

        @if ($SubtractTotalCost !== null)
        
        <p><strong>Subtract Total Cost: {{$SubtractTotalCost}}</strong></p>
    @endif
    </div>
</body>
</html>