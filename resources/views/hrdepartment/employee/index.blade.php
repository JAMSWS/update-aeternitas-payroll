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
                <a href="{{ url('aeternitas/employee/create') }}" class="text-white btn btn-danger">Add Employee</a>
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
                        <th>Monthly Allowance</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->custom_id }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        {{-- <td>{{ $employee->department_name }}</td> --}}
                        <td>
                            @if ($employee->department_name)
                            {{ $employee->department_name }}
                            @else
                            No Department
                            @endif
                        </td>
                        {{-- <td>{{ $employee->position_name }}</td> --}}
                        <td>
                            @if ($employee->position_name)
                            {{ $employee->position_name }}
                            @else
                            No Position
                            @endif
                        </td>
                        <td>₱ {{ number_format($employee->basic_pay, 2) }}</td>
                        <td>₱ {{ number_format($employee->allowance, 2) }}</td>
                        <td>
                            {{-- <a href="{{ route('employees.show', $employee->id) }}" class="text-white btn btn-primary">Show</a> --}}
                            <a href="{{ route('employees.show', $employee->id) }}" class="text-white btn btn-primary show-employee" data-id="{{ $employee->id }}">Show</a>

                            <a href="{{ route('employees.edit', $employee->id) }}" class="text-white btn btn-success">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this data? There is no way back!')" class="text-white btn btn-danger">Delete</button>
                            </form>
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

    <!-- Modal -->
    <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="employeeModalLabel">Employee Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <!-- Employee details will be loaded here dynamically -->
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.show-employee').click(function(e) {
                e.preventDefault();
                var employeeId = $(this).data('id');

                // Fetch employee details via AJAX
                $.ajax({
                    url: '/aeternitas/employee/' + employeeId, // Adjust the URL to your route
                    method: 'GET',
                    success: function(response) {
                        // Populate the modal with the employee details
                        $('#employeeModal .modal-body').html(response);
                        // Show the modal
                        $('#employeeModal').modal('show');
                    },
                    error: function(xhr) {
                        // Handle any errors
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

@endsection
