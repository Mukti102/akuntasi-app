@extends('layouts.main')
@section('content')
    <div class="xl:col-span-1">
        <div class="form-card rounded-2xl">
            <div class="px-8 py-6 border-b border-white/10">
                <h3 class="text-xl font-bold text-white">
                    <i class="fas fa-edit mr-3 text-blue-400"></i>Edit Periode
                </h3>
            </div>
            <div class="p-8">
                <form action="{{ route('periodes.update', $periode->id) }}" class="grid grid-cols-2 gap-4" method="POST">
                    @csrf
                    @method('PUT')
                    <x-input-text label="Nama Periode" value="{{ $periode->periode_name }}" type="text"
                        name="periode_name" placeholder="Masukkan nama periode" />
                    <x-input-text label="Saldo" type="number" value="{{$periode->saldo}}" name="saldo" placeholder="Saldo" />
                    <x-input-text label="Periode" type="number" value="{{ $periode->tahun }}" name="tahun"
                        placeholder="Masukkan Tahun Periode" />
                    <x-input-text label="Tanggal Mulai" type="date" value="{{ $periode->tanggal_mulai }}"
                        name="tanggal_mulai" placeholder="Tanggal Mulai" />
                    <x-input-text label="Tanggal Selesai" type="date" value="{{ $periode->tanggal_selesai }}"
                        name="tanggal_selesai" placeholder="Tanggal Selesai" />
                    <x-input-text label="Keterangan" type="text" value="{{ $periode->keterangan }}" name="keterangan"
                        placeholder="Masukkan keterangan" />
                    <div class="mt-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="status" {{ $periode->status ? 'checked' : '' }}
                                class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2 text-sm text-gray-300">Aktifkan Periode</span>
                        </label>
                    </div>



                    <div class="col-span-2 flex justify-end mt-6 space-x-2">

                        <button type="button" @click="openModal = false"
                            class="px-5 py-2.5 bg-red-500 rounded hover:bg-red-400">
                            Batal
                        </button>
                        <button type="submit" class="px-5 py-2.5 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
