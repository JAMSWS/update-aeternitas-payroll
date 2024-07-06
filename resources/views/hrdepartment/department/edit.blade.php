@extends('layouts.hrdepartment')

@section('title', 'Edit Employee | Aeternitas')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Department
                    <a href="{{ url('aeternitas/department') }}" class="text-white btn btn-danger float-end">Back</a>
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

                <form action="{{ url('aeternitas/department/'.$department->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Department ID</label>
                        <input type="text" name="id" value="{{ $department->id }}" class="form-control" required readonly>
                    </div>
                    <div class="mb-3">
                        <label>Department</label>
                        <input type="text" name="department" value="{{ $department->department }}" class="form-control" required>
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
