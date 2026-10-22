<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <style>
        body{font-family: DejaVu Sans, sans-serif; padding: 20px;}
        table{width: 100%; border-collapse: collapse; margin-top: 10px;}
        td{padding: 8px;}
        h1,h3{margin: 0;}
    @font-face {
        font-family: 'ipaexg';
        src: url("{{ public_path('fonts/ipaexg.ttf') }}") format('truetype');
    }
    body { font-family: 'ipaexg'; }
    </style>
</head>
<body>
    <h1 align="center">Payment Receipt</h1>
    <hr>

    <p>Receipt No: <b>{{ $payment->id }}</b></p>
    <p>Date: <b>{{ $payment->paid_date }}</b></p>
    <p>Enrollment No: <b>{{ $payment->enrollment->enroll_no }}</b></p>
    <p>Student Name: <b>{{ $payment->enrollment->student->name }}</b></p>

    <hr>

    <table>
        <tr>
            <td>Batch</td>
            <td>Amount</td>
        </tr>
        <tr>
            <td><h3>{{ $payment->enrollment->batch->name }}</h3></td>
            <td><h3>{{ number_format($payment->amount) }}</h3></td>
        </tr>
    </table>

    <hr>
    <p>Printed Date: <b>{{ date('Y-m-d') }}</b></p>
</body>
</html>