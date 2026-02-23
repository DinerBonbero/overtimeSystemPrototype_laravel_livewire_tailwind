<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\OvertimeSheet;
use App\Models\OvertimeRequest;
use App\Models\OvertimeReport;
use App\Models\WorkPattern;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;

class OvertimeSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $overtimeSheets = Auth::user()->overtimeSheets()->with('overtimeRequest.workPattern')->with('overtimeReport')->get();

        return view('overtime_sheets.index', compact('overtimeSheets'));
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
            'plan_date' => ['required', Rule::date()->format('Y-m-d')],
            'plan_start_hour' => 'required|numeric|min:0|max:23',
            'plan_start_minute' => 'required|numeric|min:0|max:59',
            'plan_end_hour' => 'required|numeric|min:0|max:23',
            'plan_end_minute' => 'required|numeric|min:0|max:59',
            'cause' => 'required|string|max:200',
        ], [
            'division.required' => '部署は必須です。',
            'work_pattern.required' => '勤務パターンは必須です。',
            'plan_date.required' => '予定開始日は必須です。',
            'plan_start_hour.required' => '予定開始時刻（時）は必須です。',
            'plan_start_minute.required' => '予定開始時刻（分）は必須です。',
            'plan_end_hour.required' => '予定終了時刻（時）は必須です。',
            'plan_end_minute.required' => '予定終了時刻（分）は必須です。',
            'cause.required' => '残業理由は必須です。',
            'exists' => '選択された値が正しくありません。',
            'plan_date.date_format' => '予定開始日は正しい日付形式で入力してください。',
            'plan_start_hour.numeric' => '予定開始時刻（時）は数値で入力してください。',
            'plan_start_minute.numeric' => '予定開始時刻（分）は数値で入力してください。',
            'plan_end_hour.numeric' => '予定終了時刻（時）は数値で入力してください。',
            'plan_end_minute.numeric' => '予定終了時刻（分）は数値で入力してください。',
            'min' => '時刻の値が範囲外です。',
            'max' => '時刻の値が範囲外です。',
            'cause.string' => '残業理由は文字列で入力してください。',
            'cause.max' => '残業理由は200文字以内で入力してください。',
        ]);


        try {

            DB::transaction(function ()  use ($validated) {
                // データベースの操作

                throw new \Exception('テスト用の例外です。');

                $overtimeSheet = OvertimeSheet::create([

                    'user_id' => Auth::id(),
                    'division_id' => $validated['division'],
                    'submit_status' => 0
                ]);

                $overtimeSheet->overtimeRequest()->create([

                    'work_pattern_id' => $validated['work_pattern'],
                    'plan_start_at' => $validated['plan_date'] . ' ' . sprintf('%02d:%02d:00', $validated['plan_start_hour'], $validated['plan_start_minute']),
                    'plan_end_at' => $validated['plan_date'] . ' ' . sprintf('%02d:%02d:00', $validated['plan_end_hour'], $validated['plan_end_minute']),
                    //sprintfは文字連結関数　※第一引数をformatとして%と指定の記号に埋め込む。%02dは「0(0)が2桁(2)かつ10進数(d)の型」ここに第二引数、第三引数を順に埋め込む
                    //timestamp 1970-01-01 00:00:01 UTC～2038-01-19 03:14:07 UTC
                    //datetime 1000-01-01 00:00:00～9999-12-31 23:59:59
                    'cause' => $validated['cause'],
                    'application_status' => 0 //0=未申請、1=申請、2=承認依頼、3=承認済み
                ]);

            });
        } catch (QueryException $e) {
            // データベースクエリ関連のエラーハンドリング

            Log::error($e->getMessage(), ['exception' => $e, 'エラーメッセージ' => 'SQLエラーが発生しました。']);
            return redirect()->route('error');
        } catch (\Exception $e) {
            // 一般的なエラーハンドリング

            Log::error($e->getMessage(), ['exception' => $e, 'エラーメッセージ' => '予期せぬエラーが発生しました。']);
            return redirect()->route('error');
        }

        return redirect()->route('overtime_sheets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(OvertimeSheet $overtimeSheet)
    {
        Gate::authorize('view', $overtimeSheet);//ポリシーのviewメソッドを使用して認可を確認

        $overtimeSheet->load('overtimeRequest.workPattern', 'overtimeReport');//$overtimeSheetはクエリビルダではないため、withや->where('user_id', Auth::id())は使えないeagerロードのloadメソッドを使用する
        // $overtimeSheet = Auth::user()->overtimeSheets()->with('overtimeRequest.workPattern')->with('overtimeReport')->where('id', $overtimeSheet->id)->first();
        // 上記コメントのコードでは、リソースコントローラが持つshowメソッドの理想とした使い方に反している。既にモデルバインディングで取れてる為、再取得する必要性がないため

        return view('overtime_sheets.show', compact('overtimeSheet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $overtimeSheet = OvertimeSheet::findOrFail($id);//モデルバインディングを使用せず、IDで直接取得する場合はfindOrFailを使用して、存在しないIDが指定された場合に404エラーを返すようにする
    
        Gate::authorize('update', $overtimeSheet);//ポリシーのupdateメソッドを使用して認可を確認

        $overtimeSheet->load('overtimeRequest.workPattern');//リレーション先のデータも取得
        
        return view('overtime_sheets.edit', compact('overtimeSheet'));
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
