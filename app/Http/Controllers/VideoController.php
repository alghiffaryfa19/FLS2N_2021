<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Video::query())
            ->editColumn('edit', function ($data) {
                $mystring = '<a href="'.route("video.edit", $data->id).'" class="bg-indigo-500 text-white p-2 rounded mr-2 font-bold">Edit</a><a href="'.route("hapus.video", $data->id).'" onclick="return confirm(`Apakah anda ingin menghapus ?`)" class="bg-red-500 text-white p-2 rounded mr-2 font-bold">Hapus</a>';
                return $mystring;
            })
            ->rawColumns(['edit'])
            ->make(true);
        }
        return view('admin.video.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'url' => 'required',
        ]);

        Video::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'url' => $request->url,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('video.index');
    }

    public function edit($id)
    {
        $video = Video::find($id);
        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'url' => 'required',
        ]);

        $video = Video::find($id);

        $video->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'url' => $request->url,
        ]);

        return redirect()->route('video.index');
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        if (!$video) {
            return redirect()->back();
        }

        $video->delete();
        return redirect()->route('video.index');
    }


}
