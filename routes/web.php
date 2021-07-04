<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardAnggotaController;
use App\Http\Controllers\DashboardKetuaController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\KaryaProvinsiController;
use App\Http\Controllers\KendalaController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\UnduhanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BidangKategoriController;


Route::get('/', [FrontendController::class, 'index'])->name('landing');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/unduhan', [FrontendController::class, 'unduhan'])->name('unduhan');
Route::get('/video', [FrontendController::class, 'video'])->name('video');
Route::get('/informasi', [FrontendController::class, 'informasi'])->name('informasi');
Route::get('/bidang', [FrontendController::class, 'bidang'])->name('bidang');
Route::get('/video/{video}', [FrontendController::class, 'detail_video'])->name('detail_video');
Route::post('/loadmore/load_data', [FrontendController::class, 'load_info'])->name('loadmore.load_info');
Route::post('/loadmore/load_data_berita', [FrontendController::class, 'load_berita'])->name('loadmore.load_berita');
Route::post('/loadmore/load_data_unduhan', [FrontendController::class, 'load_unduhan'])->name('loadmore.load_unduhan');
Route::post('/loadmore/load_data_video', [FrontendController::class, 'load_video'])->name('loadmore.load_video');

Route::get('/berita', [FrontendController::class, 'berita'])->name('berita');
Route::get('/berita/{berita}', [FrontendController::class, 'detail_berita'])->name('detail_berita');

Route::get('lupa-email', [FrontendController::class, 'cari_email'])->name('forgot_email');
Route::any('forgot-email', [FrontendController::class, 'lupa_email'])->name('post_email');
Route::get('lupa-password', [FrontendController::class, 'cari_password'])->name('lupa_password');
Route::any('lupa-kata-sandi', [FrontendController::class, 'lupa_password'])->name('post_password');
Route::put('perbarui-kata-sandi', [FrontendController::class, 'update_password'])->name('update_password');
Route::get('kendala', [KendalaController::class, 'tiket'])->name('tiket');
Route::get('cek-kendala', [FrontendController::class, 'cek_tiket'])->name('cek_tiket');
Route::any('tiket', [KendalaController::class, 'add_tiket'])->name('add_tiket');
Route::any('cek-tiket', [FrontendController::class, 'cek_tikets'])->name('cek_tikets');


Route::middleware(['guest'])->group(function () {
    Route::any('daftar', [FrontendController::class, 'daftar'])->name('daftar');
    Route::get('anggota', [FrontendController::class, 'anggota'])->name('anggotas');
    Route::any('daftar-anggota', [FrontendController::class, 'daftar_anggota'])->name('daftar_anggota');
    Route::any('registration', [FrontendController::class, 'registration_ketua'])->name('registration');
    Route::any('registration-anggota', [FrontendController::class, 'registration_anggota'])->name('registration_anggota');
});

Route::post('kecamatan', [FrontendController::class, 'kecamatan'])->name('kecamatan');
Route::post('bidang', [FrontendController::class, 'bidang_provinsi'])->name('bidang-provinsi');
Route::post('province', [FrontendController::class, 'province'])->name('province');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'ketua', 'middleware' => ['auth','ketua']], function(){
    Route::get('/dashboard', [DashboardKetuaController::class, 'dashboard'])->name('ketua');
    Route::get('/akun', [DashboardKetuaController::class, 'akun'])->name('akun.ketua');
    Route::put('/akun', [DashboardKetuaController::class, 'simpan_akun'])->name('akun.ketua.save');
    Route::get('/biodata', [DashboardKetuaController::class, 'biodata'])->name('biodata.ketua');
    Route::put('/biodata', [DashboardKetuaController::class, 'simpan_biodata'])->name('biodata.ketua.save');
    Route::get('/sekolah', [DashboardKetuaController::class, 'sekolah'])->name('sekolah');
    Route::put('/sekolah', [DashboardKetuaController::class, 'simpan_sekolah'])->name('sekolah.save');
    Route::get('/lomba', [DashboardKetuaController::class, 'lomba'])->name('lomba');
    Route::put('/lomba', [DashboardKetuaController::class, 'simpan_lomba'])->name('lomba.save');
    Route::get('/orang-tua', [DashboardKetuaController::class, 'orangtua'])->name('orangtua.ketua');
    Route::put('/orang-tua', [DashboardKetuaController::class, 'simpan_data_orangtua'])->name('orangtua.ketua.data');
    Route::get('/anggota', [DashboardKetuaController::class, 'anggota'])->name('anggota');
    Route::get('/pembimbing', [DashboardKetuaController::class, 'pembimbing'])->name('pembimbing');
    Route::put('/pembimbing', [DashboardKetuaController::class, 'simpan_pembimbing'])->name('pembimbing.save');
    Route::resource('berkas', BerkasController::class);
    Route::get('berkas/{id}/delete', [BerkasController::class, 'destroy'])->name('hapus.berkas');
    Route::resource('karya-provinsi', KaryaProvinsiController::class);
    Route::get('karya-provinsi/{id}/delete', [KaryaProvinsiController::class, 'destroy'])->name('hapus.karya');
});

