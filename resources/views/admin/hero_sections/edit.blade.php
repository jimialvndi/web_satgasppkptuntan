<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Hero Section') }}
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

                <form method="POST" action="{{ route('admin.hero_sections.update', $hero_section) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Direktif untuk method update --}}

                    <div>
                        <x-input-label for="heading" :value="__('Heading')" required />
                        <x-text-input id="heading" class="block mt-1 w-full" type="text" name="heading" value="{{ $hero_section->heading }}" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="subheading" :value="__('Subheading')" required />
                        <textarea id="subheading" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" name="subheading" required>{{ $hero_section->subheading }}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="path_video" :value="__('Link Video (YouTube/Vimeo)')" />
                        <x-text-input id="path_video" class="block mt-1 w-full" type="url" name="path_video" value="{{$hero_section->path_video}}" required />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="review" :value="__('Review Text')" />
                        <textarea id="review" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" name="review" required>{{$hero_section->review}}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="reviewer" :value="__('Nama Reviewer')" />
                        <x-text-input id="reviewer" class="block mt-1 w-full" type="text" name="reviewer" value="{{$hero_section->reviewer}}" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Hero Section
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>