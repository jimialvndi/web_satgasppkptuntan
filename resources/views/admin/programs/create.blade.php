<x-app-layout>
  <x-slot name="header">
    {{-- CSS Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    {{-- JS Trix Editor --}}
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('New Program') }}
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

        <form method="POST" action="{{ route('admin.programs.store') }}" enctype="multipart/form-data">
          @csrf

          {{-- Nama Program --}}
          <div>
            <x-input-label for="tittle" :value="__('Nama Program')" required />
            <x-text-input id="tittle" class="block mt-1 w-full" type="text" name="tittle" :value="old('tittle')" required autofocus />
          </div>

          {{-- Tema Program --}}
          <div class="mt-4">
            <x-input-label for="theme" :value="__('Tema')" />
            <x-text-input id="theme" class="block mt-1 w-full" type="text" name="theme" :value="old('theme')" required />
          </div>

          {{-- Deskripsi (Trix Editor) --}}
          <div class="mt-4">
            <x-input-label for="description" :value="__('Deskripsi')" required />
            <input id="description" type="hidden" name="description" value="{{ old('description') }}">
            <trix-editor input="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"></trix-editor>
          </div>

          {{-- Tanggal Program --}}
          <div class="mt-4">
            {{-- Ubah label agar lebih deskriptif --}}
            <x-input-label for="date" :value="__('Tanggal & Waktu Program')" required />

            {{-- Ubah type menjadi datetime-local --}}
            <x-text-input id="date" class="block mt-1 w-full" type="datetime-local" name="date" :value="old('date')" required />
          </div>

          {{-- Nama Tempat Lokasi --}}
          <div class="mt-4">
            <x-input-label for="location" :value="__('Lokasi')" required />
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required />
          </div>

          {{-- Link Lokasi (Google Maps) --}}
          <div class="mt-4">
            <x-input-label for="location_link" :value="__('Link Lokasi (Google Maps)')" required />
            <x-text-input id="location_link" class="block mt-1 w-full" type="url" name="location_link" :value="old('location_link')" required placeholder="https://maps.app.goo.gl/xxxx" />
          </div>

          {{-- Link Daftar (Google Form) --}}
          <div class="mt-4">
            <x-input-label for="regist_link" :value="__('Link Daftar (Google Form)')" />
            <x-text-input id="regist_link" class="block mt-1 w-full" type="url" name="regist_link" :value="old('regist_link')" placeholder="https://forms.gle/xxxx" />
          </div>

          {{-- Upload Thumbnail --}}
          <div class="mt-4">
            <x-input-label for="thumbnail" :value="__('Upload Thumbnail')" required />
            <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required />
          </div>

          <div class="flex items-center justify-end mt-4">
            <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
              Add New Program
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <script>
    // Script untuk mencegah Trix Editor menimpa input value 'old'
    document.addEventListener('trix-before-initialize', () => {
      const editor = document.querySelector('trix-editor');
      const hiddenInput = document.querySelector('#description');

      if (hiddenInput.value) {
        editor.editor.loadHTML(hiddenInput.value);
      }
    });
  </script>
</x-app-layout>