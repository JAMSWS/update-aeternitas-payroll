@extends('layouts.hrdepartment')

@section('title', 'Employee List | Aeternitas')

@section('content')
    <div class="row">
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card rounded">
          <div class="card-header bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Employee List</h4>
                <a href="{{ url('aeternitas/employee/create') }}" class="btn btn-danger text-white">Add Employee</a>
            </div>
          </div>
          <div class="card-body">
            <table  id="dataTable" class="table table-bordered table-stripped table-hover removeShowEntry">
                <thead>
                    <tr>
                        <th>Employee Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Basic Pay</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->custom_id }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->department_name }}</td>
                        <td>{{ $employee->position_name }}</td>
                        <td>{{ $employee->basic_pay }}</td>
                        <td>
                            <a href="{{ url('sellercenter/employees/'.$employee->id.'/edit') }}" class="btn btn-success text-white">Edit</a>
                            <a href="{{ url('sellercenter/employees/'.$employee->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this data? There is no way back!')" class="btn btn-danger text-white">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No Employees Available</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection





