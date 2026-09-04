<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Sampel</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $totalSamples }}</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Titik Uji</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $totalTitikUji }}</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6">
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Estimasi Tagihan</p>
                    <p class="mt-2 text-3xl font-semibold text-gray-900">Rp {{ number_format($totalBiaya, 0, ',', '.') }}</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>