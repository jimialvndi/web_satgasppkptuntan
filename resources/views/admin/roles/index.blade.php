<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Roles') }}
            </h2>
            <a href="{{ route('admin.roles.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New Role
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                
                @forelse($roles as $role)
                    <div class="item-card flex flex-col md:flex-row justify-between items-center gap-x-5">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold break-words">{{ $role->name }}</h3>
                        </div>
                        <div class="flex flex-row items-center gap-x-3 mt-3 md:mt-0">
                            <a href="{{ route('admin.roles.edit', $role) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>
                            @if($role->name !== 'super_admin')
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">No roles found.</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>