@extends('layouts.hrdepartment')

@section('title', 'Employee List | Aeternitas')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Payslip</title>
    <style>
        @media print {
            @page {
                size: A4;
                margin: 10mm;
            }
            body {
                margin: 0;
                padding: 0;
                width: 210mm;
                height: 297mm;
                overflow: hidden;
                font-size: 10pt;
            }
            .container {
                width: 100%;
                height: 100%;
                box-sizing: border-box;
                margin: 0;
                padding: 0;
                border: none;
                page-break-after: always;
            }
            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 0;
                padding-top: 0;
                font-size: 12pt;
            }
            .header img {
                width: 80px;
            }
            .no-print {
                display: none;
            }
        }

        /* Default Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12pt;
            background-color: white; /* Set background to white */
        }
        .container {
            padding: 10px 20px;
            box-sizing: border-box;
        }
        .scroll-container {
            max-height: 600px; /* Adjust this height as needed */
            overflow-y: auto;
            box-sizing: border-box;
            padding: 10px 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0 0 10px;
            padding-top: 10px;
            font-size: 14pt;
        }
        .header h1 {
            margin: 0;
            line-height: 1.2;
            color: #32AFF6; /* Set color to hex #32AFF6 */
        }
        .header p {
            margin: 0;
            line-height: 1.2;
        }
        .details, .breakdown {
            margin-bottom: 10px;
        }
        .details table, .breakdown table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .details th, .breakdown th, .details td, .breakdown td {
            border: 1px solid #000000;
            padding: 6px;
            text-align: left;
            font-size: 10pt;
        }
        .details th, .breakdown th {
            background-color: #0F6296; /* Consistent header color */
            color: white; /* Consistent text color */
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
            font-size: 10pt;
        }
        .button-container {
            margin: 20px 0;
            text-align: center;
        }
        .button-container button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            color: white;
            background-color: #0F6296; /* Consistent button color */
            font-size: 12pt;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="button-container no-print">
            <a class="text-white btn btn-primary" href="{{ url('aeternitas/payslip/'.$employee->id.'/generate') }}">Download</a>
            <a class="text-white btn btn-primary" href="{{ url('aeternitas/payslip/'.$employee->id) }}" target="_blank">View  Employee</a>
            <a class="text-white btn btn-primary" href="{{ url('aeternitas/payslip/'.$employee->id.'/mail') }}" target="_blank">Send Email to Employee</a>
        </div>

        <div class="scroll-container">
            {{-- <div class="header">
                <div>
                    <h1>ETERNAL BRIGHT SANCTUARY, INC.</h1>
                    <p>Blk. 44 Lot 5 & 6, Commonwealth Ave.,</p>
                    <p>Brgy. Batasan Hills, Quezon City, Metro Manila, Philippines</p>
                </div>
            </div> --}}

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
                    <tr>
                        <th>Payroll Period</th>
                        <td>
                            @php
                                // Extract start and end dates from payrollperiod
                                $dates = explode(' - ', $employee->payrollperiod);
                                $start = \Carbon\Carbon::parse($dates[0])->format('F d, Y');
                                $end = \Carbon\Carbon::parse($dates[1])->format('F d, Y');
                            @endphp
                            {{ $start }} - {{ $end }}
                        </td>
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
                            <td class="total">NET PAY:</td>
                            <td class="total">₱{{ number_format($employee->netpay , 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

@endsection
