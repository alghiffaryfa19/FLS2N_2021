<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berkas;
use App\Models\Tim;
use App\Models\Countdown;
use Carbon\Carbon;
use App\Models\UnggahanBerkas;
use Storage;

class BerkasController extends Controller
{
    public function index()
    {
        $countdown = Countdown::find(1);

        if (Carbon::now()->isBefore($countdown->pendaftaran_pengunggahan)) {
            if (cek_pembimbing() == 1) {
                $berkas = Berkas::where('bidang_id',auth()->user()->biodata->tim->bidang_provinsi->bidang_id)->where('status',1)->with('unggahan', function($q) {
                    $q->where('tim_id', auth()->user()->biodata->tim->id);
                })->get();
                return view('ketua.berkas', compact('berkas'));
            } else {
                return redirect()->route('pembimbing')->with('isi','isi');
            }
        }

        else {
            $tutup = Carbon::parse($countdown->pendaftaran_pengunggahan)->format('d M Y h:i:s');
            return redirect('login')->with('waktu_habis',$tutup);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'berkas_id' => 'required',
            'berkas' => 'required|file|mimes:pdf|max:2048',
        ]);

        $countdown = Countdown::find(1);

        if (Carbon::now()->isBefore($countdown->pendaftaran_pengunggahan)) {
            $tim = Tim::find(auth()->user()->biodata->tim->id);
            if (berkas($request->berkas_id,$tim->id)) {
                return redirect()->route('berkas.index')->with('gagal','Sudah Ada');
            } else {
                $tim->unggahan()->create([
                    'berkas_id' => $request->berkas_id,
                    'berkas' => $request->file('berkas')->store('berkas_tim'),
                ]);
            }
    
            return redirect()->route('berkas.index')->with('sukses','ye');
        }

        else {
            $tutup = Carbon::parse($countdown->pendaftaran_pengunggahan)->format('d M Y h:i:s');
            return redirect('login')->with('waktu_habis',$tutup);
        }

        
    }

    public function destroy($id)
    {
        $berkas = UnggahanBerkas::find($id);
        if (!$berkas) {
            return redirect()->back();
        }

        Storage::delete($berkas->berkas);
        $berkas->delete();
        return redirect()->route('berkas.index');
    }
}
