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
                            <button class="nav-link" id="timekeeping2-tab" data-bs-toggle="tab" data-bs-target="#timekeeping2-tab-pane" type="button" role="tab" aria-controls="timekeeping2-tab-pane" aria-selected="false"> Time Keeping</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Legal-tab" data-bs-toggle="tab" data-bs-target="#Legal-tab-pane" type="button" role="tab" aria-controls="Legal-tab-pane" aria-selected="false"> Legal Worked Days</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Special-tab" data-bs-toggle="tab" data-bs-target="#special-tab-pane" type="button" role="tab" aria-controls="special-tab-pane" aria-selected="false"> Special Worked Days</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="OT-tab" data-bs-toggle="tab" data-bs-target="#OT-tab-pane" type="button" role="tab" aria-controls="OT-tab-pane" aria-selected="false"> Overtime </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nd-tab" data-bs-toggle="tab" data-bs-target="#nd-tab-pane" type="button" role="tab" aria-controls="nd-tab-pane" aria-selected="false"> Night Differential</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="leave-tab" data-bs-toggle="tab" data-bs-target="#leave-tab-pane" type="button" role="tab" aria-controls="leave-tab-pane" aria-selected="false"> Leave</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="late-tab" data-bs-toggle="tab" data-bs-target="#late-tab-pane" type="button" role="tab" aria-controls="late-tab-pane" aria-selected="false"> Late Deduction</button>
                        </li>





                    </ul>


                    <div class="container">
                        <div class="tab-content" id="myTabContent">
                            <div class="p-3 border tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab">


                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="text-success">Employee Details</h2> <hr>
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
                                        <h2 class="text-success">Summary Details</h2> <hr>
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
                                            <label>Monthly Pay (₱)</label>
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

                                        <div class="mb-3">
                                            <label>Total Worked Days</label>
                                            <input type="number" id="total_worked_days" name="total_worked_days" class="form-control" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label>Basic Pay (₱)</label>
                                            <input type="number" id="total_basic_pay" name="total_basic_pay" value="{{ $employee->total_basic_pay }}" class="form-control" readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label>Basic Pay + OT (₱) <i class="text text-danger"> Make Sure to update double times to calculate the amount!</i></label>
                                            <input type="number" id="total_basic_pay_plus_ot" name="total_basic_pay_plus_ot" value="#" class="form-control" readonly>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- Regular worked days --}}
                            <div class="p-3 border tab-pane fade" id="timekeeping-tab-pane" role="tabpanel" aria-labelledby="timekeeping-tab">
                                <!-- regular worked days Tab Content -->
                                <h2 class="text-success">Regular Worked Days</h2> <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="mb-3">
                                            <label>Daily Rate (₱)</label>
                                            <input type="number" id="daily_rate"  value="{{ $employee->per_day  }}" class="form-control" readonly>
                                        </div>


                                        <div class="mb-3">
                                            <label>Regular Worked Days (No. OF DAYS)</label>
                                            <input type="number" id="regular_worked_days" name="regular_worked_days" value="{{ $employee->regular_worked_days }}" class="form-control" Readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label>ABSENCES (Input per day, 0.50 = Half Day)</label>
                                            <input type="number" id="absences" step="0.01" name="absences" value="{{ $employee->absences  }}" placeholder="Leave it blank if None" class="form-control">
                                        </div>

                                        <div class="mb-3">

                                            <label>Amount (₱)</label>  <i class="text text-danger">*Make Sure to update double times to calculate the amount!*</i>
                                            <input type="number" id="rwd_amount" name="rwd_amount" value="#" class="form-control" Readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Legal worked days Tab --}}
                            <div class="p-3 border tab-pane fade" id="Legal-tab-pane" role="tabpanel" aria-labelledby="Legal-tab">
                                <!-- Legal worked days Tab Content -->
                                <h2 class="text-success">Legal Worked Days</h2> <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">

                                            <label>LH Rate (₱)</label>
                                            <input type="number" id="daily_rate"  value="{{ $employee->per_day  }}" class="form-control" readonly>

                                            <label>Legal Holiday Worked Days (No. OF DAYS)</label>
                                            <input type="number" id="legal_worked_days" name="legal_worked_days" step="0.01" placeholder="Leave it blank if None"  value="{{ $employee->legal_worked_days  }}" class="form-control">

                                            <label>Total Amount (₱)</label>
                                            <input type="number" id="lhd_amount" name="lhd_amount" step="0.01"   value="{{ $employee->lhd_amount  }}" class="form-control" readonly>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Special worked days Tab --}}
                            <div class="p-3 border tab-pane fade" id="special-tab-pane" role="tabpanel" aria-labelledby="special-tab">
                                <!-- Special worked days Tab Content -->
                                <h2 class="text-success">Special Worked Days</h2> <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label>SNH Rate (₱)</label>
                                            <input type="number" id="special_rate" name="special_rate" value="{{ $employee->special_rate  }}" class="form-control" readonly>

                                            <label>Special Holiday Worked Days (No. OF DAYS)</label>
                                            <input type="number" id="special_worked_days" name="special_worked_days" step="0.01" placeholder="Leave it blank if None" value="{{ $employee->special_worked_days  }}" class="form-control">

                                            <label>Total Amount (₱)</label>
                                            <input type="number" id="special_amount" name="special_amount" step="0.01" value="{{ $employee->special_amount  }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Time keeping Tab --}}
                            <div class="p-3 border tab-pane fade" id="timekeeping2-tab-pane" role="tabpanel" aria-labelledby="timekeeping2-tab">
                                <!-- regular worked days Tab Content -->
                                <h2 class="text-success">Time Keeping</h2> <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Timekeeping form fields -->


                                        <div class="mb-3">
                                            <!-- Add your timekeeping fields here -->
                                            <label for="month_rate_paid_days">Month Rate Paid Days</label>
                                            <input type="number" id="month_rate_paid_days" name="actual_days_worked" value="13"  class="form-control" readonly>
                                        </div>

                                        {{-- <div class="mb-3">
                                            <label>Legal Holiday Worked (Input per day)</label>
                                            <input type="number" id="#" step="0.01" name="#"  value="#" placeholder="Leave it blank if None" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>Special Holiday Worked (Input per day)</label>
                                            <input type="number" id="#" step="0.01" name="#"  value="#" placeholder="Leave it blank if None" class="form-control">
                                        </div> --}}

                                        <div class="mb-3">
                                            <label>Vacation Leave/Sick Leave <i class="text text-danger"> (Input per day, 0.50 = Half Day) </i></label>
                                            <input type="number" id="vlsl" step="0.01" name="vlsl"  value="{{ $employee->vlsl  }}" placeholder="Leave it blank if None" class="form-control">
                                        </div>

                                        {{-- <div class="mb-3">
                                            <label for="month_rate_paid_days">Overtime 25% <i class="text text-danger">  (Input per Hour)</i> </label>
                                            <input type="number" id="#" name="#" value="#"  class="form-control">
                                        </div> --}}

                                    </div>
                                </div>
                            </div>

                            {{-- Overtime tab --}}

                            <div class="p-3 border tab-pane fade" id="OT-tab-pane" role="tabpanel" aria-labelledby="OT-tab">
                                <h2 class="text-success">Overtime</h2> <hr>

                                {{-- 25% rate --}}
                                <div class="mb-3">
                                    <label>Regular Overtime Rate <I class="text text-danger">25%</I>  (₱)  </label>
                                    <input type="number" id="overtime_rate25" name="overtime_rate25" value="{{ $employee->overtime_rate25  }}" class="form-control" Readonly>

                                    <label>OT Hours </label>
                                    <input type="number" id="ot_hours25" name="ot_hours25"   value="{{ $employee->ot_hours25  }}" class="form-control" >

                                    <label>OT Amount </label>
                                    <input type="number" id="ot_amount25" name="ot_amount25"  value="{{ $employee->ot_amount25  }}"  class="form-control" readonly>

                                </div>

                                <hr>

                                {{-- 30% rate --}}
                                <div class="mb-3">
                                    <label> Special Overtime Rate <I class="text text-danger">30%</I>  (₱)  </label>
                                    <input type="number" id="overtime_rate30" name="overtime_rate30" value="{{ $employee->overtime_rate30  }}" class="form-control" Readonly>

                                    <label>OT Hours </label>
                                    <input type="number" id="ot_hours30" name="ot_hours30"   value="{{ $employee->ot_hours30  }}" class="form-control" >

                                    <label>OT Amount </label>
                                    <input type="number" id="ot_amount30" name="ot_amount30"   value="{{ $employee->ot_amount30  }}" class="form-control" readonly>
                                </div>

                                <hr>

                                {{-- 100% rate --}}
                                <div class="mb-3">
                                    <label>Legal Overtime Rate <I class="text text-danger">100%</I>  (₱)  </label>
                                    <input type="number" id="overtime_rate100" name="overtime_rate100" value="{{ $employee->overtime_rate100  }}" class="form-control" Readonly>

                                    <label>OT Hours </label>
                                    <input type="number" id="ot_hours100" name="ot_hours100"   value="{{ $employee->ot_hours100  }}" class="form-control" >

                                    <label>OT Amount </label>
                                    <input type="number" id="ot_amount100" name="ot_amount100"   value="{{ $employee->ot_amount100  }}" class="form-control" readonly>
                                </div>

                                <hr>

                                <div class="mb-3">

                                    <label>Total OT Amount (₱) </label>
                                    <input type="number" id="total_ot" name="total_ot"  value="{{ $employee->total_ot }}" class="form-control" readonly>
                                </div>


                            </div>

                            {{-- OT tab --}}


                            {{-- Night Differential --}}
                            <div class="p-3 border tab-pane fade" id="nd-tab-pane" role="tabpanel" aria-labelledby="nd-tab">
                                <h2 class="text-success">Night Differential</h2> <hr>
                                <div class="mb-3">
                                    <label>10% OF RATE/Hour  (₱)  </label>
                                    <input type="number" id="nd_rate" name="nd_rate" value="{{ $employee->nd_rate  }}" class="form-control" Readonly>

                                    <label>ND Hours </label>
                                    <input type="number" id="nd_hours" name="nd_hours"   value="{{ $employee->nd_hours  }}" class="form-control" >

                                    <label>ND Amount </label>
                                    <input type="number" id="nd_amount" name="nd_amount"   value="{{ $employee->nd_amount  }}" class="form-control" readonly>
                                </div>
                            </div>
                            {{-- Leave tab --}}
                            <div class="p-3 border tab-pane fade" id="leave-tab-pane" role="tabpanel" aria-labelledby="leave-tab">
                                <h2 class="text-success">Leave</h2> <hr>
                                <div class="mb-3">
                                    <label>Daily Rate (₱) </label>
                                    <input type="number" id="daily_rate"  value="{{ $employee->per_day }}" class="form-control" Readonly>
                                </div>

                                <div class="mb-3">
                                    <label>Credit Points</label>
                                    <input type="number" id="#"  value="#" class="form-control" readonly>
                                </div>

                                <div class="mb-3">
                                    <label>USED (Current Cut-off) </label>
                                    <input type="number" id="used_current_cut_off" value="{{ $employee->vlsl  }}" class="form-control" Readonly>
                                </div>

                                <div class="mb-3">
                                    <label>Leave Amount (₱)</label>
                                    <input type="number" id="leave_amount" name="leave_amount"  value="{{ $employee->leave_amount }}" class="form-control" Readonly>
                                </div>
                            </div>

                            {{-- Late deduction tab --}}
                            <div class="p-3 border tab-pane fade" id="late-tab-pane" role="tabpanel" aria-labelledby="late-tab">
                                <h2 class="text-success">Late Deduction</h2> <hr>
                                    <div class="mb-3">
                                        <label> Rate/Min (₱)</label>
                                        <input type="number" id="late_rate" name="late_rate" value="#" class="form-control" Readonly>

                                        <label> Number Of Minutes </label>
                                        <input type="number" id="number_of_minutes_late" name="number_of_minutes_late" value="#" class="form-control" >

                                        <label>Late Amount (₱)</label>
                                        <input type="number" id="late_amount" name="late_amount"   value="#" class="form-control" readonly>
                                    </div>

                                    <hr>

                                    <div class="mb-3">

                                        <label>Charges  ₱<i class="text text-danger"> Missing/Loss Item</i></label>
                                        <input type="number" id="missing_charges" name="missing_charges" value="#" class="form-control" >

                                        <label>Total Charges (₱)</label>
                                        <input type="number" id="total_charges" name="total_charges"   value="#" class="form-control" readonly>
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


