<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Reports Link') }}
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

                <form method="POST" action="{{ route('admin.reports.update', $report) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Direktif untuk method update --}}

                    {{-- Upload Poster --}}
                    <div class="mt-4">
                        <x-input-label for="poster_path" :value="__('Upload Poster Alur Pengaduan (SVG/PNG)')"  />
                        <img src="{{ Storage::url($report->poster_path) }}" alt="Poster Alur Pengaduan" class="w-32 h-auto object-cover rounded-md mb-4">
                        {{-- Atribut 'accept' membantu memfilter tipe file yang bisa dipilih --}}
                        <x-text-input id="poster_path" class="block mt-1 w-full" type="file" name="poster_path"  />
                    </div>

                    {{-- Link Gform Pengaduan --}}
                    <div class="mt-4">
                        <x-input-label for="gform_link" :value="__('Link Pengaduan/Lapor')"  />
                        <x-text-input id="gform_link" class="block mt-1 w-full" type="url" name="gform_link" value="{{$report->gform_link}}"  placeholder="https://forms.gle/xxxx" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Reports
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>