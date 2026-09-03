@extends('layouts.app')

@section('title', 'Edit Sampel')

@section('content')
    <h1>Edit Sampel</h1>

    <form action="{{ route('samples.update', $sample) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Kode Sampel</label>
            <input type="text" name="kode_sampel" value="{{ old('kode_sampel', $sample->kode_sampel) }}">
            @error('kode_sampel')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Nama Sampel</label>
            <input type="text" name="nama_sampel" value="{{ old('nama_sampel', $sample->nama_sampel) }}">
            @error('nama_sampel')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Jenis Sampel</label>
            <select name="jenis_sampel">
                <option value="">-- Pilih Jenis --</option>
                <option value="Air Bersih" @selected(old('jenis_sampel', $sample->jenis_sampel) == 'Air Bersih')>Air Bersih</option>
                <option value="Air Limbah" @selected(old('jenis_sampel', $sample->jenis_sampel) == 'Air Limbah')>Air Limbah</option>
                <option value="Udara" @selected(old('jenis_sampel', $sample->jenis_sampel) == 'Udara')>Udara</option>
                <option value="Emisi Gas" @selected(old('jenis_sampel', $sample->jenis_sampel) == 'Emisi Gas')>Emisi Gas</option>
                <option value="Tanah" @selected(old('jenis_sampel', $sample->jenis_sampel) == 'Tanah')>Tanah</option>
            </select>
            @error('jenis_sampel')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Jumlah Titik</label>
            <input type="number" name="jumlah_titik" value="{{ old('jumlah_titik', $sample->jumlah_titik) }}">
            @error('jumlah_titik')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Biaya per Titik</label>
            <input type="number" name="biaya_per_titik" value="{{ old('biaya_per_titik', $sample->biaya_per_titik) }}">
            @error('biaya_per_titik')
                <div style="color:red">{{ $message }}</div>
            @enderror   
        </div>

        <div>
            <label>Status Uji</label>
            <select name="status_uji">
                <option value="">-- Pilih Status --</option>
                <option value="Pending" @selected(old('status_uji', $sample->status_uji) == 'Pending')> Pending</option>
                <option value="In Analysis" @selected(old('status_uji', $sample->status_uji) == 'In Analysis')> In Analysis</option>
                <option value="Completed" @selected(old('status_uji', $sample->status_uji) == 'Completed')> Completed</option>
            </select>
            @error('status_uji')
                <div style="color:red">{{ $message }}</div>
            @enderror  
        </div>

        <div>
            <label>Catatan Kondisi</label>
            <textarea name="catatan_kondisi">{{ old('catatan_kondisi', $sample->catatan_kondisi) }}</textarea>
            @error('catatan_kondisi')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Simpan</button>
    </form>
@endsection