<x-layouts.app.header>

    <body>
        <div class="container w-7/11 mx-auto text-base">
            <!-- 残業申請一覧タイトル -->
            <div class="text-center mt-6">
                <h1>残業申請</h1>
            </div>

            <!-- 表示する期間 -->

            <div class="pt-2 mx-auto grid grid-cols-7 w-full">
                <div class="col-start-1 col-span-3">
                    <table class="border-collapse">
                        <tr class="border border-black w-full">
                            <td class="py-1 pl-2 pr-4 text-center"><label for="division">部署名</label></td>
                            <td class="pr-2 py-1">
                                <select name="division" id="division" class="py-1 px-3 w-full">
                                    <option value="">選択してください</option>
                                    <option value="1">通常勤務</option>
                                    <option value="2">残業勤務</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-end-8 col-span-3">
                    <table class="border-collapse ml-auto">
                        <tr class="border border-black w-full">
                            <td class="py-1 pl-2 pr-4 text-center"><label for="name">名前</label></td>
                            <td class="pr-2 py-1"><input type="text" id="name" name="name" class="w-full"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <table class="m-auto mt-6 border-collapse w-full text-center">
                <tr>
                    <td class="border border-black px-2 py-1 w-1/4">勤務パターン</td>
                    <td class="border border-black px-2 py-1 w-3/4 text-center">
                        <select name="work_pattern" id="work_pattern" class="px-10">
                            <option value="">選択してください</option>
                            <option value="1">通常勤務</option>
                            <option value="2">残業勤務</option>
                        </select>
                    </td>
                </tr>
            </table>
            <table class="m-auto mt-6 border-collapse w-full text-center">
                <tr>
                    <td class="border border-black px-2 py-1 w-1/4">残業予定時間</td>
                    <td class="border border-black px-2 py-1 w-3/4 text-xs">
                        <input type="date" id="plan_start_date" name="plan_start_date">
                        <select name="plan_start_hour" id="plan_start_hour">
                            <option value="">選択してください</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select><label for="plan_start_hour">時</label>
                        <select name="plan_start_minute" id="plan_start_minute"
                            class="bg-gray-200 border">
                            <option value="">選択してください</option>
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select><label for="plan_start_minute">分</label>
                        <span>～</span>
                        <input type="date" id="plan_end_date" name="plan_end_date">
                        <select name="plan_end_hour" id="plan_end_hour">
                            <option value="">選択してください</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select><label for="plan_end_hour">時</label>
                        <select name="plan_end_minute" id="plan_end_minute">
                            <option value="">選択してください</option>
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
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
                        <textarea name="cause" id="cause" class="w-full"></textarea>
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
