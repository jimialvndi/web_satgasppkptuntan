@props(['value', 'required' => false]) {{-- Tambahkan 'required' => false di sini --}}

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}

    {{-- Tambahkan blok @if ini untuk menampilkan bintang merah --}}
    @if ($required)
        <span class="text-red-500">*</span>
    @endif
</label>