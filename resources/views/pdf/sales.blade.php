<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        td:last-child {
            text-align: right;
        }
    </style>
</head>
<body>

<h1>Sales Report</h1>

<table>
    <thead>
        <tr>
            <th>Store Code</th>
            <th>Transaction Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->store_code }}</td>
                <td>{{ number_format($sale->transaction_amount, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>