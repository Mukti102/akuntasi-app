@extends('authentication.layout')
@section('content')
    <!-- Login Container -->
    <div class="relative w-full max-w-lg">
        <!-- Login Card -->
        <div class="bg-slate-800/90 backdrop-blur-xl rounded-2xl shadow-2xl border border-slate-700/50 overflow-hidden">

            <!-- Header -->
            <div class="bg-cyan-600 p-8 text-center">
                <div class="flex items-center justify-center mb-4">
                    <div class="bg-white/20 p-3 rounded-xl backdrop-blur-sm">
                        <i class="fas fa-chart-line text-2xl text-white"></i>
                    </div>
                </div>
                <h1 class="text-2xl font-bold text-white mb-1 uppercase">{{ setting('site_name') }}</h1>
                <p class="text-blue-100 text-sm">Masuk ke dashboard Anda</p>
            </div>

            <!-- Login Form -->
            <div class="p-8">
                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-envelope mr-2 text-accent-blue"></i>Email Address
                        </label>
                        <div class="relative">
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-accent-blue focus:border-transparent transition-all duration-200"
                                placeholder="admin@akuntansi-app.com">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-300">
                            <i class="fas fa-lock mr-2 text-accent-purple"></i>Password
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-accent-purple focus:border-transparent transition-all duration-200"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white transition-colors">
                                <i id="password-icon" class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-2 text-sm text-gray-300">
                            <input type="checkbox"
                                class="w-4 h-4 text-accent-blue bg-slate-700 border-slate-600 rounded focus:ring-accent-blue focus:ring-2">
                            <span>Ingat saya</span>
                        </label>
                        <a href="#" class="text-sm text-accent-blue hover:text-blue-300 transition-colors">
                            Lupa password?
                        </a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                        class="w-full bg-cyan-600 text-white font-semibold py-3 px-4 rounded-xl hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-accent-blue focus:ring-offset-2 focus:ring-offset-slate-800 transform hover:scale-[1.02] transition-all duration-200 shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk ke Dashboard
                    </button>

                    <!-- Divider -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-slate-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-slate-800 text-gray-400">atau</span>
                        </div>
                    </div>

                    <!-- Demo Login -->
                    {{-- <button 
                        type="button" 
                        onclick="demoLogin()"
                        class="w-full bg-slate-700/50 text-gray-300 font-medium py-3 px-4 rounded-xl border border-slate-600 hover:bg-slate-600/50 hover:text-white focus:outline-none focus:ring-2 focus:ring-success-green focus:ring-offset-2 focus:ring-offset-slate-800 transition-all duration-200"
                    >
                        <i class="fas fa-play mr-2 text-success-green"></i>
                        Coba Demo
                    </button> --}}
                </form>

                <!-- Footer -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-400">
                        Belum punya akun?
                        <a href="/register" class="text-cyan-600 hover:text-blue-300 font-medium transition-colors">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection
