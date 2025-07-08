<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Material') }}
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

                <form method="POST" action="{{ route('admin.materials.update', $material) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Judul Dokumen --}}
                    <div>
                        <x-input-label for="tittle" :value="__('Judul Dokumen')" required />
                        <x-text-input id="tittle" class="block mt-1 w-full" type="text" name="tittle" value="{{$material->tittle}}" required autofocus />
                    </div>

                    {{-- Upload Icon --}}
                    <div class="mt-4">
                        <x-input-label for="icon_path" :value="__('Upload Icon (SVG/PNG)')"  />
                        <img src="{{ Storage::url($material->icon_path) }}" alt="Icon Material" class="w-32 h-auto object-cover rounded-md">
                        {{-- Atribut 'accept' membantu memfilter tipe file yang bisa dipilih --}}
                        <x-text-input id="icon_path" class="block mt-1 w-full" type="file" name="icon_path"  accept="image/svg+xml, image/png" />
                    </div>

                    {{-- Link Unduh Dokumen --}}
                    <div class="mt-4">
                        <x-input-label for="unduh_link" :value="__('Link Unduh Dokumen')"  />
                        <x-text-input id="unduh_link" class="block mt-1 w-full" type="url" name="unduh_link" value="{{$material->unduh_link}}"  placeholder="https://drive.google.com/file/d/xxxx" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Material
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>