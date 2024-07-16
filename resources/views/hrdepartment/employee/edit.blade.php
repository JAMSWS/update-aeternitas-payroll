@extends('layouts.hrdepartment')

@section('title', 'Edit Employee | Aeternitas')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Employee
                    <a href="{{ url('aeternitas/employee') }}" class="text-white btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('aeternitas/employee/'.$employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <hr>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="timekeeping-tab" data-bs-toggle="tab" data-bs-target="#timekeeping-tab-pane" type="button" role="tab" aria-controls="timekeeping-tab-pane" aria-selected="false"> Regular Worked Days</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="leave-tab" data-bs-toggle="tab" data-bs-target="#leave-tab-pane" type="button" role="tab" aria-controls="leave-tab-pane" aria-selected="false"> Leave</button>
                        </li>


                    </ul>


                    <div class="container">
                        <div class="tab-content" id="myTabContent">
                            <div class="p-3 border tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">


                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="text-success">Employee Details</h2>
                                        <div class="mb-3">
                                            <label>Employee ID</label>
                                            <input type="text" name="custom_id" value="{{ $employee->custom_id }}" class="form-control" required readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Middle Name</label>
                                            <input type="text" name="suffix" class="form-control" value="{{ $employee->suffix }}" placeholder="Optional">
                                        </div>
                                        <div class="mb-3">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Sex</label>
                                            <select name="sex" class="form-control">
                                                <option value="Male" {{ $employee->sex == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ $employee->sex == 'Female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Home Address</label>
                                            <input type="text" name="current_address" value="{{ $employee->current_address }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Email Address</label>
                                            <input type="email" name="email_address" value="{{ $employee->email_address }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Phone Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text">+63</span>
                                                <input type="text" name="phone_number" value="{{ ($employee->phone_number) }}" class="form-control" placeholder="Enter 10 digit phone number Ex. 9123456789">
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-6">
                                        <h2 class="text-success">Summary Details</h2>
                                        <div class="mb-3">
                                            <label>Department</label>
                                            <select name="department_name" class="form-control">
                                                @foreach ($department as $departments)
                                                <option value="{{ $departments->department }}" {{ $employee->department_name == $departments->department ? 'selected' : '' }}>{{ $departments->department }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Position</label>
                                            <select name="position_name" class="form-control">
                                                @foreach ($position as $positions)
                                                <option value="{{ $positions->position }}" {{ $employee->position_name == $positions->position ? 'selected' : '' }}>{{ $positions->position }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Basic Pay (₱)</label>
                                            <select name="basic_pay" id="basic_pay" class="form-control" required>
                                                <option value="16000.00" {{ $employee->basic_pay == '16000.00' ? 'selected' : '' }}>₱16,000.00</option>
                                                <option value="18000.00" {{ $employee->basic_pay == '18000.00' ? 'selected' : '' }}>₱18,000.00</option>
                                                <option value="20000.00" {{ $employee->basic_pay == '20000.00' ? 'selected' : '' }}>₱20,000.00</option>
                                                <option value="22000.00" {{ $employee->basic_pay == '22000.00' ? 'selected' : '' }}>₱22,000.00</option>
                                                <option value="25000.00" {{ $employee->basic_pay == '25000.00' ? 'selected' : '' }}>₱25,000.00</option>
                                                <option value="30000.00" {{ $employee->basic_pay == '30000.00' ? 'selected' : '' }}>₱30,000.00</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label>Monthly Allowance (₱)</label>

                                            <input type="number" id="allowance" name="allowance" value="{{ $employee->allowance }}" class="form-control" step="0.01" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Total Monthly (₱)</label>
                                            <input type="number" id="total_salary" name="per_month" class="form-control" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label>Bi-Monthly Rate (₱)</label>
                                            <input type="number" id="bi_monthly_total_salary" name="per_bi_month" class="form-control" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label>Equivalent Daily Rate (₱)</label>
                                            <input type="number" id="daily_rate" name="per_day" class="form-control" readonly>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="p-3 border tab-pane fade" id="timekeeping-tab-pane" role="tabpanel" aria-labelledby="timekeeping-tab">
                                <!-- regular worked days Tab Content -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Timekeeping form fields -->
                                        <div class="mb-3">
                                            <label>Daily Rate (₱)</label>
                                            <input type="number" id="daily_rate"  value="{{ $employee->per_day  }}" class="form-control" readonly>
                                        </div>
                                        <div class="mb-3">
                                            {{-- <h2 class="text-success">Time Keeping</h2> --}}
                                            <!-- Add your timekeeping fields here -->
                                            <label for="month_rate_paid_days">Month Rate Paid Days</label>
                                            <input type="number" id="month_rate_paid_days" name="actual_days_worked" value="13"  class="form-control" readonly>
                                            <!-- Add more fields as necessary -->

                                        </div>

                                        <div class="mb-3">
                                            <label>ABSENCES (Input per day, 0.50 = Half Day)</label>
                                            <input type="number" id="absences" step="0.01" name="absences" value="{{ $employee->absences  }}" placeholder="Leave it blank if None" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>VL/SL (Input per day, 0.50 = Half Day)</label>
                                            <input type="number" id="vlsl" step="0.01" name="vlsl"  value="{{ $employee->vlsl  }}" placeholder="Leave it blank if None" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>Regular Worked Days </label>
                                            <input type="number" id="regular_worked_days"  value="#" class="form-control" Readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label>Amount (₱)</label>
                                            <input type="number" id="rwd_amount" name="rwd_amount" value="#" class="form-control" Readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3 border tab-pane fade" id="leave-tab-pane" role="tabpanel" aria-labelledby="leave-tab">
                                <div class="mb-3">
                                    <label>Daily Rate (₱) </label>
                                    <input type="number" id="daily_rate"  value="{{ $employee->per_day }}" class="form-control" Readonly>
                                </div>

                                <div class="mb-3">
                                    <label>USED (Current Cut-off) </label>
                                    <input type="number" id="used_current_cut_off" value="{{ $employee->vlsl  }}" class="form-control" Readonly>
                                </div>

                                <div class="mb-3">
                                    <label>Leave Amount (₱)</label>
                                    <input type="number" id="leave_amount" name="leave_amount"  value="#" class="form-control" Readonly>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="mt-3 text-white btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@push('scripts')


<script>
    // Calculate and display total monthly and bi-monthly totals
    function calculateTotals() {
        var basicPay = parseFloat(document.getElementById('basic_pay').value);
        var allowance = parseFloat(document.getElementById('allowance').value);

        if (!isNaN(basicPay) && !isNaN(allowance)) {
            var totalMonthly = basicPay + allowance;
            var biMonthlyTotal = basicPay / 2;

            document.getElementById('total_salary').value = totalMonthly.toFixed(2);
            document.getElementById('bi_monthly_total_salary').value = biMonthlyTotal.toFixed(2);
        }
    }

    // Calculate and display equivalent daily rate
    function calculateDailyRate() {
        var basicPay = parseFloat(document.getElementById('basic_pay').value);

        if (!isNaN(basicPay)) {
            var dailyRate = (basicPay * 12) / 313;
            document.getElementById('daily_rate').value = dailyRate.toFixed(2);
        }
    }

    // Calculate and display Regular Worked Days
    function calculateRegularWorkedDays() {
        var monthRatePaidDays = parseFloat(document.getElementById('month_rate_paid_days').value);
        var absences = parseFloat(document.getElementById('absences').value) || 0;

        if (!isNaN(monthRatePaidDays) && !isNaN(absences)) {
            var regularWorkedDays = monthRatePaidDays - absences;
            document.getElementById('regular_worked_days').value = regularWorkedDays.toFixed(2);
        }
    }
 // Calculate and display Leave
    function calculateLeaveAmount() {
        var dailyRate = parseFloat(document.getElementById('daily_rate').value);
        var usedCurrentCutOff = parseFloat(document.getElementById('used_current_cut_off').value) || 0;

        if (!isNaN(dailyRate) && !isNaN(usedCurrentCutOff)) {
            var leaveAmount = dailyRate * usedCurrentCutOff;
            document.getElementById('leave_amount').value = leaveAmount.toFixed(2);
        }
    }

    //Calculate and display rwd amount

    function calculateFinalAmount() {
        var biMonthlyRate = parseFloat(document.getElementById('bi_monthly_total_salary').value);
        var leaveAmount = parseFloat(document.getElementById('leave_amount').value);
        var monthRatePaidDays = parseFloat(document.getElementById('month_rate_paid_days').value);
        var regularWorkedDays = parseFloat(document.getElementById('regular_worked_days').value);
        var vlsl = parseFloat(document.getElementById('vlsl').value) || 0;
        var dailyRate = parseFloat(document.getElementById('daily_rate').value);

        if (!isNaN(biMonthlyRate) && !isNaN(leaveAmount) && !isNaN(monthRatePaidDays) && !isNaN(regularWorkedDays) && !isNaN(vlsl) && !isNaN(dailyRate)) {
            var finalAmount = (biMonthlyRate - leaveAmount) - ((monthRatePaidDays - regularWorkedDays - vlsl) * dailyRate);
            document.getElementById('rwd_amount').value = finalAmount.toFixed(2);
        }
    }

    // Initial calculation on page load
    calculateTotals();
    calculateDailyRate();
    calculateRegularWorkedDays();
    calculateLeaveAmount();
    calculateFinalAmount();

    // // Event listeners to recalculate on change
    // document.getElementById('basic_pay').addEventListener('change', function() {
    //     calculateTotals();
    //     calculateDailyRate();
    // });
    // document.getElementById('allowance').addEventListener('input', calculateTotals);
    // document.getElementById('absences').addEventListener('input', calculateRegularWorkedDays);
    // document.getElementById('vlsl').addEventListener('input', calculateLeaveAmount);



    // Event listeners to recalculate on change
    document.getElementById('basic_pay').addEventListener('change', function() {
        calculateTotals();
        calculateDailyRate();
        calculateFinalAmount();
    });
    document.getElementById('allowance').addEventListener('input', function() {
        calculateTotals();
        calculateFinalAmount();
    });
    document.getElementById('absences').addEventListener('input', function() {
        calculateRegularWorkedDays();
        calculateFinalAmount();
    });
    document.getElementById('vlsl').addEventListener('input', function() {
        calculateLeaveAmount();
        calculateFinalAmount();
    });
</script>







@endsection



