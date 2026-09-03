<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Sampel
        </h2>
    </x-slot>

    <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('samples.create') }}">Tambah Sampel Baru</a>
                @endif

                <table border="1">
                    <thead>
                        <tr>
                            <th>Kode Sampel</th>
                            <th>Nama Sampel</th>
                            <th>Jenis Sampel</th>
                            <th>Jumlah Titik</th>
                            <th>Biaya per Titik</th>
                            <th>Status Uji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($samples as $sample)
                            <tr>
                                <td>{{ $sample->kode_sampel }}</td>
                                <td>{{ $sample->nama_sampel }}</td>
                                <td>{{ $sample->jenis_sampel }}</td>
                                <td>{{ $sample->jumlah_titik }}</td>
                                <td>Rp {{ number_format($sample->biaya_per_titik, 0, ',', '.') }}</td>
                                <td>{{ $sample->status_uji }}</td>
                                <td>
                                    <a href="{{ route('samples.show', $sample) }}">Detail</a>
                                    <a href="{{ route('samples.edit', $sample) }}">Edit</a>
                                    @if (Auth::user()->role === 'admin')
                                        <form action="{{ route('samples.destroy', $sample) }}" method="POST" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus sampel ini?')">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>