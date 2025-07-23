@extends('authentication.layout')

@section('content')
    <div class="relative w-full max-w-lg">
        <div class="bg-slate-800/90 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-700/50 overflow-hidden">

            <!-- Header -->
            <div class="bg-cyan-600 p-8 text-center">
                <div class="flex items-center justify-center mb-4">
                    <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                        <i class="fas fa-user-plus text-2xl text-white"></i>
                    </div>
                </div>
                <h1 class="text-2xl font-bold text-white mb-1 uppercase">{{ setting('site_name') }}</h1>
                <p class="text-blue-100 text-sm">Buat akun baru untuk dashboard</p>
            </div>

            <!-- Register Form -->
            <div class="p-8">
                <form action="{{ route('register') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Name Field -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-user mr-2 text-accent-blue"></i>Nama Lengkap
                        </label>
                        <input type="text" id="name" name="name" required autofocus
                            class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-accent-blue transition-all"
                            placeholder="Nama lengkap Anda">
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-envelope mr-2 text-accent-blue"></i>Email
                        </label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-accent-blue transition-all"
                            placeholder="email@contoh.com">
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-lock mr-2 text-accent-purple"></i>Password
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-accent-purple transition-all"
                            placeholder="••••••••">
                    </div>

                    <!-- Password Confirmation -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-lock mr-2 text-accent-purple"></i>Konfirmasi Password
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-accent-purple transition-all"
                            placeholder="Ulangi password">
                    </div>

                    <!-- Register Button -->
                    <button type="submit"
                        class="w-full bg-cyan-600 text-white font-semibold py-3 px-4 rounded-xl hover:from-blue-600 hover:to-purple-600 transition-all focus:outline-none focus:ring-2 focus:ring-accent-blue focus:ring-offset-2 focus:ring-offset-slate-800 shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i>
                        Daftar Akun
                    </button>
                </form>

                <!-- Footer -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-400">
                        Sudah punya akun?
                        <a href="{{ route('login') }}"
                            class="text-cyan-600 hover:text-cyan-300 font-medium transition-colors">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
