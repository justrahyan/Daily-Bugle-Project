@extends('admin.layout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Pengguna</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required class="mt-1 block w-full" autofocus>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required class="mt-1 block w-full">
        </div>
        <div class="mb-2">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <!-- <input type="password" name="password" id="password" required class="mt-1 block w-full"> -->
            <div class="relative">
                <input type="password" name="password" id="password" required class="mt-1 block w-full pr-10">
                <button type="button" onclick="togglePasswordVisibility('password')" class="absolute inset-y-0 right-0 px-3 py-2">
                    <svg id="show-password-icon-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s3-6 11-6 11 6 11 6-3 6-11 6S1 12 1 12z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    <svg id="hide-password-icon-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s3-6 11-6 11 6 11 6-3 6-11 6S1 12 1 12z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M1 1l22 22"></path>
                    </svg>
                </button>
            </div>
        </div>
        <p id="password-validation-message" class="text-xs text-red-500 mb-2 hidden">Password minimal 8 karakter</p>
        <div class="mb-2">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full pr-10">
            <p id="password-match-message" class="text-xs text-red-500 mb-2 hidden">Password tidak cocok</p>
        </div>
        <div class="mb-4">
            <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ $user->phone_number }}" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
            <input type="text" name="address" id="address" value="{{ $user->address }}" class="mt-1 block w-full">
        </div>
        <div class="mb-4">
            <label for="profile_photo" class="block text-sm font-medium text-gray-700">Foto Profil</label>
            <input type="file" name="profile_photo" id="profile_photo" class="mt-1 block w-full">
            @if($user->profile_photo)
                <img src="{{ Storage::url($user->profile_photo) }}" alt="{{ $user->name }}" class="w-20 h-20 mt-2 object-cover">
            @endif
        </div>
        <div class="mb-4">
            <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role_id" id="role_id" class="mt-1 block w-full">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Simpan</button>
        </div>
    </form>

    <script>
        function togglePasswordVisibility(inputId) {
            var input = document.getElementById(inputId);
            var showIcon = document.getElementById('show-password-icon-' + inputId);
            var hideIcon = document.getElementById('hide-password-icon-' + inputId);

            if (input.type === 'password') {
                input.type = 'text';
                showIcon.classList.add('hidden');
                hideIcon.classList.remove('hidden');
            } else {
                input.type = 'password';
                showIcon.classList.remove('hidden');
                hideIcon.classList.add('hidden');
            }
        }

        function validateForm() {
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            let isValid = true;

            // Validasi panjang karakter password
            if (password.length < 8) {
                document.getElementById('password-validation-message').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('password-validation-message').classList.add('hidden');
            }

            // Validasi konfirmasi password
            if (password !== passwordConfirmation) {
                document.getElementById('password-match-message').classList.remove('hidden');
                isValid = false;
            } else {
                document.getElementById('password-match-message').classList.add('hidden');
            }

            return isValid;
        }
    </script>
@endsection
