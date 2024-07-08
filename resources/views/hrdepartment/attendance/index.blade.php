@php
    use Carbon\Carbon;
@endphp

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
                <h4>Attendance List</h4>
                <a href="{{ url('aeternitas/attendance/create') }}" class="text-white btn btn-danger">Add Attendance</a>
            </div>
          </div>
          <div class="card-body">
            <table  id="dataTable" class="table table-bordered table-stripped table-hover removeShowEntry">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Employee Name</th>
                        <th>Daily Time Record</th>

                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $attendance)


                    <tr>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ $attendance->employee_name }}</td>
                        <td>{{ Carbon::parse($attendance->time_in)->format('h:i A') }} - {{ Carbon::parse($attendance->time_out)->format('h:i A') }}</td>

                        <td>
                            {{-- <a href="" class="text-white btn btn-success">Edit</a> --}}
                            <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" style="display:inline-block;">
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
@endsection
