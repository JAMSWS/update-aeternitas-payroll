@extends('layouts.hrdepartment')

@section('title', 'Timekeeping List | Aeternitas')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                {{-- <h4>Add Products
                    <a href="{{ url('sellercenter/products')}}" class="text-white btn btn-danger float-end">Back</a>
                </h4> --}}
            </div>
            <div class="card-body">
                <h4>Add Attendance</h4>
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $errors)
                    <div>{{ $errors }}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('aeternitas/timekeeping') }}" method="POST">
                    @csrf
                    <div class="tab-content" id="myTabContent">
                        <div class="p-3 border tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Employee Name</label>
                                <select name="employee_name" class="form-control">
                                    @foreach ($employees as $employee)
                                    <option value="{{ $employee->first_name }} {{ $employee->suffix }} {{ $employee->last_name }}">{{ $employee->first_name }} {{ $employee->suffix }} {{ $employee->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="week_ending">Week Starting:</label>
                        <input type="date" class="form-control" id="week_ending" name="week_ending" required>
                    </div>
                    <div class="form-group">
                        <label for="week_starting">Week Ending:</label>
                        <input type="date" class="form-control" id="week_starting" name="week_starting" required>
                    </div>
                    <div class="form-group">
                        <label for="approver">Approver:</label>
                        <input type="text" class="form-control" id="approver" name="approver">
                    </div> --}}

                    <table class="table table-bordered timesheet-table">
                        <thead>
                            <tr>
                                <th>Week Day</th>
                                <th>Day Start</th>
                                <th>Lunch Start</th>
                                <th>Lunch Finish</th>
                                <th>Day End</th>
                                <th>Break Hours</th>
                                <th>Hours</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 7; $i++)
                            <tr>
                                <td><input type="date" class="form-control" name="day[]" required></td>
                                <td><input type="time" class="form-control" name="day_start[]"></td>
                                <td><input type="time" class="form-control" name="lunch_start[]"></td>
                                <td><input type="time" class="form-control" name="lunch_finish[]"></td>
                                <td><input type="time" class="form-control" name="day_end[]"></td>
                                <td><input type="number" step="0.01" class="form-control" name="break_hours[]" value="0" required></td>
                                <td><input type="number" step="0.01" class="form-control" name="hours[]" value="0" required></td>
                                <td><input type="text" class="form-control" name="status[]" value="In Progress" required></td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>

                    <button type="submit" class="mt-3 text-white btn btn-primary">Submit</button>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
