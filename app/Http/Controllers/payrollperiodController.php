<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payrollperiod;
use App\Http\Requests\StorePayrollperiodRequest;

class payrollperiodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $payrollperiod = payrollperiod::all();
        return view('payrollperiod.index',compact('payrollperiod'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payrollperiod.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePayrollperiodRequest $request)
    {
        //
        $validatedData = $request->validated(); // Use validated data

        $payrollperiod = new payrollperiod();
        $payrollperiod->fill($validatedData);
        $payrollperiod->save(); // Save the department
        return redirect('/aeternitas/payrollperiod')->with('message', 'Payroll Period Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(payrollperiod $payrollperiod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payrollperiod $payrollperiod, int $payroll_period)
    {
        //
        $payrollperiod = payrollperiod::findOrFail($payroll_period);
        return view('payrollperiod.edit', compact('payrollperiod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payrollperiod $payrollperiod)
    {
        $validatedData = $request->validate([
            'position' => 'required',
        ]);

        $payrollperiod = payrollperiod::findOrFail($payrollperiod);
        $payrollperiod->fill($validatedData);
        $payrollperiod->save();

        return redirect('/aeternitas/payrollperiod')->with('message', 'Payroll Period Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payrollperiod $payrollperiod, int $payroll_period)
    {
        //

        $payrollperiod = payrollperiod::findOrFail($payroll_period);

        $payrollperiod->delete();

        return redirect()->route('payrollperiod.index')->with('message', 'payroll period Deleted Successfully');
    }
}
