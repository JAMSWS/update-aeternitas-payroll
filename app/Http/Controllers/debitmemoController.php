<?php

namespace App\Http\Controllers;

use App\Models\debitmemo;
use App\Models\hrdepartment;
use Illuminate\Http\Request;
use App\Models\payrollperiod;

class debitmemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get all payroll periods
        $payrollPeriods = payrollperiod::all();

        // Retrieve the selected payroll period from the request
        $selectedPeriod = $request->get('payrollperiod');

        if ($selectedPeriod) {
            // Filter employees who have the selected payroll period
            $employees = hrdepartment::where('payrollperiod', $selectedPeriod)->get();
        } else {
            // If no period is selected, get all employees
            $employees = hrdepartment::all();
        }

        return view("debitmemo.index", compact('employees', 'payrollPeriods', 'selectedPeriod'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(hrdepartment $debitmemo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hrdepartment $debitmemo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hrdepartment $debitmemo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hrdepartment $debitmemo)
    {
        //
    }
}
