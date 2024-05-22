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
            margin-left: 70%;
            color: #333;
            width: 300px;
            font-size: 15px;
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
            text-align: center;
        }

        table th {
            background-color: #6c7ae0;
            color: #fff;
        }

        tfoot tr {
            background-color: #f0f0f0;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="invoice-box">
        <h1>Shipment Report</h1>
        <div class="header">
            <div class="company-details">
                <h2>Operation Expenses</h2>
                <p>Customer :
                    {{$Shipments->is_selected == 1 ? $Shipments->clients->client_name : 'Direct'}}
                </p>
                <p>+20-02-22622247</p>
                <p>info@os-eg.com</p>
            </div>
            <div class="invoice-details">
                <p><strong>Date:</strong> {{$date}}</p>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th colspan="5">Products invoice</th>
                </tr>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Currency</th>
                    <th>Total_Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($shipmentproduct as $shipmentproduct)
                    
                <tr>
                    <td>{{$shipmentproduct->products->product_name}}</td>
                    <td>{{$shipmentproduct->quantity}}</td>
                    <td>{{$shipmentproduct->price}}</td>
                    <td>{{$shipmentproduct->currencies->currency_name}}</td>
                    <td>{{$shipmentproduct->total_price}}</td>
                </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>


        <table>
            <thead>
                <tr>
                    <th colspan="4">Sales invoice</th>
                </tr>
                <tr>
                    <th>Quantity_Sales</th>
                    <th>Sales_Price</th>
                    <th>Currency</th>
                    <th>Total_Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($Sales as $Sale)
                    
                <tr>
                    <td>{{$Sale->quantity_sale}}</td>
                    <td>{{$Sale->sales_price}}</td>
                    <td>{{$Sale->currencies->currency_name}}</td>
                    <td>{{$Sale->total_sales_price}}</td>
                </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th colspan="3">Expenses invoice</th>
                </tr>
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
      
        {{-- @if ($totalShipmentCosts !== null)
        
            <p><strong>Total Shipment Cost: {{$totalShipmentCosts}} {{$shipmentproduct->currencies->currency_name}}</strong></p>
        @endif

        @if ($SubtractTotalCost !== null)
        
        <p><strong>Subtract Total Cost: {{$SubtractTotalCost}} {{$shipmentproduct->currencies->currency_name}}</strong></p>
    @endif --}}

    <table>
        <thead>
            <tr>
                <th colspan="3">Total</th>
            </tr>
            <tr>
                <th>US</th>
                <th>EG</th>
                <th>EU</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$AddUSD}}</td>
                <td>{{$AddGBP}}</td>
                <td>{{$AddEUR}}</td>
            </tr>
        </tbody>
    </table>
<br>

    <table>
        <thead>
            <tr>
                <th colspan="3">Total Profit</th>
            </tr>
            <tr>
                <th>EG</th>
                <th>US</th>
                <th>EU</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$differenceGBP}}</td>
                <td>{{$differenceUSD}}</td>
                <td>{{$differenceEUR}}</td>
            </tr>
            {{-- <tr>
                <th colspan="3">DIF</th>
                <td>{{$differenceGBP}}</td>
                <td>{{$differenceUSD}}</td>
                <td>{{$differenceEUR}}</td>
            </tr> --}}
        </tbody>
    </table>

    {{-- <table>
        <h3>Total Profit</h3>
        <thead>
            <tr>
                <th>USD</th>
                <th>EGP</th>
                <th>EURO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                  @if ($SubtractTotalCost !== null && $shipmentproduct->currencies->currency_name =='US')
        
                    <p><strong> {{$SubtractTotalCost}} {{$shipmentproduct->currencies->currency_name}}</strong></p>
                  @endif
                </td>

                <td>
                   @if ($SubtractTotalCost !== null && $shipmentproduct->currencies->currency_name =='EG')
        
                    <p><strong> {{$SubtractTotalCost}} {{$shipmentproduct->currencies->currency_name}}</strong></p>
                   @endif
                </td>

                <td>
                    @if ($SubtractTotalCost !== null && $shipmentproduct->currencies->currency_name =='EU')
         
                     <p><strong> {{$SubtractTotalCost}} {{$shipmentproduct->currencies->currency_name}}</strong></p>
                    @endif
                 </td>
            </tr>
        </tbody>
    </table> --}}

    </div>
</body>
</html>
