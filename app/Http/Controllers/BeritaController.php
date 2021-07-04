<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Str;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Berita::query())
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("berita.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.berita", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.berita.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'content' => $request->content,
            'thumbnail' => $request->file('thumbnail')->store('berita'), 
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('berita.index');
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $berita = Berita::find($id);

        if (empty($request->file('thumbnail'))) {
            $berita->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'content' => $request->content,
            ]);
        } else {
            Storage::delete($berita->thumbnail);
            $berita->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'content' => $request->content,
                'thumbnail' => $request->file('thumbnail')->store('berita'), 
            ]);
        }

        return redirect()->route('berita.index');
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            return redirect()->back();
        }
        Storage::delete($berita->thumbnail);
        $berita->delete();
        return redirect()->route('berita.index');
    }


}
