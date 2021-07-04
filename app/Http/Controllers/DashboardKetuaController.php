<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Sekolah;
use App\Models\Tim;
use App\Models\Pembimbing;
use App\Models\UnggahanBerkas;
use App\Models\KaryaProvinsi;
use App\Models\Anggota;
use DB;
use App\Models\OrangTua;
use Illuminate\Support\Facades\Hash;
use Auth;
use Storage;

class DashboardKetuaController extends Controller
{
    public function dashboard()
    {
        return view('ketua.dashboard');
    }

    public function akun()
    {
        $user = User::find(auth()->user()->id);
        return view('ketua.akun', compact('user'));
    }

    public function simpan_akun(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::find(auth()->user()->id);

        if (empty($request->password)) {
            $user->update([
                'name' => ucwords($request->name),
                'email' => $request->email,
            ]);
            return redirect()->route('akun.ketua')->with('sukses','Hore');
        } else {
            $user->update([
                'name' => ucwords($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
        
            return redirect()->route('login')->with('password','sukses');
        }
    }

    public function biodata()
    {
        $biodata = Biodata::find(auth()->user()->biodata->id);
        return view('ketua.biodata', compact('biodata'));
    }

    public function simpan_biodata(Request $request)
    {
        $request->validate([
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status' => 'required',
            'kelas' => 'required',
            'email_pribadi' => 'required',
            'nohp' => 'required',
            'kelurahan' => 'required',
            'district_id' => 'required',
            'jalan' => 'required',
            'no_rmh' => 'required',
            'rt_rw' => 'required',
            'kodepos' => 'required',
            'nik' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $biodata = Biodata::find(auth()->user()->biodata->id);

        if (empty($request->file('foto'))) {
            $biodata->update([
                'kip' => $request->kip,
                'nik' => $request->nik,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email_pribadi' => $request->email_pribadi,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nohp' => $request->nohp,
                'ukuran_baju' => $request->ukuran_baju,
                'jalan' => $request->jalan,
                'kelas' => $request->kelas,
                'no_rmh' => $request->no_rmh,
                'alamat_siln' => $request->alamat_siln,
                'rt_rw' => $request->rt_rw,
                'kodepos' => $request->kodepos,
                'status' => $request->status,
                'kelurahan' => $request->kelurahan,
                'district_id' => $request->district_id,
            ]);
        } else {
            Storage::delete($biodata->foto);
            $biodata->update([
                'kip' => $request->kip,
                'nik' => $request->nik,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nohp' => $request->nohp,
                'kelas' => $request->kelas,
                'ukuran_baju' => $request->ukuran_baju,
                'alamat_siln' => $request->alamat_siln,
                'jalan' => $request->jalan,
                'no_rmh' => $request->no_rmh,
                'email_pribadi' => $request->email_pribadi,
                'rt_rw' => $request->rt_rw,
                'kodepos' => $request->kodepos,
                'status' => $request->status,
                'kelurahan' => $request->kelurahan,
                'district_id' => $request->district_id,
                'foto' => $request->file('foto')->store('biodata'), 
            ]);
        }

        return redirect()->route('biodata.ketua')->with('sukses','Hore');
    }

    public function sekolah()
    {
        if (cek_biodata() == 1) {
            $sekolah = Sekolah::find(auth()->user()->biodata->tim->sekolah->id);
            return view('ketua.sekolah', compact('sekolah'));
        } else {
            return redirect()->route('biodata.ketua')->with('isi','isi');
        }
    }

    public function simpan_sekolah(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'status' => 'required',
            'telp_sekolah' => 'required',
            'kelurahan' => 'required',
            'district_id' => 'required',
            'jalan' => 'required',
            'no_rmh' => 'required',
            'rt_rw' => 'required',
            'kodepos' => 'required',
            'simpan' => 'required',
        ]);

        $sekolah = Sekolah::find(auth()->user()->biodata->tim->sekolah->id);

        $sekolah->update([
            'nama_sekolah' => $request->nama_sekolah,
            'telp_sekolah' => $request->telp_sekolah,
            'status' => $request->status,
            'jalan' => $request->jalan,
            'kelurahan' => $request->kelurahan,
            'district_id' => $request->district_id,
            'no_rmh' => $request->no_rmh,
            'rt_rw' => $request->rt_rw,
            'alamat_sekolah_siln' => $request->alamat_sekolah_siln,
            'kodepos' => $request->kodepos,
            'simpan' => $request->simpan,
        ]);

        return redirect()->route('sekolah')->with('sukses','Hore');
    }

    public function lomba()
    {
        $tim = Tim::with('bidang_provinsi.province')->find(auth()->user()->biodata->tim->id);
        return view('ketua.tim', compact('tim'));
    }

    public function simpan_lomba(Request $request)
    {
        $request->validate([
            'bidang_id' => 'required',
            'province_id' => 'required',
        ]);

        $tim = Tim::with('unggahan','karya_provinsi')->find(auth()->user()->biodata->tim->id);

        if ($tim->bidang_id != $request->bidang_id) {
            DB::beginTransaction();

            try{

                if (cek_peserta($request->bidang_id,auth()->user()->biodata->tim->sekolah->npsn)) {
                    return redirect()->route('lomba')->with('gagal','gagal');
                } else {
                    $tim->update([
                        'bidang_id' => $request->bidang_id,
                        'province_id' => $request->province_id,
                    ]);
    
                    foreach ($tim->unggahan as $item) {
                        $berkas = UnggahanBerkas::find($item->id);
                        Storage::delete($berkas->berkas);
                        $berkas->delete();
                    }
    
                    foreach ($tim->karya_provinsi as $item) {
                        $karya = KaryaProvinsi::find($item->id);
                        Storage::delete($karya->input);
                        $karya->delete();
                    }
    
                    DB::commit();
    
                    return redirect()->route('lomba')->with('sukses','Hore');
                }

            } catch(\Exception $e) {
                DB::rollback();
                return "gagal";
            }
        } else {
            $tim->update([
                'bidang_id' => $request->bidang_id,
                'province_id' => $request->province_id,
            ]);

            return redirect()->route('lomba')->with('sukses','Hore');
        }
        

        

        
    }

    public function anggota()
    {
        $anggota = Anggota::with('user')->where('tim_id',auth()->user()->biodata->tim_id)->first();
        return view('ketua.anggota', compact('anggota'));
    }

    public function orangtua()
    {
        if (cek_sekolah() == 1) {
            $ortu = OrangTua::find(auth()->user()->biodata->ayahibu_ketua->id);
            return view('ketua.orangtua', compact('ortu'));
        } else {
            return redirect()->route('sekolah')->with('isi','isi');
        }
    }

    public function simpan_data_orangtua(Request $request)
    {
        $request->validate([
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'pendidikan_terakhir_ibu' => 'required',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'pendidikan_terakhir_ayah' => 'required',
            'nohp_ibu' => 'required',
            'nohp_ayah' => 'required',
            'jalan' => 'required',
            'no_rmh' => 'required',
            'rt_rw' => 'required',
            'kodepos' => 'required',
            'kelurahan' => 'required',
            'status' => 'required',
            'district_id' => 'required',
        ]);

        $ortu = OrangTua::find(auth()->user()->biodata->ayahibu_ketua->id);

        $ortu->update([
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'pendidikan_terakhir_ibu' => $request->pendidikan_terakhir_ibu,
            'nohp_ibu' => $request->nohp_ibu,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pendidikan_terakhir_ayah' => $request->pendidikan_terakhir_ayah,
            'nohp_ayah' => $request->nohp_ayah,
            'status' => $request->status,
            'kelurahan' => $request->kelurahan,
            'district_id' => $request->district_id,
            'jalan' => $request->jalan,
            'no_rmh' => $request->no_rmh,
            'rt_rw' => $request->rt_rw,
            'kodepos' => $request->kodepos,
        ]);

        return redirect()->route('orangtua.ketua')->with('sukses','Hore');
    }

    public function pembimbing()
    {
        if (cek_ortu() == 1) {
            $guru = Pembimbing::find(auth()->user()->biodata->tim->pembimbing->id);
            return view('ketua.guru', compact('guru'));
        } else {
            return redirect()->route('orangtua.ketua')->with('isi','isi');
        }
    }

    public function simpan_pembimbing(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'no_telp' => 'required',
            'jalan' => 'required',
            'no_rmh' => 'required',
            'rt_rw' => 'required',
            'kelurahan' => 'required',
            'district_id' => 'required',
            'kodepos' => 'required',
            'status' => 'required',
            'surat_kepsek' => 'file|mimes:pdf|max:2048',
        ]);

        $guru = Pembimbing::find(auth()->user()->biodata->tim->pembimbing->id);

        if (empty($request->surat_kepsek)) {
            $guru->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nik' => $request->nik,
                'no_telp' => $request->no_telp,
                'nuptk' => $request->nuptk,
                'nip' => $request->nip,
                'jalan' => $request->jalan,
                'no_rmh' => $request->no_rmh,
                'rt_rw' => $request->rt_rw,
                'status' => $request->status,
                'kelurahan' => $request->kelurahan,
                'district_id' => $request->district_id,
                'kodepos' => $request->kodepos,
            ]);
        } else {
            Storage::delete($guru->surat_kepsek);
            $guru->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nik' => $request->nik,
                'no_telp' => $request->no_telp,
                'nuptk' => $request->nuptk,
                'email' => $request->email,
                'nip' => $request->nip,
                'jalan' => $request->jalan,
                'no_rmh' => $request->no_rmh,
                'rt_rw' => $request->rt_rw,
                'kelurahan' => $request->kelurahan,
                'district_id' => $request->district_id,
                'status' => $request->status,
                'kodepos' => $request->kodepos,
                'surat_kepsek' => $request->file('surat_kepsek')->store('pembimbing'),
            ]);
        }
        
        
        return redirect()->route('pembimbing')->with('sukses','Hore');
    }
}
