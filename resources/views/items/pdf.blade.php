<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overseas Egypt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }
        .overseas {
            color: #1a0dab;
        }

        .pro {
            padding-left: 31%;
            color: #1a0dab;
            font-size: 13px;
        }

        .date, .reference, .recipient, .subject {
            /* font-style: italic; */
            /* color: #666; */
            
        }
        .recipient {
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 16px;
        }
        .subject {
            font-size: 17px;
        }

        .content {
            /* margin-top: 5px; */
            
        }
        .sir {
            color: #1a0dab;
        }

        .terms {
            margin-top: 20px;
        }

        .terms h3 {
            color: #333;
        }

        .terms ul {
            list-style-type: none;
            padding: 0;
        }

        .terms li {
            margin-bottom: 5px;
        }

        .thanks {
            margin-top: 20px;
            font-style: italic;
            color: #666;
            text-align: center;
        }
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
       .address {
            margin-bottom: 20px;
        }

        .address p {
            margin: 5px 0;
        }

        .line {
            margin-bottom: 20px;
            border-bottom: 1px solid #b2aaaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="overseas">Overseas Egypt</h1>
        <p class="pro">Professional Freight Forwarder</p>
        <p class="date">Date : {{$date}}</p>
        <p class="reference">Our reference: {{$offers->serial_offer}}</p>
        <p class="recipient">Messers <div>{{$offers->client}}</div>At the kind attention of {{$offers->attention}}</p>
        <h2 class="subject">Subject: {{$offers->subject}}</h2>
        <p class="content">
            <div class="sir">Dear Sir,</div>
            About the above-mentioned subject, please find enclosed our quotation for the supply of the spare parts as below.<br>
            Should you need any more information about the services herewith offered, please do not hesitate to contact us.
        </p>
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
                <tr class="items">
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
        <div class="terms">
            <h3>Terms & Conditions:</h3>
            <ul>
                <li>{{$offers->terms}}</li>
            </ul>
        </div>
        <div class="footer margin-top">
            <div class="padding-bottom:10px;">Thank you for your interest in our services and we hope our offer meets your requirements.</div>
            <div>@:Overseas Egypt</div>
        </div>

        <div class="line"></div>
        <div class="address">
            <p>18A El-Obour buildings, Salah Salem St.,</p>
            <p>13th floor flat 3, Cairo, Egypt.</p>
            <p>+20-02-22622247</p>
            <p>info@os-eg.com</p>
        </div>
    </div>
</body>
</html>