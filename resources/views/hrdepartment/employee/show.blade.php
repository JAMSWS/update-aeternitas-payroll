<!DOCTYPE html>
<html>
<head>
    <title>Payslip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #000000;
            position: relative; /* Relative positioning for the container */
        }
        .header {
            position: absolute; /* Absolute positioning for the header */
            top: 20px; /* Distance from the top of the container */
            left: 20px; /* Distance from the left of the container */
        }
        .header img {
            width: 100px;
            background-color: #134261;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .details, .breakdown {
            margin-bottom: 20px;
            margin-top: 20px; /* Adjust margin-top to avoid overlap with header */
        }
        .details table, .breakdown table {
            width: 100%;
            border-collapse: collapse;
        }
        .details th, .breakdown th, .details td, .breakdown td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .details th, .breakdown th {
            background-color: #f4f4f4;
        }
        .breakdown {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .breakdown .left, .breakdown .right {
            width: 48%;
        }
        .breakdown .right {
            text-align: right;
        }
        .total {
            font-weight: bold;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/images/aeternitas.png') }}" alt="Company Logo">
        </div>

        <h1 style="text-align: center;">Aeternitas</h1>
        <p style="text-align: center;">Blk. 44 Lot 5 & 6, Commonwealth Ave.,</p>
        <p style="text-align: center;">Brgy. Batasan Hills, Quezon City, Metro Manila, Philippines</p>

        <div class="details">
            <h2>Employee Details</h2>
            <table>
                <tr>
                    <th>Employee ID</th>
                    <td>{{ $employee->custom_id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                </tr>
                <tr>
                    <th>Position</th>
                    <td>{{ $employee->position_name }}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>{{ $employee->department_name }}</td>
                </tr>
            </table>
        </div>

        <div class="breakdown">
            <div class="left">
                <h2>BASIC PAY</h2>
                <table>
                    <tr>
                        <th>Description</th>
                        <th></th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td>Days of Work</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Reg. days worked</td>
                        <td>{{ number_format($employee->regular_worked_days, 2) }}</td>
                        <td>₱{{ number_format($employee->rwd_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Legal Hol.</td>
                        <td>{{ number_format($employee->legal_worked_days, 2) }}</td>
                        <td>₱{{ number_format($employee->lhd_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Spcl. Hol.</td>
                        <td>{{ number_format($employee->special_worked_days, 2) }}</td>
                        <td>₱{{ number_format($employee->special_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Total Basic Pay</td>
                        <td></td>
                        <td>₱{{ number_format($employee->total_basic_pay, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Less: Late (mins.):</td>
                        <td>{{ number_format($employee->number_of_minutes_late, 2) }}</td>
                        <td>₱{{ number_format($employee->late_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="total">Net Basic Pay:</td>
                        <td></td>
                        <td class="total">₱{{ number_format($employee->total_basic_pay - $employee->late_amount, 2) }}</td>
                    </tr>

                </table>

            </div>
            <div class="right">
                <h2>DEDUCTION</h2>
                <table>
                    <tr>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td>SSS</td>
                        <td>₱{{ number_format($employee->sss_premcontribution + $employee->sss_wisp, 2) }}</td>
                    </tr>
                    <tr>
                        <td>PHIC</td>
                        <td>₱{{ number_format($employee->phic, 2) }}</td>
                    </tr>
                    <tr>
                        <td>HDMF</td>
                        <td>₱{{ number_format($employee->hdmf, 2) }}</td>
                    </tr>
                    <tr>
                        <td>WHTax</td>
                        <td>₱{{ number_format($employee->tax_cutoff, 2) }}</td>
                    </tr>
                    <tr>
                        <td>SSS Loans</td>
                        <td>₱{{ number_format($employee->sss_loan, 2) }}</td>
                    </tr>
                    <tr>
                        <td>HDMF Loans</td>
                        <td>₱{{ number_format($employee->hdmf_loan, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Company Loans</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Cash Advances</td>
                        <td>₱{{ number_format($employee->cash_advance, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Absences</td>
                        <td>₱{{ number_format($employee->absences, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Other Charges</td>
                        <td>₱{{ number_format($employee->employee_purchase, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="total">Total Deductions:</td>
                        <td class="total">₱{{ number_format($employee->sss_premcontribution + $employee->sss_wisp + $employee->phic + $employee->hdmf + $employee->tax_cutoff + $employee->sss_loan + $employee->hdmf_loan + $employee->cash_advance + $employee->absences + $employee->employee_purchase, 2) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="breakdown">
            <div class="left">
                <h2>OTHER PAY</h2>
                <table>
                    <tr>
                        <th>Description</th>
                        <th></th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td>Reg. OT (hrs):</td>
                        <td>{{ number_format($employee->ot_hours25, 2) }}</td>
                        <td>₱{{ number_format($employee->ot_amount25, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Night Diff. (hrs):</td>
                        <td>{{ number_format($employee->nd_hours, 2) }}</td>
                        <td>₱{{ number_format($employee->nd_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Meal Allowance</td>
                        <td></td>
                        <td>₱{{ number_format($employee->meal_allowance, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Transpo Allowance</td>
                        <td></td>
                        <td>₱{{ number_format($employee->half_allowance, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Incentive Leave:</td>
                        <td>{{ number_format($employee->vlsl, 2) }}</td>
                        <td>₱{{ number_format($employee->leave_amount, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Adjustments:</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="total">Total Other Pay:</td>
                        <td></td>
                        <td class="total">₱{{ number_format(($employee->ot_amount25 + $employee->nd_amount + $employee->meal_allowance + $employee->half_allowance + $employee->leave_amount), 2) }}</td>
                    </tr>

                </table>

            </div>
            <div class="right">

                <h2>TOTAL PAY</h2>
                <table>
                    <tr>
                        <td>GROSS PAY:</td>
                        <td>₱{{ number_format($employee->grosspay , 2) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="total">NET PAY:</td>
                        <td class="total"> ₱{{ number_format($employee->grosspay -  ($employee->sss_premcontribution + $employee->sss_wisp + $employee->phic + $employee->hdmf + $employee->tax_cutoff + $employee->sss_loan + $employee->hdmf_loan + $employee->cash_advance + $employee->absences + $employee->employee_purchase), 2) }}</td>
                    </tr>
                    <tr>
                        <td class="total"></td>
                        <td class="total">₱{{ number_format($employee->netpay , 2) }}</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td class="total">₱{{ number_format($employee->grosspay - ($employee->sss_premcontribution + $employee->sss_wisp + $employee->phic + $employee->hdmf + $employee->tax_cutoff + $employee->sss_loan + $employee->hdmf_loan + $employee->cash_advance + $employee->absences + $employee->employee_purchase) - $employee->netpay , 2) }}</td>

                    </tr>



                </table>
                <p style=" text-align: left;">RECEIVED BY:</p>
            </div>
        </div>

        <div class="footer">
            <p>Thank you for your hard work!</p>
            <p>AETERNITAS ETERNAL BRIGHT</p>
        </div>

        <!-- Export Buttons -->
        <div class="no-print" style="text-align: center;">
            <a href="{{ route('payslip.pdf', $employee->id) }}" class="btn btn-primary">Download PDF</a>
        </div>
    </div>
</body>
</html>
