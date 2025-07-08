<x-app-layout>
  <x-slot name="header">
    {{-- CSS Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    {{-- JS Trix Editor --}}
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('New Abouts') }}
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

        <form method="POST" action="{{ route('admin.abouts.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="mt-4">
            <x-input-label for="thumbnail" :value="__('Upload Thumbnail About')" required />
            <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" required />
          </div>

          {{-- Content (Trix Editor) --}}
          <div class="mt-4">
            <x-input-label for="content" :value="__('Content')" required />
            <input id="content" type="hidden" name="content" value="{{ old('content') }}">
            <trix-editor input="content" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"></trix-editor>
          </div>

          <div class="flex items-center justify-end mt-4">
            <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
              Add New Abouts
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
      const hiddenInput = document.querySelector('#content');

      if (hiddenInput.value) {
        editor.editor.loadHTML(hiddenInput.value);
      }
    });
  </script>
</x-app-layout>