{{-- <script>
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

    // Calculate and display RWD amount
    function calculateFinalAmount() {
        var biMonthlyRate = parseFloat(document.getElementById('bi_monthly_total_salary').value);
        var leaveAmount = parseFloat(document.getElementById('leave_amount').value);
        var monthRatePaidDays = parseFloat(document.getElementById('month_rate_paid_days').value);
        var regularWorkedDays = parseFloat(document.getElementById('regular_worked_days').value);
        var usedCurrentCutOff = parseFloat(document.getElementById('used_current_cut_off').value);
        var dailyRate = parseFloat(document.getElementById('daily_rate').value);

        if (!isNaN(biMonthlyRate) && !isNaN(leaveAmount) && !isNaN(monthRatePaidDays) && !isNaN(regularWorkedDays) && !isNaN(usedCurrentCutOff) && !isNaN(dailyRate)) {
            var finalAmount = (biMonthlyRate - leaveAmount) - ((monthRatePaidDays - regularWorkedDays - usedCurrentCutOff) * dailyRate);
            document.getElementById('rwd_amount').value = finalAmount.toFixed(2);
        }
    }

    // Calculate and display Legal Holiday amount
    function calculateLhdAmount() {
        var legalWorkedDays = parseFloat(document.getElementById('legal_worked_days').value);
        var dailyRate = parseFloat(document.getElementById('daily_rate').value);

        if (!isNaN(legalWorkedDays) && !isNaN(dailyRate)) {
            var lhdAmount = legalWorkedDays * dailyRate * 1;
            document.getElementById('lhd_amount').value = lhdAmount.toFixed(2);
        }
    }

    // Calculate and display Special Holiday amount
    function calculateSpecialAmount() {
        var specialWorkedDays = parseFloat(document.getElementById('special_worked_days').value);
        var dailyRate = parseFloat(document.getElementById('daily_rate').value);

        if (!isNaN(specialWorkedDays) && !isNaN(dailyRate)) {
            var specialRate = dailyRate * 0.3;
            var specialAmount = specialRate * specialWorkedDays;
            document.getElementById('special_rate').value = specialRate.toFixed(2);
            document.getElementById('special_amount').value = specialAmount.toFixed(2);
        }
    }

    // Total worked days
    function calculateTotalWorkedDays() {
        var regularWorkedDays = parseFloat(document.getElementById('regular_worked_days').value);
        var legalWorkedDays = parseFloat(document.getElementById('legal_worked_days').value);
        var specialWorkedDays = parseFloat(document.getElementById('special_worked_days').value);
        var totalWorkedDays = 0;

        if (!isNaN(regularWorkedDays)) {
            totalWorkedDays += regularWorkedDays;
        }
        if (!isNaN(legalWorkedDays)) {
            totalWorkedDays += legalWorkedDays;
        }
        if (!isNaN(specialWorkedDays)) {
            totalWorkedDays += specialWorkedDays;
        }

        document.getElementById('total_worked_days').value = totalWorkedDays.toFixed(2);
    }

    // Calculate total basic pay
    function calculateTotalBasicPay() {
        var totalRegularDays = parseFloat(document.getElementById('rwd_amount').value);
        var totalLegalDays = parseFloat(document.getElementById('lhd_amount').value);
        var totalSpecialDays = parseFloat(document.getElementById('special_amount').value);

        var totalBasicPay = totalRegularDays + totalLegalDays + totalSpecialDays;

        document.getElementById('total_basic_pay').value = totalBasicPay.toFixed(2);
    }

    // Overtime rates and amounts
    function calculateOvertimeRate25() {
        var dailyRate = parseFloat(document.getElementById('daily_rate').value) || 0;
        var overtimeRate25 = (dailyRate / 8) * 1.25;
        document.getElementById('overtime_rate25').value = overtimeRate25.toFixed(2);
    }

    function calculateOTAmount25() {
        var overtimeRate25 = parseFloat(document.getElementById('overtime_rate25').value) || 0;
        var otHours25 = parseFloat(document.getElementById('ot_hours25').value) || 0;
        var otAmount25 = overtimeRate25 * otHours25;
        document.getElementById('ot_amount25').value = otAmount25.toFixed(2);
        calculateTotalOTAmount(); // Recalculate total OT amount whenever 25% OT amount changes
    }

    function calculateOvertimeRate30() {
        var dailyRate = parseFloat(document.getElementById('daily_rate').value) || 0;
        var overtimeRate30 = (dailyRate / 8) * 0.30;
        document.getElementById('overtime_rate30').value = overtimeRate30.toFixed(2);
    }

    function calculateOTAmount30() {
        var overtimeRate30 = parseFloat(document.getElementById('overtime_rate30').value) || 0;
        var otHours30 = parseFloat(document.getElementById('ot_hours30').value) || 0;
        var otAmount30 = overtimeRate30 * otHours30;
        document.getElementById('ot_amount30').value = otAmount30.toFixed(2);
        calculateTotalOTAmount(); // Recalculate total OT amount whenever 30% OT amount changes
    }

    function calculateOvertimeRate100() {
        var dailyRate = parseFloat(document.getElementById('daily_rate').value) || 0;
        var overtimeRate100 = (dailyRate / 8) * 1;
        document.getElementById('overtime_rate100').value = overtimeRate100.toFixed(2);
    }

    function calculateOTAmount100() {
        var overtimeRate100 = parseFloat(document.getElementById('overtime_rate100').value) || 0;
        var otHours100 = parseFloat(document.getElementById('ot_hours100').value) || 0;
        var otAmount100 = overtimeRate100 * otHours100;
        document.getElementById('ot_amount100').value = otAmount100.toFixed(2);
        calculateTotalOTAmount(); // Recalculate total OT amount whenever 100% OT amount changes
    }

    function calculateTotalOTAmount() {
        var otAmount25 = parseFloat(document.getElementById('ot_amount25').value) || 0;
        var otAmount30 = parseFloat(document.getElementById('ot_amount30').value) || 0;
        var otAmount100 = parseFloat(document.getElementById('ot_amount100').value) || 0;
        var totalOTAmount = otAmount25 + otAmount30 + otAmount100;
        document.getElementById('total_ot').value = totalOTAmount.toFixed(2);
        calculateTotalBasicPayPlusOT(); // Recalculate Basic Pay + OT whenever total OT amount changes
    }

    function calculateTotalBasicPayPlusOT() {
        var totalBasicPay = parseFloat(document.getElementById('total_basic_pay').value) || 0;
        var totalOTAmount = parseFloat(document.getElementById('total_ot').value) || 0;
        var totalBasicPayPlusOT = totalBasicPay + totalOTAmount;
        document.getElementById('total_basic_pay_plus_ot').value = totalBasicPayPlusOT.toFixed(2);
        calculateTotalDeductions(); // Ensure deductions are recalculated when total basic pay plus OT changes
    }


    function calculateUndertimeDeduction() {
        var totalUndertimeHours = parseFloat(document.getElementById('ut').value) || 0;
        var dailyRate = parseFloat(document.getElementById('daily_rate').value) || 0;
        var undertimeDeduction = (dailyRate / 8) * totalUndertimeHours;
        document.getElementById('ut_deduction').value = undertimeDeduction.toFixed(2);
        calculateTotalDeductions(); // Ensure total deductions are recalculated when undertime deduction changes
    }

    function calculateTardinessDeduction() {
        var totalTardinessMinutes = parseFloat(document.getElementById('total_tardiness').value) || 0;
        var dailyRate = parseFloat(document.getElementById('daily_rate').value) || 0;
        var tardinessDeduction = (dailyRate / 480) * totalTardinessMinutes;
        document.getElementById('tardiness_deduction').value = tardinessDeduction.toFixed(2);
        calculateTotalDeductions(); // Ensure total deductions are recalculated when tardiness deduction changes
    }

    function calculateTotalDeductions() {
        var utDeduction = parseFloat(document.getElementById('ut_deduction').value) || 0;
        var tardinessDeduction = parseFloat(document.getElementById('tardiness_deduction').value) || 0;
        var totalDeductions = utDeduction + tardinessDeduction;
        document.getElementById('total_deductions').value = totalDeductions.toFixed(2);
        calculateTotalNetBasicPay(); // Ensure net basic pay is recalculated when total deductions change
    }

    function calculateTotalNetBasicPay() {
        var totalBasicPayPlusOT = parseFloat(document.getElementById('total_basic_pay_ot').value) || 0;
        var totalDeductions = parseFloat(document.getElementById('total_deductions').value) || 0;
        var totalNetBasicPay = totalBasicPayPlusOT - totalDeductions;
        document.getElementById('total_net_basic_pay').value = totalNetBasicPay.toFixed(2);
    }

    // Calculate and display Charges Amount
    function calculateCharges() {
        var missingLostQty = parseFloat(document.getElementById('missing_lost_qty').value) || 0;
        var chargesAmount = parseFloat(document.getElementById('charges_amount').value) || 0;
        var totalCharges = missingLostQty * chargesAmount;
        document.getElementById('total_charges').value = totalCharges.toFixed(2);
    }

    function calculateNightDifferentialRate() {
        var dailyRate = parseFloat(document.getElementById('daily_rate').value) || 0;
        var ndRate = (dailyRate / 8) * 0.1;
        document.getElementById('nd_rate').value = ndRate.toFixed(2);
    }

    function calculateNDAmount() {
        var ndRate = parseFloat(document.getElementById('nd_rate').value) || 0;
        var ndHours = parseFloat(document.getElementById('nd_hours').value) || 0;
        var ndAmount = ndRate * ndHours;
        document.getElementById('nd_amount').value = ndAmount.toFixed(2);
    }

    document.getElementById('basic_pay').addEventListener('input', function() {
        calculateTotals();
        calculateDailyRate();
    });

    document.getElementById('allowance').addEventListener('input', function() {
        calculateTotals();
    });

    document.getElementById('month_rate_paid_days').addEventListener('input', function() {
        calculateRegularWorkedDays();
        calculateFinalAmount();
    });

    document.getElementById('absences').addEventListener('input', function() {
        calculateRegularWorkedDays();
        calculateFinalAmount();
    });

    document.getElementById('used_current_cut_off').addEventListener('input', function() {
        calculateLeaveAmount();
        calculateFinalAmount();
    });

    document.getElementById('daily_rate').addEventListener('input', function() {
        calculateFinalAmount();
        calculateLeaveAmount();
        calculateOvertimeRate25();
        calculateOvertimeRate30();
        calculateOvertimeRate100();
        calculateUndertimeDeduction();
        calculateTardinessDeduction();
    });

    document.getElementById('legal_worked_days').addEventListener('input', function() {
        calculateLhdAmount();
        calculateTotalWorkedDays();
        calculateTotalBasicPay();
    });

    document.getElementById('special_worked_days').addEventListener('input', function() {
        calculateSpecialAmount();
        calculateTotalWorkedDays();
        calculateTotalBasicPay();
    });

    document.getElementById('ot_hours25').addEventListener('input', function() {
        calculateOTAmount25();
    });

    document.getElementById('ot_hours30').addEventListener('input', function() {
        calculateOTAmount30();
    });

    document.getElementById('ot_hours100').addEventListener('input', function() {
        calculateOTAmount100();
    });

    document.getElementById('ut').addEventListener('input', function() {
        calculateUndertimeDeduction();
    });

    document.getElementById('total_tardiness').addEventListener('input', function() {
        calculateTardinessDeduction();
    });

    document.getElementById('missing_lost_qty').addEventListener('input', function() {
        calculateCharges();
    });

    document.getElementById('charges_amount').addEventListener('input', function() {
        calculateCharges();
    });

    // Calculate ND amount when ND hours change
    document.getElementById('nd_hours').addEventListener('input', function() {
            calculateNDAmount();
    });

    // Initialize calculations on page load
    window.addEventListener('DOMContentLoaded', function() {
        calculateTotals();
        calculateDailyRate();
        calculateRegularWorkedDays();
        calculateLeaveAmount();
        calculateFinalAmount();
        calculateLhdAmount();
        calculateSpecialAmount();
        calculateTotalWorkedDays();
        calculateTotalBasicPay();
        calculateOvertimeRate25();
        calculateOvertimeRate30();
        calculateOvertimeRate100();
        calculateOTAmount25();
        calculateOTAmount30();
        calculateOTAmount100();
        calculateNightDifferentialRate();
        calculateNDAmount();
        calculateUndertimeDeduction();
        calculateTardinessDeduction();
        calculateTotalDeductions();
        calculateTotalNetBasicPay();
        calculateCharges();
        calculateTotalBasicPayPlusOT();

    });
</script> --}}

