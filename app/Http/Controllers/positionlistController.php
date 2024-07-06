<?php

namespace App\Http\Controllers;

use App\Models\positionlist;
use Illuminate\Http\Request;
use App\Http\Requests\StorePositionRequest;

class positionlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $position = positionlist::all();
        return view('hrdepartment.position.index',compact('position'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hrdepartment.position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request)
    {
        $validatedData = $request->validated(); // Use validated data


        $position = new positionlist();
        $position->fill($validatedData);
        $position->save(); // Save the position
        return redirect('/aeternitas/position')->with('message', 'Position Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(positionlist $positionlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(positionlist $positionlist,int $position_id)
    {
        //
        $position = positionlist::findOrFail($position_id);
        return view('hrdepartment.position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, positionlist $positionlist, int $position_id)
    {
        //

        $validatedData = $request->validate([
            'position' => 'required',
        ]);

        $position = positionlist::findOrFail($position_id);
        $position->fill($validatedData);
        $position->save();

        return redirect('/aeternitas/position')->with('message', 'Position Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(positionlist $positionlist,int $position_id)
    {
        $position = positionlist::findOrFail($position_id);

        $position->delete();

        return redirect()->route('position.index')->with('message', 'Position Deleted Successfully');
        //
    }
}
