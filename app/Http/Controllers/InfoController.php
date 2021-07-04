<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Info;

class InfoController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Info::query())
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("info.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.info", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.info.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'url' => 'required',
        ]);

        Info::create([
            'judul' => $request->judul,
            'url' => $request->url,
        ]);

        return redirect()->route('info.index');
    }

    public function edit($id)
    {
        $info = Info::find($id);
        return view('admin.info.edit', compact('info'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'url' => 'required',
        ]);

        $info = Info::find($id);

        $info->update([
            'judul' => $request->judul,
            'url' => $request->url,
        ]);

        return redirect()->route('info.index');
    }

    public function destroy($id)
    {
        $info = Info::find($id);

        if (!$info) {
            return redirect()->back();
        }

        $info->delete();
        return redirect()->route('info.index');
    }


}
