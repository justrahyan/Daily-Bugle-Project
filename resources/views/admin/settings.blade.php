@extends('admin.layout')

@section('content')
    <div class="flex justify-between items-start mb-4">
        <h1 class="text-2xl font-bold">Pengaturan</h1>
        <div class="flex items-center">
            <!-- Tombol Edit -->
            <button id="editButton" class="flex items-center text-slate-500 bg-transparent hover:text-slate-900 hover:bg-slate-300 border border-slate-400 p-2 rounded-full">
                <span class="mr-2">Edit</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <path d="M3 17.25V21h3.75L17.812 11.875l-3.75-3.75L3 17.25zm16.5-9.375a2.625 2.625 0 1 0-3.75-3.75 2.625 2.625 0 0 0 3.75 3.75z" />
                </svg>
            </button>
            <!-- Tombol Batal -->
            <button id="cancelButton" class="hidden flex items-center text-red-500 bg-transparent hover:text-red-900 hover:bg-red-300 border border-red-400 p-2 rounded-full">
                <span class="mr-2">Batal</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                    <path d="M18 6L6 18M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="flex gap-8">
            <!-- Profile and Name -->
            <div class="flex border border-slate-400 p-6 rounded-xl">
                <div class="flex flex-col items-center justify-center mb-4">
                    <div>
                        @if(Auth::user()->profile_photo)
                            <img src="{{ Storage::url(Auth::user()->profile_photo) }}" alt="{{ Auth::user()->name }}" class="w-[200px] h-[200px] mt-2 object-cover rounded-full">
                        @endif
                        @error('name')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col items-center justify-center mt-6">
                        <div>
                            <h5 id="nameDisplay" class="font-bold text-xl">{{ Auth::user()->name }}</h5>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <h5 id="roleDisplay" class="text-slate-500 font-medium">{{ Auth::user()->role->name }}</h5>
                            @error('role')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Pribadi -->
            <div class="flex-1 border border-slate-400 p-6 rounded-xl">
                <h1 class="text-xl font-bold mb-4">Informasi Pribadi</h1>
                <div class="grid grid-cols-2 gap-8">
                    <!-- Nama -->
                    <div class="rounded-xl">
                        <label for="name" class="block text-sm font-medium text-slate-500">Nama</label>
                        <p id="nameDisplay" class="mt-1 text-lg w-full rounded-md text-slate-700 font-semibold">{{ Auth::user()->name }}</p>
                        <input type="text" name="name" id="nameInput" value="{{ Auth::user()->name }}" class="hidden mt-1 text-lg w-full rounded-md text-slate-700 font-semibold">
                    </div>

                    <!-- Email -->
                    <div class="rounded-xl">
                        <label for="email" class="block text-sm font-medium text-slate-500">Email</label>
                        <p id="emailDisplay" class="mt-1 text-lg w-full rounded-md text-slate-700 font-semibold">{{ Auth::user()->email }}</p>
                        <input type="email" name="email" id="emailInput" value="{{ Auth::user()->email }}" class="hidden mt-1 text-lg w-full rounded-md text-slate-700 font-semibold">
                    </div>

                    <!-- Alamat -->
                    <div class="rounded-xl">
                        <label for="address" class="block text-sm font-medium text-slate-500">Alamat</label>
                        <p id="addressDisplay" class="mt-1 text-lg w-full rounded-md text-slate-700 font-semibold">{{ Auth::user()->address }}</p>
                        <input type="text" name="address" id="addressInput" value="{{ Auth::user()->address }}" class="hidden mt-1 text-lg w-full rounded-md text-slate-700 font-semibold">
                    </div>

                    <!-- No Telepon -->
                    <div class="rounded-xl">
                        <label for="phone" class="block text-sm font-medium text-slate-500">No Telepon</label>
                        <p id="phoneDisplay" class="mt-1 text-lg w-full rounded-md text-slate-700 font-semibold">{{ Auth::user()->phone_number }}</p>
                        <input type="text" name="phone_number" id="phoneInput" value="{{ Auth::user()->phone_number }}" class="hidden mt-1 text-lg w-full rounded-md text-slate-700 font-semibold">
                    </div>

                    <!-- Role -->
                    <div class="rounded-xl">
                        <label for="role" class="block text-sm font-medium text-slate-500">Role</label>
                        <p id="roleDisplay" class="mt-1 text-lg w-full rounded-md text-slate-700 font-semibold">{{ Auth::user()->role->name }}</p>
                        <input type="text" name="role" id="roleInput" value="{{ Auth::user()->role->name }}" class="hidden mt-1 text-lg w-full rounded-md text-slate-700 font-semibold" disabled>
                    </div>
                </div>
                
                <button id="saveButton" type="submit" class="hidden mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Simpan</button>
            </div>
        </div>
    </form>

    <script>
        const editButton = document.getElementById('editButton');
        const cancelButton = document.getElementById('cancelButton');
        const saveButton = document.getElementById('saveButton');
        
        editButton.addEventListener('click', function() {
            document.querySelectorAll('input').forEach(input => input.classList.remove('hidden'));
            document.querySelectorAll('p').forEach(p => p.classList.add('hidden'));
            editButton.classList.add('hidden');
            cancelButton.classList.remove('hidden');
            saveButton.classList.remove('hidden');
        });

        cancelButton.addEventListener('click', function() {
            document.querySelectorAll('input').forEach(input => input.classList.add('hidden'));
            document.querySelectorAll('p').forEach(p => p.classList.remove('hidden'));
            editButton.classList.remove('hidden');
            cancelButton.classList.add('hidden');
            saveButton.classList.add('hidden');
        });
    </script>
@endsection
