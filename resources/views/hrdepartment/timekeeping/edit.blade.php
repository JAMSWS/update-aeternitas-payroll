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
                        <input type="text" name="suffix" value="{{ $employee->suffix }}" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label>Department</label>
                        <input type="text" name="department_name" value="{{ $employee->department_name }}" class="form-control" required>
                    </div> --}}
                    <div class="mb-3">
                        <label>Department</label>
                        <select name="department_name" class="form-control">
                            @foreach ($department as $departments)
                            <option value="{{ $departments->department }}">{{ $departments->department }}</option>
                            @endforeach
                        </select>
                        </div>
                    <div class="mb-3">
                        <label>Position</label>
                        <select name="position_name" class="form-control">
                            @foreach ($position as $positions)
                            <option value="{{ $positions->position }}">{{ $positions->position }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Basic Pay</label>
                        <input type="number" name="basic_pay" value="{{ $employee->basic_pay }}" class="form-control" required>
                    </div>

                    <div>
                        <button type="submit" class="mt-3 text-white btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
