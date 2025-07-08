<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Reports Link') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                {{-- Menampilkan error validasi jika ada --}}
                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-red-500">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.reports.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Upload Poster --}}
                    <div class="mt-4">
                        <x-input-label for="poster_path" :value="__('Upload Poster Alur Pengaduan (SVG/PNG)')" required />
                        {{-- Atribut 'accept' membantu memfilter tipe file yang bisa dipilih --}}
                        <x-text-input id="poster_path" class="block mt-1 w-full" type="file" name="poster_path" required />
                    </div>

                    {{-- Link Gform Pengaduan --}}
                    <div class="mt-4">
                        <x-input-label for="gform_link" :value="__('Link Pengaduan/Lapor')" required />
                        <x-text-input id="gform_link" class="block mt-1 w-full" type="url" name="gform_link" :value="old('gform_link')" required placeholder="https://forms.gle/xxxx" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Reports
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>