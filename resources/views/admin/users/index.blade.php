<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Users') }}
            </h2>
            <a href="{{ route('admin.users.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                
                @forelse($users as $user)
                    <div class="item-card flex flex-col md:flex-row justify-between items-center gap-x-5">
                        {{-- Bagian Kiri: Nama dan Email --}}
                        <div class="flex flex-row items-center gap-x-5 flex-1 min-w-0">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold break-words">{{ $user->name }}</h3>
                                <p class="text-slate-500 text-sm">{{ $user->email }}</p>
                            </div>
                        </div>

                        {{-- Bagian Tengah: Role --}}
                        <div class="hidden md:flex flex-col text-left flex-shrink-0">
                            <p class="text-slate-500 text-sm">Role</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                {{-- Mengambil nama role pertama yang dimiliki user --}}
                                {{ $user->roles->first()?->name ?? 'Tanpa Role' }}
                            </h3>
                        </div>

                        {{-- Bagian Kanan: Tombol Aksi --}}
                        <div class="flex flex-row items-center gap-x-3 mt-3 md:mt-0 flex-shrink-0">
                            <a href="{{ route('admin.users.edit', $user) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>
                            
                            {{-- Mencegah admin menghapus dirinya sendiri --}}
                            @if(auth()->id() !== $user->id)
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full" onclick="return confirm('Are you sure you want to delete this user?')">
                                    Delete
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">No users found.</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>