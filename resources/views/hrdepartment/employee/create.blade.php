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
                <h4>Add Employee</h4>
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $errors)
                    <div>{{ $errors }}</div>

                    @endforeach

                </div>
                @endif

                <form action="{{ url('aeternitas/employee') }}" method="POST">
                    @csrf


                {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Details</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Product Image</button>
                      </li>



                    </ul> --}}
                  <div class="tab-content" id="myTabContent">
                    <div class="p-3 border tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="mb-3">
                            <h2 class="text-success">Employee Details</h2>
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" required>
                            <label>Middle Name</label>
                            <input type="text" name="suffix" class="form-control" placeholder="Optional">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control"required>
                            <label>Department</label>
                            <select name="department_name" class="form-control">
                                @foreach ($department as $departments)
                                <option value="{{ $departments->department }}">{{ $departments->department }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="department_name" class="form-control"required> --}}
                            <label>Position</label>
                            <select name="position_name" class="form-control">
                                @foreach ($position as $positions)
                                <option value="{{ $positions->position }}">{{ $positions->position }}</option>
                                @endforeach
                            </select>


                            {{-- <input type="text" name="position_name" class="form-control"required> --}}
                            <label>Basic Pay <i class="text-danger "> (Monthly Pay)</i></label>
                            <select name="basic_pay" class="form-control" required>
                                <option value="16000.00">₱16,000.00</option>
                                <option value="18000.00">₱18,000.00</option>
                                <option value="20000.00">₱20,000.00</option>
                                <option value="22000.00">₱22,000.00</option>
                                <option value="25000.00">₱25,000.00</option>
                                <option value="30000.00">₱30,000.00</option>
                            </select>
                            <label>Monthly Allowance</label>
                            <input type="number" name="allowance" class="form-control" step="0.01" required>

                        </div>
                        {{-- <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="10"></textarea>
                        </div> --}}
                    </div>
                    {{-- <div class="p-3 border tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">

                                    <div class="mb-3">
                                        <label>Original price</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₱</span>
                                            <input type="number" step="0.01" name="original_price" class="form-control">
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <label>Selling price</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₱</span>
                                            <input type="number" step="0.01" name="selling_price" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="text" name="quantity" class="form-control">
                                    </div>

                                    <div class="mb-3"  style="display: none;"   >
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" checked>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 border tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                        <div class="mb-3">
                            <label>Upload Product Images</label>
                            <input type="file" name="image[]" multiple class="form-control"/>

                        </div>

                    </div> --}}


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
