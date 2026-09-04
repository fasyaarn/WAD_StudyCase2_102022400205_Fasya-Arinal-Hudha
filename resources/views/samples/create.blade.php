<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Sampel Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('samples.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="kode_sampel" value="Kode Sampel" />
                            <x-text-input id="kode_sampel" name="kode_sampel" type="text" class="mt-1 block w-full" :value="old('kode_sampel')" />
                            <x-input-error :messages="$errors->get('kode_sampel')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="nama_sampel" value="Nama Sampel" />
                            <x-text-input id="nama_sampel" name="nama_sampel" type="text" class="mt-1 block w-full" :value="old('nama_sampel')" />
                            <x-input-error :messages="$errors->get('nama_sampel')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="jenis_sampel" value="Jenis Sampel" />
                            <select id="jenis_sampel" name="jenis_sampel" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">-- Pilih Jenis --</option>
                                <option value="Air Bersih" @selected(old('jenis_sampel') == 'Air Bersih')>Air Bersih</option>
                                <option value="Air Limbah" @selected(old('jenis_sampel') == 'Air Limbah')>Air Limbah</option>
                                <option value="Udara" @selected(old('jenis_sampel') == 'Udara')>Udara</option>
                                <option value="Emisi Gas" @selected(old('jenis_sampel') == 'Emisi Gas')>Emisi Gas</option>
                                <option value="Tanah" @selected(old('jenis_sampel') == 'Tanah')>Tanah</option>
                            </select>
                            <x-input-error :messages="$errors->get('jenis_sampel')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="jumlah_titik" value="Jumlah Titik" />
                            <x-text-input id="jumlah_titik" name="jumlah_titik" type="number" class="mt-1 block w-full" :value="old('jumlah_titik')" />
                            <x-input-error :messages="$errors->get('jumlah_titik')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="biaya_per_titik" value="Biaya per Titik" />
                            <x-text-input id="biaya_per_titik" name="biaya_per_titik" type="number" class="mt-1 block w-full" :value="old('biaya_per_titik')" />
                            <x-input-error :messages="$errors->get('biaya_per_titik')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="status_uji" value="Status Uji" />
                            <select id="status_uji" name="status_uji" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">-- Pilih Status --</option>
                                <option value="Pending" @selected(old('status_uji') == 'Pending')>Pending</option>
                                <option value="In Analysis" @selected(old('status_uji') == 'In Analysis')>In Analysis</option>
                                <option value="Completed" @selected(old('status_uji') == 'Completed')>Completed</option>
                            </select>
                            <x-input-error :messages="$errors->get('status_uji')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="catatan_kondisi" value="Catatan Kondisi" />
                            <textarea id="catatan_kondisi" name="catatan_kondisi" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('catatan_kondisi') }}</textarea>
                            <x-input-error :messages="$errors->get('catatan_kondisi')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>Simpan</x-primary-button>
                            <a href="{{ route('samples.index') }}" class="text-sm text-gray-600 underline hover:text-gray-900">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>