<x-layouts.app.header>

    <body>
        <div class="container w-7/11 mx-auto text-base">
            <!-- タイトル -->
            <div class="text-center mt-6 text-2xl">
                <h1>残業申請</h1>
            </div>

            <!-- 残業申請 -->
            <div class="pt-2 mx-auto grid grid-cols-7 w-full">
                <div class="col-start-1 col-span-3">
                    <table class="border-collapse">
                        <tr class="border border-black w-full">
                            <td class="py-1 px-2 border border-black text-center">
                                部署名：{{ $overtimeSheet->division->name }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-end-8 col-span-3">
                    <table class="border-collapse ml-auto">
                        <tr class="border border-black w-full">
                            <td class="py-1 px-2 border border-black">
                                社員番号：{{ Auth::user()->employee_number }}
                            </td>
                            <td class="py-1 px-2 text-center">
                                名前：{{ Auth::user()->name }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <table class="m-auto mt-6 border-collapse w-full text-center">
                <tr>
                    <td class="border border-black px-2 py-1 w-1/4">勤務パターン</td>
                    <td class="border border-black px-2 py-1 w-3/4 text-center">
                        {{ $overtimeSheet->overtimeRequest->workPattern->name }}
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        {{-- ノーブレイクスペースブラウザに消されないスペース --}}
                        {{ $overtimeSheet->overtimeRequest->workPattern->start_time->format('H:i') }} ～
                        {{ $overtimeSheet->overtimeRequest->workPattern->end_time->format('H:i') }}
                    </td>
                </tr>
            </table>
            <table class="m-auto mt-6 border-collapse w-full text-center">
                <tr>
                    <td class="border border-black px-2 py-1 w-1/4">残業予定時間</td>
                    <td class="border border-black px-2 py-1 w-3/4">
                        {{ $overtimeSheet->overtimeRequest->plan_start_at->format('Y年m月d日 H時i分') }}
                        ～
                        {{ $overtimeSheet->overtimeRequest->plan_end_at->format('Y年m月d日 H時i分') }}
                    </td>
                </tr>
            </table>
            <table class="mt-6 border-collapse w-full text-center">
                <tr>
                    <td class="border border-black px-2 py-1">
                        <span>残業理由</span>
                    </td>
                </tr>
                <tr>
                    <td class="border border-black px-3 py-1">
                        {{ $overtimeSheet->overtimeRequest->cause }}
                    </td>
                </tr>
            </table>
            <table class="mt-6 border-collapse w-full text-center">
                <tr>
                    <td class="border border-black px-2 py-1">
                        <span>上記の残業を命令します</span>
                    </td>
                </tr>
                <tr class="border border-black">
                    <td class="px-2 py-1 grid grid-cols-9">
                        <span class="col-start-1">年月日{{ $overtimeSheet->overtimeRequest->approved_at ?? '' }}</span>
                        <span class="col-end-7">承認者{{ $overtimeSheet->overtimeRequest->user->name ?? '' }}</span>
                        
                    </td>
                </tr>
            </table>
            <!-- 残業申登録録ボタン -->
            <div class="mt-6 flex justify-center gap-3">
                <form action="{{ route('overtime_sheets.edit', $overtimeSheet->overtimeRequest->id) }}" method="get">
                    @csrf
                    <x-ui.button message="編集する" class="bg-green-600 hover:bg-green-700 py-1 px-2"/>
                </form>
                <x-ui.button message="申請する" class="bg-blue-600 hover:bg-blue-700 py-1 px-2"/>
                <x-ui.button message="再申請を依頼する" class="bg-blue-600 hover:bg-blue-700 py-1 px-2"/>
            </div>

            <div class="text-center mt-6 text-2xl">
                <h1>残業報告</h1>
            </div>

            <table class="m-auto mt-6 border-collapse w-full text-center">
                <tr>
                    <td class="border border-black px-2 py-1 w-1/4">実残業時間</td>
                    <td class="border border-black px-2 py-1 w-3/4">
                        年 月 日 時 分 ～ 年 月 日 時 分
                    </td>
                </tr>
            </table>
            <table class="m-auto mt-6 border-collapse w-full text-center">
                <tr>
                    <td class="border border-black px-2 py-1 w-1/4">うち休憩時間</td>
                    <td class="border border-black px-2 py-1 w-3/4">
                        時間 分
                    </td>
                </tr>
            </table>
            <table class="mt-6 border-collapse w-full text-center">
                <tr>
                    <td class="border border-black px-2 py-1">
                        <span>残業報告</span>
                    </td>
                </tr>
                <tr>
                    <td class="border border-black px-2 py-1">
                        {{ $overtimeSheet->overtimeReport->report ?? '' }}
                    </td>
                </tr>
            </table>
            <table class="mt-6 border-collapse w-full text-center">
                <tr>
                    <td class="border border-black px-2 py-1">
                        <span>上記の残業を報告します</span>
                    </td>
                </tr>
                <tr class="border border-black">
                    <td class="px-2 py-1 grid grid-cols-9">
                        <span class="col-start-1 col-span-3">年月日{{ $overtimeSheet->overtimeReport->approved_at ?? '' }}</span>
                        <span class="col-start-6 col-span-3">申請者：{{ $overtimeSheet->user->name ?? '' }}</span>
                    </td>
                </tr>
            </table>
            <!-- 残業報告登録ボタン -->
            <div class="text-center my-6 flex justify-center gap-3">
                <x-ui.button message="編集する" class="bg-blue-600 hover:bg-blue-700 py-1 px-2" />
                <x-ui.button message="未提出にする" class="bg-blue-600 hover:bg-blue-700 py-1 px-2" />
                <x-ui.button message="印刷" class="bg-blue-600 hover:bg-blue-700 py-1 px-1 ml-10" />
            </div>
        </div>
    </body>

</x-layouts.app.header>
