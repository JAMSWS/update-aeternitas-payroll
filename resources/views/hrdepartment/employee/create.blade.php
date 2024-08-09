@extends('layouts.hrdepartment')

@section('title', 'Employee List | Aeternitas')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <h4>Add Employee</h4>
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $errors)
                    <div>{{ $errors }}</div>

                    @endforeach

                </div>
                @endif

                <form action="{{ url('aeternitas/employee') }}" method="POST">
                    @csrf

                  <div class="tab-content" id="myTabContent">
                    <div class="p-3 border tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="mb-3">
                            <h2 class="text-success">Employee Details</h2>
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" required>
                            <label>Middle Name</label>
                            <input type="text" name="suffix" class="form-control" placeholder="Optional">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control"required>
                            <label>Department</label>
                            <select name="department_name" class="form-control">
                                @foreach ($department as $departments)
                                <option value="{{ $departments->department }}">{{ $departments->department }}</option>
                                @endforeach
                            </select>

                            <label>Position</label>
                            <select name="position_name" class="form-control">
                                @foreach ($position as $positions)
                                <option value="{{ $positions->position }}">{{ $positions->position }}</option>
                                @endforeach
                            </select>



                            <label>Basic Pay <i class="text-danger "> (Monthly Pay)</i></label>
                            <select name="basic_pay" class="form-control" required>
                                <option value="16000.00">₱16,000.00</option>
                                <option value="18000.00">₱18,000.00</option>
                                <option value="20000.00">₱20,000.00</option>
                                <option value="22000.00">₱22,000.00</option>
                                <option value="25000.00">₱25,000.00</option>
                                <option value="30000.00">₱30,000.00</option>
                            </select>
                            <label>Monthly Allowance</label>
                            <input type="number" name="allowance" class="form-control" step="0.01" required>
                            <hr>
                            <div class="mb-3">
                                <label>Payroll Period</label>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <input type="date" id="start_date_payroll" name="start_date_payroll" class="form-control" required>
                                    </div>
                                    <div>
                                        <label for="end_date" class="form-label">End Date</label>
                                        <input type="date" id="end_date_payroll" name="end_date_payroll" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>



                  </div>

                  <div>
                        <button type="submit" class="mt-3 text-white btn btn-primary">Submit</button>
                  </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('start_date_payroll').addEventListener('change', function() {
        var startDate = new Date(this.value);
        var endDate = new Date(document.getElementById('end_date_payroll').value);
        if (endDate < startDate) {
            alert('End date cannot be before the start date.');
            document.getElementById('end_date_payroll').value = '';
        }
    });

    document.getElementById('end_date_payroll').addEventListener('change', function() {
        var endDate = new Date(this.value);
        var startDate = new Date(document.getElementById('start_date_payroll').value);
        if (endDate < startDate) {
            alert('End date cannot be before the start date.');
            document.getElementById('end_date_payroll').value = '';
        }
    });
    </script>


@endsection
