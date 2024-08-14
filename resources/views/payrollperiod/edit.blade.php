@extends('layouts.hrdepartment')

@section('title', 'Edit Payroll Period | Aeternitas')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <h4>Edit Payroll Period</h4>
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $errors)
                    <div>{{ $errors }}</div>

                    @endforeach

                </div>
                @endif

                <form action="{{ url('aeternitas/payrollperiod/'.$payrollperiod->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <hr>
                    <div class="mb-3">
                        <label>Payroll period ID</label>
                        <input type="text" name="id" value="{{ $payrollperiod->id }}" class="form-control" required readonly>
                    </div>

                  <div class="tab-content" id="myTabContent">
                    <div class="p-3 border tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="mb-3">
                            <div class="d-flex">
                                <div class="me-2">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" id="startpayrollperiod" name="startpayrollperiod" class="form-control" value="{{ $payrollperiod->startpayrollperiod }}" required>
                                </div>
                                <div>
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" id="endpayrollperiod" name="endpayrollperiod" class="form-control" value="{{ $payrollperiod->endpayrollperiod }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div>
                        <button type="submit" class="mt-3 text-white btn btn-primary">Update</button>
                  </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('start_date').addEventListener('change', function() {
        var startDate = new Date(this.value);
        var endDate = new Date(document.getElementById('end_date').value);
        if (endDate < startDate) {
            alert('End date cannot be before the start date.');
            document.getElementById('end_date').value = '';
        }
    });

    document.getElementById('end_date').addEventListener('change', function() {
        var endDate = new Date(this.value);
        var startDate = new Date(document.getElementById('start_date').value);
        if (endDate < startDate) {
            alert('End date cannot be before the start date.');
            document.getElementById('end_date').value = '';
        }
    });
</script>

@endsection
