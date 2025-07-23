@extends('layouts.main')
@section('content')
    <x-card-table name="Transaksi">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        No</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Nama</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Total</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Type Transaksi</th>
                    <th class="px-8 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse ($transactions as $item)
                    <tr class="table-row">
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">{{ $item->name }}</td>
                        <td class="px-8 py-6 whitespace-nowrap text-sm text-gray-300">
                            {{ number_format($item->amount, 2, '.', ',') }}

                        </td>
                        <td class="px-8 py-6 whitespace-nowrap">
                            @if ($item->type == 'income')
                                <span
                                    class="px-3 py-1 text-xs font-semibold bg-gradient-to-r from-green-400 to-green-600 text-white rounded-full">Pemasukkan</span>
                            @else
                                <span
                                    class="px-3 py-1 text-xs font-semibold bg-gradient-to-r from-red-400 to-red-600 text-white rounded-full">Pengeluaran</span>
                            @endif
                        </td>
                        <td class="px-8 py-6 space-x-1 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('transactions.show', $item->id) }}"
                                class="p-2.5 bg-cyan-600 text-white rounded hover:bg-cyan-700 text-xs">
                                <i class="fas fa-eye text-base"></i>
                            </a>
                            <a href="{{ route('transactions.edit', $item->id) }}"
                                class="p-2.5 bg-yellow-600 text-white rounded hover:bg-yellow-700 text-xs">
                                <i class="fas fa-edit text-base"></i>
                            </a>

                            <form id="delete-form-{{ $item->id }}"
                                action="{{ route('transactions.destroy', $item->id) }}" method="POST"
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
            <form action="{{ route('transactions.store') }}" class="grid grid-cols-2 gap-4" method="POST">
                @csrf
                <x-input-text label="Nama" type="text" name="name" placeholder="Masukkan nama" />
                <div class="my-2">
                    <label class="block text-sm font-semibold text-gray-300 mb-3" for="type">Type Transaksi</label>
                    <select name="type" id="type"
                        class="futuristic-input w-full px-4 py-4 rounded-xl transition-all">
                        <option class="text-black" value="" selected>Pilih type</option>
                        <option class="text-black" value="income">Pemasukkan</option>
                        <option class="text-black" value="expense">Pengeluaran</option>
                    </select>
                </div>
                <x-input-text label="Tanggal" type="date" name="transaction_date" placeholder="Tanggal" />
                <x-input-text label="Total" type="number" name="amount" placeholder="Masukkan Total" />
                <div class="my-2">
                    <label for="description" class="block text-sm font-semibold text-gray-300 mb-3"
                        for="type">Deskripsi</label>
                    <textarea name="description" id="description" cols="10" rows="3"
                        class="futuristic-input w-full px-4 py-4 rounded-xl transition-all"></textarea>
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
