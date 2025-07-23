@extends('layouts.main')
@section('content')
    <x-card-table>
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        No</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Nama</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Saldo</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Tahun</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Status</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($periodes as $item)
                    <tr class="table-row">
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">{{ $item->periode_name }}</td>
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">{{ $item->saldo }}</td>
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">{{ $item->tahun }}</td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            @if ($item->status == 1)
                                <span
                                    class="px-3 py-1 text-xs font-semibold bg-gradient-to-r from-green-400 to-green-600 text-white rounded-full">Aktif</span>
                            @else
                                <span
                                    class="px-3 py-1 text-xs font-semibold bg-gradient-to-r from-red-400 to-red-600 text-white rounded-full">Nonactive</span>
                            @endif
                        </td>
                        <td class="px-8 py-6 space-x-1 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('periodes.edit', $item->id) }}"
                                class="p-2.5 bg-yellow-600 text-white rounded hover:bg-yellow-700 text-xs">
                                <i class="fas fa-edit text-base"></i>
                            </a>

                            <form id="delete-form-{{ $item->id }}" action="{{ route('periodes.destroy', $item->id) }}"
                                method="POST"
                                class="inline p-2.5 bg-red-600 text-white rounded hover:bg-red-700 text-xs delete-form">
                                @csrf
                                @method('DELETE')

                                <button type="button" onclick="confirmDelete({{ $item->id }})">
                                    <i class="fas fa-trash text-base"></i>
                                </button>
                            </form>
                            <a href="{{ route('periodes.print', $item->id) }}"
                                class="p-2.5 bg-cyan-600 text-white rounded hover:bg-yellow-700 text-xs">
                                <i class="fas fa-print text-base"></i>
                            </a>
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
            <h2 class="text-lg font-semibold mb-4">Tambah Periode</h2>
            <form action="{{ route('periodes.store') }}" class="grid grid-cols-2 gap-4" method="POST">
                @csrf
                <x-input-text label="Nama Periode" type="text" name="periode_name" placeholder="Masukkan nama periode" />
                <x-input-text label="Saldo" type="number" name="saldo" placeholder="Saldo" />
                <x-input-text label="Periode" type="number" name="tahun" placeholder="Masukkan Tahun Periode" />
                <x-input-text label="Tanggal Mulai" type="date" name="tanggal_mulai" placeholder="Tanggal Mulai" />
                <x-input-text label="Tanggal Selesai" type="date" name="tanggal_selesai" placeholder="Tanggal Selesai" />
                <x-input-text label="Keterangan" type="text" name="keterangan" placeholder="Masukkan keterangan" />
                <div class="mt-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="status" value="1" checked
                            class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2 text-sm text-gray-300">Aktifkan Periode</span>
                    </label>
                </div>


                <div class="col-span-2 flex justify-end mt-6 space-x-2">

                    <button type="button" @click="openModal = false"
                        class="px-4 py-2.5 bg-gray-300 rounded hover:bg-gray-400 text-sm">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2.5 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
