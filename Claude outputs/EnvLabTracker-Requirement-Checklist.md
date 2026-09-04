# EnvLab Tracker — Requirement Compliance Checklist

*Diverifikasi langsung dari kode project (bukan asumsi) pada 4 September 2026, dicek satu-satu terhadap dokumen requirement resmi "Study Case 2 — Rekrutasi Asisten Praktikum WAD".*

## Ringkasan

Kelima kategori requirement teknis di bawah — Middleware, CRUD, Ketentuan Data Sampel, Validasi, dan REST API — **semuanya sudah terpenuhi dan sudah dites berfungsi**. Yang belum selesai bukan kode lagi, tapi dokumentasi: screenshot untuk laporan "Lembar Jawaban" dan rekam video demo (lihat bagian paling bawah).

---

## 1. Middleware (Autentikasi & Role-based Access)

| Requirement PDF | Status | Bukti di kode |
|---|---|---|
| Sistem login dengan 2 role (Admin & Analis Lab) | ✅ | Laravel Breeze + kolom `role` enum(`admin`,`staff`) di tabel `users` |
| Middleware `auth` menolak akses ke seluruh halaman sampel bagi yang belum login | ✅ | Semua route `samples.*` dibungkus `Route::middleware('auth')` di `routes/web.php` |
| Middleware `role` membatasi fitur tambah & hapus hanya untuk Lab Head (RBAC) | ✅ | `app/Http/Middleware/EnsureUserHasRole.php` — cek `in_array($request->user()->role, $roles, true)`, `abort(403)` kalau nggak cocok. Didaftarkan sebagai alias `role` di `bootstrap/app.php` |
| Route create/store/destroy khusus admin | ✅ | Di `routes/web.php`, route itu dibungkus `Route::middleware('role:admin')`, didaftarkan LEBIH DULU sebelum group `auth` biasa (index/show/edit/update) — urutan ini penting supaya `/samples/create` nggak ketangkep sebagai parameter `{sample}` |
| Staff cuma boleh update `status_uji` & `catatan_kondisi`, field lain terkunci | ✅ | `SampleController@update()` bercabang: kalau role admin, validasi 7 field penuh; kalau bukan, cuma 2 field itu yang divalidasi & diupdate |
| Tampilan penolakan akses staff (tombol disembunyikan / 403) | ✅ (ganda) | Tombol "Tambah"/"Hapus" disembunyikan di `samples/index.blade.php` (`@if (Auth::user()->role === 'admin')`) **dan** middleware tetap balikin 403 kalau staff akses langsung lewat URL |

## 2. CRUD Data Sampel Lab

| Fitur wajib | Status | Bukti di kode |
|---|---|---|
| Tambah sampel pengujian baru | ✅ | `SampleController@create` + `@store`, khusus admin |
| Lihat daftar sampel beserta status analisis | ✅ | `SampleController@index`, tabel di `samples/index.blade.php` menampilkan `status_uji` per baris (dengan badge warna) |
| Update data sampel (termasuk progres status uji) | ✅ | `SampleController@edit` + `@update`, tersedia untuk admin (semua field) & staff (status + catatan) |
| Delete data sampel (khusus Lab Head) | ✅ | `SampleController@destroy`, dibungkus middleware `role:admin` |
| Dashboard ringkasan: total sampel, total titik uji, total estimasi tagihan | ✅ | `DashboardController@index`: `Sample::count()`, `Sample::sum('jumlah_titik')`, dan `Sample::all()->sum(fn($s) => $s->biaya_per_titik * $s->jumlah_titik)` — rumus ini PERSIS sesuai requirement ("Titik Uji × Biaya Uji per Titik, dijumlahkan seluruh data") |

## 3. Ketentuan Data Sampel (skema tabel `samples`)

