@extends('layouts.main')

@section('content')
    <div class="xl:col-span-1">
        <div class="form-card rounded-2xl">
            <div class="px-8 py-6 border-b border-white/10">
                <h3 class="text-xl font-bold text-white">
                    <i class="fas fa-cogs mr-3 text-blue-400"></i>Pengaturan Website
                </h3>
            </div>
            <div class="md:p-8 p-4">
                <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data"
                    class="grid grid-cols-2 gap-4">
                    @csrf

                    {{-- Site Name --}}
                    <x-input-text label="Nama Situs" name="site_name" value="{{ setting('site_name') }}" placeholder="Masukkan nama situs" />

                    <x-input-text label="Nama Perusahaan" name="site_company" value="{{ setting('site_company') }}" placeholder="Masukkan nama perusahaan" />

                    {{-- Site Email --}}
                    <x-input-text label="Email Situs" name="site_email" value="{{ setting('site_email') }}" type="email" placeholder="Masukkan email situs" />

                    {{-- Site Phone --}}
                    <x-input-text label="Nomor Telepon" name="site_phone" value="{{ setting('site_phone') }}" placeholder="Masukkan nomor telepon" />

                    {{-- Site Address --}}
                    <x-input-text label="Alamat" name="site_address" value="{{ setting('site_address') }}" placeholder="Masukkan alamat situs" />

                    {{-- Site Description (textarea) --}}
                    <div class="my-2 col-span-2">
                        <label for="site_description" class="block text-sm font-semibold text-gray-300 mb-3">
                            Deskripsi Situs
                        </label>
                        <textarea name="site_description" id="site_description" rows="3"
                            class="futuristic-input w-full px-4 py-3 rounded-xl transition-all resize-none"
                            placeholder="Masukkan deskripsi singkat">{{ setting('site_description') }}</textarea>
                    </div>

                    {{-- Site Logo --}}
                    <div class="my-2">
                        <label for="site_logo" class="block text-sm font-semibold text-gray-300 mb-3">Logo Situs</label>
                        <input type="file" name="site_logo" id="site_logo"
                            class="futuristic-input w-full px-4 py-3 rounded-xl transition-all" />
                        @if(setting('site_logo'))
                            <img src="{{ asset('storage/' . setting('site_logo')) }}" alt="Logo" class="w-24 mt-2 rounded" />
                        @endif
                    </div>

                    {{-- Site Favicon --}}
                    <div class="my-2">
                        <label for="site_favicon" class="block text-sm font-semibold text-gray-300 mb-3">Favicon Situs</label>
                        <input type="file" name="site_favicon" id="site_favicon"
                            class="futuristic-input w-full px-4 py-3 rounded-xl transition-all" />
                        @if(setting('site_favicon'))
                            <img src="{{ asset('storage/' . setting('site_favicon')) }}" alt="Favicon" class="w-12 mt-2 rounded" />
                        @endif
                    </div>

                    {{-- Tombol --}}
                    <div class="col-span-2 flex justify-end mt-6 space-x-2">
                        <a href="{{ url()->previous() }}" class="px-5 py-2.5 bg-red-500 rounded hover:bg-red-400 text-sm text-white">
                            Batal
                        </a>
                        <button type="submit"   class="px-5 py-2.5 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
