@extends('layouts.hrdepartment')

@section('title', 'Employee List | Aeternitas')

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
                <h4>Add Department</h4>
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $errors)
                    <div>{{ $errors }}</div>

                    @endforeach

                </div>
                @endif

                <form action="{{ url('aeternitas/department') }}" method="POST">
                    @csrf

                  <div class="tab-content" id="myTabContent">
                    <div class="p-3 border tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="mb-3">
                            <label>Department</label>
                            <input type="text" name="department" class="form-control" required>

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

@endsection
