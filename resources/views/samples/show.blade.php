<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Sampel
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Detail Sampel</h1>

                    <table border="1">
                        <tr>
                            <th>Kode Sampel</th>
                            <td>{{ $sample->kode_sampel }}</td>
                        </tr>
                        <tr>
                            <th>Nama Sampel</th>
                            <td>{{ $sample->nama_sampel }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Sampel</th>
                            <td>{{ $sample->jenis_sampel }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Titik</th>
                            <td>{{ $sample->jumlah_titik }}</td>
                        </tr>
                        <tr>
                            <th>Biaya per Titik</th>
                            <td>Rp {{ number_format($sample->biaya_per_titik, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Status Uji</th>
                            <td>{{ $sample->status_uji }}</td>
                        </tr>
                        <tr>
                            <th>Catatan Kondisi</th>
                            <td>{{ $sample->catatan_kondisi ?? '-' }}</td>
                        </tr>
                    </table>

                    <a href="{{ route('samples.index') }}">Kembali ke Daftar</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>