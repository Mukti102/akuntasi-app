@extends('layouts.main')
@section('content')
    <x-card-table name="Aset">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        No</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Nama</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Kategory</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Jumlah</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Harga Satuan</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Lokasi</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Status</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Actions</th>
                </tr>
            </th>
            <tbody class="divide-y divide-white/5">
                @forelse ($assets as $item)
                    <tr class="table-row">
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">{{ $item->name }}</td>
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">{{ $item->category->name }}</td>
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">{{ $item->quantity }}</td>
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">
                            <span
                                class="px-3 py-1 text-xs font-semibold bg-gradient-to-r from-green-400 to-green-600 text-white rounded-full">{{ number_format($item->purchase_price, 2, '.', ',') }}
                            </span>

                        </td>
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">
                            <span
                                class="px-3 py-1 text-xs font-semibold capitalize bg-gradient-to-r from-info-400 to-info-600 text-gray-700 rounded-full">{{ $item->location }}</span>

                        </td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            @if ($item->status == 1)
                                <span
                                    class="px-3 py-1 text-xs font-semibold bg-gradient-to-r from-green-400 to-green-600 text-white rounded-full">Aktif</span>
                            @else
                                <span
                                    class="px-3 py-1 text-xs font-semibold bg-gradient-to-r from-red-400 to-red-600 text-white rounded-full">Tidak
                                    Aktif</span>
                            @endif
                        </td>
                        <td class="px-8 py-6 space-x-1 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('assets.show', $item->id) }}"
                                class="p-2.5 bg-cyan-600 text-white rounded hover:bg-cyan-700 text-xs">
                                <i class="fas fa-eye text-base"></i>
                            </a>
                            <a href="{{ route('assets.edit', $item->id) }}"
                                class="p-2.5 bg-yellow-600 text-white rounded hover:bg-yellow-700 text-xs">
                                <i class="fas fa-edit text-base"></i>
                            </a>
                            <form id="delete-form-{{ $item->id }}" action="{{ route('assets.destroy', $item->id) }}"
                                method="POST"
                                class="inline p-2.5 bg-red-600 text-white rounded hover:bg-red-700 text-xs delete-form">
                                @csrf
                                @method('DELETE')

                                <button type="button" onclick="confirmDelete({{ $item->id }})">
                                    <i class="fas fa-trash text-base"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-8 py-6 text-center text-sm text-gray-400">
                            Tidak ada data periode yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-card-table>


    <!-- Modal -->
    <div x-show="openModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div @click.away="openModal = false" class="stat-card rounded-xl shadow-xl w-full max-w-2xl p-6">
            <h2 class="text-lg font-semibold mb-4">Tambah</h2>
            <form action="{{ route('assets.store') }}" class="grid grid-cols-2 gap-4" method="POST">
                @csrf
                <x-input-text label="Nama" type="text" name="name" placeholder="Masukkan nama" />
                <div class="my-2">
                    <label class="block text-sm font-semibold text-gray-300 mb-3" for="category_id">Kategory</label>
                    <select name="category_id" id="category_id"
                        class="futuristic-input w-full px-4 py-4 rounded-xl transition-all">
                        <option class="text-black" value="" selected>Pilih Kategory</option>
                        @foreach ($categories as $item)
                            <option class="text-black" value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <x-input-text label="Jumlah" type="number" name="quantity" placeholder="Jumlah Semua Asset" />
                <x-input-text label="Harga Beli" type="number" name="purchase_price"
                    placeholder="Masukkan Harga Persatuan" />
                <x-input-text label="Lokasi Aset" type="text" name="location" placeholder="Masukkan Lokasi Barang" />
                <x-input-text label="Umur Ekonomis" type="text" name="umur_ekonomis" placeholder="Masukkan Umur Ekonomis" />
                <x-input-text label="Penyusutan" type="text" name="penyusutan" placeholder="Masukkan Penyusutan" />

                <x-input-text label="Tanggal" type="date" name="purchase_date" placeholder="Masukkan Tanggal" />


                <div class="my-2">
                    <label class="block text-sm font-semibold text-gray-300 mb-3" for="status">Status</label>
                    <select name="status" id="status"
                        class="futuristic-input w-full px-4 py-4 rounded-xl transition-all">
                        <option class="text-black" value="" disabled selected>Pilih Kategory</option>
                        <option class="text-black" value="active">Aktif</option>
                        <option class="text-black" value="inactive">Tidak Aktif</option>
                    </select>
                </div>

                <div class="col-span-2 flex justify-end mt-6 space-x-2">

                    <button type="button" @click="openModal = false"
                        class="px-4 py-2 bg-red-500 rounded hover:bg-red-400 text-sm">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
