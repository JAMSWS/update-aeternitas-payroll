@extends('layouts.hrdepartment')

@section('title', 'Position List | Aeternitas')

@section('content')
    <div class="row">
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="rounded card">
          <div class="bg-white card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Position List</h4>
                <a href="{{ url('aeternitas/position/create') }}" class="text-white btn btn-danger">Add Position</a>
            </div>
          </div>
          <div class="card-body">
            <table  id="dataTable" class="table table-bordered table-stripped table-hover removeShowEntry">
                <thead>
                    <tr>
                        <th>Position Number</th>
                        <th>Position</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($position as $positions)
                    <tr>
                        <td>{{ $positions->id }}</td>
                        <td>{{ $positions->position }}</td>
                        <td>
                            <a href="{{ route('position.edit', $positions->id) }}" class="text-white btn btn-success">Edit</a>
                            <form action="{{ route('position.destroy', $positions->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this data? There is no way back!')" class="text-white btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No Positions Available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection
