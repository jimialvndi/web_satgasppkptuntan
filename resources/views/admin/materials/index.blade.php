<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-row justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Manage Materials') }}
      </h2>
      <a href="{{ route('admin.materials.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
        Add New
      </a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

        @forelse ($materials as $material)
        {{-- Material Card --}}
        <div class="item-card flex flex-col md:flex-row justify-between items-center border:1px solid #e5e7eb rounded-lg p-5 hover:shadow-lg transition-shadow duration-300">
          <div class="flex flex-row items-center gap-x-5 flex-1 min-w-0 mx-5">
            {{-- Icon Image --}}
            <img src="{{Storage::url($material->icon_path)}}" alt="Icon" class="w-32 h-auto object-cover rounded-md">

            <div class="flex flex-col">
              <p class="text-slate-500 text-sm">Judul Dokumen</p>
              {{-- Material Title --}}
              <h3 class="text-indigo-950 text-xl font-bold">{{$material->tittle}}</h3>
            </div>
          </div>

          {{-- Details section (Date) --}}
          <div class="hidden md:flex flex-row gap-x-10 text-left mx-5">
            <div class="flex flex-col">
              <p class="text-slate-500 text-sm">Created at</p>
              {{-- Format the date for better readability --}}
              <h3 class="text-indigo-950 text-l font-bold">{{$material->created_at->format('d M Y')}}</h3>
            </div>
          </div>


          {{-- Action Buttons --}}
          <div class="flex flex-row items-center gap-x-3 mt-3 md:mt-0">
            <a href="{{ route('admin.materials.edit', $material) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
              Edit
            </a>
            <form action="{{ route('admin.materials.destroy', $material) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full" onclick="return confirm('Are you sure you want to delete this program?')">
                Delete
              </button>
            </form>
          </div>
        </div>
        @empty
        <div class="text-center text-gray-500">
          <p class="text-lg">Tidak ada Materials yang tersedia.</p>
        </div>
        @endforelse


      </div>
    </div>
  </div>
</x-app-layout>