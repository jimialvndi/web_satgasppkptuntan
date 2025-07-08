<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Abouts Page') }}
            </h2>
            <a href="{{ route('admin.abouts.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse ($abouts as $about)
                <div class="item-card flex flex-col md:flex-row justify-between items-center border:1px solid #e5e7eb rounded-lg p-5 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex flex-row items-center gap-x-5 flex-1 min-w-0 mx-5">
                        {{-- Thumbnail --}}
                        <img src="{{Storage::url($about->thumbnail)}}" alt="Alur Pengaduan Poster" class="w-32 h-auto object-cover rounded-md">

                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Content</p>
                            <h3 class="text-indigo-950 text-l font-bold">{{ Str::limit(strip_tags($about->content), 120, '...') }}</h3>
                        </div>
                    </div>

                    <div class="hidden md:flex flex-row gap-x-10 text-left mx-5">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Created by</p>

                            <h3 class="text-indigo-950 text-l font-bold">{{$about->user->name}}</h3>
                        </div>
                    </div>


                    {{-- Action Buttons --}}
                    <div class="flex flex-row items-center gap-x-3 mt-3 md:mt-0">
                        <a href="{{ route('admin.abouts.edit', $about) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action="{{ route('admin.abouts.destroy', $about) }}" method="POST">
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
                    <p class="text-lg">Tidak ada About yang tersedia.</p>
                </div>
                @endforelse


            </div>
        </div>
    </div>
</x-app-layout>