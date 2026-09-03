<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Sampel Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('samples.store') }}" method="POST">
                        @csrf

                        <div>
                            <label>Kode Sampel</label>
                            <input type="text" name="kode_sampel" value="{{ old('kode_sampel') }}">
                            @error('kode_sampel')<div style="color:red">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label>Nama Sampel</label>
                            <input type="text" name="nama_sampel" value="{{ old('nama_sampel') }}">
                            @error('nama_sampel')<div style="color:red">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label>Jenis Sampel</label>
                            <select name="jenis_sampel">
                                <option value="">-- Pilih Jenis --</option>
                                <option value="Air Bersih" @selected(old('jenis_sampel') == 'Air Bersih')>Air Bersih</option>
                                <option value="Air Limbah" @selected(old('jenis_sampel') == 'Air Limbah')>Air Limbah</option>
                                <option value="Udara" @selected(old('jenis_sampel') == 'Udara')>Udara</option>
                                <option value="Emisi Gas" @selected(old('jenis_sampel') == 'Emisi Gas')>Emisi Gas</option>
                                <option value="Tanah" @selected(old('jenis_sampel') == 'Tanah')>Tanah</option>
                            </select>
                            @error('jenis_sampel')<div style="color:red">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label>Jumlah Titik</label>
                            <input type="number" name="jumlah_titik" value="{{ old('jumlah_titik') }}">
                            @error('jumlah_titik')<div style="color:red">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label>Biaya per Titik</label>
                            <input type="number" name="biaya_per_titik" value="{{ old('biaya_per_titik') }}">
                            @error('biaya_per_titik')<div style="color:red">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label>Status Uji</label>
                            <select name="status_uji">
                                <option value="">-- Pilih Status --</option>
                                <option value="Pending" @selected(old('status_uji') == 'Pending')>Pending</option>
                                <option value="In Analysis" @selected(old('status_uji') == 'In Analysis')>In Analysis</option>
                                <option value="Completed" @selected(old('status_uji') == 'Completed')>Completed</option>
                            </select>
                            @error('status_uji')<div style="color:red">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label>Catatan Kondisi</label>
                            <textarea name="catatan_kondisi">{{ old('catatan_kondisi') }}</textarea>
                            @error('catatan_kondisi')<div style="color:red">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>