@extends('layouts.hrdepartment')

@section('title', 'Attendance List | Aeternitas')

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
                <h4>Add Attendance</h4>
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $errors)
                    <div>{{ $errors }}</div>

                    @endforeach

                </div>
                @endif

                <form action="{{ url('aeternitas/attendance') }}" method="POST">
                    @csrf

                  <div class="tab-content" id="myTabContent">
                    <div class="p-3 border tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="mb-3">
                            <label>Employee Name</label>
                            <select name="employee_name" class="form-control">
                                @foreach ($employees as $employees)
                                <option value="{{ $employees->first_name }} {{ $employees->suffix }} {{ $employees->last_name }}">{{ $employees->first_name }} {{ $employees->suffix }} {{ $employees->last_name }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="last_name" class="form-control" required> --}}
                            <label for="date">Date:</label>
                            <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="form-control" required>
                            <label>Time In</label>
                            <input type="time" name="time_in" value="{{ date('H:i') }}" class="form-control"required>
                            <label>Time Out</label>
                            <input type="time" name="time_out" class="form-control"required>

                            {{-- <label for="present">Present:</label>
                            <select name="present" id="present" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option> --}}
                </select>


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
