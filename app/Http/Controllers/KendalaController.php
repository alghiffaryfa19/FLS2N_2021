<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\Kendala;

class KendalaController extends Controller
{
    public function tiket()
    {
        $bidang = Bidang::all();
        return view('frontend.tiket', compact('bidang'));
    }

    public function add_tiket(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required',
            'wa' => 'required',
            'judul' => 'required',
            'bidang_id' => 'required',
            'detail' => 'required',
        ]);

        $kode = rand();

        Kendala::create([
            'nama' => $request->nama,
            'kode' => $kode,
            'nisn' => $request->nisn,
            'wa' => $request->wa,
            'judul' => $request->judul,
            'bidang_id' => $request->bidang_id,
            'detail' => $request->detail,
        ]);

        return redirect()->route('tiket')->with('berhasil',$kode);
    }

    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Kendala::latest()->with('bidang')->select('kendalas.*'))
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("kendala.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.kendala", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->editColumn('statuss', function ($data) {
                if ($data->status == 1) {
                    $mystring = "Sudah Dijawab";
                } else {
                    $mystring = "Belum Dijawab";
                }
                return $mystring;
            })
            ->rawColumns(['edit','statuss'])
            ->make(true);
        }
        return view('admin.kendala.index');
    }

    public function edit($id)
    {
        $kendala = Kendala::find($id);
        return view('admin.kendala.edit', compact('kendala'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'solution' => 'required',
        ]);

        $kendala = Kendala::find($id);

        $kendala->update([
            'solution' => $request->solution,
            'status' => 1,
        ]);

        return redirect()->route('kendala.index');
    }

    public function destroy($id)
    {
        $kendala = Kendala::find($id);
        if (!$kendala) {
            return redirect()->back();
        }
        
        $kendala->delete();
        return redirect()->route('kendala.index');
    }
}
