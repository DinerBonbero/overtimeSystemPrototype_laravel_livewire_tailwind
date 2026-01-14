<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\WorkPattern;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        $validated = $request->validate([
            'division' => 'required|exists:divisions,id',
            'work_pattern' => 'required|exists:work_patterns,id',
            'plan_start_date' => ['required', Rule::date()->format('Y-m-d')],
            'plan_start_hour' => 'required|numeric|min:0|max:23',
            'plan_start_minute' => 'required|numeric|min:0|max:59',
            'plan_end_hour' => 'required|numeric|min:0|max:23',
            'plan_end_minute' => 'required|numeric|min:0|max:59',
            'cause' => 'required|string|max:200',
        ],[
            'division.required' => '部署は必須です。',
            'work_pattern.required' => '勤務パターンは必須です。',
            'plan_start_date.required' => '予定開始日は必須です。',
            'plan_start_hour.required' => '予定開始時刻（時）は必須です。',
            'plan_start_minute.required' => '予定開始時刻（分）は必須です。',
            'plan_end_hour.required' => '予定終了時刻（時）は必須です。',
            'plan_end_minute.required' => '予定終了時刻（分）は必須です。',
            'cause.required' => '残業理由は必須です。',
            'exists' => '選択された値が正しくありません。',
            'plan_start_date.date_format' => '予定開始日は正しい日付形式で入力してください。',
            'plan_start_hour.numeric' => '予定開始時刻（時）は数値で入力してください。',
            'plan_start_minute.numeric' => '予定開始時刻（分）は数値で入力してください。',
            'plan_end_hour.numeric' => '予定終了時刻（時）は数値で入力してください。',
            'plan_end_minute.numeric' => '予定終了時刻（分）は数値で入力してください。',
            'min' => '時刻の値が範囲外です。',
            'max' => '時刻の値が範囲外です。',
            'cause.string' => '残業理由は文字列で入力してください。',
            'cause.max' => '残業理由は200文字以内で入力してください。',
        ]);
        
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
