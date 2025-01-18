<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="../logo/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            <td>
                                Invoice #: {{ $data->tracking_number }}<br>
                                Created: {{ now()->format('F jS, Y, h:i A') }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Sender:<br>
                                {{ $data->sender_name }}<br>
                                {{ $data->sender_address }}<br>
                                {{ $data->sender_contact }}<br>
                                {{ $data->sender_email }}
                            </td>
                            <td>
                                Receiver:<br>
                                {{ $data->receiver_name }}<br>
                                {{ $data->receiver_address }}<br>
                                {{ $data->receiver_contact }}<br>
                                {{ $data->receiver_email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Details</td>
                <td></td>
            </tr>
            <tr class="item">
                <td>Product Name</td>
                <td>{{ $data->product_name }}</td>
            </tr>
            <tr class="item">
                <td>Percentage on Delivery</td>
                <td>{{ $data->percentage_on_delivery }}%</td>
            </tr>
            <tr class="item">
                <td>Dispatch Location</td>
                <td>{{ $data->dispatch_location }}</td>
            </tr>
            <tr class="item">
                <td>Courier Status</td>
                <td>{{ $data->status }}</td>
            </tr>
            <tr class="item">
                <td>Dispatch Date</td>
                <td>{{ $data->dispatch_date }}</td>
            </tr>
            <tr class="item">
                <td>Estimated Delivery Date</td>
                <td>{{ $data->delivery_date }}</td>
            </tr>
            <tr class="item last">
                <td>Current Location</td>
                <td>{{ $data->current_location == "" ? $data->dispatch_location : $data->current_location }} ({{ $data->current_location_date }})</td>
            </tr>
        </table>
    </div>
</body>
</html>