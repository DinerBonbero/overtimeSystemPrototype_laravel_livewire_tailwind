<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\WorkPattern;
use Illuminate\Support\Facades\Auth;

class OvertimeSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('overtime_sheets.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::pluck('name', 'id');
        $workPatterns = WorkPattern::select('id', 'name', 'start_time', 'end_time')->get();
        $user = Auth::user('name');

        return view('overtime_sheets.create', compact('divisions', 'workPatterns', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        return view('overtime_sheets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
