<!DOCTYPE html>
<html>
<head>
    <title>Payslip</title>
    <style>
        /* Add your styling here */
    </style>
</head>
<body>
    <h1>Payslip for {{ $employee->first_name }} {{ $employee->last_name }}</h1>
    <p><strong>Employee ID:</strong> {{ $employee->custom_id }}</p>
    <p><strong>Position:</strong> {{ $employee->position_name }}</p>
    <p><strong>Department:</strong> {{ $employee->department_name }}</p>
    <p><strong>Basic Pay:</strong> {{ $employee->basic_pay }}</p>
    <p><strong>Allowance:</strong> {{ $employee->allowance }}</p>
    <p><strong>Gross Pay:</strong> {{ $employee->grosspay }}</p>
    <p><strong>Net Pay:</strong> {{ $employee->grosspay - $employee->total_charges }}</p>
    <!-- Add more fields as needed -->
</body>
</html>