Route::group(['prefix' => 'anggota', 'middleware' => ['auth','anggota']], function(){
    Route::get('/dashboard', [DashboardAnggotaController::class, 'dashboard'])->name('anggotasss');
    Route::get('/akun', [DashboardAnggotaController::class, 'akun'])->name('akun.anggota');
    Route::put('/akun', [DashboardAnggotaController::class, 'simpan_akun'])->name('akun.anggota.save');
    Route::get('/biodata', [DashboardAnggotaController::class, 'biodata'])->name('biodata.anggota');
    Route::put('/biodata', [DashboardAnggotaController::class, 'simpan_biodata'])->name('biodata.anggota.save');
    Route::get('/orang-tua', [DashboardAnggotaController::class, 'orangtua'])->name('orangtua.anggota');
    Route::put('/orang-tua', [DashboardAnggotaController::class, 'simpan_data_orangtua'])->name('orangtua.anggota.data');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function(){
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin');
    Route::get('/informasi', [DashboardAdminController::class, 'informasi'])->name('web-informasi');
    Route::get('/export-excel', [DashboardAdminController::class, 'export'])->name('export');
    Route::get('/grafik', [DashboardAdminController::class, 'grafik'])->name('grafik');
    Route::get('/geospasial', [DashboardAdminController::class, 'geospasial'])->name('geospasial');
    Route::get('/perbidang', [DashboardAdminController::class, 'per_bidang'])->name('per_bidang');
    Route::get('/perbidangprovinsi/{provinsi}', [DashboardAdminController::class, 'per_bidang_provinsi'])->name('per_bidang_provinsi');
    Route::get('/bidangprovinsi/{bidang}', [DashboardAdminController::class, 'bidang_prov'])->name('bidang_prov');
    Route::resource('slider', SliderController::class);
    Route::get('slider/{id}/delete', [SliderController::class, 'destroy'])->name('hapus.slider');
    Route::resource('video', VideoController::class);
    Route::get('video/{id}/delete', [VideoController::class, 'destroy'])->name('hapus.video');
    Route::resource('info', InfoController::class);
    Route::get('info/{id}/delete', [InfoController::class, 'destroy'])->name('hapus.info');
    Route::resource('berita', BeritaController::class);
    Route::get('berita/{id}/delete', [BeritaController::class, 'destroy'])->name('hapus.berita');
    Route::resource('faq', FaqController::class);
    Route::get('faq/{id}/delete', [FaqController::class, 'destroy'])->name('hapus.faq');
    Route::resource('kendala', KendalaController::class);
    Route::get('kendala/{id}/delete', [KendalaController::class, 'destroy'])->name('hapus.kendala');
    Route::resource('unduhan', UnduhanController::class);
    Route::get('unduhan/{id}/delete', [UnduhanController::class, 'destroy'])->name('hapus.unduhan');
    Route::resource('kategori', KategoriController::class);
    Route::get('kategori/{id}/delete', [KategoriController::class, 'destroy'])->name('hapus.kategori');
    Route::resource('bidang', BidangKategoriController::class);
    Route::get('bidang/{id}/delete', [BidangKategoriController::class, 'destroy'])->name('hapus.bidang');
});

require __DIR__.'/auth.php';
