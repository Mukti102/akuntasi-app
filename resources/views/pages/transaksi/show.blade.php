@extends('layouts.main')
@section('content')
    <div class="xl:col-span-1">
        <div class="form-card rounded-2xl">
            <div class="px-8 py-6 border-b border-white/10">
                <h3 class="text-xl font-bold text-white">
                    <i class="fas fa-edit mr-3 text-blue-400"></i>Detail Transaksi
                </h3>
            </div>
            <div class="p-8">
                <form action="{{ route('transactions.update', $transaction->id) }}" class="grid grid-cols-2 gap-4"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <x-input-text readonly label="Nama" type="text"  value="{{$transaction->name}}" name="name" placeholder="Masukkan nama" />
                    <div class="my-2">
                        <label class="block text-sm font-semibold text-gray-300 mb-3" for="type">Type Transaksi</label>
                        <select readonly name="type" id="type"
                            class="futuristic-input w-full px-4 py-4 rounded-xl transition-all">
                            <option class="text-black" value="" selected>Pilih type</option>
                            <option class="text-black" {{$transaction->type == 'income' ? 'selected' : ''}} value="income">Pemasukkan</option>
                            <option class="text-black" {{$transaction->type !== 'income' ? 'selected' : ''}} value="expense">Pengeluaran</option>
                        </select>
                    </div>
                    <x-input-text readonly label="Tanggal" value="{{$transaction->transaction_date}}" type="date" name="transaction_date" placeholder="Tanggal" />
                    <x-input-text readonly label="Total" value="{{$transaction->amount}}" type="number" name="amount" placeholder="Masukkan Total" />
                    <div class="my-2">
                        <label for="description" class="block text-sm font-semibold text-gray-300 mb-3"
                            for="type">Deskripsi</label>
                        <textarea readonly name="description" id="description" cols="10" rows="3"
                            class="futuristic-input w-full px-4 py-4 rounded-xl transition-all">
                            {{ $transaction->description }}
                        </textarea>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
