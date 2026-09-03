@extends('layouts.app')

@section('title', 'Detail Sampel')

@section('content')
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
@endsection