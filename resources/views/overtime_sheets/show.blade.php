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
                                <td class="py-1 pl-2 pr-4 text-center"><label for="division">部署名</label></td>
                                <td class="pr-2 py-1">
                                    <select name="division" id="division" class="px-3 w-full">
                                        <option value="">選択してください</option>
                                        @foreach ($divisions as $key => $division)
                                            <option value="{{ $key }}"
                                                @if (old('division') == $key) selected @endif>{{ $division }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-end-8 col-span-3">
                        <table class="border-collapse ml-auto">
                            <tr class="border border-black w-full">
                                <td class="py-1 pl-2 pr-4 text-center"><label for="name">名前</label></td>
                                <td class="pr-2 py-1">
                                    {{ $user->name }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <table class="m-auto mt-6 border-collapse w-full text-center">
                    <tr>
                        <td class="border border-black px-2 py-1 w-1/4">勤務パターン</td>
                        <td class="border border-black px-2 py-1 w-3/4 text-center">
                            <select name="work_pattern" id="work_pattern" class="px-10">
                                <option value="" class="text-center">選択してください</option>
                                @foreach ($workPatterns as $workPattern)
                                    <option value="{{ $workPattern->id }}"
                                        @if (old('work_pattern') == $workPattern->id) selected @endif>
                                        {{ $workPattern->name }}
                                        &nbsp;&nbsp;|&nbsp;&nbsp;
                                        {{-- ノーブレイクスペースブラウザに消されないスペース --}}
                                        {{ $workPattern->start_time }} ～ {{ $workPattern->end_time }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </table>
                <table class="m-auto mt-6 border-collapse w-full text-center">
                    <tr>
                        <td class="border border-black px-2 py-1 w-1/4">残業予定時間</td>
                        <td class="border border-black px-2 py-1 w-3/4 text-xs">
                            <input type="date" name="plan_date">
                            <select name="plan_start_hour" id="plan_start_hour">
                                @for ($i = 0; $i <= 23; $i++)
                                    @php $planStartHour = str_pad($i, 2, 0, STR_PAD_LEFT); @endphp
                                    <option value="{{ $planStartHour }}"
                                        @if (old('plan_start_hour') == $planStartHour) selected @endif>{{ $planStartHour }}</option>
                                    {{-- str_pad($i, 2, 0, STR_PAD_LEFT)は2桁になるように左側に0を追加する関数で返り値は文字列 --}}
                                    {{-- ループ変数に関数の戻り値を代入したりしない$i = str_pad($i, 2, 0, STR_PAD_LEFT)にしてしまうと$iが整数型から文字列型に変わりバグの原因になる --}}
                                    {{-- コメント内の出力括弧に気を付ける、エンコードエラー --}}
                                @endfor
                            </select>
                            <label for="plan_start_hour">時</label>
                            <select name="plan_start_minute" id="plan_start_minute" class="bg-gray-200 border">
                                @for ($i = 0; $i <= 45; $i += 15)
                                    @php $planStartMinute = str_pad($i, 2, 0, STR_PAD_LEFT); @endphp
                                    <option value="{{ $planStartMinute }}"
                                        @if (old('plan_start_minute') == $planStartMinute) selected @endif>{{ $planStartMinute }}
                                    </option>
                                @endfor
                            </select>
                            <label for="plan_start_minute">分</label>
                            <span>～</span>
                            <select name="plan_end_hour" id="plan_end_hour">
                                @for ($i = 0; $i <= 23; $i++)
                                    @php $planEndHour = str_pad($i, 2, 0, STR_PAD_LEFT); @endphp
                                    <option value="{{ $planEndHour }}"
                                        @if (old('plan_end_hour') == $planEndHour) selected @endif>{{ $planEndHour }}</option>
                                @endfor
                            </select><label for="plan_end_hour">時</label>
                            <select name="plan_end_minute" id="plan_end_minute">
                                @for ($i = 0; $i <= 45; $i += 15)
                                    @php $planEndMinute = str_pad($i, 2, 0, STR_PAD_LEFT);@endphp
                                    <option value="{{ $planEndMinute }}"
                                        @if (old('plan_end_minute') == $planEndMinute) selected @endif>{{ $planEndMinute }}</option>
                                @endfor
                            </select><label for="plan_end_minute">分</label>
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
                        <td class="border border-black px-2 py-1">
                            <textarea name="cause" id="cause" class="w-full">{{ old('cause') }}</textarea>
                        </td>
                    </tr>
                </table>
                <!-- 残業申登録録ボタン -->
                <div class="text-center mt-6">
                    <x-ui.button message="登録する" class="bg-blue-600 hover:bg-blue-700 py-1 px-2" />
                </div>
        </div>
    </body>

</x-layouts.app.header>
