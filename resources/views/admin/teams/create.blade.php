<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('New Teams') }}
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

        <form method="POST" action="{{ route('admin.teams.store') }}" enctype="multipart/form-data">
          @csrf

          <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" required />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
          </div>

          <div class="mt-4">
            <x-input-label for="photo" :value="__('Upload Photo')" required />
            <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" required />
          </div>

          <div class="mt-4">
            <x-input-label for="keterangan" :value="__('Asal Fakultas')" required />
            <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan" :value="old('keterangan')" required autofocus />
          </div>

          <div class="mt-4">
            <x-input-label for="division" :value="__('Divisi')" required />
            <select name="division" id="division" required class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm py-2 px-3">
              <option value="" disabled selected>Pilih Divisi</option>
              @foreach($divisions as $division)
              <option value="{{ $division->value }}">{{ $division->value }}</option>
              @endforeach
            </select>

            <div class="flex items-center justify-end mt-4">
              <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New Teams
              </button>
            </div>
        </form>

      </div>
    </div>
  </div>

</x-app-layout>