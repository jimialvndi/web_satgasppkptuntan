<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('admin.roles.store') }}">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Role Name')" required />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-input-label :value="__('Permissions')" />
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-2">
                            @foreach($permissions as $permission)
                            <div class="flex items-center">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}" class="rounded">
                                <label for="perm_{{ $permission->id }}" class="ml-2 text-sm text-gray-600">{{ $permission->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Role
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>