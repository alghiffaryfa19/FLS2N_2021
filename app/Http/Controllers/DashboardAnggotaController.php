<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Anggota;
use DB;
use App\Models\OrangTuaAnggota;
use Illuminate\Support\Facades\Hash;
use Auth;
use Storage;

class DashboardAnggotaController extends Controller
{
    public function dashboard()
    {
        return view('anggota.dashboard');
    }

    public function akun()
    {
        $user = User::find(auth()->user()->id);
        return view('anggota.akun', compact('user'));
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
            return redirect()->route('akun.anggota')->with('sukses','Hore');
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
        $biodata = Anggota::find(auth()->user()->anggota->id);
        return view('anggota.biodata', compact('biodata'));
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

        $biodata = Anggota::find(auth()->user()->anggota->id);

        if (empty($request->file('foto'))) {
            $biodata->update([
                'kip' => $request->kip,
                'nik' => $request->nik,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nohp' => $request->nohp,
                'ukuran_baju' => $request->ukuran_baju,
                'jalan' => $request->jalan,
                'kelas' => $request->kelas,
                'alamat_siln' => $request->alamat_siln,
                'no_rmh' => $request->no_rmh,
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
                'alamat_siln' => $request->alamat_siln,
                'kelas' => $request->kelas,
                'ukuran_baju' => $request->ukuran_baju,
                'jalan' => $request->jalan,
                'no_rmh' => $request->no_rmh,
                'rt_rw' => $request->rt_rw,
                'kodepos' => $request->kodepos,
                'status' => $request->status,
                'kelurahan' => $request->kelurahan,
                'district_id' => $request->district_id,
                'foto' => $request->file('foto')->store('anggota'), 
            ]);
        }

        return redirect()->route('biodata.anggota')->with('sukses','Hore');
    }

    public function orangtua()
    {
        if (cek_biodata_anggota() == 1) {
            $ortu = OrangTuaAnggota::find(auth()->user()->anggota->ayahibu_anggota->id);
            return view('anggota.orangtua', compact('ortu'));
        } else {
            return redirect()->route('biodata.anggota')->with('isi','isi');
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

        $ortu = OrangTuaAnggota::find(auth()->user()->anggota->ayahibu_anggota->id);

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

        return redirect()->route('orangtua.anggota')->with('sukses','Hore');
    }
}
