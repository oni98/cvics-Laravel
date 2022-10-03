<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ @config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        thead tr:first-child {
            background: #eaf7f0;
        }

        .border {
            border: 2px solid rgb(207, 207, 207);
            margin-bottom: 50px;
            word-break:break-all;
            word-wrap:break-word;
            margin-bottom: 50px;
        }

        .sign {
            border-top: 1px solid black;
            padding: 2px 5px;
        }

        .position {
            width: 100%;
            height: 200px;
        }
    </style>
</head>

<body>
    <div>
        <img src="{{ asset('assets/backend/dist/img/quotation_header.png') }}" width="100%">
    </div>
    <div>
        <h6><u>Quotation To</u>:</h6>
        <div class="detail-table">
            <table>
                <tr>
                    <td>Name</td>
                    <td>: {{ $applicant->name }}</td>
                    <td style="width: 100px"></td>
                    <td>Quotation Date</td>
                    <td>: {{ $invoice->q_date }}</td>
                </tr>
                <tr>
                    <td>Passport No</td>
                    <td>: {{ $applicant->passport }}</td>
                    <td style="width: 100px"></td>
                    <td>Status</td>
                    <td>: {{ $invoice->q_status }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>: {{ $applicant->address }}</td>
                    <td style="width: 100px"></td>
                    <td>Quotation No</td>
                    <td>: {{ $invoice->q_id }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>: {{ $applicant->mobile }}</td>
                    <td style="width: 100px"></td>
                    <td>Customer ID</td>
                    <td>: {{ $applicant->code }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: {{ $applicant->email }}</td>
                    <td style="width: 100px"></td>
                    <td>Due Date</td>
                    <td>: {{ $invoice->q_due_date }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="width: 100px"></td>
                    <td>Grand Amount</td>
                    <td>: {{ $invoice->currency }} {{ number_format($invoice->q_grand_amount) }}</td>
                </tr>
            </table>
        </div>
        <div style="margin-bottom: 150px; margin-top: 50px">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Tax</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoiceItems as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item['description'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $invoice->currency }} {{ number_format($item['price']) }}</td>
                            <td>{{ $item['tax'] }}</td>
                            <td>{{ $invoice->currency }} {{ number_format($item['amount']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="float-right">
                <tbody>
                    <tr>
                        <td class="text-right">Total:</td>
                        <td style="text-align: right; padding-right: 30px;width: 200px">
                            {{ $invoice->currency }} {{ number_format($invoice->total) }}</td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            Discount (%):
                        </td>
                        <td style="text-align: right; padding-right: 30px;width: 200px">
                            {{ $invoice->discount }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; font-weight: bold">
                            Grand Total:
                        </td>
                        <td style="text-align: right; padding-right: 30px;width: 200px">
                            {{ $invoice->currency }} {{ number_format($invoice->q_grand_amount) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="position">
            <div class="border">
                <h6>Terms and Conditions:</h6>
                <p>{{ $invoice->tnc }}</p>
            </div>
            <div class="sign" style="float: left">
                <p>Prepared By</p>
            </div>
            <div class="sign" style="float: right">
                <p>Accepted By</p>
            </div>
            <br><br>
            <h5 class="text-center">Thank you for your business</h5>
        </div>

    </div>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
