<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\hrdepartment;
use Illuminate\Http\Request;
use App\Models\attendancelist;
use App\Http\Requests\StoreAttendanceRequest;

class attendancelistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = attendancelist::all();
        return view('hrdepartment.attendance.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employees = hrdepartment::all();
        return view('hrdepartment.attendance.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        //
        $validatedData = $request->validated(); // Use validated data
        $employees = new attendancelist();
        $employees->fill($validatedData);
        $employees->save(); // Save the employees
        return redirect('/aeternitas/attendance')->with('message', 'Attendance Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(attendancelist $attendancelist)
    {
        //
        $employees = attendancelist::find($attendancelist);

         // Example usage of Carbon to format the date
        $employees->time_in = Carbon::parse($employees->time_in)->format('h:i A');
        $employees->time_out = Carbon::parse($employees->time_out)->format('h:i A');
        return view('hrdepartment.attendance.index', compact('employees'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(attendancelist $attendancelist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, attendancelist $attendancelist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(attendancelist $attendancelist, int $employee_id)
    {
        //
        // $attendancelist->delete();
        // return redirect('/aeternitas/attendance')->with('message', 'Attendance Deleted Successfully');

        $employee = attendancelist::findOrFail($employee_id);

        $employee->delete();

        return redirect()->route('attendance.index')->with('message', 'Employee Deleted Successfully');
    }
}
