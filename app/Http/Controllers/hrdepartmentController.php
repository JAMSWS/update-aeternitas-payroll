<?php

namespace App\Http\Controllers;

use App\Models\hrdepartment;
use Illuminate\Http\Request;
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
        return view('hrdepartment.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'suffix' => 'required',
            'department_name' => 'required',
            'position_name' => 'required',
            'basic_pay' => 'required|integer',
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
    public function edit(hrdepartment $hrdepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hrdepartment $hrdepartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hrdepartment $hrdepartment)
    {
        //
    }
}
