<x-layouts.app.header>

    <body>
        <div class="container w-8/11 mx-auto">
            <!-- 残業申請一覧タイトル -->
            <div class="text-center mt-6">
                <h1>残業申請一覧</h1>
            </div>

            <!-- 表示する期間 -->

            <div class="bg-green-300 py-2 flex flex-col items-center gap-2 border border-black mx-auto w-3/5">
                <div>
                    <label for="plan_start_date">表示する期間</label>
                </div>
                <div>
                    <input type="date" id="plan_start_date" name="plan_start_date">
                    <span>～</span>
                    <input type="date" id="plan_end_date" name="plan_end_date">
                </div>
                <div>
                    <x-ui.button message="検索" class="bg-blue-600 hover:bg-blue-700 text-sm py-1 px-2" />
                </div>
            </div>
            <div class="text-left">
                <span></span>
            </div>
            <!-- 一覧テーブル -->
            <table class="m-auto mt-6 border-collapse w-full text-center">

                <tr>
                    <th class="border border-black p-1">日付</th>
                    <th class="border border-black p-1">申請状態</th>
                    <th class="border border-black p-1">勤務パターン</th>
                    <th class="border border-black p-1">残業予定時間</th>
                    <th class="border border-black p-1">実残業時間</th>
                    <th class="border border-black p-1">詳細</th>
                    <th class="border border-black p-1">提出状況</th>
                    <th></th>
                </tr>
                @foreach ($overtimeSheets as $overtimeSheet)
                    <tr>
                        <td class="border border-black p-1">{{ $overtimeSheet->overtimeRequest->plan_start_at }}</td>
                        @if ($overtimeSheet->overtimeRequest->application_status === 0)
                            <td class="border border-black p-1">未申請</td>
                        @elseif ($overtimeSheet->overtimeRequest->application_status === 1)
                            <td class="border border-black p-1">申請</td>
                        @elseif ($overtimeSheet->overtimeRequest->application_status === 2)
                            <td class="border border-black p-1">承認依頼</td>
                        @elseif ($overtimeSheet->overtimeRequest->application_status === 3)
                            <td class="border border-black p-1 blue-500">承認済み</td>
                        @else
                            <td class="border border-black p-1"></td>
                        @endif
                        <td class="border border-black p-1">{{ $overtimeSheet->overtimeRequest->workPattern->name }}</td>
                        <td class="border border-black p-1">{{ $overtimeSheet->overtimeRequest->plan_start_at }}～{{ $overtimeSheet->overtimeRequest->plan_end_at }}</td>
                        <td class="border border-black p-1">
                            @isset($overtimeSheet->overtimeReport)
                                {{ $overtimeSheet->overtimeReport->rest_hours }}時間{{ $overtimeSheet->overtimeReport->rest_minutes }}分 
                            @endisset
                        </td>
                        <td class="border border-black p-1"><x-ui.a-button message="詳細" href="#" class="bg-blue-600 hover:bg-blue-700 p-1 text-sm" /></td>
                        {{-- {{ route('overtime_sheets.show', $overtimeSheet) }} --}}
                        @if ($overtimeSheet->submit_status === 0)
                            <td class="border border-black p-1">未提出</td>
                        @elseif ($overtimeSheet->submit_status === 1)
                            <td class="border border-black p-1">提出</td>
                        @endif
                        <td><x-ui.button message="削除" class="bg-red-500 hover:bg-red-600 px-2 py-1 text-sm" /></td>
                    </tr>
                @endforeach
            </table>

            <div class="text-left mt-3">
                <x-ui.a-button message="登録する" href="{{ route('overtime_sheets.create') }}"
                    class="bg-sky-300 hover:bg-sky-500 py-2 px-4" />
            </div>

            <!-- 月次処理ボタン -->
            <div class="text-center mt-6">
                <x-ui.button message="月次処理" class="bg-green-500 hover:bg-green-600 py-2 px-4" />
            </div>
        </div>
    </body>

</x-layouts.app.header>
