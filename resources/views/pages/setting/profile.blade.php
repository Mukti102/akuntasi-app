@extends('layouts.main')

@section('content')
    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-3 mx-auto">

        {{-- Profile Info --}}
        <div class="form-card rounded-2xl p-6">
            <h2 class="text-xl font-bold mb-4 text-white">Informasi Profil</h2>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PATCH')

                <x-input-text label="Nama" name="name" value="{{ old('name', $user->name) }}" />
                <x-input-text label="Email" name="email" type="email" value="{{ old('email', $user->email) }}" />

                <div>
                    <label class="text-sm text-white mb-2 block">Foto Profil</label>
                    <input type="file" name="photo" class="futuristic-input w-full" />
                    @if ($user->profile_photo_path)
                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" class="w-24 rounded mt-3" />
                    @endif
                </div>

                <button class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            </form>
        </div>

        {{-- Password --}}
        <div class="form-card rounded-2xl p-6">
            <h2 class="text-xl font-bold mb-4 text-white">Ubah Password</h2>
            <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <x-input-text label="Password Saat Ini" name="current_password" type="password" />
                <x-input-text label="Password Baru" name="password" type="password" />
                <x-input-text label="Konfirmasi Password Baru" name="password_confirmation" type="password" />

                <button class="px-5 py-2 bg-green-600 text-white rounded hover:bg-green-700">Ubah Password</button>
            </form>
        </div>

        {{-- Delete Account --}}
        <div class="p-4 sm:p-8 text-white bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
@endsection