{{-- old script up to late deduction function july 22 2:40pm --}}
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

    // function calculateFinalAmount() {
    //     var biMonthlyRate = parseFloat(document.getElementById('bi_monthly_total_salary').value);
    //     var leaveAmount = parseFloat(document.getElementById('leave_amount').value);
    //     var monthRatePaidDays = parseFloat(document.getElementById('month_rate_paid_days').value);
    //     var regularWorkedDays = parseFloat(document.getElementById('regular_worked_days').value);
    //     var vlsl = parseFloat(document.getElementById('vlsl').value) || 0;
    //     var dailyRate = parseFloat(document.getElementById('daily_rate').value);

    //     if (!isNaN(biMonthlyRate) && !isNaN(leaveAmount) && !isNaN(monthRatePaidDays) && !isNaN(regularWorkedDays) && !isNaN(vlsl) && !isNaN(dailyRate)) {
    //         var finalAmount = (biMonthlyRate - leaveAmount) - ((monthRatePaidDays - regularWorkedDays - vlsl) * dailyRate);
    //         document.getElementById('rwd_amount').value = finalAmount.toFixed(2);
    //     }
    // }

    //debug
    function calculateFinalAmount() {
        var biMonthlyRate = parseFloat(document.getElementById('bi_monthly_total_salary').value);
        var leaveAmount = parseFloat(document.getElementById('leave_amount').value);
        var monthRatePaidDays = parseFloat(document.getElementById('month_rate_paid_days').value);
        var regularWorkedDays = parseFloat(document.getElementById('regular_worked_days').value);
        var usedCurrentCutOff = parseFloat(document.getElementById('used_current_cut_off').value);

        var dailyRate = parseFloat(document.getElementById('daily_rate').value);

        if (!isNaN(biMonthlyRate) && !isNaN(leaveAmount) && !isNaN(monthRatePaidDays) && !isNaN(regularWorkedDays) && !isNaN(usedCurrentCutOff)  && !isNaN(dailyRate)) {
            var finalAmount = (biMonthlyRate - leaveAmount) - ((monthRatePaidDays - regularWorkedDays - usedCurrentCutOff) * dailyRate);
            document.getElementById('rwd_amount').value = finalAmount.toFixed(2);
        }
    }


    //Legal Holiday script

    function calculateLhdAmount() {
        var legalWorkedDays = parseFloat(document.getElementById('legal_worked_days').value);
        var dailyRate = parseFloat(document.getElementById('daily_rate').value);

        if (!isNaN(legalWorkedDays) && !isNaN(dailyRate)) {
            var lhdAmount = legalWorkedDays * dailyRate * 1;
            document.getElementById('lhd_amount').value = lhdAmount.toFixed(2);
        }
    }

    // Calculate and display Special Holiday amount
    function calculateSpecialAmount() {
        var specialWorkedDays = parseFloat(document.getElementById('special_worked_days').value);
        var dailyRate = parseFloat(document.getElementById('daily_rate').value);

        if (!isNaN(specialWorkedDays) && !isNaN(dailyRate)) {
            var specialRate = dailyRate * 0.3;
            var specialAmount = specialRate * specialWorkedDays;
            document.getElementById('special_rate').value = specialRate.toFixed(2);
            document.getElementById('special_amount').value = specialAmount.toFixed(2);
        }
    }
    // Total worked days
    function calculateTotalWorkedDays() {
        var regularWorkedDays = parseFloat(document.getElementById('regular_worked_days').value);
        var legalWorkedDays = parseFloat(document.getElementById('legal_worked_days').value);
        var specialWorkedDays = parseFloat(document.getElementById('special_worked_days').value);
        var totalWorkedDays = 0;
        if (!isNaN(regularWorkedDays)) {
            totalWorkedDays += regularWorkedDays;
        }
        if (!isNaN(legalWorkedDays)) {
            totalWorkedDays += legalWorkedDays;
        }
        if (!isNaN(specialWorkedDays)) {
            totalWorkedDays += specialWorkedDays;
        }
        document.getElementById('total_worked_days').value = totalWorkedDays.toFixed(2);
    }


    // total basic pay amount

    // Calculate total basic pay
    function calculateTotalBasicPay() {
        var totalRegularDays = parseFloat(document.getElementById('rwd_amount').value);
        var totalLegalDays = parseFloat(document.getElementById('lhd_amount').value);
        var totalSpecialDays = parseFloat(document.getElementById('special_amount').value);

        var totalBasicPay = totalRegularDays + totalLegalDays + totalSpecialDays;

        document.getElementById('total_basic_pay').value = totalBasicPay.toFixed(2);
    }


    function calculateOvertimeRate25() {
        var dailyRate = parseFloat(document.getElementById('daily_rate').value) || 0;
        var overtimeRate25 = (dailyRate / 8) * 1.25;
        document.getElementById('overtime_rate25').value = overtimeRate25.toFixed(2);
    }

    function calculateOTAmount25() {
        var overtimeRate25 = parseFloat(document.getElementById('overtime_rate25').value) || 0;
        var otHours25 = parseFloat(document.getElementById('ot_hours25').value) || 0;
        var otAmount25 = overtimeRate25 * otHours25;
        document.getElementById('ot_amount25').value = otAmount25.toFixed(2);
        calculateTotalOTAmount(); // Recalculate total OT amount whenever 25% OT amount changes
    }

    function calculateOvertimeRate30() {
        var dailyRate = parseFloat(document.getElementById('daily_rate').value) || 0;
        var overtimeRate30 = (dailyRate / 8) * 0.30;
        document.getElementById('overtime_rate30').value = overtimeRate30.toFixed(2);
    }

    function calculateOTAmount30() {
        var overtimeRate30 = parseFloat(document.getElementById('overtime_rate30').value) || 0;
        var otHours30 = parseFloat(document.getElementById('ot_hours30').value) || 0;
        var otAmount30 = overtimeRate30 * otHours30;
        document.getElementById('ot_amount30').value = otAmount30.toFixed(2);
        calculateTotalOTAmount(); // Recalculate total OT amount whenever 30% OT amount changes
    }

    function calculateOvertimeRate100() {
        var dailyRate = parseFloat(document.getElementById('daily_rate').value) || 0;
        var overtimeRate100 = (dailyRate / 8) * 1;
        document.getElementById('overtime_rate100').value = overtimeRate100.toFixed(2);
    }

    function calculateOTAmount100() {
        var overtimeRate100 = parseFloat(document.getElementById('overtime_rate100').value) || 0;
        var otHours100 = parseFloat(document.getElementById('ot_hours100').value) || 0;
        var otAmount100 = overtimeRate100 * otHours100;
        document.getElementById('ot_amount100').value = otAmount100.toFixed(2);
        calculateTotalOTAmount(); // Recalculate total OT amount whenever 100% OT amount changes
    }

    function calculateTotalOTAmount() {
        var otAmount25 = parseFloat(document.getElementById('ot_amount25').value) || 0;
        var otAmount30 = parseFloat(document.getElementById('ot_amount30').value) || 0;
        var otAmount100 = parseFloat(document.getElementById('ot_amount100').value) || 0;
        var totalOTAmount = otAmount25 + otAmount30 + otAmount100;
        document.getElementById('total_ot').value = totalOTAmount.toFixed(2);
        calculateTotalBasicPayPlusOT(); // Recalculate Basic Pay + OT whenever total OT amount changes
    }

    function calculateTotalBasicPayPlusOT() {
        var totalBasicPay = parseFloat(document.getElementById('total_basic_pay').value) || 0;
        var totalOT = parseFloat(document.getElementById('total_ot').value) || 0;
        var totalBasicPayPlusOT = totalBasicPay + totalOT;
        document.getElementById('total_basic_pay_plus_ot').value = totalBasicPayPlusOT.toFixed(2);
    }

    function calculateNightDifferentialRate() {
        var dailyRate = parseFloat(document.getElementById('daily_rate').value) || 0;
        var ndRate = (dailyRate / 8) * 0.1;
        document.getElementById('nd_rate').value = ndRate.toFixed(2);
    }

    function calculateNDAmount() {
        var ndRate = parseFloat(document.getElementById('nd_rate').value) || 0;
        var ndHours = parseFloat(document.getElementById('nd_hours').value) || 0;
        var ndAmount = ndRate * ndHours;
        document.getElementById('nd_amount').value = ndAmount.toFixed(2);
    }

    // Calculate late rate and late amount
    function calculateLateRate() {
        var dailyRate = parseFloat(document.getElementById('daily_rate').value) || 0;
        var lateRate = (dailyRate / 8) / 60;
        document.getElementById('late_rate').value = lateRate.toFixed(2);
    }

    function calculateLateAmount() {
        var lateRate = parseFloat(document.getElementById('late_rate').value) || 0;
        var numberOfMinutesLate = parseFloat(document.getElementById('number_of_minutes_late').value) || 0;
        var lateAmount = lateRate * numberOfMinutesLate;
        document.getElementById('late_amount').value = lateAmount.toFixed(2);
    }

    // calculate total charges

    function calculateTotalCharges() {
        var lateAmount = parseFloat(document.getElementById('late_amount').value) || 0;
        var missingCharges = parseFloat(document.getElementById('missing_charges').value) || 0;
        var totalCharges = lateAmount + missingCharges;
        document.getElementById('total_charges').value = totalCharges.toFixed(2);
    }



    document.addEventListener('DOMContentLoaded', function() {
        // Calculate overtime rate and amounts when daily rate changes
        document.getElementById('daily_rate').addEventListener('input', function() {
            calculateOvertimeRate25();
            calculateOTAmount25();
            calculateOvertimeRate30();
            calculateOTAmount30();
            calculateOvertimeRate100();
            calculateOTAmount100();
            calculateNightDifferentialRate();
            calculateNDAmount();
            calculateTotalBasicPayPlusOT();
        });

        // Calculate OT amounts when OT hours change
        document.getElementById('ot_hours25').addEventListener('input', function() {
            calculateOTAmount25();
        });

        document.getElementById('ot_hours30').addEventListener('input', function() {
            calculateOTAmount30();
        });

        document.getElementById('ot_hours100').addEventListener('input', function() {
            calculateOTAmount100();
        });

        // Calculate ND amount when ND hours change
        document.getElementById('nd_hours').addEventListener('input', function() {
            calculateNDAmount();
        });

        // Calculate total basic pay plus OT when basic pay or total OT changes
        document.getElementById('total_basic_pay').addEventListener('input', function() {
            calculateTotalBasicPayPlusOT();
        });

        document.getElementById('total_ot').addEventListener('input', function() {
            calculateTotalBasicPayPlusOT();
        });

        // Calculate late rate when daily rate changes
        document.getElementById('daily_rate').addEventListener('input', function() {
            calculateLateRate();
            calculateLateAmount(); // Recalculate late amount when daily rate changes
        });

         // Calculate late amount when number of minutes late changes
         document.getElementById('number_of_minutes_late').addEventListener('input', function() {
            calculateLateAmount();
        });

        document.getElementById('late_amount').addEventListener('input', function() {
            calculateTotalCharges();
        });

        document.getElementById('missing_charges').addEventListener('input', function() {
            calculateTotalCharges();
        });



        // Initial calculations on page load
        calculateOvertimeRate25();
        calculateOTAmount25();
        calculateOvertimeRate30();
        calculateOTAmount30();
        calculateOvertimeRate100();
        calculateOTAmount100();
        calculateNightDifferentialRate();
        calculateNDAmount();
        calculateTotalOTAmount(); // Initial total OT amount calculation
        calculateTotalBasicPayPlusOT(); // Initial total basic pay plus OT calculation
        calculateLateRate();
        calculateLateAmount();
        calculateTotalCharges();
    });

    // Initial calculation on page load
    window.onload = function() {
        calculateTotals();
        calculateDailyRate();
        calculateRegularWorkedDays();
        calculateLeaveAmount();
        calculateFinalAmount();
        calculateLhdAmount();
        calculateSpecialAmount();
        calculateTotalWorkedDays();
        calculateTotalBasicPay();
        calculateOvertimeRate25();
        calculateOTAmount25();
        calculateOvertimeRate30();
        calculateOTAmount30();
        calculateOvertimeRate100();
        calculateOTAmount100();
        calculateNightDifferentialRate();
        calculateNDAmount();
        calculateTotalOTAmount();
        calculateTotalBasicPayPlusOT();
        calculateLateRate();
        calculateLateAmount();
        calculateTotalCharges();
    };



    document.getElementById('basic_pay').addEventListener('input', function() {
        calculateTotals();
        calculateDailyRate();
        calculateRegularWorkedDays();
        calculateLeaveAmount();
        calculateFinalAmount();
        calculateLhdAmount();
        calculateSpecialAmount();
        calculateTotalWorkedDays();
    });

    document.getElementById('allowance').addEventListener('input', function() {
        calculateTotals();
        calculateDailyRate();
        calculateRegularWorkedDays();
        calculateLeaveAmount();
        calculateFinalAmount();
        calculateLhdAmount();
        calculateSpecialAmount();
        calculateTotalWorkedDays();
    });

    document.getElementById('absences').addEventListener('input', function() {
        calculateRegularWorkedDays();
        calculateFinalAmount();
        calculateTotalWorkedDays();
    });

    document.getElementById('vlsl').addEventListener('input', function() {
        calculateLeaveAmount();
        calculateFinalAmount();
    });

    document.getElementById('legal_worked_days').addEventListener('input', function() {
        calculateLhdAmount();
        calculateTotalWorkedDays();
    });

    document.getElementById('special_worked_days').addEventListener('input', function() {
        calculateSpecialAmount();
        calculateTotalWorkedDays();
        calculateTotalBasicPay();
    });






</script>

<script>
    function setDefaultValues() {
        var inputs = document.querySelectorAll('input[type="number"]');
        inputs.forEach(function(input) {
            if (input.value === '') {
                input.value = 0;
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        setDefaultValues();

        calculateTotals();
        calculateDailyRate();
        calculateRegularWorkedDays();
        calculateLeaveAmount();
        calculateFinalAmount();
        calculateLhdAmount();
        calculateSpecialAmount();
        calculateTotalWorkedDays();
        calculateTotalBasicPay();
        calculateOvertimeRate25();
        calculateOvertimeRate30();
        calculateOvertimeRate100();
        calculateOTAmount25();
        calculateOTAmount30();
        calculateOTAmount100();

        calculateUndertimeDeduction();
        calculateTardinessDeduction();
        calculateTotalDeductions();
        calculateTotalNetBasicPay();
        calculateCharges();

        var inputs = document.querySelectorAll('input[type="number"]');
        inputs.forEach(function(input) {
            input.addEventListener('input', setDefaultValues);
        });
    });
</script>



@endpush


@endsection



