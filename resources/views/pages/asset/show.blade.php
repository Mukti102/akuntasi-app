@extends('layouts.main')
@section('content')
    <div class="xl:col-span-1">
        <div class="form-card rounded-2xl">
            <div class="px-8 py-6 border-b border-white/10">
                <h3 class="text-xl font-bold text-white">
                    <i class="fas fa-eye mr-3 text-blue-400"></i>Detail Asset
                </h3>
            </div>
            <div class="p-8">
                <form action="{{ route('assets.update', $asset->id) }}" class="grid grid-cols-2 gap-4" method="POST">
                    @csrf
                    @method('PUT')
                    <x-input-text readonly label="Nama" type="text" value="{{ $asset->name }}" name="name"
                        placeholder="Masukkan nama" />
                    <div class="my-2">
                        <label class="block text-sm font-semibold text-gray-300 mb-3" for="category_id">Kategory</label>
                        <select readonly name="category_id" id="category_id"
                            class="futuristic-input w-full px-4 py-4 rounded-xl transition-all">
                            <option class="text-black" value="" selected>Pilih Kategory</option>
                            @foreach ($categories as $item)
                                <option class="text-black" {{ $item->id == $asset->category_id ? 'selected' : '' }}
                                    value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-text readonly label="Jumlah" value="{{ $asset->quantity }}" type="number" name="quantity"
                        placeholder="Jumlah Semua Asset" />
                    <x-input-text readonly label="Harga Beli" value="{{ $asset->purchase_price }}" type="number"
                        name="purchase_price" placeholder="Masukkan Harga Persatuan" />
                    <x-input-text readonly label="Lokasi" value="{{ $asset->location }}" type="text" name="location"
                        placeholder="Masukkan Lokasi Barang" />

                    <x-input-text readonly label="Tanggal" value="{{ $asset->purchase_date }}" type="date"
                        name="purchase_date" placeholder="Masukkan Tanggal" />

                    <x-input-text label="Umur Ekonomis" value="{{ $asset->umur_ekonomis }}" type="text"
                        name="umur_ekonomis" placeholder="Masukkan Umur Ekonomis" />
                    <x-input-text label="Penyusutan" value="{{ $asset->penyusutan }}" type="text" name="penyusutan"
                        placeholder="Masukkan Penyusutan" />

                    <div class="my-2">
                        <label class="block text-sm font-semibold text-gray-300 mb-3" for="status">Status</label>
                        <select readonly name="status" id="status"
                            class="futuristic-input w-full px-4 py-4 rounded-xl transition-all">
                            <option class="text-black" value="" disabled selected>Pilih Kategory</option>
                            <option class="text-black" {{ $asset->status == 'active' ? 'selected' : '' }} value="active">
                                Aktif</option>
                            <option class="text-black" {{ $asset->status == 'inactive' ? 'selected' : '' }}
                                value="inactive">Tidak Aktif</option>
                        </select>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
