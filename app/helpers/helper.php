<?php

use App\Models\Bidang;
use App\Models\UnggahanBerkas;
use App\Models\Tim;
use App\Models\KaryaProvinsi;
use App\Models\Biodata;
use App\Models\Sekolah;
use App\Models\Anggota;
use App\Models\OrangTua;
use App\Models\NisnJuara;
use App\Models\User;
use App\Models\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

function cek_berkelompok($id)
{
    $bidang = Bidang::find($id);
    return $bidang->kelompok;
}

function berkas($berkas,$tim)
{
    return UnggahanBerkas::where('berkas_id',$berkas)->where('tim_id',$tim)->exists();
}

function kode($kode)
{
    return Biodata::where('kode',$kode)->first();
}

function ketua($nisn)
{
    return Biodata::where('nisn',$nisn)->first();
}

function bidang_ketua($id)
{
    $biodata = Biodata::with('tim.bidang_provinsi.bidang')->find($id);
    return $biodata->tim->bidang_provinsi->bidang->kelompok;
}

function karya($unggahan,$tim)
{
    return KaryaProvinsi::where('unggahan_id',$unggahan)->where('tim_id',$tim)->exists();
}

function lolos($id)
{
    $tim = Tim::find($id);
    return $tim->lolos;
}


function cek_anggota($kode)
{
    return Anggota::whereHas('tim', function($q) use ($kode){
        $q->whereHas('biodata', function($q) use ($kode){
            $q->where('kode', $kode);
        });
    })->count();
}

function cek_peserta($bidang,$npsn)
{
    return Biodata::
    whereHas('tim', function($q) use ($bidang,$npsn){
        $q->where('bidang_id', $bidang)->whereHas('sekolah', function($q) use ($npsn){
            $q->where('npsn', $npsn);
        });
    })
    ->exists();
}

function juara($nisn,$bidang)
{
    return NisnJuara::where('nisn',$nisn)->where('bidang_id',$bidang)->exists();
}

function juarsa($nisn,$bidang)
{
    $nisn = NisnJuara::where('nisn',$nisn)->where('bidang_id',$bidang)->first();
    return $nisn;
}

function cek_biodata()
{
    $biodata = Biodata::find(auth()->user()->biodata->id);
    return $biodata->status;
}

function cek_biodata_anggota()
{
    $biodata = Anggota::find(auth()->user()->anggota->id);
    return $biodata->status;
}

function cek_sekolah()
{
    $sekolah = Sekolah::find(auth()->user()->biodata->tim->sekolah->id);
    return $sekolah->simpan;
}

function cek_ortu()
{
    $ortu = OrangTua::find(auth()->user()->biodata->ayahibu_ketua->id);
    return $ortu->status;
}

function cek_pembimbing()
{
    $guru = Pembimbing::find(auth()->user()->biodata->tim->pembimbing->id);
    return $guru->status;
}

function cek_berkas()
{
    $berkas = UnggahanBerkas::where('tim_id',auth()->user()->biodata->tim->id)->count();
    return $berkas;
}

function nisn($nisn)
{
    return Biodata::where('nisn',$nisn)->exists();
}

function nik($nik)
{
    return Biodata::where('nik',$nik)->exists();
}

function nik_anggota($nik)
{
    return Anggota::where('nik',$nik)->exists();
}

function nisn_anggota($nisn)
{
    return Anggota::where('nisn',$nisn)->exists();
}

function email($email)
{
    return User::where('email',$email)->exists();
}

function embed_video($url)
{
    $regExp = "/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/";
    preg_match($regExp, $url, $video);
    return 'https://www.youtube.com/embed/'.$video[7];
}

function thumbnail($url)
{
    $response = Http::get('https://www.youtube.com/oembed?url='.$url.'&format=json');
    $data = $response->json();
    return $data['thumbnail_url'];
}

function thumbnail_video($url)
{
    $regExp = "/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/";
    preg_match($regExp, $url, $video);
    return 'https://img.youtube.com/vi/'.$video[7].'/maxresdefault.jpg';
}

function persentase_daftar($count)
{
    return (($count/Tim::count())*100);
}

function persentase_unggah($count)
{
    return (($count/Tim::has('karya_provinsi')->count())*100);
}

function peserta($prov)
{
    $tes = Bidang::with(['bidang_provinsi' => function($q) use($prov) {
        $q->where('province_id',$prov)->withCount('tim')->withCount(['pengunggah' => function($q) {
            $q->has('karya_provinsi');
        }]);
    }])->get();

    $hasil = '';

    foreach ($tes as $data) {
        $pendaftar= 0;
        $pengunggah= 0;
        foreach ($data->bidang_provinsi as $items) {
            $pendaftar += $items->tim_count;
            $pengunggah += $items->pengunggah_count;
        }
        $hasil .= '<li> Pendaftar '.$data->nama_bidang.' : '.$pendaftar.'</li><li> Pengunggah '.$data->nama_bidang.' : '.$pengunggah.'</li>';
    }

    return $hasil;

}