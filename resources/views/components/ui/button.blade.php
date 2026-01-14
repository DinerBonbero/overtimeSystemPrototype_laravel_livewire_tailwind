<button {{ $attributes->merge(['class' => 'text-white font-font-mono cursor-pointer border-2 border-gray-300 rounded-lg']) }}>{{ $message }}</button>
{{-- type="button"に要注意、時間ロス --}}