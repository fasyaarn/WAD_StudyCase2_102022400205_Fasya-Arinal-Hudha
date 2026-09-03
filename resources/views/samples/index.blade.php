@extends('layouts.app')

@section('title', 'Daftar Sampel')

@section('content')
    <h1>Daftar Sampel</h1>

    <a href="{{ route('samples.create') }}">Tambah Sampel Baru</a>

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

                        <form action="{{ route('samples.destroy', $sample) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection