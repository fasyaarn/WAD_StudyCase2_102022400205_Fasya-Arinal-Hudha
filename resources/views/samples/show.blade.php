<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Sampel
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @php
                        $statusColor = match ($sample->status_uji) {
                            'Pending' => 'bg-gray-100 text-gray-700',
                            'In Analysis' => 'bg-blue-100 text-blue-700',
                            'Completed' => 'bg-green-100 text-green-700',
                            default => 'bg-gray-100 text-gray-700',
                        };
                    @endphp

                    <dl class="divide-y divide-gray-200">
                        <div class="py-3 grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Kode Sampel</dt>
                            <dd class="text-sm text-gray-900 col-span-2">{{ $sample->kode_sampel }}</dd>
                        </div>
                        <div class="py-3 grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Nama Sampel</dt>
                            <dd class="text-sm text-gray-900 col-span-2">{{ $sample->nama_sampel }}</dd>
                        </div>
                        <div class="py-3 grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Jenis Sampel</dt>
                            <dd class="text-sm text-gray-900 col-span-2">{{ $sample->jenis_sampel }}</dd>
                        </div>
                        <div class="py-3 grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Jumlah Titik</dt>
                            <dd class="text-sm text-gray-900 col-span-2">{{ $sample->jumlah_titik }}</dd>
                        </div>
                        <div class="py-3 grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Biaya per Titik</dt>
                            <dd class="text-sm text-gray-900 col-span-2">Rp {{ number_format($sample->biaya_per_titik, 0, ',', '.') }}</dd>
                        </div>
                        <div class="py-3 grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Status Uji</dt>
                            <dd class="col-span-2">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $statusColor }}">{{ $sample->status_uji }}</span>
                            </dd>
                        </div>
                        <div class="py-3 grid grid-cols-3 gap-4">
                            <dt class="text-sm font-medium text-gray-500">Catatan Kondisi</dt>
                            <dd class="text-sm text-gray-900 col-span-2">{{ $sample->catatan_kondisi ?? '-' }}</dd>
                        </div>
                    </dl>

                    <div class="mt-6">
                        <a href="{{ route('samples.index') }}" class="text-sm text-gray-600 underline hover:text-gray-900">&larr; Kembali ke Daftar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>