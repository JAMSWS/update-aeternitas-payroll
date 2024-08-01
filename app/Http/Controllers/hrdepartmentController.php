<?php

namespace App\Http\Controllers;

use App\Models\hrdepartment;
use App\Models\positionlist;
use Illuminate\Http\Request;
use App\Models\departmentlist;
use App\Http\Requests\StoreEmployeeRequest;

class hrdepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = hrdepartment::all();
        return view('hrdepartment.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $department = departmentlist::all();
        $position = positionlist::all();
        return view('hrdepartment.employee.create',compact('department', 'position'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'suffix' => 'nullable|string',
            'department_name' => 'required',
            'position_name' => 'required',
            'basic_pay' => 'required|numeric',
            'allowance' => 'required|numeric',
            'current_address' => 'nullable|string',
            'phone_number' => 'nullable|regex:/^9[0-9]{9}$/',
            'sex' => 'nullable|string',
            'age' => 'nullable|numeric',
            'per_month' => 'nullable|numeric',
            'per_day' => 'nullable|numeric',
            'per_bi_month' => 'nullable|numeric',
            'actual_days_worked' => 'nullable|numeric',
            'absences' => 'nullable|numeric',
            'vlsl' => 'nullable|numeric',
            'regular_worked_days' => 'nullable|numeric',
            'rwd_amount' => 'nullable|numeric',
            'leave_amount' => 'nullable|numeric',
            'legal_worked_days' => 'nullable|numeric',
            'lhd_amount' => 'nullable|numeric',
            'special_rate' => 'nullable|numeric',
            'special_worked_days' => 'nullable|numeric',
            'special_amount' => 'nullable|numeric',
            'total_basic_pay' => 'nullable|numeric',
            'overtime_rate25' => 'nullable|numeric',
            'ot_hours25' => 'nullable|numeric',
            'ot_amount25' => 'nullable|numeric',
            'overtime_rate30' => 'nullable|numeric',
            'ot_hours30' => 'nullable|numeric',
            'ot_amount30' => 'nullable|numeric',
            'overtime_rate100' => 'nullable|numeric',
            'ot_hours100' => 'nullable|numeric',
            'ot_amount100' => 'nullable|numeric',
            'total_ot' => 'nullable|numeric',
            'total_basic_pay_plus_ot' => 'nullable|numeric',
            'nd_rate' => 'nullable|numeric',
            'nd_hours' => 'nullable|numeric',
            'nd_amount' => 'nullable|numeric',
            'late_rate' => 'nullable|numeric',
            'number_of_minutes_late' => 'nullable|numeric',
            'late_amount' => 'nullable|numeric',
            'missing_charges' => 'nullable|numeric',
            'total_charges' => 'nullable|numeric',
            'half_allowance' => 'nullable|numeric',
            'meal_allowance' => 'nullable|numeric',
            'grosspay' => 'nullable|numeric',

            'sss_premcontribution' => 'nullable|numeric',
            'sss_wisp' => 'nullable|numeric',
            'phic' => 'nullable|numeric',
            'hdmf' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'sss_loan' => 'nullable|numeric',
            'hdmf_loan' => 'nullable|numeric',
            'employee_purchase' => 'nullable|numeric',
            'uniform' => 'nullable|numeric',
            'cash_advance' => 'nullable|numeric',
            'otherdeduction' => 'nullable|numeric',

            'employer_sss_premcontribution' => 'nullable|numeric',
            'employer_sss_wisp' => 'nullable|numeric',
            'employer_phic' => 'nullable|numeric',
            'employer_hdmf' => 'nullable|numeric',

            'tax_sss_premcontribution' => 'nullable|numeric',
            'tax_sss_wisp' => 'nullable|numeric',
            'tax_phic' => 'nullable|numeric',
            'tax_hdmf' => 'nullable|numeric',
            'totalremittance' => 'nullable|numeric',
            'taxable_income' => 'nullable|numeric',
            'tax_cl' => 'nullable|numeric',
            'tax_excess' => 'nullable|numeric',

            'tax_rate_percentage' => 'nullable|numeric',
            'tax_rate' => 'nullable|numeric',
            'fixed_rate' => 'nullable|numeric',
            'tax_month' => 'nullable|numeric',
            'tax_cutoff' => 'nullable|numeric',



        ]);

        // Generate custom ID
        $latestEmployee = hrdepartment::latest()->first();
        $latestId = $latestEmployee ? intval(substr($latestEmployee->custom_id, 4)) : 0;
        $newId = 'PPH_' . str_pad($latestId + 1, 3, '0', STR_PAD_LEFT);

        $employee = new hrdepartment();
        $employee->fill($validatedData);
        $employee->custom_id = $newId;
        $employee->save();

        return redirect('/aeternitas/employee')->with('message', 'Employee Added Successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(hrdepartment $hrdepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $employee_id)
    {
        $department = departmentlist::all();
        $position = positionlist::all();
        $employee = hrdepartment::findOrFail($employee_id);
        return view('hrdepartment.employee.edit', compact('employee','department','position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hrdepartment $hrdepartment, int $employee_id)
    {

        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'suffix' => 'nullable|string',
            'department_name' => 'required',
            'current_address' => 'nullable|string',
            'email_address' => 'nullable|string',
            'position_name' => 'required',
            'basic_pay' => 'required|numeric',
            'allowance' => 'required|numeric',
            'custom_id' => 'required|string|unique:employee,custom_id,'.$employee_id,
            'phone_number' => 'nullable|regex:/^9[0-9]{9}$/',
            'sex' => 'nullable|string',
            'age' => 'nullable|numeric',
            'per_month' => 'nullable|numeric',
            'per_day' => 'nullable|numeric',
            'per_bi_month' => 'nullable|numeric',
            'actual_days_worked' => 'nullable|numeric',
            'absences' => 'nullable|numeric',
            'vlsl' => 'nullable|numeric',
            'regular_worked_days' => 'nullable|numeric',
            'rwd_amount' => 'nullable|numeric',
            'leave_amount' => 'nullable|numeric',
            'legal_worked_days' => 'nullable|numeric',
            'lhd_amount' => 'nullable|numeric',
            'special_rate' => 'nullable|numeric',
            'special_worked_days' => 'nullable|numeric',
            'special_amount' => 'nullable|numeric',
            'total_basic_pay' => 'nullable|numeric',
            'overtime_rate25' => 'nullable|numeric',
            'ot_hours25' => 'nullable|numeric',
            'ot_amount25' => 'nullable|numeric',
            'overtime_rate30' => 'nullable|numeric',
            'ot_hours30' => 'nullable|numeric',
            'ot_amount30' => 'nullable|numeric',
            'overtime_rate100' => 'nullable|numeric',
            'ot_hours100' => 'nullable|numeric',
            'ot_amount100' => 'nullable|numeric',
            'total_ot' => 'nullable|numeric',
            'total_basic_pay_plus_ot' => 'nullable|numeric',
            'nd_rate' => 'nullable|numeric',
            'nd_hours' => 'nullable|numeric',
            'nd_amount' => 'nullable|numeric',
            'late_rate' => 'nullable|numeric',
            'number_of_minutes_late' => 'nullable|numeric',
            'late_amount' => 'nullable|numeric',
            'missing_charges' => 'nullable|numeric',
            'total_charges' => 'nullable|numeric',
            'half_allowance' => 'nullable|numeric',
            'meal_allowance' => 'nullable|numeric',
            'grosspay' => 'nullable|numeric',

            'sss_premcontribution' => 'nullable|numeric',
            'sss_wisp' => 'nullable|numeric',
            'phic' => 'nullable|numeric',
            'hdmf' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'sss_loan' => 'nullable|numeric',
            'hdmf_loan' => 'nullable|numeric',
            'employee_purchase' => 'nullable|numeric',
            'uniform' => 'nullable|numeric',
            'cash_advance' => 'nullable|numeric',
            'otherdeduction' => 'nullable|numeric',

            'employer_sss_premcontribution' => 'nullable|numeric',
            'employer_sss_wisp' => 'nullable|numeric',
            'employer_phic' => 'nullable|numeric',
            'employer_hdmf' => 'nullable|numeric',

            'tax_sss_premcontribution' => 'nullable|numeric',
            'tax_sss_wisp' => 'nullable|numeric',
            'tax_phic' => 'nullable|numeric',
            'tax_hdmf' => 'nullable|numeric',
            'totalremittance' => 'nullable|numeric',
            'taxable_income' => 'nullable|numeric',
            'tax_cl' => 'nullable|numeric',
            'tax_excess' => 'nullable|numeric',

            'tax_rate_percentage' => 'nullable|numeric',
            'tax_rate' => 'nullable|numeric',
            'fixed_rate' => 'nullable|numeric',
            'tax_month' => 'nullable|numeric',
            'tax_cutoff' => 'nullable|numeric',
            'total_deduction' => 'nullable|numeric',

        ]);

        $employee = hrdepartment::findOrFail($employee_id);
        $employee->fill($validatedData);
        $employee->save();

        return redirect('/aeternitas/employee')->with('message', 'Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hrdepartment $hrdepartment,int $employee_id)
    {
        //

        $employee = hrdepartment::findOrFail($employee_id);

        $employee->delete();

        return redirect()->route('employees.index')->with('message', 'Employee Deleted Successfully');
    }
}
