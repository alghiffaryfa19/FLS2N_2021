<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Str;
use App\Models\BidangKategori;
use App\Models\Kategori;

class BidangKategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        if(request()->ajax())
        {
            return datatables()->of(BidangKategori::query())
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("bidang.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.bidang", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.bidang.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bidang' => 'required',
            'detail' => 'required',
            'kategori_id' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        BidangKategori::create([
            'nama_bidang' => $request->nama_bidang,
            'slug' => Str::slug($request->nama_bidang),
            'detail' => $request->detail,
            'icon' => $request->file('icon')->store('bidang_kategori'), 
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('bidang.index');
    }

    public function edit($id)
    {
        $bidang = BidangKategori::find($id);
        $kategori = Kategori::all();
        return view('admin.bidang.edit', compact('bidang','kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bidang' => 'required',
            'detail' => 'required',
            'kategori_id' => 'required',
            'icon' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $bidang = BidangKategori::find($id);

        if (empty($request->file('icon'))) {
            $bidang->update([
                'nama_bidang' => $request->nama_bidang,
                'slug' => Str::slug($request->nama_bidang),
                'detail' => $request->detail,
                'kategori_id' => $request->kategori_id,
            ]);
        } else {
            Storage::delete($bidang->icon);
            $bidang->update([
                'nama_bidang' => $request->nama_bidang,
                'slug' => Str::slug($request->nama_bidang),
                'detail' => $request->detail,
                'icon' => $request->file('icon')->store('bidang_kategori'), 
                'kategori_id' => $request->kategori_id, 
            ]);
        }

        return redirect()->route('bidang.index');
    }

    public function destroy($id)
    {
        $bidang = BidangKategori::find($id);
        if (!$bidang) {
            return redirect()->back();
        }
        Storage::delete($bidang->icon);
        $bidang->delete();
        return redirect()->route('bidang.index');
    }


}
