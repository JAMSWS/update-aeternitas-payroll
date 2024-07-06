<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departmentlist;
use App\Http\Requests\StoreDepartmentRequest;

class departmentlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = departmentlist::all();
        return view('hrdepartment.department.index',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hrdepartment.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $validatedData = $request->validated(); // Use validated data


        $department = new departmentlist();
        $department->fill($validatedData);
        $department->save(); // Save the department
        return redirect('/aeternitas/department')->with('message', 'Department Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(departmentlist $departmentlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(departmentlist $departmentlist,int $department_id)
    {
        //
        $department = departmentlist::findOrFail($department_id);
        return view('hrdepartment.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, departmentlist $department,int $department_id)
    {
        $validatedData = $request->validate([
            'department' => 'required',
        ]);

        $department = departmentlist::findOrFail($department_id);
        $department->fill($validatedData);
        $department->save();

        return redirect('/aeternitas/department')->with('message', 'Department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(departmentlist $departmentlist,int $department_id)
    {
        //

        $department = departmentlist::findOrFail($department_id);

        $department->delete();

        return redirect()->route('department.index')->with('message', 'Department Deleted Successfully');
    }
}
