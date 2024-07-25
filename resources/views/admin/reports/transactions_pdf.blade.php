<!DOCTYPE html>
<html>

<head>
    <title>Transaction Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .content .sign {
            margin-left: 3px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-size: 10px;
            font-style: oblique;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            color: rgb(5, 5, 5);
        }

        .logo {
            text-align: center;
            width: 100%;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 70%;
            height: 200px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: rgb(73, 191, 242);
            color: rgb(0, 0, 0);
        }

        .table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .summary {
            margin-top: 20px;
        }

        .content {
            min-height: calc(100vh - 60px);
            /* Adjust based on header, summary, and footer height */
            padding-bottom: 80px;
            /* Ensure space for the footer */
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            /* Optional: Background color for footer */
            padding: 10px 0;
            /* Optional: Padding for footer content */
            text-align: left;
        }

        .footer img {
            width: 80px;
            height: 80px;
            display: block;
            margin: 0 auto;
            /* Center align the image */
        }
    </style>

</head>

<body>


    {{-- <div class="logo">
        <img src="{{ $logoUrl }}" alt="Logo">
    </div> --}}

    <div class="logo">
        <img src="{{ $logoUrl }}" alt="Report-Logo">
    </div>

    <div class="header">
        <h2>{{ $reportTitle }}</h2>
    </div>

    <div class="content">
        <p class="sign">iD: {{ $signature }} </p>
        <table class="table table--light style--two table-bordered">
            <thead>
                <tr>
                    <th>User</th>
                    <th>TRX</th>
                    <th>Transacted</th>
                    <th>Amount</th>
                    <th>Post Balance</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $trx)
                    <tr>
                        <td>
                            <span class="fw-bold">{{ $trx->user->fullname }}</span>
                        </td>
                        <td>{{ $trx->trx }}</td>
                        <td>{{ $trx->created_at->format('Y-m-d h:i A') }}</td>
                        <td>
                            <span class="@if ($trx->trx_type == '+') text--success @else text--danger @endif">
                                {{ $trx->trx_type }} {{ number_format($trx->amount, 2) }} {{ $general->cur_text }}
                            </span>
                        </td>
                        <td>{{ number_format($trx->post_balance, 2) }} {{ $general->cur_text }}</td>
                        <td>{{ $trx->details }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="summary">
            <h3>Summary</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($totalDeposit > 0.0)
                        <tr>
                            <td>Total Deposit</td>
                            <td>{{ number_format($totalDeposit, 2) }} {{ $general->cur_text }}</td>
                        </tr>
                    @endif
                    @if ($totalWithdraw > 0.0)
                        <tr>
                            <td>Total Withdraw</td>
                            <td>{{ number_format($totalWithdraw, 2) }} {{ $general->cur_text }}</td>
                        </tr>
                    @endif
                    @if ($totalTransactionFees > 0.0)
                        <tr>
                            <td>Total Transaction Fees</td>
                            <td>{{ number_format($totalTransactionFees, 2) }} {{ $general->cur_text }}</td>
                        </tr>
                    @endif
                    @if ($totalLoan > 0.0)
                        <tr>
                            <td>Total Loan Taken</td>
                            <td>{{ number_format($totalLoan, 2) }} {{ $general->cur_text }}</td>
                        </tr>
                    @endif
                    @if ($totalInstallment > 0)
                        <tr>
                            <td>Total Installment's </td>
                            <td>{{ number_format($totalInstallment, 2) }} {{ $general->cur_text }}</td>
                        </tr>
                    @endif
                    @if ($totalInstallmentPenality > 0)
                        <tr>
                            <td>Total Installment Penality </td>
                            <td>{{ number_format($totalInstallmentPenality, 2) }} {{ $general->cur_text }} </td>
                        </tr>
                    @endif
                    @if ($totalTransactions > 0)
                        <tr>
                            <td>Total Transactions</td>
                            <td>{{ $totalTransactions }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <img src="{{ $qrCodePath }}" alt="QR Code">

    </div>


    <script type="text/php">
    if (isset($pdf)) {
        $x = 360;
        $y = 540; // Vertical position (adjust based on your page size, typically 820 for A4)
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font = null;
        $size = 12;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>

</body>

</html>
