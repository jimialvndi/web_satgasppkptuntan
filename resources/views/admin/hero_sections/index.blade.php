<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Hero Sections') }}
            </h2>
            <a href="{{ route('admin.hero_sections.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @forelse ($hero_sections as $hero_section)
                <div class="item-card flex flex-col md:flex-row justify-between items-center border:1px solid #e5e7eb rounded-lg p-5 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex flex-row items-center gap-x-3 flex-1 min-w-0 mx-5">
                        {{-- Icon Image --}}
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{$hero_section->heading}}</h3>
                        </div>
                    </div>

                    <div class="hidden md:flex flex-col text-left mx-5">
                        <p class="text-slate-500 text-sm">Created at</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{$hero_section->created_at->format('d M Y')}}</h3>
                    </div>

                    <div class="flex flex-row items-center gap-x-3 mt-3 md:mt-0">
                        <a href="{{ route('admin.hero_sections.edit', $hero_section) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action="{{ route('admin.hero_sections.destroy', $hero_section) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center text-gray-500">
                    <p class="text-lg">Tidak ada Hero Sections yang tersedia.</p>
                </div>
                @endforelse


            </div>
        </div>
    </div>
</x-app-layout>