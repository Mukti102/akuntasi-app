@props(['name' => 'periode'])
<div x-data="{ openModal: false }" class="grid grid-cols-1 gap-8">
    <!-- Data Table -->
    <div class="xl:col-span-2">
        <div class="data-table shadow-md border border-1 border-gray-200 rounded-2xl overflow-hidden">
            <div class="px-8 py-6 border-b border-white/10">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-white">Data {{ $name }}</h3>
                    <button @click="openModal = true"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                        Tambah {{ $name }}
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
