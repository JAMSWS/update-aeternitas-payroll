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
                <h4>Department List</h4>
                <a href="{{ url('aeternitas/department/create') }}" class="text-white btn btn-danger">Add Department</a>
            </div>
          </div>
          <div class="card-body">
            <table  id="dataTable" class="table table-bordered table-stripped table-hover removeShowEntry">
                <thead>
                    <tr>
                        <th>Department Number</th>
                        <th>Department</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($department as $departments)
                    <tr>
                        <td>{{ $departments->id }}</td>
                        <td>{{ $departments->department }}</td>
                        <td>
                            <a href="{{ route('department.edit', $departments->id) }}" class="text-white btn btn-success">Edit</a>
                            <form action="{{ route('department.destroy', $departments->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this data? There is no way back!')" class="text-white btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No Department Available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection
