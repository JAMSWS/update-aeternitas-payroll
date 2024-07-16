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
                <h4>Time Keeping List</h4>
                <a href="{{ url('aeternitas/timekeeping/create') }}" class="text-white btn btn-danger">Add Time Keeping</a>
            </div>
          </div>
          <div class="card-body">
            <table  id="dataTable" class="table table-bordered table-stripped table-hover removeShowEntry">
                <thead>
                    <tr>

                        <th>Employee Name</th>
                        <th>Actual Days worked</th>
                        <th>Monthly Rate PAID DAYS</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>



                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td>
                            <a href="" class="text-white btn btn-success">Edit</a>
                            <form action="#" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this data? There is no way back!')" class="text-white btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7">No Employees Available</td>
                    </tr>

                </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection
