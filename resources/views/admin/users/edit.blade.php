<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-red-500">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div>
                        <x-input-label for="name" :value="__('Name')" required />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus />
                    </div>

                    {{-- Email Address --}}
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" required />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required />
                    </div>
                    
                    {{-- Role --}}
                    <div class="mt-4">
                        <x-input-label for="role" :value="__('Role')" required />
                        <select name="role" id="role" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                            <option value="">Pilih role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ old('role', $user->roles->first()?->name) == $role->name ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Password (Opsional) --}}
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('New Password (Optional)')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
                        <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti password.</p>
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm New Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update User
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>