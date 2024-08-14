@extends('layouts.hrdepartment')

@section('title', 'Employee List | Aeternitas')

@section('content')
    <div class="row">
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="rounded card">
          <div class="bg-white card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Employee List</h4>

                <!-- Sorting by Payroll Period -->
                <form method="GET" action="{{ route('debitmemo.index') }}">
                    <select name="payrollperiod" class="form-select" onchange="this.form.submit()">
                        <option value="">Select Payroll Period</option>
                        @foreach($payrollPeriods as $period)
                            @php
                                $formattedStart = \Carbon\Carbon::parse($period->startpayrollperiod)->format('F d, Y');
                                $formattedEnd = \Carbon\Carbon::parse($period->endpayrollperiod)->format('F d, Y');
                                $payrollPeriodValue = $formattedStart . ' - ' . $formattedEnd;
                            @endphp
                            <option value="{{ $period->startpayrollperiod . ' - ' . $period->endpayrollperiod }}" {{ $selectedPeriod == $period->startpayrollperiod . ' - ' . $period->endpayrollperiod ? 'selected' : '' }}>
                                {{ $payrollPeriodValue }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
          </div>

          <div class="card-body">
            <table id="dataTable" class="table table-bordered table-stripped table-hover removeShowEntry">
                <thead>
                    <tr>
                        <th>ID NUMBER</th>
                        <th>NAME</th>
                        <th>Payroll period</th>
                        <th>NETPAY</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalNetPay = 0;
                    @endphp
                    @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->custom_id }}</td>
                        <td>{{ $employee->last_name }}, {{ $employee->first_name }}</td>
                        <td>
                            @php
                                $employeePeriod = explode(' - ', $employee->payrollperiod);
                                $formattedStart = \Carbon\Carbon::parse($employeePeriod[0])->format('F d, Y');
                                $formattedEnd = \Carbon\Carbon::parse($employeePeriod[1])->format('F d, Y');
                            @endphp
                            {{ $formattedStart }} - {{ $formattedEnd }}
                        </td>
                        <td class="total">₱{{ number_format($employee->netpay, 2) }}</td>
                    </tr>
                    @php
                        $totalNetPay += $employee->netpay;
                    @endphp
                    @empty
                    <tr>
                        <td colspan="4">No Employees Available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Display Total Net Pay -->
            <div class="mt-3">
                <h5>Total Net Pay: ₱{{ number_format($totalNetPay, 2) }}</h5>
            </div>

          </div>
        </div>
    </div>
@endsection