| Atribut (requirement) | Status | Implementasi di migration |
|---|---|---|
| Kode Sampel — unik | ✅ | `$table->string('kode_sampel')->unique();` |
| Nama Sampel | ✅ | `$table->string('nama_sampel');` |
| Jenis Sampel — Air Bersih/Air Limbah/Udara/Emisi Gas/Tanah | ✅ | `$table->enum('jenis_sampel', ['Air Bersih','Air Limbah','Udara','Emisi Gas','Tanah']);` — persis 5 kategori sesuai PDF |
| Jumlah Titik — angka bulat, >= 1 | ✅ | Kolom `unsignedInteger` + validasi `min:1` di controller |
| Biaya per Titik — angka, >= 0 | ✅ | Kolom `unsignedBigInteger` + validasi `min:0` di controller |
| Status Uji — Pending/In Analysis/Completed | ✅ | `$table->enum('status_uji', ['Pending','In Analysis','Completed']);` — persis 3 status sesuai PDF |
| Catatan Kondisi — opsional | ✅ | `$table->text('catatan_kondisi')->nullable();` |

## 4. Ketentuan Validasi

| Requirement | Status | Bukti di kode |
|---|---|---|
| Kode Sampel wajib unik, notifikasi error kalau sudah terdaftar | ✅ | Rule `unique:samples` (create) / `Rule::unique('samples')->ignore($sample->id)` (update, biar sampel yang sama nggak dianggap duplikat sama dirinya sendiri). Pesan error otomatis tampil lewat `<x-input-error>` di form |
| Jumlah Titik & Biaya per Titik wajib angka, tidak boleh negatif | ✅ | `'jumlah_titik' => ['required','integer','min:1']`, `'biaya_per_titik' => ['required','integer','min:0']` |
| Semua field wajib diisi kecuali Catatan Kondisi | ✅ | Semua field `required`, cuma `catatan_kondisi` yang `nullable` |
| Validasi dieksekusi di backend (server-side) | ✅ | Semua rule di atas jalan lewat `$request->validate()` di `SampleController` (PHP/server), bukan validasi JavaScript di browser |

## 5. REST API

| Requirement | Status | Bukti di kode |
|---|---|---|
| `GET /api/samples` — daftar seluruh sampel + status & biaya, JSON | ✅ | `Api\SampleController@index` return `Sample::all()`, auto-serialize JSON oleh Laravel |
| `GET /api/samples/{kode_sample}` — detail satu sampel berdasarkan Kode Sampel (bukan id) | ✅ | Route `Route::get('/samples/{sample:kode_sampel}', ...)` — custom route key binding by kolom `kode_sampel`, bukan `id` default |
| Sudah diuji pakai Postman, response JSON di-screenshot | ✅ | Sudah dites: 401 tanpa token, 200 + JSON dengan token, 404 untuk kode yang nggak ada. Screenshot sudah diambil user |
| *(Tambahan atas inisiatif sendiri, bukan requirement literal PDF)* Endpoint dilindungi token Sanctum | ✅ | `Route::middleware('auth:sanctum')`, token digenerate via Tinker (`$user->createToken(...)`), `HasApiTokens` trait ada di `User` model |

---

## Yang masih perlu diberesin (bukan kode, dokumentasi buat submit)

1. Screenshot 10 dari 12 item checklist "Hasil yang Diharapkan" di PDF (login, dashboard, daftar sampel, form tambah/edit, notifikasi-notifikasi, tampilan akses ditolak staff) — 2 item Postman-nya sudah kelar.
2. Isi PDF laporan pakai template "Lembar Jawaban" dari dokumen requirement (nama, NIM, link video, link GitHub + screenshot & penjelasan tiap item).
3. Rekam video demo, maksimal 6 menit: perkenalan singkat, struktur project Laravel, demo seluruh fitur CRUD, demo perbedaan akses Admin vs Staff, demo pengujian API lewat Postman.
4. Pastikan histori commit Git tetap bertahap sampai submit (Tahap 4) — sejauh ini sudah berjalan konsisten sejak Tahap 1.
