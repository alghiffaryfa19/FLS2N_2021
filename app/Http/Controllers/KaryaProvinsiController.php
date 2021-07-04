<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnggahanBidang;
use App\Models\Tim;
use App\Models\KaryaProvinsi;
use App\Models\Berkas;
use App\Models\Countdown;
use Carbon\Carbon;
use Storage;

class KaryaProvinsiController extends Controller
{
    public function index()
    {
        $countdown = Countdown::find(1);

        if (Carbon::now()->isBefore($countdown->pendaftaran_pengunggahan)) {
            $berkas = Berkas::where('bidang_id',auth()->user()->biodata->tim->bidang_provinsi->bidang_id)->count();
            if (cek_berkas() < $berkas) {
                return redirect()->route('berkas.index')->with('isi','isi');
            } else {
                $unggahan = UnggahanBidang::where('bidang_id',auth()->user()->biodata->tim->bidang_provinsi->bidang_id)->with('karya', function($q) {
                    $q->where('tim_id', auth()->user()->biodata->tim->id);
                })->get();
                //return $unggahan;
                return view('ketua.karya_provinsi', compact('unggahan'));
            }
        }

        else {
            $tutup = Carbon::parse($countdown->pendaftaran_pengunggahan)->format('d M Y h:i:s');
            return redirect('login')->with('waktu_habis',$tutup);
        }
    }

    public function store(Request $request)
    {
        $countdown = Countdown::find(1);

        if (Carbon::now()->isBefore($countdown->pendaftaran_pengunggahan)) {
            $unggahan = UnggahanBidang::find($request->unggahan_id);
            if ($unggahan->type == 'url') {
                $request->validate([
                    'unggahan_id' => 'required',
                    'input' => 'required',
                ]);
        
                $tim = Tim::find(auth()->user()->biodata->tim->id);
                if (karya($request->berkas_id,$tim->id)) {
                    return redirect()->route('karya-provinsi.index')->with('gagal','Sudah Ada');
                } else {
                    $tim->karya_provinsi()->create([
                        'unggahan_id' => $request->unggahan_id,
                        'input' => $request->input,
                    ]);
                }
            } else if ($unggahan->type == 'file') {
                $request->validate([
                    'unggahan_id' => 'required',
                    'input' => 'required|file|mimes:'.$unggahan->format.'',
                ]);
        
                $tim = Tim::find(auth()->user()->biodata->tim->id);
                if (karya($request->berkas_id,$tim->id)) {
                    return redirect()->route('karya-provinsi.index')->with('gagal','Sudah Ada');
                } else {
                    $tim->karya_provinsi()->create([
                        'unggahan_id' => $request->unggahan_id,
                        'input' => $request->file('input')->store('karya_provinsi'),
                    ]);
                }
            } else {
                $request->validate([
                    'unggahan_id' => 'required',
                    'input' => 'required',
                ]);
        
                $tim = Tim::find(auth()->user()->biodata->tim->id);
                if (karya($request->berkas_id,$tim->id)) {
                    return redirect()->route('karya-provinsi.index')->with('gagal','Sudah Ada');
                } else {
                    $tim->karya_provinsi()->create([
                        'unggahan_id' => $request->unggahan_id,
                        'input' => $request->input,
                    ]);
                }
            }
            
    
            return redirect()->route('karya-provinsi.index')->with('sukses','ye');
        }

        else {
            $tutup = Carbon::parse($countdown->pendaftaran_pengunggahan)->format('d M Y h:i:s');
            return redirect('login')->with('waktu_habis',$tutup);
        }
    }

    public function destroy($id)
    {
        $karya = KaryaProvinsi::with('unggahan_bidang')->find($id);
        if (!$karya) {
            return redirect()->back();
        }

        if ($karya->unggahan_bidang->type == 'url') {
            $karya->delete();
        } else if ($karya->unggahan_bidang->type == 'file') {
            Storage::delete($karya->input);
            $karya->delete();
        } else {
            $karya->delete();
        }

        return redirect()->route('karya-provinsi.index');
    }
}
