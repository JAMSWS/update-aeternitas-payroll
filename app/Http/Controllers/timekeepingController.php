<?php

namespace App\Http\Controllers;

use App\Models\timekeeping;
use App\Models\hrdepartment;
use Illuminate\Http\Request;


class timekeepingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('hrdepartment.timekeeping.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $employees = hrdepartment::all();
        return view('hrdepartment.timekeeping.create', compact('employees'));
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
    public function show(timekeeping $timekeeping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(timekeeping $timekeeping)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, timekeeping $timekeeping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(timekeeping $timekeeping)
    {
        //
    }
}
